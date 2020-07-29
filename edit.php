<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM task WHERE id=$id";
        $edd = mysqli_query($conn, $sql);

        if(mysqli_num_rows($edd) == 1){
            $row =   mysqli_fetch_array(($edd));
            $title = $row['title'];
            $description = $row['description'];
        }
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
         $sql = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
         mysqli_query($conn, $sql);
         $_SESSION['message'] = 'Tarea actualizada';
         $_SESSION['message_type'] = 'warning';
         header("Location: index.php");

    }


?>
<?php include("includes/header.php")?>
    <div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Actualiza titulo">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Actualiza descripcion"><?php echo $description; ?></textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>

                </form>
            </div>
        </div>
    </div>
    </div>


<?php include("includes/footer.php")?>