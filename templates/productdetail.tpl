{include 'header.tpl'}
<div class="container">
    <h1> Producto | {$product->name}</h1>
    <h4> Descripción | {$product->description}</h4>
    <h4> Precio: {$product->price}</h4>
    <h4> Stock: {$product->stock}</h4>
    <h4> Categoría: {$product->name_caegory}</h4>


    <a href="{BASE_URL}productos">volver</a>


</div>
{include 'footer.tpl'}