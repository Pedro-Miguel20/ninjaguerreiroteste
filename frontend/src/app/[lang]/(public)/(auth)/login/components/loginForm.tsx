"use client";

import {Form, Input, Button} from "@heroui/react";
import {Card, CardHeader, CardBody, CardFooter} from "@heroui/card";
import { Inter } from 'next/font/google';
import { FormEvent } from "react";
import Link from 'next/link'
import { useTranslations } from "@/src/config/dictionaryContext";
import { login } from "@/src/services/auth.service";
import { showToast, getToastColorByStatus } from '@/src/utils/toast';
import { Locale } from "@/src/config/i18n.config";



const inter = Inter({
  subsets: ['latin'],
  display: 'swap',
})

interface loginFormProps{
  lang: Locale
}

export default function LoginForm({lang} : loginFormProps){
  const t = useTranslations();

  async function onSubmit(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();
    
    const formData = new FormData(event.currentTarget);

      const payload = {
        username: formData.get("username") as string,
        password: formData.get("password") as string,
      };

    try {
      
      const data = await login(payload, lang)

      showToast({
              title: t.loginPage.success.title,
              description: `${t.loginPage.success.description}${payload.username}!`,
              color: getToastColorByStatus(data.status),
            });
    } catch(error: unknown) {
      const apiError = error as {
        message: string;
        status?: number;
      };

      showToast({
        title: t.error.login.titleError,
        description: apiError.message,
        color: getToastColorByStatus(apiError.status || 500),
      });
    }

  }

  return ( 
    <>
      <Card className={`${inter.className} p-3 w-[350px] m-2`}>
        <CardHeader><h1 className="text-xl"><b>{t.loginPage.login}</b></h1></CardHeader>
        <CardBody>
          <Form
            className="w-full max-w-xs flex flex-col gap-4"
            onSubmit={onSubmit}>
            <Input
              isRequired
              errorMessage="Please enter a valid username"
              label={t.loginPage.labelName}
              labelPlacement="inside"
              name="username"
              placeholder={t.loginPage.placeholdername}
              type="text"
              size="md"
            />
            <Input
              isRequired
              errorMessage="Please enter a valid password"
              label={t.loginPage.labelPassword}
              labelPlacement="inside"
              name="password"
              placeholder={t.loginPage.placeholderpassword}
              type="password"
              size="md"
              className="cursor-pointer"
            />
            <div className="flex gap-2 w-full">
              <Button color="primary" type="submit" className="w-full">
                {t.loginPage.button}
              </Button>
            </div>
          </Form>
        </CardBody>
        <CardFooter>
          <p className="text-sm text-default-500">
            {t.loginPage.goto}
            <Link href="/register" className="text-primary ml-1 hover:underline">
              {t.loginPage.link}
            </Link>
          </p>
        </CardFooter>
      </Card>
    </>
  )
}