/* funcion de categorias cortada totalmente
*******************************************************************************************************

function viewCategories($categories){
        $html='<!doctype html>
        <html lang="en">
            <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">            
            <title>Productos</title>
            <base href="'.BASE_URL.'">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            </head>
            <body>
       
        <div class="input-group mb-3">
        <div class="input-group-prepend">
        <button class="btn btn-outline-secondary" type="button"id="id_btnFiltrar">Filtrar</button>
        </div>
        <select class="custom-select" id="id_mostrar" name="id_category">
        <option selected>Seleccionar</option>';

        /*foreach($categories as $category){
            
            $html.= "<option value="$category->name">$category->name</option>";
        };*/
     $html.="  </select>;
    </div>";
       
   $html.= '<table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">Stock</th>
            <th scope="col">Categoria</th>
            </tr>
        </thead>
        <tbody id="id_tblProductos">';
            foreach($products as $product){
                
            $html.= '<tr>
                <td scope="col">'.$product->name.'</td>
                <td scope="col">'.$product->description.'</td>
                <td scope="col">'.$product->price.'</td>
                <td scope="col">'.$product->stock.'</td>
                <td scope="col">'.$product->id_category.'</td>
            </tr>
            };'
        
        .$html.= "</tbody>;
               </table>";
    }
***************************************************************************************************************
*/






'            
        
         
         
         
         
         
         
         
         
         
    }
    //Muestra una tabla con las películas que se indiquen por parámetro.
    function showMoviesView($movies) {   
        $html='<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <base href="'.BASE_URL.'">
        </head>
        <body> 
        <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Año</th>
                <th>Estudio</th>
            </tr>
        <thead>
        <tbody>';
        echo $html;
        foreach($movies as $movie) {
            echo "
                <tr>
                    <td>$movie->title</td>
                    <td>$movie->year</td>
                    <td>$movie->studio</td>";
                    $audience_score = $movie->audience_score;
                    if($movie->audience_score>60)
                        echo "<td> $audience_score * </td>"; 
            echo "</tr>";
        }
        echo " </tbody>    
        </table>";
        echo'<button type="button"><a href="home">Volver a inicio</a></button>';
    }        
    //Muestra una tabla de las películas según el género que viene por parámetro.
    function showMoviesByGenreView($genre, $movies) {
        echo "<h1>Lista por género: $genre</h2>";
        $this->showMoviesView($movies);
    }    
    //Muestra una tabla con las películas del estudio que viene por parámetro.
    function showMoviesByStudioView($studio, $movies){
        echo "<table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Año</th>
                <th>Género</th>
                <th>Rentabilidad</th>
                <th>Audiencia</th>                
            </tr>
        <thead>
        <tbody>
        ";
        foreach($movies as $movie) {
            echo "<tr>";
            echo "<td>$movie->title</td>";
            echo "<td>$movie->year</td>";
            echo "<td>$movie->genre</td>";
            echo "<td>$movie->profitability</td>";
            $audience_score = $movie->audience_score;
                    if($movie->audience_score>60)
                        echo "<td> $audience_score * </td>"; 
            echo "</tr>";              
        }
        echo " </tbody>    
        </table>";
        echo'<button type="button"><a href="home">Volver a inicio</a></button>';
    }
    //Muestra la tabla de los géneros con la cantidad de películas que tiene.
    function showMoviesByCount($movies){
        echo "<table>
        <thead>
            <tr>
                <th>Género</th>
                <th>Cantidad</th>              
            </tr>           
        <thead>
        <tbody>
        ";
        foreach($movies as $movie) {
            echo "<tr>";
            echo "<td>$movie->genre</td>";
            echo "<td>$movie->cantidad</td>";
            echo "</tr>";  
        }
        echo " </tbody>    
        </table>";
        echo'<button type="button"><a href="home">Volver a inicio</a></button>';        
    }
    //Verifica si el género existe e imprime el mensaje según corresponda
    function showSearchOfGenre($genre, $movies){
        if($movies != null){
            echo "El género $genre existe. <br>";            
        }else{
          echo "El género $genre no existe. <br>";  
        }
        echo'<button type="button"><a href="home">Volver a inicio</a></button>';
    }

}
    }
}

