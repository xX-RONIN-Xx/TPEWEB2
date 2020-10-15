 <div class="input-group mb-3">
        <div class="input-group-prepend">
        <button class="btn btn-outline-secondary" type="button"id="id_btnFiltrar">Filtrar</button>
        </div>
        <select class="custom-select" id="id_mostrar" name="id_category">
        <option selected>Seleccionar</option>';

        {foreach from=$categories item=category}
            <option value="$category->name">{$category->name}</option>
        {/foreach}
     </select>
    </div>