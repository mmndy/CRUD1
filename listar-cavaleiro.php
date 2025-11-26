<h1>Lista de Cavaleiros</h1>

<?php
include 'config.php';

// Seleciona todos os cavaleiros com JOIN para mostrar o nome do dragão (se houver)
$sql = "SELECT c.id_cavaleiro, c.nome, c.classe, c.nivel, d.nome AS dragao_nome
        FROM cavaleiros c
        LEFT JOIN dragoes d ON c.dragao_id = d.id_dragao
        ORDER BY c.nome";

$res = $conn->query($sql);
$qtd = $res->num_rows;

if($qtd > 0){
    echo "<p>Encontrou <b>$qtd</b> cavaleiro(s)</p>";

    echo "<table class='table table-bordered table-striped table-hover'>";
    echo "<thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Classe</th>
                <th>Nível</th>
                <th>Dragão que enfrentou</th>
                <th>Ações</th>
            </tr>
          </thead>
          <tbody>";

    while($row = $res->fetch_assoc()){
        echo "<tr>";
        echo "<td>{$row['id_cavaleiro']}</td>";
        echo "<td>{$row['nome']}</td>";
        echo "<td>{$row['classe']}</td>";
        echo "<td>{$row['nivel']}</td>";
        echo "<td>" . ($row['dragao_nome'] ?? '-') . "</td>";
        echo "<td>
                <button class='btn btn-success btn-sm' onclick=\"location.href='?page=editar-cavaleiro&id={$row['id_cavaleiro']}'\">Editar</button>
                <button class='btn btn-danger btn-sm' onclick=\"if(confirm('Tem certeza que deseja excluir?')){
                        location.href='?page=salvar-cavaleiro&acao=excluir&id={$row['id_cavaleiro']}';
                    }\">Excluir</button>
              </td>";
        echo "</tr>";
    }

    echo "</tbody></table>";

} else {
    echo "<p>Nenhum cavaleiro cadastrado</p>";
}
?>
