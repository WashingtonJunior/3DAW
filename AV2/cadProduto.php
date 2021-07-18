<?php
    /*
    Adiciona ou altera um produto. A alteração ocorre quando existe um id<>0, do contrário é uma inserção.
    */

    include 'abrirConexao.php';

    $vId = 0;
    if (!empty($_GET["txtId"]))
        $vId = $_GET["txtId"];

    $vCodBarra = "";
    if (!empty($_GET["txtCodBarra"]))
        $vCodBarra = $_GET["txtCodBarra"];
    
    $vNome = "";
    if (!empty($_GET["txtNome"]))
        $vNome = $_GET["txtNome"];

    $vFabricante = "";
    if (!empty($_GET["txtFabricante"]))
        $vFabricante = $_GET["txtFabricante"];

    $vCategoria = "";
    if (!empty($_GET["selCategoria"]))
        $vCategoria = $_GET["selCategoria"];

    $vTipo = "";
    if (!empty($_GET["selTipo"]))
        $vTipo = $_GET["selTipo"];

    $vPrecoVenda = "";
    if (!empty($_GET["txtPrecoVenda"]))
        $vPrecoVenda = $_GET["txtPrecoVenda"];

    $vQtEstoque = "";
    if (!empty($_GET["txtQtEstoque"]))
        $vQtEstoque = $_GET["txtQtEstoque"];

    $vPeso = "";
    if (!empty($_GET["txtPeso"]))
        $vPeso = $_GET["txtPeso"];

    $vUrlImg = "";
    if (!empty($_GET["txtUrlImg"]))
        $vUrlImg = $_GET["txtUrlImg"];

    $vDataInclusao = "";
    if (!empty($_GET["txtDataInclusao"]))
        $vDataInclusao = $_GET["txtDataInclusao"];
    
    $vDescricao = "";
    if (!empty($_GET["txtDescricao"]))
        $vDescricao = $_GET["txtDescricao"];

    $vAtivo = "";
    if (!empty($_GET["chkAtivo"]))
        $vAtivo = $_GET["chkAtivo"];
    
    /*
    echo $vId;
    echo "<br />";
    echo $vCodBarra;
    echo "<br />";
    echo $vNome;
    echo "<br />";
    echo $vFabricante;
    echo "<br />";
    echo $vCategoria;
    echo "<br />";
    echo $vTipo;
    echo "<br />";
    echo $vPrecoVenda;
    echo "<br />";
    echo $vQtEstoque;
    echo "<br />";
    echo $vPeso;
    echo "<br />";
    echo $vUrlImg;
    echo "<br />";
    echo $vDataInclusao;
    echo "<br />";
    echo $vDescricao;
    echo "<br />";
    echo $vAtivo;
    echo "<br />";
    echo "fim";
    */

    if (!empty($vNome))
    {
        if ($vId<>0) //Alterando
        {
            $sql = "UPDATE produtos SET nome = '$vNome', codbarra = '$vCodBarra', fabricante = '$vFabricante', categoria = $vCategoria, tipo = $vTipo, precovenda = $vPrecoVenda, qtestoque = $vQtEstoque, peso = $vPeso, datainclusao = '$vDataInclusao', url_img = '$vUrlImg', descricao = '$vDescricao', ativo = $vAtivo WHERE id = $vId";
    
            $result = $conn->query($sql);

            if ($result==1)
                echo "Produto alterado! <br />";
            else
                echo "Produto NÃO alterado: $sql<br />";
        }
        else //Inserindo
        {
            $sql = "INSERT INTO produtos SET nome = '$vNome', codbarra = '$vCodBarra', fabricante = '$vFabricante', categoria = $vCategoria, tipo = $vTipo, precovenda = $vPrecoVenda, qtestoque = $vQtEstoque, peso = $vPeso, datainclusao = '$vDataInclusao', url_img = '$vUrlImg', descricao = '$vDescricao', ativo = $vAtivo;";
    
            $result = $conn->query($sql);

            if ($result==1)
                echo "Produto inserido!";
            else
                echo "Produto NÃO inserido: $sql<br />";
        }
    }
?>