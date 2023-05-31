<?php
if ($_SESSION["user7"]["status"] == "guest") {
    echo <<<END
    <form id="formreg">
        <p>Зарегистрируйтесь, если у вас нет аккаунта</p>
        <input type="text" name="nickname" placeholder="ник для чата">
        <input type="text" name="username" placeholder="имя пользователя">
        <input type="password" name="password" placeholder="пароль">
        <input type="submit" value="зарегистрироваться">
    </form>
    <p id="regresult"></p>
    <form id="formlog">
        <p>или войдите в чат</p>
        <input type="text" name="username" placeholder="имя пользователя">
        <input type="password" name="password" placeholder="пароль">
        <input type="submit" value="войти">
    </form>
    <p id="logresult"></p>
    END;
}
if ($_SESSION["user7"]["status"] == "user") {
    header("Location: file7/chat.php");
}

?>
<script>
    $(document).ready(() => {
        $("#formreg").submit((event) => {
            event.preventDefault()
            $.ajax({
                type: "post",
                url: "file7/reg.php",
                data: $("#formreg").serialize(),
                success: function (data) {
                    $("#regresult").html(data);
                }
            })
        });
    });
    $(document).ready(() => {
        $("#formlog").submit((event) => {
            event.preventDefault()
            $.ajax({
                type: "post",
                url: "file7/log.php",
                data: $("#formlog").serialize(),
                success: function (data) {
                    $("#logresult").html(data);
                    if (data == "log_success") {
                        location.reload();
                    }
                }
            })
        });
    });
</script>