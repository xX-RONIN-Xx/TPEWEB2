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
        let admin=document.querySelector('#admin').value;
        console.log(comentarios)
        const container = document.querySelector('#div-comentarios');
        container.innerHTML = "";
        for (let comment of comentarios) {
            console.log(comment)
            if (admin){
            container.innerHTML += `<li class="list-group-item">  ${comment.email} Comentó: ${comment.comment} <button class=btn btn-danger BorrarCom>Borrar</button> </li>`;
        }else{
            container.innerHTML += `<li class="list-group-item">  ${comment.email} Comentó: ${comment.comment} </li>`;
        }
    }
}


    //addComments();
    //**************************************************** */
    document.querySelector("#btnComment").addEventListener('click', addComment);


    async function addComment() {
        let puntuacion = 0;
        document.querySelectorAll('input[name=estrellas]').forEach(element => {
            if (element.checked == true) {
                puntuacion = element.value;
            } else puntuacion = 3;
        });

        let comment = {
            'comment': document.querySelector('#comment').value,
            'puntuacion': parseInt(puntuacion),
            'id_user': document.querySelector('#id_usuario').value,
            'id_product': parseInt(document.querySelector('#prod_id').value)
        }

        console.log(comment)
        fetch('api/comentarios', {
            method: 'POST',
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(comment)
        })
            .then(response => (response.json()))

            .then(console.log("ok"))
            .catch(error => console.log(error));

    }
})
