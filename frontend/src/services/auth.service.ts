
export async function register(payload: { username: string; password: string; groups: number[] }) {
  const response = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/v1/auth/register/`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(payload),
  });

  const data = await response.json();

  if (!response.ok) {
    // Extrai mensagem da API (incluindo formato: {field: ["msg"]})
    let message = "Registration failed";

    if (data) {
      // Se for um objeto: "username": ["erro"]
      if (typeof data === "object") {
        const firstKey = Object.keys(data)[0];
        const firstValue = data[firstKey];

        if (Array.isArray(firstValue)) {
          message = firstValue[0]; // pega a primeira mensagem
        }
      }
    }

    const error: any = new Error(message);
    error.status = response.status;
    error.raw = data;
    throw error;
  }
  return {
    status: response.status, // normalmente 200 ou 201
    data,
  };
}