{include "header.tpl"}

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="tabla" style="margin: 0 auto;">
        <table>
          <thead>
            <tr>                  
              <th>Usuarios</th>            
              {if $admin eq "1"}
                <th>Borrar</th>
              {/if} 
            </tr>
          </thead>
          <tbody>
            {foreach from=$usuarios item=user}
              <tr>
                <td>{$user->usuario}</td>
                {if $admin eq "1"}
                  <td><button class="btn btn-danger"><a href = "borrarUser/{$user->id_usuario}">Borrar</a></button></td>
                {/if}
              </tr>
            {/foreach}
          </tbody>
        </table>
      </div>    
    </div>
  </div>
</div>
    {if $admin eq "1"}
        <form action="administrador" method="post">
        <select name="admin">
        {foreach from=$usuarios item=user}
            <option value={$user->id_usuario}>{$user->nombre}</option>
        {/foreach}
        </select>
        <select name="valoradmin">
          <option value=1>Si</option>
          <option value=0>No</option>
        </select>
        <input type="submit" class="btn btn-success" value="Administrador">
        </form>
    {/if}

{include "footer.tpl"}
