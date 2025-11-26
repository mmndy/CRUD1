<h1>Cadastrar Cavaleiro</h1>

<form action="?page=salvar-cavaleiro" method="POST">
    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label>Nome:</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Classe:</label>
        <input type="text" name="classe" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Nível:</label>
        <input type="number" name="nivel" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Dragão que enfrentou:</label>
        <select name="dragao_id" class="form-control">
            <option value="">- Escolha -</option>
            <?php
            include 'config.php';
            $dragao_res = $conn->query("SELECT * FROM dragoes ORDER BY nome");
            while($row = $dragao_res->fetch_assoc()){
                echo "<option value='{$row['id_dragao']}'>{$row['nome']}</option>";
            }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="?page=listar-cavaleiro" class="btn btn-secondary">Cancelar</a>
</form>
