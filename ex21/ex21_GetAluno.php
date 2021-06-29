<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$nomeBanco = "faeterj3dawnoite";

$conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
if ($conn->connect_error) {
    die("Conexão com erro: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cpf = $_GET["cpf"];

    $sql = "SELECT * FROM `alunos` WHERE `cpf`='$cpf';";
    $result = $conn->query($sql);
	
    $alunos = array();
    while ($aluno = mysqli_fetch_assoc($result))
    {
        $alunos[] = $aluno;
    }

    print json_encode($alunos);
}

?>