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
        link: 'Create here!'
    },
    registerPage: {
        register: 'Register',
        labelName: 'Username',
        placeholdername: 'Entry your username',
        errorName: 'Please enter a valid username',
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
        title: 'Registration failed',
        register: [],
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
                min: "The username must be at least 5 characters long."
            }
        }
    }
}