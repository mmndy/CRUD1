<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Elden Ring</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


	<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">ELDEN Ring</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
	        </li>
	        
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Dragões
	          </a>
	          <ul class="dropdown-menu">
	            <li><a class="dropdown-item" href="?page=cadastrar-dragao">Cadastrar</a></li>
	            <li><a class="dropdown-item" href="?page=listar-dragao">Listar</a></li>
	          </ul>
	        </li>

	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Cavaleiros
	          </a>
	          <ul class="dropdown-menu">
	            <li><a class="dropdown-item" href="?page=cadastrar-cavaleiro">Cadastrar</a></li>
	            <li><a class="dropdown-item" href="?page=listar-cavaleiro">Listar</a></li>
	          </ul>
	        </li>
	        
	      </ul>
	      </form>
	    </div>
	  </div>
	</nav>

<main class="container">
    <div class="row">
        <div class="col mt-5">
            <?php
					//conexão com o banco de dados
					include ('config.php');
					
					switch (@$_REQUEST['page']) {
						
						case 'cadastrar-dragao':
							include('cadastrar-dragao.php');
							break;
						case 'listar-dragao':
							include('listar-dragao.php');
							break;
						case 'editar-dragao':
							include('editar-dragao.php');
							break;
						case 'salvar-dragao':
							include('salvar-dragao.php');
							break;

						// cavaleiro
						case 'cadastrar-cavaleiro':
							include('cadastrar-cavaleiro.php');
							break;
						case 'listar-cavaleiro':
							include('listar-cavaleiro.php');
							break;
						case 'editar-cavaleiro':
							include('editar-cavaleiro.php');
							break;
						case 'salvar-cavaleiro':
							include('salvar-cavaleiro.php');
							break;

                default:
                    ?>
                    <section id="home" class="home-container">
                        <div class="content text-center">
                            <h3>BEM VINDO ÀS TERRAS INTERMÉDIAS!</h3>
                            <p>Use o menu acima para gerenciar as entidades do seu sistema.</p>
                        </div>
                    </section>
                    <?php
                    break;
            }
            ?>
        </div>
    </div>
</main>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>