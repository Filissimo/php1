<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        * {
            text-align: center;
            font-size: 1.5rem;
        }

        tr,
        th,
        td {
            padding: 0.3rem;
            border: 1px solid grey;
        }

        #galery {
            display: grid;
            grid-template-columns: auto auto auto auto;
            padding: 1rem;
        }

        #galery img {
            background-color: grey;
            padding: 1rem;
            width: 20vw;
        }
        #filename {
            font-size: 1.3rem;
            color: blueviolet;
            background-color: lightblue;
        }
    </style>

    <?php
    include "lang_buttons.php";
    include "lang.php";
    $texts = json_decode(file_get_contents("langs/{$_SESSION['lang']}.json"), JSON_UNESCAPED_UNICODE);

    echo "<a href=\"../file6.php\"><button>{$texts["logout"]}</button></a><br>";

    if ($_SESSION) {
        echo "<h2>{$texts["welcome"]}, {$_SESSION["user"]["real_name"]}!</h2>";
        $users = json_decode(file_get_contents("users.json"), JSON_UNESCAPED_UNICODE);
        if ($_SESSION["user"]["status"] == "user") {
            foreach ($users as $key => $value) {
                foreach ($value as $username => $user_data) {
                    if ($username == $_SESSION["user"]["username"]) {
                        $pic_list = $user_data["pictures"];
                    }
                }
            }
            echo <<<END
                <form action="user_page_main.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="file_to_upload" id="">
                    <input type="submit" value="{$texts["add_pic"]}">
                </form>
            END;
            if ($_FILES) {
                if (isset($_FILES["file_to_upload"])) {
                    $target_dir = "pictures/{$_SESSION["user"]["username"]}/";
                    $target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);
                    if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file)) {
                        echo "{$texts["file"]} <span id=\"filename\">\"" . htmlspecialchars(basename($_FILES["file_to_upload"]["name"])) . "\"</span> {$texts["uploaded_successfully"]}";
                    }
                }
            }
            $dir = scandir("pictures/{$_SESSION["user"]["username"]}/");
            $files = array_splice($dir, 2);
            echo "<div id='galery'>";
            foreach ($files as $file) {
                echo "<tr><td><img src=\"pictures/{$_SESSION["user"]["username"]}/$file\"></td></tr>";
            }
            echo "</div>";
        }
        if ($_SESSION["user"]["status"] == "admin") {
            echo "<table><tr><th>{$texts["realname"]}</th><th>{$texts["username"]}</th><th>{$texts["password"]}</th><th></th></tr>";
            foreach ($users as $key => $value) {
                foreach ($value as $username => $user_data) {
                    if ($_POST) {
                        if (isset($_POST["user_to_delete"])) {
                            if ($_POST["user_to_delete"] == $username) {
                                unset($users[$key]);
                                $users_to_write = fopen("users.json", "w");
                                fwrite($users_to_write, json_encode($users, JSON_UNESCAPED_UNICODE));
                                header("Location: user_page_main.php");
                            }
                        }
                    }
                    $real_name = $user_data["name"];
                    $password = $user_data["password"];
                    echo <<<END
                <tr>
                    <td>$real_name</td>
                    <td>$username</td>
                    <td>$password</td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="user_to_delete" value="$username">
                            <input type="submit" value="{$texts["delete"]}">
                        </form>
                    </td>
                </tr>
                END;
                }
            }
            echo "</table>";
        }
    }

    ?>

</body>

</html>