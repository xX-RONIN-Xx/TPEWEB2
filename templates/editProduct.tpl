{include 'header.tpl'}
    <div class="container">
        <form action="update" method="POST" class="my-4">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input name="name" type="text" class="form-control" id="id_name_producto" value="{$product->name}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input name="description" type="text" class="form-control" id="id_description_producto" value="{$product->description}">
                    </div>
                </div>
            
                <div class="col-6">
                    <div class="form-group">
                        <label>Precio</label>
                        <input name="price" type="number" class="form-control" id="id_price_producto" value="{$product->price}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Stock</label>
                        <input name="stock" type="number" class="form-control" id="id_stock_producto" value="{$product->stock}">
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-group">
                        <input name="id" type="hidden" class="form-control" id="id_stock_producto" value="{$product->id_product}">
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

            <input type="submit" class="btn btn-info mt-2" value="Editar" id="id_btnAgregar">

        </form>
</div>
{include 'footer.tpl'}