function validarNombre() {
    let nombre = document.getElementById('nombre').value;
    let nombreError = document.getElementById('nombre-error');
    if (nombre === '') {
        nombreError.textContent = 'Debe ingresar el nombre de un artista';
        document.getElementById('nombre').style.backgroundColor = '#fdecea';
        return false;
    } else {
        nombreError.textContent = ''; 
        document.getElementById('nombre').style.backgroundColor = '#d5f5e3 ';
        return true;
    }
}

function validarGenero() {
    let genero = document.getElementById('genero').value;
    let generoError = document.getElementById('genero-error');

    if (genero === '') {
        generoError.textContent = 'Debe ingresar género musical';
        document.getElementById('genero').style.backgroundColor = '#fdecea';
        return false;
    } else {
        generoError.textContent = '';
        document.getElementById('genero').style.backgroundColor = '#d5f5e3';
        return true;
    }
}

function validarPais() {
    let pais = document.getElementById('pais').value;
    let paisError = document.getElementById('pais-error');
    if (pais === '') {
        paisError.textContent = 'Debe ingresar un país';
        document.getElementById('pais').style.backgroundColor = '#fdecea';
        return false;
    } else {
        paisError.textContent = ''; 
        document.getElementById('pais').style.backgroundColor = '#d5f5e3 ';
        return true;
    }
}