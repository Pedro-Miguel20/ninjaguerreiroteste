"use client";

import {Form, Input, Button} from "@heroui/react";
import {Card, CardHeader, CardBody, CardFooter} from "@heroui/card";
import { Inter } from 'next/font/google';
import { FormEvent } from "react";
import Link from 'next/link'

const inter = Inter({
  subsets: ['latin'],
  display: 'swap',
})

interface LoginFormProps {
  dict: {
    loginPage: { login: string;
        labelName: string;
        placeholdername: string;
        labelPassword: string;
        placeholderpassword: string;
        button: string, 
        goto: string;
        link: string;
      };
  };
}

export default function LoginForm({dict}: LoginFormProps){
  async function onSubmit(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();
    
    const formData = new FormData(event.currentTarget);

      const payload = {
        username: formData.get("username"),
        password: formData.get("password"),
      };
      console.log(process.env.NEXT_PUBLIC_API_URL);

    const response = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/v1/auth/token/`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(payload),
    });

    return response.json();
  }

  return ( 
    <>
      <Card className={`${inter.className} p-3 max-w-[400px] m-2`}>
        <CardHeader><h1 className="text-xl"><b>{dict.loginPage.login}</b></h1></CardHeader>
        <CardBody>
          <Form
            className="w-full max-w-xs flex flex-col gap-4"
            onSubmit={onSubmit}>
            <Input
              isRequired
              errorMessage="Please enter a valid username"
              label={dict.loginPage.labelName}
              labelPlacement="inside"
              name="username"
              placeholder={dict.loginPage.placeholdername}
              type="text"
              size="md"
            />
            <Input
              isRequired
              errorMessage="Please enter a valid password"
              label={dict.loginPage.labelPassword}
              labelPlacement="inside"
              name="password"
              placeholder={dict.loginPage.placeholderpassword}
              type="password"
              size="md"
              className="cursor-pointer"
            />
            <div className="flex gap-2 w-full">
              <Button color="primary" type="submit" className="w-full">
                {dict.loginPage.button}
              </Button>
            </div>
          </Form>
        </CardBody>
        <CardFooter>
          <p className="text-sm text-default-500">
            {dict.loginPage.goto}
            <Link href="/auth/register" className="text-primary ml-1 hover:underline">
              {dict.loginPage.link}
            </Link>
          </p>
        </CardFooter>
      </Card>
    </>
  )
}