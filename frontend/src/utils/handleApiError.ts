
import { Locale } from "../config/i18n.config";
import { translateError } from "../services/auth.service";


export type ApiError = Error & {
  status: number;
  raw: unknown;
};

export async function handleApiError(response: Response, data: unknown, lang: Locale, fallbackMessage = "request failed"): Promise<never>{
    let message = fallbackMessage;

  if (data && typeof data === "object" && !Array.isArray(data)) {
    const errorData = data as Record<string, string[]>;
    const allValues = Object.values(errorData).flat();

    

    if (allValues.length > 0) {
      message = allValues[allValues.length - 1];
    }
  }

  const translatedMessage = await translateError(message, lang);

  const error: ApiError = Object.assign(
    new Error(translatedMessage),
    {
      status: response.status,
      raw: data,
    }
  );

  throw error;
}