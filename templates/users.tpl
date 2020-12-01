{include "header.tpl"}
{if isset($smarty.session.ADMINISTRADOR)}
    <form action="administrador" method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="table" style="margin: 0 auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Usuarios</th>
                                    <th></th>
                                    <th>Permiso de Administrador</th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach from=$users item=user}
                                    <tr>
                                        <td scope="col">{$user->email}</td>
                                        <td scope="col"><button class="btn btn-danger"><a href="borrarUser/{$user->id_user}">Borrar</a></button></td>
                                        <td scope="col"><input type="checkbox"></td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-warning ml-auto" value="Finalizar Edición">
        </div>
       
    </form>
    <!--  <form cl action="administrador" method="post">
                <select name="admin">
                    {foreach from=$users item=user}
                            <option value={$user->id_user}>{$user->email}</option>
                    {/foreach}
                </select>
                <select name="valoradmin">
                    <option value=1>Si</option>
                    <option value=0>No</option>
                </select>
                <input type="submit" class="btn btn-warning ml-auto" value="Finalizar Edición">
            </form>-->
    
{/if}
{include "footer.tpl"}