{include "header.tpl"}
{if isset($smarty.session.ADMINISTRADOR)}
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="table" style="margin: 0 auto;">
                    <table class="table table-hover thead-light table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Usuarios</th>
                                <th></th>
                                <th>Permiso de Administrador</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$users item=user}
                                <tr class="text-center table-info">
                                    <td scope="col">{$user->email}</td>
                                    <td scope="col"><button class="btn btn-danger"><a href="borrarUser/{$user->id_user}">Borrar</a></button></td>
                                    <td scope="col">
                                        <form action="adminUsers" method="post">
                                            <select name="admin" class="SEL" id="{$user->id_user}">
                                                {if $user->admin == 1}
                                                    <option value=1 selected>Si</option>
                                                    <option value=0>No</option>
                                                {else}
                                                    <option value=1>Si</option>
                                                    <option value=0 selected>No</option>
                                                {/if}
                                            </select>
                                            <input type="hidden" name="idUser" value="{$user->id_user}">
                                            <input type="submit" value="aceptar">
                                        </form>
                                    </td>
                                </tr>
                            {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
{/if}

<!--<script src="js/users.js"></script>-->
{include "footer.tpl"}