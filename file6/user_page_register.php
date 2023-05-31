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
    $user_exists = false;
    if($_POST) {

    }
    foreach ($users as $key => $value) {
        if (isset($value[$_POST["username"]])) {
            $user_exists = true;
        }
    }
    if (!$user_exists) {
        $new_user[$_POST["username"]] = array(
            "name" => $_POST["name"],
            "password" => $_POST["password"],
            "pictures" => array()
        );
        array_push($users, $new_user);
        $users_to_write = fopen("users.json", "w");
        fwrite($users_to_write, json_encode($users, JSON_UNESCAPED_UNICODE));
        mkdir("./pictures/{$_POST["username"]}/");
        echo "<p>{$texts["reg_success"]}</p>";
        echo "<a href=\"../file6.php\"><button>{$texts["back"]}</button></a>";
    } else {
        echo "<p>{$texts["username_not_available"]}</p>";
        echo "<a href=\"../file6.php\"><button>{$texts["back"]}</button></a>";
    }
    ?>
</body>

</html>