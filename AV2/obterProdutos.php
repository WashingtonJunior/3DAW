<?php
    /*
    Retorna um ou mais registros como JSON, sendo usado para listagem
    e para obtenção de apenas um produto (no caso da edição), quando recebe um parâmetro vId via GET
    */

    include 'abrirConexao.php';

    $vId = "";

    if (!empty($_GET["vId"]))
        $vId = $_GET["vId"];

    $where = ";";
    if (strlen($vId)>0)
    {
        $where = " WHERE produtos.id = $vId;";
    }
    else
    {
        $where = " WHERE ativo=1;";
    }

    $sql = "SELECT produtos.*, categorias.descricao AS catdesc FROM produtos INNER JOIN categorias ON produtos.categoria=categorias.id " . $where;

    //echo $sql;

    $result = $conn->query($sql);

    $rows = array();
    while ($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }

    print json_encode($rows);
?>
