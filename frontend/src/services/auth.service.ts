import { ptBR } from "../dictionaries/default-language-collections/default-pt-BR";

type ApiError = Error & {
  status: number;
  raw: unknown;
};

// Função para traduzir uma única mensagem (igual à que você já tem)
export function translateRegisterError(message: string, lang: string) {
  if (lang === "en-US") return message;

  const map: Record<string, string> = {
    // username
    "This field may not be blank.": ptBR.error.register.usernameRequired,
    "This field is required.": ptBR.error.register.usernameRequired,
    "A user with that username already exists.": ptBR.error.register.usernameTaken,

    // password
    "The password must be at least 8 characters long.":
      ptBR.error.password.rules.min,
    "The password must contain at least one number." : ptBR.error.password.rules.digits,
    "Password must contain at least one symbol." : ptBR.error.password.rules.symbols,

    //username
    "The username must be at least 5 characters long." : ptBR.error.username.rules.min,

    // group
    "Select at least one group.": ptBR.error.register.groupRequired,
    'Invalid pk "0" - object does not exist.':
      ptBR.error.register.groupRequired,

    // genérico
    "Internal Server Error":
      ptBR.error.register.serverError,
    "Request failed with status code 500":
      ptBR.error.register.serverError,
  };

  return map[message] ?? message;
}

// Função de registro refatorada
export async function register(payload: { username: string; password: string; groups: number[] }, lang: string) {
  const response = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/v1/auth/register/`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(payload),
  });



  const data = await response.json();

  if (!response.ok) {
  let message = "Registration failed";

  if (data && typeof data === "object" && !Array.isArray(data)) {
    // forçar o tipo de data para Record<string, string[]>
    const errorData = data as Record<string, string[]>;

    // juntar todas as mensagens de todos os campos
    const allValues = Object.values(errorData).flat();

    if (allValues.length > 0) {
      message = allValues[allValues.length - 1]; // último erro da API
    }
  }

  const translatedMessage = translateRegisterError(message, lang);
  const error: ApiError = Object.assign(
  new Error(translatedMessage),
    {
      status: response.status,
      raw: data
    }
  );
  throw error;
}



  return {
    status: response.status,
    data,
  };
}
