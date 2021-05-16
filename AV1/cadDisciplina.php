<?php
    /*
    Adiciona ou altera uma disciplina. A alteração ocorre quando existe um id<>0, do contrário é uma inserção.
    */

    include 'abrirConexao.php';

    $vId = 0;
    if (!empty($_POST["txtId"]))
        $vId = $_POST["txtId"];

    $vNome = "";
    if (!empty($_POST["txtNome"]))
        $vNome = $_POST["txtNome"];

    $vPeriodo = 0;
    if (!empty($_POST["selPeriodo"]))
        $vPeriodo = $_POST["selPeriodo"];

    $vPreReq = 0;
    if (!empty($_POST["selPreRequisito"]))
        $vPreReq = $_POST["selPreRequisito"];
    if (!is_numeric($vPreReq))
        $vPreReq = 0;

    $vCreditos = 0;
    if (!empty($_POST["txtCreditos"]))
        $vCreditos = $_POST["txtCreditos"];
    
    /*
    echo $vId;
    echo $vNome;
    echo $vPeriodo;
    echo $vPreReq;
    echo $vCreditos;
    */

    if (!empty($vNome) and $vPeriodo>0)
    {
        if ($vId<>0) //Alterando
        {
            $sql = "UPDATE disciplinas SET nome = '$vNome', periodo = $vPeriodo, idPreRequisito = $vPreReq, creditos = $vCreditos WHERE id = $vId";
    
            $result = $conn->query($sql);

            echo "<br />Alterando: ";
            echo $result;
            echo "<br />";
        }
        else //Inserindo
        {
            $sql = "INSERT INTO disciplinas SET nome = '$vNome', periodo = $vPeriodo, idPreRequisito = $vPreReq, creditos = $vCreditos;";
    
            $result = $conn->query($sql);

            echo "<br />Incluindo: ";
            echo $result;
            echo "<br />";
            echo "Ultimo id: " . $conn->insert_id;
            echo "<br />";
        }
        echo "<script>window.location = 'listarDisciplinas.html';</script>";
    }
    else
    {
        echo "<html><head><link rel='stylesheet' type='text/css' media='screen' href='css/estilo.css'>";
        echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' rel='stylesheet'>";
        echo "<link rel='stylesheet' href='https://unpkg.com/@fortawesome/fontawesome-free@5.12.1/css/all.min.css'>";
        echo "</head>";
        echo "<body><h2 style='color: red;'>É necessário preencher pelo menos o nome da disciplina e o período!</h2><br />";
        echo "<center><div id='toolbar'><a href='javascript:history.go(-1)'><button id='btnBack' class='btn btn-primary'><i class='fa fa-arrow-left'></i> Voltar</button></a></div></center>";
        echo "</body></html>";

    }
?>