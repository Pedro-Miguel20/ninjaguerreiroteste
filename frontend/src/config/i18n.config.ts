export const defaultLocale = 'pt-BR' as const;

export const langs = [defaultLocale, 'en-US', 'es-ES'] as const;

export type Locale = typeof langs[number];

export const locales: Locale[] = [...langs];

export const i18n = {
  defaultLocale,      // "pt-BR"
  locales,            // ("pt-BR" | "en-US")[]
  localeDetection: true,
} as const;
