<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #292b2c;
            color: #fff;
        }

        header {
            background-color: #343a40;
            padding: 20px 0;
        }

        header h1 {
            margin: 0;
            font-size: 2rem;
        }

        nav a {
            color: #fff;
        }

        #banner,
        #sobre,
        #servicos,
        #contato {
            background-color: #343a40;
            padding: 60px 0;
            text-align: center;
        }

        section h2 {
            color: #007bff;
        }
        
        .list-group-item{
            color: black;
        }

        footer {
            background-color: #292b2c;
            padding: 10px 0;
            text-align: center;
        }
    </style>
    <title>PetPalacio - Seu Pet em Boas Mãos</title>
</head>
<body>

    <header class="container">
        <div class="row">
            <div class="col">
                <h1>PetPalacio</h1>
            </div>
            <div class="col">
                <nav>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="#sobre">Sobre Nós</a></li>
                        <li class="nav-item"><a class="nav-link" href="#servicos">Serviços</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contato">Contato</a></li>
                        <li>
                            <a href="/login">
                                <button>
                                    Login
                                </button>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    

    <section id="banner" class="container">
        <div class="">
            <h2>Bem-vindo ao PetPalacio</h2>
            <p class="">O lugar perfeito para cuidar do seu melhor amigo.</p>
        </div>
    </section>

    <section id="sobre" class="container">
        <h2 class="text-center mb-4">Sobre Nós</h2>
        <p class="lead">O PetPalacio é um lugar dedicado ao bem-estar e felicidade do seu animal de estimação. Nossa equipe é apaixonada por animais e está pronta para proporcionar a melhor experiência para o seu pet.</p>
    </section>

    <section id="servicos" class="container">
        <h2 class="text-center mb-4">Nossos Serviços</h2>
        <div class="row">
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item">Consultas Veterinárias</li>
                    <li class="list-group-item">Banho e Tosa</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item">Hospedagem</li>
                    <li class="list-group-item">Loja com Produtos Pet</li>
                </ul>
            </div>
        </div>
    </section>

    <section id="contato" class="container">
        <h2 class="text-center mb-4">Entre em Contato</h2>
        <p class="lead">Estamos aqui para responder a todas as suas perguntas. Entre em contato conosco para agendar serviços ou para obter mais informações.</p>
        <a class="btn btn-primary" href="mailto:contato@petpalacio.com">contato@petpalacio.com</a>
    </section>

    <footer class="container-fluid">
        <p class="text-center">&copy; 2023 PetPalacio - Seu Pet em Boas Mãos</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
