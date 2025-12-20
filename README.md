
# 🐉 Sistema Elden Ring — CRUD em PHP e MySQL


Sistema web desenvolvido para gerenciar dados do universo Elden Ring, permitindo o cadastro de Dragões e Cavaleiros, com relacionamento entre as entidades. O projeto foi construído utilizando PHP, MySQL e HTML/CSS, rodando em ambiente local com XAMPP.

---

## ⚙️ Tecnologias Utilizadas

- **PHP** — Lógica de programação e manipulação de dados  
- **MySQL** — Banco de dados relacional  
- **HTML / CSS **  
- **Bootstrap** — Interface visual responsiva  
- **XAMPP** — Servidor local (Apache + MySQL)
  
---

## 🚀 Funcionalidades

- ✅ Cadastrar, listar, editar e excluir Dragões
- ✅ Cadastrar, listar, editar e excluir Cavaleiros
- ✅ Associar cavaleiros a dragões (chave estrangeira)
- ✅ Manter integridade referencial no banco de dados
  
---
## 🗂 Estrutura do Banco de Dados

Banco de dados: elden

🐲 Tabela dragoes

id_dragao (PK)

nome

localizacao

elemento

forca

descricao

⚔️ Tabela cavaleiros

id_cavaleiro (PK)

nome

classe

nivel

dragao_id (FK → dragoes.id_dragao)

🔗 Caso um dragão seja excluído, o cavaleiro associado permanece no sistema com o campo dragao_id definido como NULL.


---

## 💾 Como Rodar o Projeto

1. **Instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html)**  
   (Certifique-se de que o Apache e o MySQL estão ativos no painel de controle)

2. **Copie o projeto** para o diretório do servidor local:
   C:\xampp\htdocs\elden-crud


3. **Abra o MySQL como administrador no XAMPP** 

4. **Crie o banco de dados** com o mesmo nome definido no arquivo `config.php`:  
```sql
CREATE DATABASE elden;
USE elden;
****
```
5. Importe o arquivo SQL do projeto contendo as tabelas dragoes e cavaleiros.

```sql
SOURCE C:/xampp/htdocs/projeto-concessionaria-main/banco.sql;
```
6. Execute o projeto no navegador:
   http://localhost/elden-crud

