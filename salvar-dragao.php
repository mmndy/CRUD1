<?php
include("config.php");

// Captura a ação enviada pelo formulário
$acao = $_POST['acao'] ?? $_GET['acao'] ?? '';

if($acao == "cadastrar") {

    // Recebe e "escapa" os dados para evitar problemas com aspas
    $nome = $conn->real_escape_string($_POST['nome'] ?? '');
    $localizacao = $conn->real_escape_string($_POST['localizacao'] ?? '');
    $elemento = $conn->real_escape_string($_POST['elemento'] ?? '');
    $descricao = $conn->real_escape_string($_POST['descricao'] ?? '');

    $sql = "INSERT INTO dragoes (nome, localizacao, elemento, descricao)
            VALUES ('$nome', '$localizacao', '$elemento', '$descricao')";

    if($conn->query($sql) === TRUE){
        echo "<script>
                alert('Dragão cadastrado com sucesso!');
                window.location.href='index.php?page=listar-dragao';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao cadastrar: {$conn->error}');
                window.location.href='index.php?page=cadastrar-dragao';
              </script>";
    }

}

// Blocos de editar e excluir continuam iguais
elseif($acao == "editar") {
    $id = $_POST['id_dragao'] ?? 0;
    if($id == 0){
        echo "<script>alert('ID inválido!'); window.location.href='index.php?page=listar-dragao';</script>";
        exit;
    }

    $nome = $conn->real_escape_string($_POST['nome']);
    $localizacao = $conn->real_escape_string($_POST['localizacao']);
    $elemento = $conn->real_escape_string($_POST['elemento']);
    $descricao = $conn->real_escape_string($_POST['descricao']);

    $sql = "UPDATE dragoes SET 
            nome='$nome', 
            localizacao='$localizacao', 
            elemento='$elemento', 
            descricao='$descricao' 
            WHERE id_dragao=$id";

    if($conn->query($sql) === TRUE){
        echo "<script>
                alert('Dragão atualizado com sucesso!');
                window.location.href='index.php?page=listar-dragao';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao atualizar: {$conn->error}');
                window.location.href='index.php?page=listar-dragao';
              </script>";
    }
}

elseif($acao == "excluir") {
    $id = $_GET['id'] ?? 0;
    if($id > 0){
        $conn->query("DELETE FROM dragoes WHERE id_dragao=$id");
        echo "<script>
                alert('Dragão excluído com sucesso!');
                window.location.href='index.php?page=listar-dragao';
              </script>";
    }
}
?>
