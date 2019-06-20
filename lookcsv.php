<?php

$user = 'root';
$pass = '';
$host = 'localhost';
$dbname = 'teremdb';

try {
    $conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass);

    if (isset($_GET['page']) && ($_GET['page'] != "")){
        $pageNumber = intval($_GET['page'] * 25);

        $data = $conn->prepare('select * from csv_parse limit 25 offset 50');
        $data->bindParam(':pagefor', $pageNumber);
        print_r($data);
        $data->execute();
        $dataResult = $data->fetchAll();
    } else {
        $data = $conn->prepare('select * from csv_parse limit 25');
        $data->execute();
        $dataResult = $data->fetchAll();
    }
    echo "<pre>";
    print_r($dataResult);
    echo "</pre>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . PHP_EOL;
    die();
}
?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Просмотр с пагинацией</title>
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="table">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Идентификатор</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Значение 1</th>
                    <th scope="col">Значение 2</th>
                    <th scope="col">Значение 3</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>