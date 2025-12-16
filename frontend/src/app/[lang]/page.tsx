import { redirect } from 'next/navigation'
import { Locale } from "@/src/config/i18n.config";

export default async function Page({
  params,
}: {
  params: Promise<{ lang: Locale }>;
}) {
  const { lang } = await params; // unwrap the promise
  redirect(`/${lang}/welcome`)
}