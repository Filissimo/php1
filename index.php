<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP файлы</title>
    <style>
        h1 {
            font-size: 70px;
            color: white;
            }
        body {
            background-color: #003030;
            display: flex;
            text-align: center;
            flex-direction: column;
            align-items: center;
        }
        table {
            font-family: sans-serif;
            padding: 0;
            border: 1px solid grey;
            font-size: 40px;
        }
        th {
            margin: 0;
            padding: 8px;
            background-color: #005050;
            color: white;
            border: 2px solid green;
            font-size: 50px;
        }
        tr,td {
            margin: 0;
            padding: 8px 30px;
            background-color: #f0fff0;
            border: 1px solid grey;
        }
    </style>
</head>
<body>
    <h1>PHP файлы</h1>
    <main><?php
        $files = [
            "file1.php"=>"Первое занятие про кредит",
            "file2.php"=>"Файл меняет текст",
            "file3.php"=>"index.php (Виталия)",
            "file4.php"=>"variables.php (Виталия)",
            "file5.php"=>"strings.php (Виталия)",
            "file6.php"=>"Логин и загрузка файлов",
            "file7.php"=>"Чат"
        ];
        $html = "<table><tr>
        <th>Название</th>
        <th>адрес</th>
        </tr>";
        for ($i = 1; $i <= count($files); $i++){
            $src = "file$i.php";
            $title = $files[$src];
            $html .= "<tr>
            <td>$title</td>
            <td><a href='$src'>$src</a></td>
            </tr>";
        }
        $html .= "</table>";
        echo $html;
    ?>
    </main>
    
</body>
</html>