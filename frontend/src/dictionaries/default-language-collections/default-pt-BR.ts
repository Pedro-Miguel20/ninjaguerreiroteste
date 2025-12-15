export const ptBR = {
    site: {
        name: 'Ninjaguerreiro',
        description: 'pt-BR',
    },
    loginPage: {
        login: 'Entrar',
        labelName: 'Nome',
        placeholdername: 'Digite seu nome',
        labelPassword: 'Senha',
        placeholderpassword: 'Digite sua senha',
        button: 'entrar',
        goto: 'Não possui uma conta?',
        link: 'se inscreva aqui!'
    },
    registerPage: {
        register: 'Cadastrar',
        labelName: 'Nome',
        placeholdername: 'Digite seu nome',
        labelPassword: 'Senha',
        placeholderpassword: 'Digite sua senha',
        errorPassword: 'Digite uma senha válida',
        labelGroup: 'Grupo',
        placeholdergroup: 'Selecione o grupo',
        errorGroup: 'Selecione um grupo',
        button: 'enviar',
        goto: 'Já possui um conta?',
        link: 'Entre por aqui!',
        success: {
            title: 'Você se cadastrou!',
            description: 'Bem vindo, '
        }
    },
    error: {
        title: "Erro no cadastro",
        register: {
            usernameRequired: "O nome é obrigatório",
            usernameTaken: "Nome de usuário já existe",
            passwordRequired: "A senha é obrigatória",
            groupRequired: "Selecione pelo menos um grupo",
            serverError: "Erro no servidor. Tente novamente mais tarde",
        },
        password: {
            rules: {
                min: "A senha deve ter no mínimo 8 caracteres.",
                uppercase: "A senha deve conter ao menos uma letra maiúscula.",
                lowercase: "A senha deve conter ao menos uma letra minúscula.",
                digits: "A senha deve conter ao menos um dígito.",
                symbols: "A senha deve conter ao menos um caractere special",
            }
        },
        username: {
            rules:{
                min: "O nome de usuário deve ter pelo menos 5 caracteres.",
                errorName: 'Digite um nome válido',
            }
        }
    },
}