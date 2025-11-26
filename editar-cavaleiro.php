<?php
include("config.php");

$id = intval($_GET['id'] ?? 0);
if($id <= 0){
    echo "<script>alert('ID inválido'); window.location.href='index.php?page=listar-cavaleiro';</script>";
    exit;
}

$res = $conn->query("SELECT * FROM cavaleiros WHERE id_cavaleiro = $id");
if($res->num_rows == 0){
    echo "<script>alert('Cavaleiro não encontrado'); window.location.href='index.php?page=listar-cavaleiro';</script>";
    exit;
}

$cavaleiro = $res->fetch_assoc();
?>

<h1>Editar Cavaleiro</h1>

<form action="?page=salvar-cavaleiro" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_cavaleiro" value="<?=$cavaleiro['id_cavaleiro']?>">

    <div class="mb-3">
        <label>Nome:</label>
        <input type="text" name="nome" class="form-control" value="<?=$cavaleiro['nome']?>" required>
    </div>

    <div class="mb-3">
        <label>Classe:</label>
        <input type="text" name="classe" class="form-control" value="<?=$cavaleiro['classe']?>" required>
    </div>

    <div class="mb-3">
        <label>Nível:</label>
        <input type="number" name="nivel" class="form-control" value="<?=$cavaleiro['nivel']?>" required>
    </div>

    <div class="mb-3">
        <label>Dragão que enfrentou:</label>
        <select name="dragao_id" class="form-control">
            <option value="">- Escolha -</option>
            <?php
            $dragao_res = $conn->query("SELECT * FROM dragoes ORDER BY nome");
            while($row = $dragao_res->fetch_assoc()){
                $selected = ($row['id_dragao'] == $cavaleiro['dragao_id']) ? 'selected' : '';
                echo "<option value='{$row['id_dragao']}' $selected>{$row['nome']}</option>";
            }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="?page=listar-cavaleiro" class="btn btn-secondary">Cancelar</a>
</form>
