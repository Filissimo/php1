<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<style>
    .time {
        color: rgb(180, 180, 180);
        font-size: 0.8rem;
    }
    .nickname {
        font-weight: bold;
        color: rgb(50, 130, 250);
        background-color: rgb(230, 255, 240);
        padding: 0rem 0.4rem;
        border-radius: 0.5rem;
    }
    #chat p {
        margin: 0.1rem;
        border: 2px solid rgb(240, 255, 210);
        padding: 0.2rem 0.7rem;
        width: fit-content;
    }
</style>

<body>
    <?php
    session_start();
    echo "<a href=?logout=true>Покинуть чат</a>";
    if (isset($_GET['logout'])) {
        if ($_GET['logout'] == "true") {
            $_SESSION["user7"]["status"] = "guest";
            header("Location: ../file7.php");
        }
    }
    echo <<<END
        <form id="form_send_msg">
        <textarea name="message"></textarea><br>
        <input type="submit" value="отправить">
        </form>
        <p id="msg_result"></p>
        <div id="chat"></div>
    END;
    ?>
    <script>
        $(document).ready(() => {
            $("#form_send_msg").submit((event) => {
                event.preventDefault()
                $.ajax({
                    type: "post",
                    url: "send_msg.php",
                    data: $("#form_send_msg").serialize(),
                    success: function (data) {
                        $("#msg_result").html(data);
                    }
                })
            })
            setInterval(() => {
                $("#chat").html('');
                $.ajax({
                    url: "get_chat.php",
                    success: function (data) {
                        JSON.parse(data).map((item) => {
                            $("#chat").prepend(`
                            <p>
                            <span class="time">[${item.time}]</span>
                            <span class="nickname">${item.nickname}:</span>
                            <span class="message">${item.text}</span>
                            </p>
                        `);
                        });
                    }
                })
            }, 1000)
        });
    </script>

</body>

</html>