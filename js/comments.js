"use strict"
let baseURL = "api/comentarios";

document.addEventListener('DOMContentLoaded', () => {
    let id_product = document.querySelector('#id_product').value;
    console.log(id_product);
    getComments(id_product);


    function getComments(id) {
        console.log(id)
        fetch('api/productos/' + id + '/comentarios')
            .then(response => response.json())
            .then(comentarios => renderComments(comentarios))
            .catch(error => console.log(error));
    }



    function renderComments(comentarios) {
        console.log(comentarios)
        const container = document.querySelector('#div-comentarios');

        for (let comment of comentarios) {
            console.log(comment)
            container.innerHTML += `<li class="list-group-item"> Usuario: ${comment.email}: ${comment.comment} </li>`;
        }
    }

    //getComments();


document.querySelector("#btnComment").addEventListener('click',addComment);
    async function addComment() {
        let puntuacion=0;
        document.querySelectorAll('input[name=estrellas]').forEach(element => {
            if(element.checked==true){
                puntuacion=element.value;
            }else puntuacion=3;
        });
        
        // armo la tarea
        const comment = {
            "comment": document.querySelector('#comment').value,
            "puntuacion": puntuacion,
            "id_user":"jose",
            "id_product": document.querySelector('#prod_id').value,
        }
    
        fetch('api/comentarios',{
            method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(comment)
        })
        .then(response => response.json())
        .then(comment =>getComments(2))
        .catch(error=> console.log(error));
        /*try {
            const response = await fetch(baseURL, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(comment)
            });

            const t = await response.json();
            //app.tareas.push(t);

        } catch (e) {
            console.log(e);
        }*/

    }

});