/*<?php
class ProductView{
    function showCategoriesView($categories){
        $html='<!doctype html>
        <html lang="en">
            <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">            
            <title>Productos</title>
            <base href="'.BASE_URL.'">
            </head>
            <body>';
        echo $html;
        echo "<h1>Lista de :</h1>";        
        foreach($categories as $category){
            echo "<ul>";
            echo "<li><a href=showByGenero/$genero->genero>$genero->genero</a></td>";
            echo "</ul>";                         
        };
        $html.='            
            <a href="showMovies">Mostrar todas</a> 

            <form action="showByStudio" method="GET"> 
            <label for="studio">Nombre del estudio: </label> <input type="text" name="studio">
            <button type="submit">Buscar películas</button>
            </form> 

            <form action="searchGenre" method="GET"> 
            <label for="searchGenre">Nombre del género: </label> <input type="text" name="searchGenre">
            <button type="submit">Buscar género</button>
            </form> 

            <form action="insertMovie" method="POST">
            <label for="id">Id película: </label> <input type="number" name="id">
            <label for="title">Título: </label> <input type="text" name="title">
            <label for="genre">Género: </label> <input type="text" name="genre">
            <label for="studio">Estudio: </label> <input type="text" name="studio">
            <label for="audience_score">Audiencia: </label> <input type="number" name="audience_score">
            <label for="profitability">Rentabilidad: </label> <input type="numer" name="profitability">
            <label for="year">Año: </label> <input type="numer" name="year">
            <input type="submit" name="enviar" id="" value="Agregar película">
            </form>

            <a href="count">Contar por genero </a>
        </body>
        </html>';
        $html.='';
        echo $html;
    }
    //Muestra una tabla con las películas que se indiquen por parámetro.
    function showMoviesView($movies) {   
        $html='<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <base href="'.BASE_URL.'">
        </head>
        <body> 
        <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Año</th>
                <th>Estudio</th>
            </tr>
        <thead>
        <tbody>';
        echo $html;
        foreach($movies as $movie) {
            echo "
                <tr>
                    <td>$movie->title</td>
                    <td>$movie->year</td>
                    <td>$movie->studio</td>";
                    $audience_score = $movie->audience_score;
                    if($movie->audience_score>60)
                        echo "<td> $audience_score * </td>"; 
            echo "</tr>";
        }
        echo " </tbody>    
        </table>";
        echo'<button type="button"><a href="home">Volver a inicio</a></button>';
    }        
    //Muestra una tabla de las películas según el género que viene por parámetro.
    function showMoviesByGenreView($genre, $movies) {
        echo "<h1>Lista por género: $genre</h2>";
        $this->showMoviesView($movies);
    }    
    //Muestra una tabla con las películas del estudio que viene por parámetro.
    function showMoviesByStudioView($studio, $movies){
        echo "<table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Año</th>
                <th>Género</th>
                <th>Rentabilidad</th>
                <th>Audiencia</th>                
            </tr>
        <thead>
        <tbody>
        ";
        foreach($movies as $movie) {
            echo "<tr>";
            echo "<td>$movie->title</td>";
            echo "<td>$movie->year</td>";
            echo "<td>$movie->genre</td>";
            echo "<td>$movie->profitability</td>";
            $audience_score = $movie->audience_score;
                    if($movie->audience_score>60)
                        echo "<td> $audience_score * </td>"; 
            echo "</tr>";              
        }
        echo " </tbody>    
        </table>";
        echo'<button type="button"><a href="home">Volver a inicio</a></button>';
    }
    //Muestra la tabla de los géneros con la cantidad de películas que tiene.
    function showMoviesByCount($movies){
        echo "<table>
        <thead>
            <tr>
                <th>Género</th>
                <th>Cantidad</th>              
            </tr>           
        <thead>
        <tbody>
        ";
        foreach($movies as $movie) {
            echo "<tr>";
            echo "<td>$movie->genre</td>";
            echo "<td>$movie->cantidad</td>";
            echo "</tr>";  
        }
        echo " </tbody>    
        </table>";
        echo'<button type="button"><a href="home">Volver a inicio</a></button>';        
    }
    //Verifica si el género existe e imprime el mensaje según corresponda
    function showSearchOfGenre($genre, $movies){
        if($movies != null){
            echo "El género $genre existe. <br>";            
        }else{
          echo "El género $genre no existe. <br>";  
        }
        echo'<button type="button"><a href="home">Volver a inicio</a></button>';
    }

}
    }
}*/






#############################################################################################

     
<table class="table table-striped">
<thead>
    <tr>
    <th scope="col">Nombre</th>
    <th scope="col">Descripcion</th>
    <th scope="col">Precio</th>
    <th scope="col">Stock</th>
    <th scope="col">Categoria</th>
    </tr>
</thead>
<tbody id="id_tblProductos">';
    foreach($products as $product){
        
    $html.= '<tr>
        <td scope="col">'.$product->name.'</td>
        <td scope="col">'.$product->description.'</td>
        <td scope="col">'.$product->price.'</td>
        <td scope="col">'.$product->stock.'</td>
        <td scope="col">'.$product->id_category.'</td>
    </tr>
    }'

.$html.= '</tbody>;
       </table>
    
    <!-- Footer -->
<footer class="page-footer font-small blue">

<!-- Copyright -->
<div class=""footer-copyright text-center py-3"">GEEK AND FREAK 3D- TANDIL- BUENOS AIRES
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src=""https://code.jquery.com/jquery-3.5.1.slim.min.js"" integrity=""sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"" crossorigin=""anonymous""></script>
<script src=""https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"" integrity=""sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"" crossorigin=""anonymous""></script>
<script src=""https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"" integrity=""sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"" crossorigin=""anonymous""></script>

</body>
</html>';
print_r($html);
};

return $html;
}