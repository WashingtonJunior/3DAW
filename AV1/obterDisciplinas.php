<?php
    /*
    Retorna um ou mais registros como JSON, sendo usado para listagem
    e para obtenção de apenas uma disciplina (no caso da edição), quando recebe um parâmetro vId via GET
    */

    include 'abrirConexao.php';

    $vId = "";

    if (!empty($_GET["vId"]))
        $vId = $_GET["vId"];

    $where = ";";
    if (strlen($vId)>0)
    {
        $where = " WHERE disciplinas.id = $vId;";
    }

    $sql = "SELECT disciplinas.*, disc.nome AS nomePreRequisito FROM disciplinas LEFT JOIN disciplinas AS disc ON disciplinas.idPreRequisito = disc.id " . $where;

    //echo $sql;

    $result = $conn->query($sql);

    $rows = array();
    while ($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }

    print json_encode($rows);
?>
