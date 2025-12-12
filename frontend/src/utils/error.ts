export function getErrorMessage(error: unknown): string {
  if (!error) return "An unknown error occurred";

  // Caso seja um array
  if (Array.isArray(error)) return error.map(String).join(", ");

  // Caso seja uma instância de Error (JS/TS)
  if (error instanceof Error) return error.message;

  // Caso seja um objeto com response.data (Axios/Django)
  if (typeof error === "object" && error !== null) {
    const data = (error as { response?: { data?: unknown } }).response?.data;

    if (typeof data === "string") return data;
    if (Array.isArray(data)) return data.map(String).join(", ");
    if (typeof data === "object" && data !== null) {
      return Object.values(data)
        .flatMap(val => (Array.isArray(val) ? val.map(String) : String(val)))
        .join(", ");
    }
  }

  // Caso seja string direta
  if (typeof error === "string") return error;

  return "An unexpected error occurred on register";
}


import { ptBR } from "@/src/dictionaries/default-language-collections/default-pt-BR";

export function translateRegisterError(message: string, dict = ptBR) {
  const map: Record<string, string> = {
    "This field may not be blank.": dict.error.register.usernameRequired,
    "A user with that username already exists.": dict.error.register.usernameTaken,
    "This field is required.": dict.error.register.passwordRequired,
    "Select at least one group.": dict.error.register.groupRequired,
    // adicione outros mapeamentos que seu backend retornar
  };

  return map[message.trim()] || message; // se não encontrar, retorna a própria mensagem
}
