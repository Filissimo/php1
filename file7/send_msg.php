<?php
$conn = mysqli_connect('localhost', "root", "", "file7");
$data_long_enough = false;
if (strlen($_POST["message"]) > 0) {
    $data_long_enough = true;
} else {
    echo "Сообщение должно содержать хотя бы 1 символ!";
}
if ($data_long_enough) {
    session_start();
    $sql_reg = "INSERT INTO `chat`(`nickname`, `text`) VALUES (?,?)";
    $statement = mysqli_prepare($conn, $sql_reg);
    mysqli_stmt_bind_param($statement, "ss", $_SESSION["user7"]["nickname"], $_POST["message"]);
    mysqli_stmt_execute($statement);
}
?>