<?php
   include("db.php");
  
   
   if  (isset($_GET['id'])) {
     $id = $_GET['id'];
     $query = "SELECT * FROM productos WHERE id=$id";
     $result = mysqli_query($conn, $query);
     if (mysqli_num_rows($result) == 1) {
       $row = mysqli_fetch_array($result);
       $id = $row['id'];
       $Articulo = $row['Articulo'];
       $Cantidad = $row['Cantidad'];
     }
   }
   
   if (isset($_POST['update'])) {
     $id = $_GET['id'];
     $Articulo= $_POST['Articulo'];
     $Cantidad = $_POST['Cantidad'];
   
     $query = "UPDATE productos set Articulo = '$Articulo', Cantidad = '$Cantidad' WHERE id=$id";
     mysqli_query($conn, $query);
     $_SESSION['message2'] = 'Modifico correctamente';
     $_SESSION['message_type'] = 'warning';
     header('Location: index.php');
   }
   
   ?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
   <div class="row">
      <div class="col-md-4 mx-auto">
         <div class="card card-body">
            <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
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
               <button class="btn-success" name="update">
                    modificar
               </button>
            </form>
         </div>
      </div>
   </div>
</div>
<?php include('includes/footer.php'); ?>