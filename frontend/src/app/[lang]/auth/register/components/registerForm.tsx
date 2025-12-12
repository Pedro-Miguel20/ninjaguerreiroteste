'use client';

import {Card, CardHeader, CardBody, CardFooter} from "@heroui/card";
import { Inter } from 'next/font/google';
import Link from 'next/link'
import {IconEye} from "@tabler/icons-react";
import { IconEyeClosed} from "@tabler/icons-react";
import { Button, Form, Input, Select, SelectItem } from "@heroui/react";
import { FormEvent, useState } from "react";
import { register } from "../../../../../services/auth.service";
import { useGroups } from "@/src/hooks/useGroups";
import { showToast, getToastColorByStatus } from "@/src/utils/toast";


const inter = Inter({
  subsets: ['latin'],
  display: 'swap',
})

type RegisterPayload = {
    username: string;
    password: string;
    groups: number[];
};

interface registerFormProps {
  dict: {
    registerPage: { 
        register: string;
        labelName: string;
        placeholdername: string;
        errorName: string,
        labelPassword: string;
        placeholderpassword: string;
        errorPassword: string,
        labelGroup: string,
        placeholdergroup: string,
        errorGroup: string,
        button: string, 
        goto: string;
        link: string;
        success: {
            title: string,
            description: string
        }
    },
    error: {
        title: string,
        register: {}
    };
  },
  lang: string;
}

export default function RegisterForm({dict, lang}: registerFormProps){
    const [isVisible, setIsVisible] = useState(false);
    const { groups} = useGroups();

    const toggleVisibility = () => setIsVisible(!isVisible);
    
    async function onSubmit(event: FormEvent<HTMLFormElement>) {
        event.preventDefault();

        const formData = new FormData(event.currentTarget);

        const payload: RegisterPayload = {
            username: formData.get("username") as string,
            password: formData.get("password") as string,
            groups: formData.getAll("groups").map(g => Number(g as string)),
        };
        
        try {
            const data = await register(payload, lang);

            showToast({
            title: dict.registerPage.success.description,
            description: dict.registerPage.success.description + `${payload.username}!`,
            color: getToastColorByStatus(data.status),
            });

        } catch (error: unknown) {
            const apiError = error as {
                message: string;
                status?: number;
            };

            console.log(apiError.status);

            showToast({
                title: dict.error.title,
                description: apiError.message,
                color: getToastColorByStatus(apiError.status || 500),
            });
        }
    }

    return (
        <>
            <Card className={`${inter.className} p-3 max-w-[400px] m-2`}>

                <CardHeader><h1 className="text-xl"><b>{dict.registerPage.register}</b></h1></CardHeader>

                <CardBody>
                    <Form onSubmit={onSubmit} className="w-full max-w-xs flex flex-col gap-4">
                        <Input
                            isRequired
                            errorMessage={dict.registerPage.errorName}
                            label={dict.registerPage.labelName}
                            labelPlacement="inside"
                            name="username"
                            placeholder={dict.registerPage.placeholdername}
                            type="text"
                            size="md"
                        />
                        <Input
                            isRequired
                            endContent={
                            <button type="button" className="cursor-pointer" onClick={toggleVisibility}>
                            {isVisible ? (
                            <IconEye/>
                            ) : (
                            <IconEyeClosed/>
                            )}
                            </button>
                            }
                            label={dict.registerPage.labelPassword}
                            labelPlacement="inside"
                            name="password"
                            placeholder={dict.registerPage.placeholderpassword}
                            type={isVisible ? "text" : "password"}
                            errorMessage={dict.registerPage.errorPassword}
                            size="md"
                        />
                        <Select className="max-w-xs" label={dict.registerPage.labelGroup} errorMessage={dict.registerPage.errorGroup} name="groups">
                            {groups.map((group: {id: number, name: string}) => (
                            <SelectItem key={group.id}>{group.name}</SelectItem>
                            ))}
                        </Select>
                        <div className="flex gap-2 w-full">
                            <Button color="primary" type="submit" className="w-full"
                            >
                                {dict.registerPage.button}
                            </Button>
                        </div>
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
        </>
    );
}