<h1>Cadastrar Dragão</h1>

<form action="?page=salvar-dragao" method="POST">
    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label>Nome:</label>
        <input type="text" name="nome" class="form-control" placeholder="Nome do Dragão" required>
    </div>

    <div class="mb-3">
        <label>Localização:</label>
        <input type="text" name="localizacao" class="form-control" placeholder="Onde vive" required>
    </div>

    <div class="mb-3">
        <label>Elemento:</label>
        <select name="elemento" class="form-control" required>
            <option value="">- Escolha -</option>
            <option value="Fogo">Fogo</option>
            <option value="Gelo">Gelo</option>
            <option value="Água">Água</option>
            <option value="Terra">Terra</option>
            <option value="Vento">Vento</option>
            <option value="Raio">Raio</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Descrição:</label>
        <textarea name="descricao" class="form-control" placeholder="Descrição do dragão"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="?page=listar-dragao" class="btn btn-secondary">Cancelar</a>
</form>
