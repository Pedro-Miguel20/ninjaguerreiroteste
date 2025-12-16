'use client';

import { Card, CardHeader, CardBody, CardFooter } from '@heroui/card';
import { Button, Form, Input, Select, SelectItem } from '@heroui/react';
import { IconEye, IconEyeClosed } from '@tabler/icons-react';
import { Inter } from 'next/font/google';
import Link from 'next/link';
import { FormEvent, useState } from 'react';

import { register } from '../../../../../services/auth.service';
import { useGroups } from '@/src/hooks/useGroups';
import { showToast, getToastColorByStatus } from '@/src/utils/toast';
import { passwordSchema } from '@/src/utils/passwordSchema';
import { ptBR } from '@/src/dictionaries/default-language-collections/default-pt-BR';

const inter = Inter({
  subsets: ['latin'],
  display: 'swap',
});

// ======================
// Types
// ======================

type RegisterPayload = {
  username: string;
  password: string;
  groups: number[];
};

type PasswordValidationError = {
  validation: string;
  arguments?: number | number[];
  message: string;
};

interface RegisterFormProps {
  dict: {
    registerPage: {
      register: string;
      labelName: string;
      placeholdername: string;
      labelPassword: string;
      placeholderpassword: string;
      errorPassword: string;
      labelGroup: string;
      placeholdergroup: string;
      errorGroup: string;
      button: string;
      goto: string;
      link: string;
      success: {
        title: string;
        description: string;
      };
    };
    error: {
      title: string;
      password:{
        rules: {
                min: string,
                uppercase: string,
                lowercase: string,
                digits: string,
                symbols: string,
            }
      },
      username: {
        rules: {
            min: string,
            errorName: string;
        }
      }
    };
  };
  lang: string;
}

// ======================
// Component
// ======================

export default function RegisterForm({ dict, lang }: RegisterFormProps) {
  const [isVisible, setIsVisible] = useState(false);
  const [passwordErrors, setPasswordErrors] = useState<PasswordValidationError[]>([]);

  const { groups } = useGroups();

  type PasswordRule = keyof typeof ptBR.error.password.rules;

  function isPasswordRuleKey(key: string): key is PasswordRule {
    return key in ptBR.error.password.rules;
  }

  

  function toggleVisibility() {
    setIsVisible((prev) => !prev);
  }

  async function onSubmit(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();

    const formData = new FormData(event.currentTarget);

    const payload: RegisterPayload = {
      username: formData.get('username') as string,
      password: formData.get('password') as string,
      groups: formData.getAll('groups').map((g) => Number(g)),
    };

    try {
      const validationErrors = validatePassword(payload.password);

      if (validationErrors.length > 0) {
        setPasswordErrors(validationErrors);
        return;
      }

      const data = await register(payload, lang);

      showToast({
        title: dict.registerPage.success.title,
        description: `${dict.registerPage.success.description}${payload.username}!`,
        color: getToastColorByStatus(data.status),
      });
    } catch (error: unknown) {
      const apiError = error as {
        message: string;
        status?: number;
      };

      showToast({
        title: dict.error.title,
        description: apiError.message,
        color: getToastColorByStatus(apiError.status || 500),
      });
    }
  }
  function validatePassword(value: string): PasswordValidationError[] {
    const result = passwordSchema.validate(value, {
      list: true,
      details: true,
    }) as false | PasswordValidationError[];

    return result === false ? [] : result;
  }

  return (
    <Card className={`${inter.className} p-3 w-[350px] m-2`}>
      <CardHeader>
        <h1 className="text-xl">
          <b>{dict.registerPage.register}</b>
        </h1>
      </CardHeader>

      <CardBody>
        <Form onSubmit={onSubmit} className="w-full max-w-xs flex flex-col gap-4">
          <Input
            isRequired
            name="username"
            type="text"
            size="md"
            label={dict.registerPage.labelName}
            labelPlacement="inside"
            minLength={5}
            placeholder={dict.registerPage.placeholdername}
            errorMessage={dict.error.username.rules.min}
          />
            <div className='w-full'>
          <Input
            errorMessage={dict.registerPage.errorPassword}
            isRequired
            name="password"
            size="md"
            type={isVisible ? 'text' : 'password'}
            label={dict.registerPage.labelPassword}
            labelPlacement="inside"
            placeholder={dict.registerPage.placeholderpassword}
            onChange={(e) => setPasswordErrors(validatePassword(e.target.value))}
            endContent={
              <button type="button" className="cursor-pointer" onClick={toggleVisibility}>
                {isVisible ? <IconEye /> : <IconEyeClosed />}
              </button>
            }
          />

          {passwordErrors.length > 0 && (
            <ul className="text-danger text-[12px] mt-2 list-disc">
              {passwordErrors.map((err, index) => (
                <li key={index} className="list-none">
                  {isPasswordRuleKey(err.validation)
                    ? dict.error.password.rules[err.validation]
                    : err.message}
                </li>
              ))}
            </ul>
          )}
            </div>
          <Select
            name="groups"
            className="max-w-xs"
            label={dict.registerPage.labelGroup}
            errorMessage={dict.registerPage.errorGroup}
          >
            {groups.map((group: { id: number; name: string }) => (
              <SelectItem key={group.id}>{group.name}</SelectItem>
            ))}
          </Select>

          <Button color="primary" type="submit" className="w-full">
            {dict.registerPage.button}
          </Button>
        </Form>
      </CardBody>

      <CardFooter>
        <p className="text-sm text-default-500">
          {dict.registerPage.goto}
          <Link href="/auth/login" className="text-primary ml-1 hover:underline">
            {dict.registerPage.link}
          </Link>
        </p>
      </CardFooter>
    </Card>
  );
}
