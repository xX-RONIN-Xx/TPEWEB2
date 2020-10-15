{include 'header.tpl'}
<div class="container">
    <h2>Categorias</h2>
    <div>
        <div class="input-group mb-3">
            <ul class="list-group">

                {foreach from=$categorias item=category}
    
                    <li class="list-group-item">{$category->name_caegory|upper}<button type="button" class="btn btn-outline-danger"><a href="deleteCategory/{$category->id_category}">Borrar</a></button><button type="button" class="btn btn-warning"><a href="editCategory/{$category->id_category}">Editar</a></button></li>
    
                {/foreach}

            </ul>
            <input type="submit" class="btn btn-info mt-2" value="Guardar cambios" id="id_btnSave">

        </div>
        <form action="insertCategory" method="POST" class="my-4">
            <div class="col-6">
                <div class="form-group">
                    <label>Nombre</label>
                    <input name="name_caegory" type="text" class="form-control" id="id_name_Cat">
                    <input type="submit" class="btn btn-info mt-2" value="Insertar Categoria" id="id_btnAgregarCat">
                </div>
            </div>
        </form>


        <h2>PRODUCTOS</h2>

        <form action="insert" method="POST" class="my-4">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input name="name" type="text" class="form-control" id="id_name_producto">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input name="description" type="text" class="form-control" id="id_description_producto">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Precio</label>
                        <input name="price" type="number" class="form-control" id="id_price_producto">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Stock</label>
                        <input name="stock" type="number" class="form-control" id="id_stock_producto">
                    </div>
                </div>

            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="selectCategory">Options</label>
                </div>
                <select class="custom-select" id="id_mostrar" name="id_category">
                    {foreach from=$categorias item=category}
                        <option value="{$category->id_category}">{$category->name_caegory}</option>
                    {/foreach}
                </select>
            </div>


            <input type="submit" class="btn btn-info mt-2" value="Insertar" id="id_btnAgregar">

        </form>

        <form action="productos" method="GET" class="my-4">
            <h2>Filtrar categorias</h2>
            <div class="input-group mb-3">

                <ul class="list-group">
                    {foreach from=$categorias item=category}
                        <li class="list-group-item"><button type="button"><a href="productos/{$category->id_category}">{$category->name_caegory}</a></button></li>
                    {/foreach}
                </ul>

            </div>

        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Categoria</th>
                </tr>
            </thead>
            <tbody id="id_tblProductos">
                {foreach from=$products item=product}
                    <tr>
                        <td scope="col">{$product->name}</td>
                        <td scope="col">{$product->description}</td>
                        <!--<td scope="col">{$product->price}</td>-->
                        <!--<td scope="col">{$product->stock}</td>-->
                        <td scope="col">{$product->name_caegory}</td>
                        <td scope="col"><button type="button" class="btn btn-outline-danger"><a href="delete/{$product->id_product}">Borrar</a></button><button type="button" class="btn btn-warning"><a href="editar/{$product->id_product}">Editar</a></button> | <a href="detail/{$product->id_product}">Ver más</a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
{include 'footer.tpl'}