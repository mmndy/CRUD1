<h1>Lista de Dragões</h1>

<?php
include 'config.php';

$sql = "SELECT * FROM dragoes ORDER BY nome";
$res = $conn->query($sql);
$qtd = $res->num_rows;

if($qtd > 0){
    echo "<p>Encontrou <b>$qtd</b> dragão(ões)</p>";
    echo "<table class='table table-bordered table-striped table-hover'>";
    echo "<thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Localização</th>
                <th>Elemento</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
          </thead><tbody>";

    while($row = $res->fetch_assoc()){
        echo "<tr>
                <td>{$row['id_dragao']}</td>
                <td>{$row['nome']}</td>
                <td>{$row['localizacao']}</td>
                <td>{$row['elemento']}</td>
                <td>{$row['descricao']}</td>
                <td>
                    <button class='btn btn-success btn-sm' 
                        onclick=\"location.href='?page=editar-dragao&id={$row['id_dragao']}';\">
                        Editar
                    </button>
                    <button class='btn btn-danger btn-sm' 
                        onclick=\"if(confirm('Tem certeza que deseja excluir?')){
                                    location.href='?page=salvar-dragao&acao=excluir&id={$row['id_dragao']}';
                                 }\">
                        Excluir
                    </button>
                </td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>Nenhum dragão cadastrado!</p>";
}
?>
