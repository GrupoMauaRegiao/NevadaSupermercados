<?php
  get_header();
  
  # Quem somos
  if (is_page("nossas-lojas")) {
    include "nossas-lojas.php";
  } elseif (is_page("acoes-sociais")) {
    include "acoes-sociais.php";
  } elseif (is_page("trabalhe-conosco")) {
    include "trabalhe-conosco.php";
  }

  get_footer();
?>