<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$nomeBanco = "faeterj3dawnoite";

$conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
if ($conn->connect_error) {
    die("Conexão com erro: " . $conn->connect_error);
}

function ValidarCpfBanco($pCpf, $conn) {
    $sqlCpf = "SELECT CPF FROM ALUNOS WHERE CPF = '$pCpf'";
    $result = $conn->query($sqlCpf);

    if ($result->num_rows > 0) {
        return 1;
    }
    return 0;
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nome = $_GET["nome"];
    $email = $_GET["email"];
    $cpf = $_GET["cpf"];
    $mat = $_GET["matricula"];
    $uf = $_GET["uf"];
    $cidade = $_GET["cidade"];
    $erro = 0;

    //$erro = ValidarNome($nome);
    $erro += ValidarCpfBanco($cpf, $conn);

//    $servidor = "localhost";
//    $usuario = "root";
//    $senha = "";
//    $nomeBanco = "faeterj3dawnoite";
//
//    $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
//    if ($conn->connect_error) {
//        die("Conexão com erro: " . $conn->connect_error);
//    }
    $sql = "UPDATE `alunos` SET `nome`='$nome', `email`='$email', `matricula`='$mat', `uf`='$uf', `cidade`='$cidade' WHERE `cpf`='$cpf';";
    if ($conn->query($sql) == TRUE) {
        echo json_encode("Aluno $nome Alterado com Sucesso");
    } else {
        echo json_encode("insert error: ");
    }
    //$result = $conn->query($sql);


}

?>