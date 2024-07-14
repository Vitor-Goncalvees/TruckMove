<?php

$dbHost = 'LocalHost';
$dbUsername = 'root';
$dbPassword =''; 
$dbName = 'truckmoveteste';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

/*if($conexao ->connect_errno)
{
    echo "erro";
}else{
    echo "Conexão realizada com sucesso";
}*/
?>