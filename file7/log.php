<?php
$conn = mysqli_connect('localhost', "root", "", "file7");
$username_exists = false;
$data_long_enough = false;
$sql_check = "SELECT * FROM `users`";
$check = mysqli_query($conn, $sql_check);
if (strlen($_POST["username"]) > 3 && strlen($_POST["password"]) > 3) {
    $data_long_enough = true;
} else {
    echo "Во всех полях должно быть минимум 4 символа!<br>";
}
if (mysqli_num_rows($check) > 0) {
    while ($row = mysqli_fetch_array($check)) {
        if ($_POST['username'] == $row['username'] && $_POST['password'] == $row['password']) {
            $username_exists = true;
            $nickname = $row['nickname'];
        }
    }
}
if (!$username_exists && $data_long_enough) {
    echo "Неверное имя пользователя или пароль!";
}
if ($username_exists && $data_long_enough) {
    session_start();
    $_SESSION["user7"]["nickname"] = $nickname;
    $_SESSION["user7"]["username"] = $_POST['username'];
    $_SESSION["user7"]["status"] = 'user';
    echo "log_success";
}
?>