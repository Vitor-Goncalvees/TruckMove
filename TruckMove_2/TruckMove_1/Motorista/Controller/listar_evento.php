<?php

include_once('../Model/config.php');

$sql ="SELECT id, title, color, start, end FROM events ";

$result = $conexao ->query($sql);

$result->execute();

while($rows = $result->fetch_all(MYSQLI_ASSOC)){

    extract($rows);

    $eventos[] = [
        'id' => $id,
        'title' => $title,
        'color' => $color,
        'start' => $start,
        'end' => $end
    ];

}

echo json_encode($eventos);


?>