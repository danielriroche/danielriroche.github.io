<?php
require_once("../htdocs/assets/connections/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foco na Verdade</title>
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <!-- Icons FontAwesome -->
    <script src="https://kit.fontawesome.com/ea5c489a72.js" crossorigin="anonymous" defer></script>
    <!-- CSS do Site -->
    <link rel="stylesheet" href="assets/css/estilo.css">
    <!-- CSS da Responsividade -->
    <link rel="stylesheet" media="(max-width: 1030px)" href="assets/css/responsividade.css">
</head>

<body>
    <header>
        <div class="container">
            <a href="index.html"><img src="assets/img/logo-do-site.svg" alt="" width="40px" loading="lazy"></a>
            <div class="menu-section">
                <div class="menu-mobile">
                    <div class="botao-menu-mobile">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <nav>
                    <ul>
                        <li><a href="index.html">Inicio</a></li>
                        <li><a href="sobre.html">sobre</a></li>
                    </ul>
                </nav>
            </div>
            <button class="search-button" title="botão para pesquisar.">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        <div class="container-searchbar">
            <div class="box-searchbar">
                <form action="pesquisa.php" method="post">
                    <input type="search" name="buscar" id="search-input-pc" placeholder="Pesquique aqui...">
                    <input type="submit" value="PESQUISAR">
                </form>
            </div>
        </div>
        <div class="container-menu-mobile">
            <div class="box-menu-mobile">
                <ul>
                    <li><a href="index.html"><i class="fa-solid fa-house-chimney"></i>Inicio</a></li>
                    <li><a href="sobre.html"><i class="fa-solid fa-circle-info"></i>Sobre</a></li>
                </ul>
                <form action="pesquisa.php" method="post">
                    <input type="search" name="buscar" id="search-input-mobile" placeholder="Pesquise aqui...">
                    <input type="submit" value="PESQUISAR">
                </form>
            </div>
        </div>
    </header>
    <main>
        <div class="container-main">
            <div class="box-main">
                <div class="container-googleads-top-posts">
                    <span></span>
                </div>
                <h1>Resultado da pesquisa</h1>
                <section class="search-result">
                    <?php
                    $pesquisa = $_POST['buscar'];
                    $sql_code = "SELECT * 
                                FROM posts 
                                WHERE titulo LIKE '%$pesquisa%' 
                                OR descricao LIKE '%$pesquisa%'
                                OR categoria LIKE '%$pesquisa%'";
                    $sql_query = $conexao->query($sql_code) or die("ERRO ao consultar! " . $conexao->error);

                    if ($sql_query->num_rows == 0) {
                    ?>
                        <p>Nenhum resultado encontrado...</p>

                        <?php
                    } else {
                        while ($dados = $sql_query->fetch_assoc()) {
                        ?>
                            <article>
                                <a href="<?php echo $dados['link_do_post']; ?>">
                                    <img src="<?php echo $dados['thumb']; ?>">
                                    <div class="text-search-result">
                                        <h1><?php echo utf8_encode ($dados['titulo']); ?></h1>
                                        <p><?php echo utf8_encode ($dados['descricao']); ?></p>
                                </a>
            </div>
            </article>
    <?php
                        }
                    }
    ?>

    </section>
        </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="footer-first-section">
                <dl>
                    <dt>Contato:</dt>
                    <dd><a href="mailto:contato@foconaverdade.com">contato@foconaverdade.com</a></dd>
                </dl>
                <ul class="footer-links">
                    <li><a href="politicasdeprivacidade.html">Politicas de Privacidade</a></li>
                    <li><a href="termosdeuso.html">Termos de Uso</a></li>
                    <li><a href="sobre.html">sobre</a></li>
                </ul>
                <ul>
                    <li><a href="https://facebook.com" title="Link para o facebook."><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="https://telegram.org" title="Link para o telegram."><i class="fa-brands fa-telegram"></i></a></li>
                    <li><a href="https://instagram.con" title="Link para o instagram."><i class="fa-brands fa-instagram"></i></a></li>
                </ul>
            </div>
            <hr>
            <span>&copy; 2022 Foco na Verdade</span>
        </div>
    </footer>
    <script src="assets/js/mobile.js" async></script>
    <script src="assets/js/funcionalidades.js" async></script>
</body>

</html>