import { getDictionaryServerOnly } from "@/src/dictionaries/default-dictionary-server-only";
import { Locale } from "@/src/config/i18n.config";

export default async function Home({
  params,
}: {
  params: Promise<{ lang: Locale }>;
}) {
  const { lang } = await params; // unwrap the promise
  const dict = await getDictionaryServerOnly(lang);

  return (
    <main>
      <h1>{dict.site.name}</h1>
      <p>{dict.site.description}</p>
    </main>
  );
}
