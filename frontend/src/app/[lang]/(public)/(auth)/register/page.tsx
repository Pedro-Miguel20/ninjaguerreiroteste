import RegisterForm from "./components/registerForm";
import { Locale } from "@/src/config/i18n.config";


interface registerPageProps {
  params: Promise<{ lang: Locale }>; // async params do App Router
}

export default async function Register({params}: registerPageProps){
    const { lang } = await params; // unwrap the promise

    return ( <div className="h-screen flex justify-center items-center"><RegisterForm lang={lang}/></div>)
}