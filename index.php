<?php include("db.php")?>
<?php include("includes/header.php")?>

<div class="container p-4">
    
    <div class="row">
        
        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?> 
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> <?= $_SESSION['message'] ?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
            <?php session_unset();
            } ?> 
            <?php if (isset($_SESSION['message1'])) { ?> 
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?= $_SESSION['message1'] ?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
            <?php session_unset();
            } ?>  
            <?php if (isset($_SESSION['message2'])) { ?> 
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><?= $_SESSION['message2'] ?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
            <?php session_unset();
            } ?>          


             <div class="card card-body">
                 <form action="save_task.php" method="POST">
                 <div class="form-group">
                     <label>Ingrese el Identificador</label>
                         <input type="number" name="id" class="form-control" placeholder="Identificador" autofocus>
                     </div>
                     <br> 
                    <div class="form-group">
                     <label>Ingrese el nombre del artículo</label>
                         <input type="text" name="Articulo" class="form-control" placeholder="Digita" autofocus>
                     </div>
                     <br>
                     <div class="form-group">
                        <label>Ingrese la cantidad de articulos</label>
                        <input type="number" min="1" name="Cantidad" class="form-control" placeholder="Numero">
                     </div>
                     <br>
                     <input type="submit" class="btn btn-success btn-block" name="save_task" value="Agregar">
                 </form>
             </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-dark text-opacity-50">Identificador</th>
                        <th class="text-dark text-opacity-50">Nombre Articulo</th>
                        <th class="text-dark text-opacity-50">Cantidad </th>
                        <th class="text-dark text-opacity-50">Fecha de Creacion</th>
                        <th class="text-dark text-opacity-50">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM `productos`";
                    $tareas= mysqli_query($conn, $query);

                    while($row= mysqli_fetch_array($tareas)) {?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['Articulo']?></td>
                            <td><?php echo $row['Cantidad']?></td>
                            <td><?php echo $row['fechaCreacion']?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-success"> 
                                    ✏️ 
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger"> 
                                    🗑️
                                </a>
                            </td>
                        </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

</div>



<?php include("includes/footer.php")?>