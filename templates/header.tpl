<!doctype html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!--<script src="js/comentarios.js"></script>-->
    
    <title></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto d-flex w-100">
                    <li class="nav-item active">
                        <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productos">Productos</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="login" tabindex="-1" aria-disabled="true">Login</a>
                    </li>
                    <li>
                        <a class="nav-link" href="logout" tabindex="-1" aria-disabled="true">Logout</a>
                    </li>-->

                    {if !isset($smarty.session.ADMINISTRADOR)}
                        <li class="nav-item">
                            <a class="nav-link" href="login" tabindex="-1" aria-disabled="true">Login</a>
                        </li>
                    {else}
                        <li class="nav-item">
                            <a class="nav-link" href="logout" tabindex="-1" aria-disabled="true">Logout</a>
                        </li>
                        <li class="nav-item ml-auto">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">{$smarty.session.EMAIL}</a>
                    </li>
                    {/if}


                </ul>
            </div>
        </nav>
    </header>