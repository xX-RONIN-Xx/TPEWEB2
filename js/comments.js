"use strict"
let baseURL = "api/comentarios";
document.addEventListener('DOMContentLoaded', () => {
    let id_product = document.querySelector('#id_product').value;
    getComments(id_product);


    function getComments(id_prod) {
        fetch('api/productos/' + id_prod + '/comentarios')
            .then(response => response.json())
            .then(comentarios => renderComments(comentarios))
            .catch(error => console.log(error));
    }

    function renderComments(comentarios) {
        let admin = document.querySelector('#admin').dataset.admin;
        console.log(admin)
        const container = document.querySelector('#div-comentarios');
        container.innerHTML = "";
        for (let comment of comentarios) {

            if (admin == 1) {
                container.innerHTML += `<li class="list-group-item caja">  ${comment.email} Puntuó con :${comment.puntuacion}| Comentó: ${comment.comment}<button id="${comment.id_comment}" class="btn btn-danger borrarCom">Borrar</button></li>`;
            } else {
                container.innerHTML += `<li class="list-group-item caja">  ${comment.email} Puntuó con :${comment.puntuacion}| Comentó: ${comment.comment}</li>`;
            }
        }
        let btnsBorrar = document.querySelectorAll('.borrarCom');
        btnsBorrar.forEach(element => {
            element.addEventListener('click', e => {
               // e.preventDefault();
                let boton = e.target.id;
                eliminarComentario(boton)
            })
        });
    }

    async function eliminarComentario(id) {

        try {
            let response = await fetch('api/comentarios/' + id, {
                "method": "DELETE",
                "headers": {
                    "Content-Type": "application/json"
                }
            })
            if (response.ok) {
                console.log('ok, respuesta')
                //vacio la tabla
                let contenedor=document.querySelector("#div-comentarios");
                contenedor.innerHTML="";
                let id_prod=document.querySelector("#id_product").value;
                //vuelvo a cargar todos los comentarios
                renderComments(id_prod);
            }
            else {
                contenedor.innerHTML = "Error - Failed URL!";
                console.log("error");
            }
        }
        catch (response) {
            contenedor.innerHTML = "Connection error";
        };
    }

    //addComments();
    //**************************************************** */
    document.querySelector("#btnComment").addEventListener('click', addComment);

    function addComment() {
        let puntuacion = 0;
        document.querySelectorAll('input[name=estrellas]').forEach(element => {
            if (element.checked == true) {
                puntuacion = element.value;
            } else puntuacion = 3;
        });

        let comment = {
            'comment': document.querySelector('#comment').value,
            'puntuacion': parseInt(puntuacion),
            'id_user': parseInt(document.querySelector('#id_usuario').value),
            'id_product': parseInt(document.querySelector('#prod_id').value)
        }

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
