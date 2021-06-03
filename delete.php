<?php
include("db.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM task WHERE id =$id";


    $ress = mysqli_query($conn, $sql);

    if(!$ress){
        die("query failed");
    }
    $_SESSION['message'] = 'Tarea eliminada';
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");
}
    








?>