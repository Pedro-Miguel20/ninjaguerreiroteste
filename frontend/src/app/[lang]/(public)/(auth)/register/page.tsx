import RegisterForm from "./components/registerForm";
import { Locale } from "@/src/config/i18n.config";
import { getDictionaryServerOnly } from "@/src/dictionaries/default-dictionary-server-only";


interface registerPageProps {
  params: Promise<{ lang: Locale }>; // async params do App Router
}

export default async function Register({params}: registerPageProps){
    const { lang } = await params; // unwrap the promise
    const dict = await getDictionaryServerOnly(lang);

    return ( <div className="h-screen flex justify-center items-center"><RegisterForm dict={dict} lang={lang}/></div>)
}