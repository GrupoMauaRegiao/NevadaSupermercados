<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="keywords" content="nevada supermercado, maua, mercado em maua, supermercado zaira, supermercado esperança, compras, maua sp, comprar em maua, mercado zaira, mercado nevada, nevada supermercados" />
    <meta name="description" content="Este é o website do Nevada Supermercados. Seja bem-vindo e aproveite para nos conhecer." />
    <meta name="author" content="Grupo Mauá e Região de Comunicação" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Monda" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.min.css" />
    <!--[if IE 8]>
      <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie.min.css" />
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/imagens/favicon.ico" />
    <title><?php bloginfo('name'); ?> <?php if (!is_home()): ?> &#8212; <?php echo ucwords(get_the_title()); ?><?php endif; ?></title>
  </head>
  <body>

    <div class="barra-superior"></div>

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
              <a href="<?php bloginfo('url'); ?>">Home</a>
            </li>
            <li>
              <a href="<?php bloginfo('url'); ?>/quem-somos/nossas-lojas">Quem somos <span>&#8250;</span></a>
              <ul class="submenu">
                <li><a href="<?php bloginfo('url'); ?>/quem-somos/nossas-lojas">Nossas Lojas</a></li>
                <li><a href="<?php bloginfo('url'); ?>/quem-somos/acoes-sociais">Ações Sociais</a></li>
                <li><a href="<?php bloginfo('url'); ?>/quem-somos/trabalhe-conosco">Trabalhe Conosco</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php bloginfo('url'); ?>/produtos-e-servicos/entrega-em-domicilio">Produtos e Serviços <span>&#8250;</span></a>
              <ul class="submenu">
                <li><a href="<?php bloginfo('url'); ?>/produtos-e-servicos/entrega-em-domicilio">Entrega em domicílio</a></li>
                <li><a href="<?php bloginfo('url'); ?>/produtos-e-servicos/cartao-da-loja">Cartão da Loja</a></li>
                <li><a href="<?php bloginfo('url'); ?>/produtos-e-servicos/servicos-cursos-e-palestras">Serviços, Cursos e Palestras</a></li>
                <li><a href="<?php bloginfo('url'); ?>/produtos-e-servicos/formas-de-pagamento">Formas de Pagamento</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php bloginfo('url'); ?>/ofertas/promocoes">Ofertas <span>&#8250;</span></a>
              <ul class="submenu">
                <li><a href="<?php bloginfo('url'); ?>/ofertas/promocoes">Promoções</a></li>
                <li><a href="<?php bloginfo('url'); ?>/ofertas/jornal-de-ofertas">Jornal de ofertas</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php bloginfo('url'); ?>/localizacao">Localização</a>
            </li>
            <li>
              <a href="<?php bloginfo('url'); ?>/contato">Contato</a>
            </li>
          </ul>
        </div>
      </div> <!-- # Cabeçalho -->