{include 'header.tpl'}

<div class="container">
    <!-- inicio del contenido pricipal -->

    <div class="mt-5 w-25 mx-auto">
        <form method="POST" action=verify>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            {if $error}
                <div class="alert alert-danger">
                    {$error}
                </div>
            {/if}

            <button type="submit" class="btn btn-primary">Login</button>
            
            <button><a href = "registrarse">Registrarse</a></button>
        
        </form>
    </div>

</div>

{include 'footer.tpl'}