<?php
include("config.php");
$id = $_GET['id'] ?? 0;
$res = $conn->query("SELECT * FROM dragoes WHERE id_dragao = $id");

if($res->num_rows == 0){
    echo "<p>Dragão não encontrado!</p>";
    exit;
}

$dragao = $res->fetch_assoc();
?>

<h1>Editar Dragão</h1>

<form action="?page=salvar-dragao" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_dragao" value="<?=$dragao['id_dragao']?>">

    <div class="mb-3">
        <label>Nome:
            <input type="text" name="nome" class="form-control" value="<?=$dragao['nome']?>" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Localização:
            <input type="text" name="localizacao" class="form-control" value="<?=$dragao['localizacao']?>" required>
        </label>
    </div>

    <div class="mb-3">
        <label>Elemento:
            <select name="elemento" class="form-control" required>
                <option value="Fogo" <?=$dragao['elemento']=='Fogo'?'selected':''?>>Fogo</option>
                <option value="Gelo" <?=$dragao['elemento']=='Gelo'?'selected':''?>>Gelo</option>
                <option value="Água" <?=$dragao['elemento']=='Água'?'selected':''?>>Água</option>
                <option value="Terra" <?=$dragao['elemento']=='Terra'?'selected':''?>>Terra</option>
                <option value="Vento" <?=$dragao['elemento']=='Vento'?'selected':''?>>Vento</option>
                <option value="Raio" <?=$dragao['elemento']=='Raio'?'selected':''?>>Raio</option>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="?page=listar-dragao" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
