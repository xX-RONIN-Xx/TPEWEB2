{literal}
<div id="vue-comentario">

    <ul id="comentario-list" class="list-group">
        <li 
            v-for="comentario in comentarios"
            :data-id-comentario="comentario.id" 
            class="list-group-item"> 
            {{ comentario.id_comment }} - {{ comentario.comment}} - {{comentario.puntuacion}}
            <button  v-on:click="borrar(comentario.id)" class="btn btn-primary">Borrar</button>
           
      
         </li>
    </ul>

</div>


{/literal}
