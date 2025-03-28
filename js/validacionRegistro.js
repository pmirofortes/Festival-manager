function validarUser() {
    let user = document.getElementById('user').value;
    let userError = document.getElementById('user-error'); // Elemento para mostrar el mensaje de error
    if (user === '') {
        userError.textContent = 'Debe ingresar un nombre de usuario';
        document.getElementById('user').style.backgroundColor = '#fdecea';
        return false;
    } else if (user.length < 3) {
        userError.textContent = 'El nombre de usuario debe tener al menos 3 caracteres';
        document.getElementById('user').style.backgroundColor = '#fdecea';
        return false;
    } else {
        userError.textContent = ''; // Limpiar el mensaje de error
        document.getElementById('user').style.backgroundColor = '#ABD8AB';
        return true;
    }
}

function validarPassword() {
    let password = document.getElementById('password').value;
    let passwordError = document.getElementById('password-error');
    let regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

    if (password === '') {
        passwordError.textContent = 'Debe ingresar una contraseña';
        document.getElementById('password').style.backgroundColor = '#fdecea';
        return false;
    } else if (!regexPassword.test(password)) {
        passwordError.textContent = 'La contraseña debe tener al menos 8 caracteres, incluir una letra mayúscula, una letra minúscula y un número';
        document.getElementById('password').style.backgroundColor = '#fdecea';
        return false;
    } else {
        passwordError.textContent = '';
        document.getElementById('password').style.backgroundColor = '#ABD8AB';
        return true;
    }
}

function validarConfirm() {
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirm_password').value;
    let confirmError = document.getElementById('confirm-error'); 

    if (confirmPassword === '') {
        confirmError.textContent = 'Debe confirmar la contraseña';
        document.getElementById('confirm_password').style.backgroundColor = '#fdecea';
        return false;
    } else if (password !== confirmPassword) {
        confirmError.textContent = 'Las contraseñas no coinciden';
        document.getElementById('confirm_password').style.backgroundColor = '#fdecea';
        return false;
    } else {
        confirmError.textContent = ''; 
        document.getElementById('confirm_password').style.backgroundColor = '#ABD8AB';
        return true;
    }
}

function validarEmail() {
    let email = document.getElementById('mail').value;
    let emailError = document.getElementById('email-error'); 
    let regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Expresión regular para validar un email

    if (email === '') {
        emailError.textContent = 'Debe ingresar un email';
        document.getElementById('mail').style.backgroundColor = '#fdecea';
        return false;
    } else if (!regexEmail.test(email)) {
        emailError.textContent = 'El email ingresado no es válido';
        document.getElementById('mail').style.backgroundColor = '#fdecea';
        return false;
    } else {
        emailError.textContent = ''; 
        document.getElementById('mail').style.backgroundColor = '#ABD8AB';
        return true;
    }
}