// Defina o tipo customizado de erro
interface ApiError extends Error {
  status?: number;
  raw?: unknown;
}

// Função register
export async function register(payload: { username: string; password: string; groups: number[] }) {
  const response = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/v1/auth/register/`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(payload),
  });

  const data = await response.json();

  if (!response.ok) {
    let message = "Registration failed";

    if (data && typeof data === "object") {
      const firstKey = Object.keys(data)[0];
      const firstValue = (data as Record<string, unknown>)[firstKey];

      if (Array.isArray(firstValue)) {
        message = String(firstValue[0]);
      }
    }

    const error: ApiError = new Error(message) as ApiError;
    error.status = response.status;
    error.raw = data;
    throw error;
  }

  return {
    status: response.status,
    data,
  };
}
