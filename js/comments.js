//"use strict"
let baseURL = "api/comentarios";

//document.addEventListener('DOMContentLoaded', () => {
    getComments();
//});
let id_product = document.querySelector('#id_product').value;
 function getComments() {
    fetch('api/comentarios/'+id_producto)
        .then(response => response.json())
        .then(comentarios => renderComments(comentarios))
        .catch(error => console.log(error));
}



function renderComments(comentarios) {
    const container= document.querySelector('#div-comentarios');

    for (let comment of comments) {
        container.innerHTML+=`<li class="list-group-item"> ${comment.comment} </li>`;
    }
}

//getComments();


async function addComment() {

    // armo la tarea
    const comment = {
        titulo: document.querySelector('input[name=titulo]').value,
        descripcion: document.querySelector('textarea[name=descripcion]').value,
        prioridad: document.querySelector('select[name=prioridad]').value,
        finalizada: false
    }

    try {
        const response = await fetch(baseURL , {
            method: 'POST',
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify(comment)
        });

        const t = await response.json();
        app.tareas.push(t);

    } catch(e) {
        console.log(e);
    }


}

