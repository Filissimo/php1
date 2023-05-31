<?php
$conn = mysqli_connect('localhost', "root", "", "file7");
$sql = "SELECT * FROM `chat`";
$chat = mysqli_query($conn, $sql);
if (mysqli_num_rows($chat) > 0) {
    while ($row = mysqli_fetch_array($chat)) {
        $data[] = $row;
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}
?>