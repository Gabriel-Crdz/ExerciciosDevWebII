function validar(){
    let titulo = document.querySelector("#titulo").value;
    let autor = document.querySelector("#autor").value;
    let genero = document.querySelector("#genero").value;
    let qtdPaginas = document.querySelector("#numPaginas").value;

    let alertaErro = document.querySelector("#alertaErro"); // Atribuir a div para mostrar o erro

    // console.log(titulo);
    // console.log(autor);
    // console.log(genero);
    // console.log(qtdPaginas);

    /* Validação dos campos */
    if(titulo.trim() == ''){
        alertaErro.innerHTML = "Informe o titulo!";
        return false;
    }

    else if(autor.trim() == ''){
        alertaErro.innerHTML = "Informe o autor!";
        return false;
    }

    else if(genero.trim() == ''){
        alertaErro.innerHTML = "Informe o genero!";
        return false;
    }

    else if(qtdPaginas.trim() == ''){
        alertaErro.innerHTML = "Informe o numero de paginas!";
        return false;
    }

    return true; // Caso todos os campos estejam preenchidos
}