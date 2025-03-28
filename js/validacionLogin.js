function validarUser() {
    let user = document.getElementById('user').value;
    let userError = document.getElementById('user-error'); // Elemento para mostrar el mensaje de error
    if (user === '') {
        userError.textContent = 'Debe ingresar un nombre de usuario';
        document.getElementById('user').style.backgroundColor = '#fdecea';
        return false;
    } else {
        userError.textContent = ''; // Limpiar el mensaje de error
        document.getElementById('user').style.backgroundColor = '#d5f5e3 ';
        return true;
    }
}

function validarPassword() {
    let password = document.getElementById('password').value;
    let passwordError = document.getElementById('password-error');

    if (password === '') {
        passwordError.textContent = 'Debe ingresar una contraseña';
        document.getElementById('password').style.backgroundColor = '#fdecea';
        return false;
    } else {
        passwordError.textContent = '';
        document.getElementById('password').style.backgroundColor = '#d5f5e3';
        return true;
    }
}