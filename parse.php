<?php

$user = 'root';
$pass = '';
$host = 'localhost';
$dbname = 'teremdb';

try {
    $conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass);

    if (file_exists('parse.csv')) {
        $csv = array_map('str_getcsv', file('parse.csv'));

        foreach ($csv as $key => $item) {
            if ($item[0] != 'id') {

                $id = $item[0];
                $name = $item[1];
                $value1 = $item[2];
                $value2 = $item[3];
                $value3 = $item[4];

                $query = $conn->prepare('select id from csv_parse where id=:id');
                $query->execute(array(':id' => $id));

                if (!empty($query->fetchAll())) {
                    $prep = $conn->prepare('update csv_parse set `id` = :id, `name` = :name, `value1` = :value1, `value2` = :value2, `value3` = :value3 where id = :id');
                    $mode = 1;
                } else {
                    $prep = $conn->prepare('insert into csv_parse values(:id, :name, :value1, :value2, :value3)');
                    $mode = 2;
                }

                $prep->bindParam(':id', $id);
                $prep->bindParam(':name', $name);
                $prep->bindParam(':value1', $value1);
                $prep->bindParam(':value2', $value2);
                $prep->bindParam(':value3', $value3);

                $prep->execute();

                if ($mode == 1){
                    echo 'Запись с идентификатором ' . $id . ' успешно обновлена!' . "<br>";
                } else {
                    echo 'Запись с идентификатором ' . $id . ' успешно добавлена!' . "<br>";
                }
            }
        }
    } else {
        echo 'Файл не найден';
    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . PHP_EOL;
    die();
}