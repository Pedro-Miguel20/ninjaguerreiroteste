// src/utils/error.ts
export function getErrorMessage(error: any): string {
  if (!error) return "An unknown error occurred";

  // Se for um erro de resposta HTTP
  if (error.response?.data?.message) return error.response.data.message;

  // Se for um erro do JS/TS
  if (error.message) return error.message;

  // Caso seja uma string
  if (typeof error === "string") return error;

  return "An unexpected error occurred";
}
