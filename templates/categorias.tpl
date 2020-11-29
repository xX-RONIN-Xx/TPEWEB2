{include 'header.tpl'}
<div class="container">
<!--<div class="input-group mb-3">
        <div>
            <ul class="list-group">

                {foreach from=$categorias item=category}
    
                    <li class="list-group-item">{$category->name_caegory|upper}<button type="button" class="btn btn-outline-danger"><a href="deleteCategory/{$category->id_category}">Borrar</a></button><button type="button" class="btn btn-warning"><a href="editCategory/{$category->id_category}">Editar</a></button></li>
    
                {/foreach}

            </ul>
        </div>
    </div>-->
    <form action="editCategory/updateCategory" method="POST" class="my-4">
        <div class="col-6">
            <div class="form-group">
                <label>Nombre</label>
                <!--<input name="name_caegory" type="text" class="form-control" value="{$categoriaEdit->name_caegory}">-->
                <input name="name_cat" type="text" class="form-control" value="{$categoriaEdit->name_caegory}">
                <input name="id_cat" type="hidden" class="form-control" value="{$categoriaEdit->id_category}">
                <input type="submit" class="btn btn-info mt-2" value="Guardar Cambios" >
            </div>
        </div>
    </form>
</div>
{include 'footer.tpl'}