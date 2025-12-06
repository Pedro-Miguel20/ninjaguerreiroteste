
export async function register(payload: { username: string; password: string; groups: number[] }) {
  const response = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/v1/auth/register/`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(payload),
  });

  if (!response.ok) throw new Error("Registration failed");
  return response.json();
}