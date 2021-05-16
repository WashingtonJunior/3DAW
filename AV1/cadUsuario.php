<?php
    /*
    Adiciona ou altera um usuário. A alteração ocorre quando existe um id<>0, do contrário é uma inserção.
    */

    include 'abrirConexao.php';

    $vId = 0;
    if (!empty($_POST["txtId"]))
        $vId = $_POST["txtId"];

    $vNome = "";
    if (!empty($_POST["txtNome"]))
        $vNome = $_POST["txtNome"];

    $vEmail = "";
    if (!empty($_POST["txtEmail"]))
        $vEmail = $_POST["txtEmail"];

    $vSenha = "";
    if (!empty($_POST["txtSenha"]))
        $vSenha = $_POST["txtSenha"];

    $vTipo = 0;
    if (!empty($_POST["selTipo"]))
        $vTipo = $_POST["selTipo"];
    
    if (!is_numeric($vTipo))
        $vTipo = 0;

    $vPerfil = 0;
    if (!empty($_POST["selPerfil"]))
        $vPerfil = $_POST["selPerfil"];
    
    if (!is_numeric($vPerfil))
        $vPerfil = 0;
        
    if (!empty($vNome) and !empty($vEmail) and !empty($vSenha) and $vTipo>0 and $vPerfil>0)
    {
        if ($vId<>0) //Alterando
        {
            $sql = "UPDATE usuarios SET nome = '$vNome', email = '$vEmail', senha = '$vSenha', tipo = $vTipo, perfil = $vPerfil WHERE id = $vId";
    
            $result = $conn->query($sql);
            /*
            echo "<br />";
            echo $result;
            echo "<br />";
            */
        }
        else //Inserindo
        {
            $sql = "INSERT INTO usuarios SET nome = '$vNome', email = '$vEmail', senha = '$vSenha', tipo = $vTipo, perfil = $vPerfil;";
    
            $result = $conn->query($sql);
            /*
            echo "<br />";
            echo $result;
            echo "<br />";
            echo "Ultimo id: " . $conn->insert_id;
            echo "<br />";
            */
        }
        echo "<script>window.location = 'listarUsuarios.html';</script>";
    }
    else
    {
        echo "<html><head><link rel='stylesheet' type='text/css' media='screen' href='css/estilo.css'>";
        echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css' rel='stylesheet'>";
        echo "<link rel='stylesheet' href='https://unpkg.com/@fortawesome/fontawesome-free@5.12.1/css/all.min.css'>";
        echo "</head>";
        echo "<body><h2 style='color: red;'>Todos os campos são obrigatórios!</h2><br />";
        echo "<center><div id='toolbar'><a href='javascript:history.go(-1)'><button id='btnBack' class='btn btn-secondary'><i class='fa fa-arrow-left'></i> Voltar</button></a></div></center>";
        echo "</body></html>";
    }
?>