export const esES = {
    site: {
        name: 'Ninjaguerreiro',
        description: 'es-ES',
    },
    loginPage: {
        login: 'Entrar',
        labelName: 'Nombre',
        placeholdername: 'Ingresa tu nombre',
        labelPassword: 'Contraseña',
        placeholderpassword: 'Ingresa tu contraseña',
        button: 'entrar',
        goto: '¿No tienes una cuenta?',
        link: '¡regístrate aquí!',
        success: {
            title: '¡Has iniciado sesión!',
            description: 'Bienvenido(a), '
        }
    },
    registerPage: {
        register: 'Registrarse',
        labelName: 'Nombre',
        placeholdername: 'Ingresa tu nombre',
        labelPassword: 'Contraseña',
        placeholderpassword: 'Ingresa tu contraseña',
        errorPassword: 'Ingresa una contraseña válida',
        labelGroup: 'Grupo',
        placeholdergroup: 'Selecciona el grupo',
        errorGroup: 'Selecciona un grupo',
        button: 'enviar',
        goto: '¿Ya tienes una cuenta?',
        link: '¡Inicia sesión aquí!',
        success: {
            title: '¡Te has registrado!',
            description: 'Bienvenido, '
        }
    },
    error: {
        register: {
            titleError: "Error en el registro",
            description: {
                usernameRequired: "El nombre es obligatorio",
                usernameTaken: "El nombre de usuario ya existe",
                passwordRequired: "La contraseña es obligatoria",
                groupRequired: "Selecciona al menos un grupo",
                serverError: "Error del servidor. Inténtalo nuevamente más tarde",
            }
        },
        login: {
            titleError: "Error al iniciar sesión",
            description: {
                noAccountfound: "No existe una cuenta activa con las credenciales proporcionadas",
            }
        },
        password: {
            rules: {
                min: "La contraseña debe tener al menos 8 caracteres.",
                uppercase: "La contraseña debe contener al menos una letra mayúscula.",
                lowercase: "La contraseña debe contener al menos una letra minúscula.",
                digits: "La contraseña debe contener al menos un dígito.",
                symbols: "La contraseña debe contener al menos un carácter especial",
            }
        },
        username: {
            rules: {
                min: "El nombre de usuario debe tener al menos 5 caracteres.",
                errorName: 'Ingresa un nombre válido',
            }
        }
    },
    components: {
        graph: {
            title: "Gráfico"
        }
    }
};
