<?php
include("db.php");
if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $sql = "INSERT INTO task(title, description) VALUES ('$title', '$description')";

    $resultado = mysqli_query($conn, $sql);

    if (!$resultado) {
        die("query field");
    }

    $_SESSION['message'] = 'Tarea Guardada';
    $_SESSION['message_type'] = 'success';
    header(("Location: index.php"));
}
?>
