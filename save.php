<?php
$link = mysqli_connect("localhost", "root", "cechus", "alumno");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$query = "INSERT into alumno values ('".$_POST['name']."','".$_POST['pat']."','".$_POST['mat']."','".$_POST['ci']."','".$_POST['sexo']."','".$_POST['facu']."','".$_POST['car']."','".$_POST['reguni']."')";
if ($result = mysqli_query($link, $query)) {
    /* free result set */
    mysqli_free_result($result);
}
header('location: list.php');
?>