<?php
  get_header();
  
  # Quem somos
  if (is_page("nossas-lojas")) {
    include "nossas-lojas.php";
  } elseif (is_page("acoes-sociais")) {
    include "acoes-sociais.php";
  } elseif (is_page("trabalhe-conosco")) {
    include "trabalhe-conosco.php";
  # Produtos e Serviços
  } elseif (is_page("entrega-em-domicilio")) {
    include "entrega-em-domicilio.php";
  } elseif (is_page("cartao-da-loja")) {
    include "cartao-da-loja.php";
  } elseif (is_page("servicos-cursos-e-palestras")) {
    include "servicos-cursos-e-palestras.php";
  } elseif (is_page('formas-de-pagamento')) {
    include "formas-de-pagamento.php";
    # Ofertas
  } elseif (is_page("jornal-de-ofertas")) {
    include "jornal-de-ofertas.php";
  } elseif (is_page("promocoes")) {
    include "promocoes.php";
    # Colaboradores
  } elseif (is_page('colaboradores')) {
    include "colaboradores.php";
  }

  get_footer();
?>