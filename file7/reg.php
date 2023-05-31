<?php
$conn = mysqli_connect('localhost', "root", "", "file7");
$username_exists = false;
$data_long_enough = false;
$sql_check = "SELECT * FROM `users`";
$check = mysqli_query($conn, $sql_check);
if (strlen($_POST["username"]) > 3 && strlen($_POST["password"]) > 3 && strlen($_POST["nickname"]) > 3) {
    $data_long_enough = true;
} else {
    echo "Во всех полях должно быть минимум 4 символа!<br>";
}
if (mysqli_num_rows($check) > 0) {
    while ($row = mysqli_fetch_array($check)) {
        if ($_POST['username'] == $row['username'] || $_POST['nickname'] == $row['nickname']) {
            $username_exists = true;
            echo "Ник или имя пользователя уже заняты!";
        }
    }
}
if (!$username_exists && $data_long_enough) {
    $sql_reg = "INSERT INTO `users`(`nickname`, `username`, `password`) VALUES (?,?,?)";
    $statement = mysqli_prepare($conn, $sql_reg);
    mysqli_stmt_bind_param($statement, "sss", $_POST["nickname"], $_POST["username"], $_POST["password"]);
    mysqli_stmt_execute($statement);
}
?>