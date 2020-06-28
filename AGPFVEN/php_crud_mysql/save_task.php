<?php

include("db.php");                                                                      #Conectar con la base de datos

if(isset($_POST['save_task'])){                                                         #Comprobar si task existe (isset comprueba si una variable no es null)

    $title = $_POST['title'];                                                           #Guardar el titulo del formulario en variable
    $description = $_POST['description'];                                               #Guardar la descripción en una variable 

    $query = "INSERT INTO task(title, description) Values ('$title', '$description')";  #Variable que guarda la consulta 
    $result = mysqli_query($conection, $query);                                         #Realiza la consulta de query a la base de datos

    if(!$result){                                                                       #Si result tiene algo
        die("Query Failed");                                                            #Imprime un string y termina el SCRIPT
    }

    $_SESSION['message'] = 'Task Saved Succesfully';                                    #Guarda dentro de sesion un string
    $_SESSION['message_type'] = 'success';                                              #Guarda dentro de sesion el color success (verde) por boostrap

    header("Location: index.php");                                                      #Redirecciona al usuario al index
}

?>