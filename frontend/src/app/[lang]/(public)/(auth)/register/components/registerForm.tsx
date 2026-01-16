'use client';

import { Card, CardHeader, CardBody, CardFooter } from '@heroui/card';
import { Button, Form, Input, Select, SelectItem } from '@heroui/react';
import { IconEye, IconEyeClosed } from '@tabler/icons-react';
import { Inter } from 'next/font/google';
import Link from 'next/link';
import { FormEvent, useState } from 'react';

import { register } from '../../../../../../services/auth.service';
import { useGroups } from '@/src/hooks/useGroups';
import { showToast, getToastColorByStatus } from '@/src/utils/toast';
import { passwordSchema } from '@/src/utils/passwordSchema';
import { useTranslations } from '@/src/config/dictionaryContext';

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

interface RegisterFormProps{
  lang: string
}

export default function RegisterForm({lang}: RegisterFormProps) {

  const t = useTranslations();

  const [isVisible, setIsVisible] = useState(false);
  const [passwordErrors, setPasswordErrors] = useState<PasswordValidationError[]>([]);

  const { groups } = useGroups();

  type PasswordRule = keyof typeof t.error.password.rules;

  function isPasswordRuleKey(key: string): key is PasswordRule {
    return key in t.error.password.rules;
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

      const data = await register(payload, lang, t);

      showToast({
        title: t.registerPage.success.title,
        description: `${t.registerPage.success.description}${payload.username}!`,
        color: getToastColorByStatus(data.status),
      });
    } catch (error: unknown) {
      const apiError = error as {
        message: string;
        status?: number;
      };

      showToast({
        title: t.error.register.titleError,
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
          <b>{t.registerPage.register}</b>
        </h1>
      </CardHeader>

      <CardBody>
        <Form onSubmit={onSubmit} className="w-full max-w-xs flex flex-col gap-4">
          <Input
            isRequired
            name="username"
            type="text"
            size="md"
            label={t.registerPage.labelName}
            labelPlacement="inside"
            minLength={5}
            placeholder={t.registerPage.placeholdername}
            errorMessage={t.error.username.rules.min}
          />
            <div className='w-full'>
          <Input
            errorMessage={t.registerPage.errorPassword}
            isRequired
            name="password"
            size="md"
            type={isVisible ? 'text' : 'password'}
            label={t.registerPage.labelPassword}
            labelPlacement="inside"
            placeholder={t.registerPage.placeholderpassword}
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
                    ? t.error.password.rules[err.validation]
                    : err.message}
                </li>
              ))}
            </ul>
          )}
            </div>
          <Select
            name="groups"
            className="max-w-xs"
            label={t.registerPage.labelGroup}
            errorMessage={t.registerPage.errorGroup}
          >
            {groups.map((group: { id: number; name: string }) => (
              <SelectItem key={group.id}>{group.name}</SelectItem>
            ))}
          </Select>

          <Button color="primary" type="submit" className="w-full">
            {t.registerPage.button}
          </Button>
        </Form>
      </CardBody>

      <CardFooter>
        <p className="text-sm text-default-500">
          {t.registerPage.goto}
          <Link href="/login" className="text-primary ml-1 hover:underline">
            {t.registerPage.link}
          </Link>
        </p>
      </CardFooter>
    </Card>
  );
}
