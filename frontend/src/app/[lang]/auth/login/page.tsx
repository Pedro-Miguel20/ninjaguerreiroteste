import LoginForm from "./components/loginForm";
import { getDictionaryServerOnly } from "@/src/dictionaries/default-dictionary-server-only";
import { Locale } from "@/src/config/i18n.config";

interface LoginPageProps {
  params: Promise<{ lang: Locale }>; // async params do App Router
}

export default async function Login({ params }: LoginPageProps){
    const { lang } = await params; // unwrap the promise
      const dict = await getDictionaryServerOnly(lang);
    return ( <div className="h-screen flex justify-center items-center"><LoginForm dict={dict} /></div>)
}