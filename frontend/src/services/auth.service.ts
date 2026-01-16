
import { handleApiError } from "../utils/handleApiError";
import { Locale } from "../config/i18n.config";
import { getDictionaryUseClient } from "../dictionaries/default-dictionary-use-client";

// Função para traduzir uma única mensagem (igual à que você já tem)
export async function translateError(message: string, lang: Locale) {

  const location = lang;
  const dict = getDictionaryUseClient(location);

  if (lang === "en-US") return message;

  const map: Record<string, string> = {
    // username
    "This field may not be blank.": dict.error.register.description.usernameRequired,
    "This field is required.":  dict.error.register.description.usernameRequired,
    "A user with that username already exists.": dict.error.register.description.usernameTaken,

    // password
    "The password must be at least 8 characters long.":
      dict.error.password.rules.min,
    "The password must contain at least one number." : dict.error.password.rules.digits,
    "Password must contain at least one symbol." : dict.error.password.rules.symbols,

    //username
    "The username must be at least 5 characters long." : dict.error.username.rules.min,

    // group
    "Select at least one group.": dict.error.register.description.groupRequired,
    'Invalid pk "0" - object does not exisdicdict.':
      dict.error.register.description.groupRequired,

    // genérico
    "Internal Server Error":
      dict.error.register.description.serverError,
    "Request failed with status code 500":
      dict.error.register.description.serverError,


    // conta
    "No active account found with the given credentials":
      dict.error.login.description.noAccountfound
  };

  return map[message] ?? message;
}

// Função de registro refatorada
export async function register(payload: { username: string; password: string; groups: number[] }, lang: Locale) {
  const response = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/v1/auth/register/`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(payload),
  });



  const data = await response.json();

  if (!response.ok) {
    await handleApiError(response, data, lang, "Register failed");
  }

  return {
    status: response.status,
    data,
  };
}


export async function login(payload: {username: string, password: string}, lang: Locale){
  const response = await fetch(`${process.env.NEXT_PUBLIC_API_URL}/v1/auth/token/`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(payload),
    });
  
  const data = await response.json();

  if (!response.ok) {
    await handleApiError(response, data, lang, "Login failed");
    
  }

  return {
    status: response.status,
    data
  }
}