{include 'header.tpl'}

<input type="hidden" id="admin" data-admin={$admin}>

<div class="container" id="detail">
    <h1 class="color"> Producto | {$product->name}</h1>
    <h4> Descripción | {$product->description}</h4>
    <h4> Precio: {$product->price}</h4>
    <h4> Stock: {$product->stock}</h4>
    <h4> Categoría: {$product->name_caegory}</h4>

    <div class="container">
        <input type="hidden" name="product" id="id_product" value="{$product->id_product}">

        <form class="formulario" id="commentForm" >
            <h2 class="opinion">Opiniones sobre {$product->name}</h2>

            <div>
                <div id="div-comentarios" class="div-comentarios">
                </div>
            </div>
            {if $user!="0"}
                <input type="hidden" name="product_id" id='prod_id' value='{$product->id_product}'>
    
                <input type="hidden" id="id_usuario" value='{$smarty.session.ID_USER}'>
    
                <div class="star">
                    <h2 class="opinion">Puntuar</h2>
                    <p class="clasificacion">
                        <input id="radio1" type="radio" name="estrellas" value="5">
                        <!--
                                --><label for="radio1">★</label>
                        <!--
                                --><input id="radio2" type="radio" name="estrellas" value="4">
                        <!--
                                --><label for="radio2">★</label>
                        <!--
                                --><input id="radio3" type="radio" name="estrellas" value="3">
                        <!--
                                --><label for="radio3">★</label>
                        <!--
                                --><input id="radio4" type="radio" name="estrellas" value="2">
                        <!--
                                --><label for="radio4">★</label>
                        <!--
                                --><input id="radio5" type="radio" name="estrellas" value="1">
                        <!--
                                --><label for="radio5">★</label>
                    </p>
                </div>
    
                <label class="comment" for="comentario">
                    <h2>Comentario</h2>
                </label>
                <textarea name="comentarios" class="comment" id="comment" cols="60" rows="10"></textarea>
                <input type="submit" class="btn btn-info mt-2" value="Enviar" id="btnComment">
            {/if}
        </form>
            
        <div class="comment">
            <a href="{BASE_URL}productos">volver</a>
        </div>
    </div>
</div>

<script src="js/comments.js"></script>
{include 'footer.tpl'}