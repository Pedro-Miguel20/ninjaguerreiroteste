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
