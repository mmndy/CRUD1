<?php
include("config.php");

$acao = $_POST['acao'] ?? $_GET['acao'] ?? '';

if($acao == "cadastrar"){
    $nome = $conn->real_escape_string($_POST['nome'] ?? '');
    $classe = $conn->real_escape_string($_POST['classe'] ?? '');
    $nivel = intval($_POST['nivel'] ?? 0);
    $dragao_id = intval($_POST['dragao_id'] ?? 0);

    $sql = "INSERT INTO cavaleiros (nome, classe, nivel, dragao_id)
            VALUES ('$nome', '$classe', $nivel, " . ($dragao_id > 0 ? $dragao_id : "NULL") . ")";

    if($conn->query($sql)) {
        echo "<script>alert('Cavaleiro cadastrado!'); window.location.href='index.php?page=listar-cavaleiro';</script>";
    } else {
        echo "<script>alert('Erro: {$conn->error}'); window.location.href='index.php?page=cadastrar-cavaleiro';</script>";
    }
}

elseif($acao == "editar"){
    $id = intval($_POST['id_cavaleiro'] ?? 0);
    if($id <= 0){
        echo "<script>alert('ID inválido'); window.location.href='index.php?page=listar-cavaleiro';</script>";
        exit;
    }

    $nome = $conn->real_escape_string($_POST['nome']);
    $classe = $conn->real_escape_string($_POST['classe']);
    $nivel = intval($_POST['nivel']);
    $dragao_id = intval($_POST['dragao_id'] ?? 0);

    $sql = "UPDATE cavaleiros SET 
            nome='$nome', classe='$classe', nivel=$nivel, dragao_id=" . ($dragao_id > 0 ? $dragao_id : "NULL") . "
            WHERE id_cavaleiro=$id";

    if($conn->query($sql)){
        echo "<script>alert('Cavaleiro atualizado!'); window.location.href='index.php?page=listar-cavaleiro';</script>";
    } else {
        echo "<script>alert('Erro: {$conn->error}'); window.location.href='index.php?page=listar-cavaleiro';</script>";
    }
}

elseif($acao == "excluir"){
    $id = intval($_GET['id'] ?? 0);
    if($id > 0){
        $conn->query("DELETE FROM cavaleiros WHERE id_cavaleiro=$id");
        echo "<script>alert('Cavaleiro excluído!'); window.location.href='index.php?page=listar-cavaleiro';</script>";
    }
}
?>
