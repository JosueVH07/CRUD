<?php include("db.php") ?>
<?php include("includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'];?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset();} ?>
            <div class="card card-body">
                <form action="save.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Titulo" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" placeholder="Descripcion" class="form-control"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save" value="Guardar">


                </form>
            </div>
        </div>
        <div class="col-md-8">
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha de creacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sql = "SELECT * FROM task";
                    $resultadoT = mysqli_query($conn, $sql);
                    
                    while($row = mysqli_fetch_array($resultadoT)){ ?>
                        <tr>
                            <td><?php echo $row['title']?></td>
                            <td><?php echo $row['description']?></td>
                            <td><?php echo $row['date']?></td>
                            <td><a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                            <a href="delete.php?id=<?php echo $row['id']?>"  class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        </tr>          
                    <?php }  ?>
                </tbody>
                </table>
        </div>
    </div>
</div>




<?php include("includes/footer.php"); ?>