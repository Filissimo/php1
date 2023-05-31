<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $html1 = <<< END
    <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
END;

// echo $html1;

// Длинна строки 
// echo strlen($html1);
// echo "<br />";
// echo str_word_count($html1);
// echo "<br />";
// echo strrev("Hello World");
// echo "<br />";
// echo strpos($html1,"world");
// echo "<br />";
// var_dump(explode(" ","Hello, world"));
// echo $html1[436];
// 

// echo addslashes("Hello World");

// echo htmlspecialchars($html1);
// SQL INJECTION


// echo md5("Qwerty112345");
// echo "<br />";
// echo md5("qwerty112345");
// echo "<br />";
// echo sha1("qwerty112345",false);

// echo substr("Qwerty112345",0,-3);
// echo trim("   test     ");
// ucfirst("aaa");
// strtolower();
// strtoupper();

// var_dump(strtok("Hello world"," "));
$token = strtok("Hello world"," ");
while($token !== false){
    echo $token . "<br />";
    $token = strtok(" ");
}


// for //while // do-while

// вывести данные с помощью циклов

// Сделать таблицу с циклом FOR(надо использовать двойной цикл вывод пользователей из массива);


?>