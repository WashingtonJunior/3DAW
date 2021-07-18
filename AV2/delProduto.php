<?php
    /*
    Deleta uma disciplina, sendo necessário um parâmetro Id enviado via POST.
    */

    include 'abrirConexao.php';

    $vId = 0;
    if (!empty($_POST["Id"]))
        $vId = $_POST["Id"];

    if ($vId>0)
    {
        $sql = "UPDATE produtos SET ativo=0 WHERE id = $vId;";

        $result = $conn->query($sql);

        echo $result;   
    }
?>