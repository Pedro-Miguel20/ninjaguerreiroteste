'use client';

import {Card, CardHeader, CardBody, CardFooter} from "@heroui/card";
import { Inter } from 'next/font/google';
import Link from 'next/link'
import {IconEye} from "@tabler/icons-react";
import { IconEyeClosed} from "@tabler/icons-react";
import { Button, Form, Input, Select, SelectItem } from "@heroui/react";
import { FormEvent, useState } from "react";
import { register } from "../../../../services/auth.service";
import { useGroups } from "@/src/hooks/useGroups";

const inter = Inter({
  subsets: ['latin'],
  display: 'swap',
})

type RegisterPayload = {
    username: string;
    password: string;
    groups: string[];
};

export default function RegisterForm(){
    const [isVisible, setIsVisible] = useState(false);
    const [isConfirmVisible, setIsConfirmVisible] = useState(false);
    const { groups, loading } = useGroups();


    const toggleVisibility = () => setIsVisible(!isVisible);
    const toggleConfirmVisibility = () => setIsConfirmVisible(!isConfirmVisible);
    
    async function onSubmit(event: FormEvent<HTMLFormElement>) {
        event.preventDefault();

        const formData = new FormData(event.currentTarget);

        const payload: RegisterPayload = {
            username: formData.get("username") as string,
            password: formData.get("password") as string,
            groups: formData.getAll("groups") as string[],
        };
        
        try {
            const data = await register(payload);
            console.log("Register success:", data);
        } catch (err) {
            console.error(err);
        }
    }

    return (
        <>
            <Card className={`${inter.className} p-3 max-w-[400px] m-2`}>

                <CardHeader><h1 className="text-xl"><b>Register</b></h1></CardHeader>

                <CardBody>
                    <Form onSubmit={onSubmit} className="w-full max-w-xs flex flex-col gap-4">
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
                        <Select className="max-w-xs" label="Select an animal">
                            {groups.map((group: {key: string, label: string}) => (
                            <SelectItem key={group.key}>{group.label}</SelectItem>
                            ))}
                        </Select>
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
                            label="Password"
                            labelPlacement="inside"
                            name="password"
                            placeholder="Enter your password"
                            type={isVisible ? "text" : "password"}
                            errorMessage="Please enter a valid password"
                            size="md"
                        />
                        <div className="flex gap-2 w-full">
                            <Button color="primary" type="submit" className="w-full">
                                Submit
                            </Button>
                        </div>
                    </Form>
                </CardBody>

                <CardFooter>
                    <p className="text-sm text-default-500">
                        Do you already have an account?
                        <Link href="/auth/login" className="text-primary ml-1 hover:underline">
                        Sign in.
                        </Link>
                    </p>
                </CardFooter>
            </Card>
        </>
    );
}