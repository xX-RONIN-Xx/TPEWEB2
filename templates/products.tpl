{include 'header.tpl'}
<div class="container">
    {if $admin==1}
        <div class="lista">
            <a href="usuarios">Acceder a lista de usuarios</a>
        </div>
        <h2 class="opinion">Categorias</h2>
        <div>
            <div class="input-group mb-3">
                <ul class="list-group" id="categ">
    
                    {foreach from=$categorias item=category}
        
                        <li class="list-group-item">{$category->name_caegory|upper}<span class="catStyle"><button type="button" class="btn btn-outline-danger btn-sm"><a href="deleteCategory/{$category->id_category}">Borrar</a></button><button type="button" class="btn btn-outline-warning btn-sm"><a href="editCategory/{$category->id_category}">Editar</a></button></span></li>
        
                    {/foreach}
    
                </ul>
    
            </div>
            <form action="insertCategory" method="POST" class="my-4">
                <div class="col-6">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input name="name_caegory" type="text" class="form-control" id="id_name_Cat" value="">
                        <input type="submit" class="btn btn-info mt-2" value="Insertar Categoria" id="id_btnAgregarCat">
                    </div>
                </div>
            </form>
    
    
            <h2 class="opinion">PRODUCTOS</h2>
    
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
        {/if}

        <h2 class="opinion">Filtrar categorias</h2>
        <div>
            <form action="productos" method="GET" class="my-4">
                <div class="input-group mb-3">
                    <ul class="nav justify-content-center">
                        {foreach from=$categorias item=category}
                            <li class="nav-item">
                                <a class="nav-link active" href="filtrar/{$category->id_category}">
                                    <h4>{$category->name_caegory}</h4>
                                </a>
                            </li>
                        {/foreach}
                        <li class="nav-item">
                            <a class="nav-link active" href="filtrar/Todos">
                                <h4>Todos</h4>
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
                            <td scope="col">{$product->name_caegory}</td>
                            <td scope="col">
                                {if $admin==1}
                                <button type="button" class="btn btn-danger"><a href="delete/{$product->id_product}">Borrar</a></button><button type="button" class="btn btn-warning"><a href="editar/{$product->id_product}">Editar</a></button>{/if}| <a class="opinion" href="detail/{$product->id_product}">Ver más</a></td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
    </div>
    {include 'footer.tpl'}