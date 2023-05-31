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
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0.1rem;
        padding: 0.1rem;
        background-color: #f0f0f0;
        border: 3px solid black;
    }
    form input {
        width: min-content;
        margin: 0.1rem;
    }
</style>
<body>
    <?php
    include "file6/lang_buttons.php";
    include "file6/lang.php";
    $texts = json_decode(file_get_contents("file6/langs/{$_SESSION['lang']}.json"), JSON_UNESCAPED_UNICODE);
    echo <<<END
    <form action="file6/user_page_login.php" method="post" id="form1">
        <input type="text" name="username" placeholder="{$texts["username"]}" minlength="3" maxlength="15">
        <input type="password" name="password" placeholder="{$texts["password"]}" minlength="3" maxlength="15">
        <input type="submit" value="{$texts["login"]}">
    </form>
    <form action="file6/user_page_register.php" method="post" id="form2">
        <input type="text" name="name" placeholder="{$texts["realname"]}" minlength="3" maxlength="15">
        <input type="text" name="username" placeholder="{$texts["username"]}" minlength="3" maxlength="15">
        <input type="password" name="password" placeholder="{$texts["password"]}" minlength="3" maxlength="15">
        <input type="submit" value="{$texts["register"]}">
    </form>
    <h4></h4>
    END
    ?>
</body>

</html>