<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/imagens/favicon.ico" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.min.css" />
    <!--[if IE]>
      <link rel="stylesheet" type="text/css" href="css/ie.min.css" />
    <![endif]-->
    <link href="http://fonts.googleapis.com/css?family=Monda" rel="stylesheet" />
    <title><?php bloginfo('name'); ?> <?php if (!is_home()): ?> &#8212; <?php echo ucwords(get_the_title()); ?><?php endif; ?></title>
  </head>
  <body>
      <?php if (!is_home()): ?>
        <div class="barra-superior"></div>
      <?php endif ?>
    <div class="layout960px">

      <div class="cabecalho">
        <div class="logotipo">
          <a href="<?php bloginfo('url'); ?>">
            <img
              src="<?php echo get_template_directory_uri(); ?>/imagens/logotipo.png"
              alt="<?php bloginfo('name'); ?>"
              title="<?php bloginfo('name'); ?>" />
          </a>
        </div>
        <div class="menu">
          <ul>
            <li>
              <a href="http://localhost/NevadaSupermercados/wordpress/index.php">Home</a>
            </li>
            <li>
              <a href="http://localhost/NevadaSupermercados/wordpress/index.php/quem-somos">Quem somos <span>&#8250;</span></a>
              <ul class="submenu">
                <li><a href="http://localhost/NevadaSupermercados/wordpress/index.php/quem-somos/nossas-lojas">Nossas Lojas</a></li>
                <li><a href="http://localhost/NevadaSupermercados/wordpress/index.php/quem-somos/acoes-sociais">Ações Sociais</a></li>
                <li><a href="http://localhost/NevadaSupermercados/wordpress/index.php/quem-somos/trabalhe-conosco">Trabalhe Conosco</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Produtos e Serviços <span>&#8250;</span></a>
              <ul class="submenu">
                <li><a href="#">Entrega em domicílio</a></li>
                <li><a href="#">Cartão da Loja</a></li>
                <li><a href="#">Serviços, Cursos e Paletras</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Ofertas <span>&#8250;</span></a>
              <ul class="submenu">
                <li><a href="#">Promoções</a></li>
                <li><a href="#">Jornal de ofertas</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Colaboradores <span>&#8250;</span></a>
              <ul class="submenu">
                <li><a href="#">Nossos parceiros</a></li>
                <li><a href="#">Colaborador do mês</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Localização</a>
            </li>
            <li>
              <a href="#">Contato</a>
            </li>
          </ul>
        </div>
      </div> <!-- # Cabeçalho -->