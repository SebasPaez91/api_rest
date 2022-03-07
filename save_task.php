<?php

include("db.php");

    if(isset($_POST['save_task'])){
        $identification = $_POST['id'];
        $articulo = $_POST['Articulo'];
        $cantidad = $_POST['Cantidad'];

        $result = mysqli_query($conn, "INSERT INTO productos(id, Articulo, Cantidad) VALUES ('$identification', '$articulo', '$cantidad')");
        if(!$result){
            die("muerte");
        }
        $_SESSION['message'] = "Articulo guardado";
        $_SESSION['message_type'] = "danger";
        header("Location: index.php");
    }


?>