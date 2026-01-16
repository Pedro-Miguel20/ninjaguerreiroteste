import LoginForm from "./components/loginForm";
import { Locale } from "@/src/config/i18n.config";

interface loginPageProps {
  params: Promise<{ lang: Locale }>; // async params do App Router
}
export default async function Login({params} : loginPageProps){
  const { lang } = await params; 

    return ( <div className="h-screen flex justify-center items-center"><LoginForm lang={lang}/></div>)
}