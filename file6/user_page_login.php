<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File 6</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
    * {
        text-align: center;
        font-size: 1.5rem;
    }
</style>

<body>
    <?php
    include "lang.php";
    $texts = json_decode(file_get_contents("langs/{$_SESSION['lang']}.json"), JSON_UNESCAPED_UNICODE);
    $users = json_decode(file_get_contents("users.json"), JSON_UNESCAPED_UNICODE);
    $username_ok = false;
    $password_ok = false;
    $admin_rights = false;
    foreach ($users as $key => $value) {
        if (isset($value[$_POST["username"]])) {
            $username_ok = true;
            if ($value[$_POST["username"]]["password"] == $_POST["password"]) {
                $password_ok = true;
                $real_name = $value[$_POST["username"]]["name"];
            }
        }
    }
    if (!$username_ok) {
        echo "{$texts["user_not_exists"]}<br>";
    }
    if ($username_ok && !$password_ok) {
        echo "{$texts["user_correct_but_not_pass"]}<br>";
    }
    if ($username_ok && $password_ok) {
        echo "<a href=\"../file6.php?logout=true\"><button>{$texts["logout"]}</button></a><br>";
        echo "{$texts["welcome"]}, {$real_name}!<br>";
        $_SESSION["user"]["username"] = $_POST["username"];
        $_SESSION["user"]["real_name"] = $real_name;
        if ($_POST["username"] == "admin") {
            $_SESSION["user"]["status"] = "admin";
        } else {
            $_SESSION["user"]["status"] = "user";
        }
        echo "<a href=\"user_page_main.php\"><button>{$texts["continue"]}</button></a>";
    } else {
        echo "<a href=\"../file6.php\"><button>{$texts["back"]}</button></a>";
    }
    ?>
</body>

</html>