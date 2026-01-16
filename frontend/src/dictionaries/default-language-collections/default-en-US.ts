export const enUS = {
    site: {
        name: 'Ninjaguerreiro',
        description: 'en-US'
    },
    loginPage: {
        login: 'Login',
        labelName: 'Username',
        placeholdername: 'Entry your username',
        labelPassword: 'Password',
        placeholderpassword: 'Entry your password',
        button: 'submit',
        goto: 'Don’t you have an account?',
        link: 'Create here!',
        success: {
            title: 'You loged in!',
            description: 'Welcome, '
        }
    },
    registerPage: {
        register: 'Register',
        labelName: 'Username',
        placeholdername: 'Entry your username',
        labelPassword: 'Password',
        placeholderpassword: 'Entry your password',
        errorPassword: 'Please enter a valid password',
        labelGroup: 'Group',
        placeholdergroup: 'Select your group',
        errorGroup: 'Please select a group',
        button: 'Register',
        goto: 'Already have an account?',
        link: 'Login here!',
        success: {
            title: 'You now are registered!',
            description: 'Welcome, '
        }
    },
    error: {
        register: {
            titleError: 'Registration failed',
            description: {
                usernameRequired: "O nome é obrigatório",
                usernameTaken: "Nome de usuário já existe",
                passwordRequired: "A senha é obrigatória",
                groupRequired: "Selecione pelo menos um grupo",
                serverError: "Erro no servidor. Tente novamente mais tarde",
            }
        },
        login:{
            titleError: 'Log in failed',
            description: {
                noAccountfound: "No active account found with the given credentials",
            }
        },
        password: {
            rules: {
                min: "must be at least 8 characters long.",
                uppercase: "must contain at least one uppercase letter.",
                lowercase: "must contain at least one lowercase letter.",
                digits: "must contain at least one number.",
                symbols: "must contain at least one special character (!@#$%^&*).",
            }
        },
        username:{
            rules: {
                min: "The username must be at least 5 characters long.",
                errorName: 'Please enter a valid username',
            }
        }
    },
    components: {
        graph: {
            title: "Graph"
        }
    }
}