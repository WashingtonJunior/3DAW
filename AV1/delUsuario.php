<?php
    /*
    Deleta um usuário, é necessário um parâmetro Id enviado via POST.
    */

    include 'abrirConexao.php';

    $vId = 0;
    if (!empty($_POST["Id"]))
        $vId = $_POST["Id"];

    if ($vId>0)
    {
        $sql = "DELETE FROM usuarios WHERE id = $vId;";

        $result = $conn->query($sql);

        echo $result;   
    }
?>