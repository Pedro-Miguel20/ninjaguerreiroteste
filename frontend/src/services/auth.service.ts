import { ptBR } from "../dictionaries/default-language-collections/default-pt-BR";

// Função para traduzir uma única mensagem (igual à que você já tem)
export function translateRegisterError(message: string, lang: string) {
  if (lang === "en-US") return message;
  const map: Record<string, string> = {
    "This field may not be blank.": ptBR.error.register.usernameRequired,
    "A user with that username already exists.": ptBR.error.register.usernameTaken,
    "This field is required.": ptBR.error.register.passwordRequired,
    "Select at least one group.": ptBR.error.register.groupRequired,
    "Invalid pk \"0\" - object does not exist.": ptBR.error.register.groupRequired,
    // ...outros mapeamentos
  };

  return map[message] || message; // se não encontrar, retorna a própria mensagem
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
  const error: any = new Error(translatedMessage);
  error.status = response.status;
  error.raw = data;
  throw error;
}



  return {
    status: response.status,
    data,
  };
}
