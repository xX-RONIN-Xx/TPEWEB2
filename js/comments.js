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
        container.innerHTML = "";
        for (let comment of comentarios) {
            console.log(comment)
            container.innerHTML += `<li class="list-group-item"> Usuario: ${comment.email}: ${comment.comment} </li>`;
        }
    }

    //getComments();
    //**************************************************** */


    
    //addComments();
    //**************************************************** */
    document.querySelector("#btnComment").addEventListener('click', addComment);


    /*async function addComment() {
        let puntuacion = 0;
        document.querySelectorAll('input[name=estrellas]').forEach(element => {
            if (element.checked == true) {
                puntuacion = element.value;
            } else puntuacion = 3;
        });
        //  try {
            let idd=document.querySelector('#id_usuario').dataset.id;
            console.log(idd)
        let commenta = {
            "comment": document.querySelector('#comment').value,
            "puntuacion": parseInt(puntuacion),
            "id_user": document.querySelector('#id_usuario').value,
            "id_product": parseInt(document.querySelector('#prod_id').value)
        };
        console.log(commenta);
        let respuesta = await fetch('api/comentarios', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(commenta),
        });

        if (respuesta.ok) {
            console.log('respuesta json mau')
            let id = document.querySelector('#id_product').value;
            getComments(id)
        } else { console.log("no hubo respuesta") }
        // }
        // catch (response) {
        //     console.log("error.")
        // }
    }
});*/
async function addComment(){
    let puntuacion=0;
    document.querySelectorAll('input[name=estrellas]').forEach(element => {
        if(element.checked==true){
            puntuacion=element.value;
        }else puntuacion=3;
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
        .then(response =>(response.json()))
        .then(console.log("ok"))
        .catch(error => console.log(error));

}
})
//***************************************************** */
/*
document.querySelector("#btnComment").addEventListener('click',addComment);
     function addComment() {
        let puntuacion=0;
        document.querySelectorAll('input[name=estrellas]').forEach(element => {
            if(element.checked==true){
                puntuacion=element.value;
            }else puntuacion=3;
        });

        // armo el json
        const comment = {
            "comment": document.querySelector('#comment').value,
            "puntuacion": puntuacion,
            "id_user":"2",
            "id_product": document.querySelector('#prod_id').value,
        }

        fetch('api/productos/' + id_product + '/comentarios',{
            "method": 'POST',
                "headers": { 'Content-Type': 'application/json' },
                "body": JSON.stringify(comment)
        })
        .then(response => response.json())
        .then(function (json) {
            renderComments(json);
        })
       // .then(comment =>renderComments(comentarios))
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
        }

    }*/

