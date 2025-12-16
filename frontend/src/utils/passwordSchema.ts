import PasswordValidator from "password-validator";

export const passwordSchema = new PasswordValidator();

passwordSchema
  .is().min(8)                 // mínimo 8 caracteres
  .is().max(100)               // máximo 100 caracteres
  .has().uppercase()           // pelo menos 1 letra maiúscula
  .has().digits(1)             // pelo menos 1 números
  .has().not().spaces()        // não pode conter espaços
  .is().not().oneOf([
    "Passw0rd",
    "Password123",
  ]);                           // blacklist
