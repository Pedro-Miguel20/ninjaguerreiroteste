"use client";

import {Form, Input, Button} from "@heroui/react";
import React from "react";
import {Card, CardHeader, CardBody, CardFooter} from "@heroui/card";
import { Inter } from 'next/font/google'

const inter = Inter({
  subsets: ['latin'],
  display: 'swap',
})


export default function LoginForm(){
    const [action, setAction] = React.useState<string | null>(null);

    return ( <><Card className={`${inter.className} p-3 max-w-[400px]`}><CardHeader><h1><b>Login</b></h1></CardHeader><CardBody><Form
      className="w-full max-w-xs flex flex-col gap-4"
      onSubmit={(e) => {
        e.preventDefault();
        let data = Object.fromEntries(new FormData(e.currentTarget));

        setAction(`submit ${JSON.stringify(data)}`);
      }}
    >
      <Input
        isRequired
        errorMessage="Please enter a valid username"
        label="Username"
        labelPlacement="inside"
        name="username"
        placeholder="Enter your username"
        type="text"
        size="md"
      />

      <Input
      className="w-72"
        isRequired
        errorMessage="Please enter a valid email"
        label="Email"
        labelPlacement="inside"
        name="email"
        placeholder="Enter your email"
        type="email"
        size="md"
      />
      <div className="flex gap-2 w-full">
        <Button color="primary" type="submit" className="w-full">
          Submit
        </Button>
      </div>
      {action && (
        <div className="text-small text-default-500">
          Action: <code>{action}</code>
        </div>
      )}
    </Form></CardBody><CardFooter><CardFooter>
  <p className="text-sm text-default-500">
    Don’t have an account?
    <a href="/auth/register" className="text-primary ml-1 hover:underline">
      Create one here.
    </a>
  </p>
</CardFooter></CardFooter></Card></>)
}