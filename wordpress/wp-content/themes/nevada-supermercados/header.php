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
  <body class="precarregar">
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
              <a href="<?php bloginfo('url'); ?>/index.php">Home</a>
            </li>
            <li>
              <a href="<?php bloginfo('url'); ?>/index.php/quem-somos">Quem somos <span>&#8250;</span></a>
              <ul class="submenu">
                <li><a href="<?php bloginfo('url'); ?>/index.php/quem-somos/nossas-lojas">Nossas Lojas</a></li>
                <li><a href="<?php bloginfo('url'); ?>/index.php/quem-somos/acoes-sociais">Ações Sociais</a></li>
                <li><a href="<?php bloginfo('url'); ?>/index.php/quem-somos/trabalhe-conosco">Trabalhe Conosco</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php bloginfo('url'); ?>/index.php/produtos-e-servicos">Produtos e Serviços <span>&#8250;</span></a>
              <ul class="submenu">
                <li><a href="<?php bloginfo('url'); ?>/index.php/produtos-e-servicos/entrega-em-domicilio">Entrega em domicílio</a></li>
                <li><a href="<?php bloginfo('url'); ?>/index.php/produtos-e-servicos/cartao-da-loja">Cartão da Loja</a></li>
                <li><a href="<?php bloginfo('url'); ?>/index.php/produtos-e-servicos/servicos-cursos-e-palestras">Serviços, Cursos e Palestras</a></li>
                <li><a href="<?php bloginfo('url'); ?>/index.php/produtos-e-servicos/formas-de-pagamento">Formas de Pagamento</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php bloginfo('url'); ?>/index.php/ofertas">Ofertas <span>&#8250;</span></a>
              <ul class="submenu">
                <li><a href="<?php bloginfo('url'); ?>/index.php/ofertas/promocoes">Promoções</a></li>
                <li><a href="<?php bloginfo('url'); ?>/index.php/ofertas/jornal-de-ofertas">Jornal de ofertas</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php bloginfo('url'); ?>/index.php/colaboradores">Colaboradores</a>
            </li>
            <li>
              <a href="<?php bloginfo('url'); ?>/index.php/localizacao">Localização</a>
            </li>
            <li>
              <a href="<?php bloginfo('url'); ?>/index.php/contato">Contato</a>
            </li>
          </ul>
        </div>
      </div> <!-- # Cabeçalho -->