      <div class="sombra-rodape"></div>
      <div class="rodape">
        <div class="menu">
          <ul>
            <li>
              <a href="<?php bloginfo('url'); ?>/quem-somos/nossas-lojas">Quem somos</a>
              <ul>
                <li><a href="<?php bloginfo('url'); ?>/quem-somos/nossas-lojas">Nossos Lojas</a></li>
                <li><a href="<?php bloginfo('url'); ?>/quem-somos/acoes-sociais">Ações Socias</a></li>
                <li><a href="<?php bloginfo('url'); ?>/quem-somos/trabalhe-conosco">Trabalhe Conosco</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php bloginfo('url'); ?>/produtos-e-servicos/entrega-em-domicilio">Produtos e Serviços</a>
              <ul>
                <li><a href="<?php bloginfo('url'); ?>/produtos-e-servicos/entrega-em-domicilio">Entrega em domicílio</a></li>
                <li><a href="<?php bloginfo('url'); ?>/produtos-e-servicos/cartao-da-loja">Cartão da Loja</a></li>
                <li><a href="<?php bloginfo('url'); ?>/produtos-e-servicos/servicos-cursos-e-palestras">Serviços, Cursos e Palestras</a></li>
                <li><a href="<?php bloginfo('url'); ?>/produtos-e-servicos/formas-de-pagamento">Formas de Pagamento</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php bloginfo('url'); ?>/ofertas/promocoes">Ofertas</a>
              <ul>  
                <li><a href="<?php bloginfo('url'); ?>/ofertas/promocoes">Promoções</a></li>
                <li><a href="<?php bloginfo('url'); ?>/jornal-de-ofertas">Jornal de ofertas</a></li>
              </ul>
            </li>
            <li>
              <a target="_blank" href="https://www.facebook.com/pages/Nevada-Supermercados/276473999052869">Siga-nos</a>
              <a target="_blank" href="https://www.facebook.com/pages/Nevada-Supermercados/276473999052869">
                <div class="icone-facebook"></div>
              </a>
            </li>
          </ul>
        </div>

        <div class="logotipo-pinguim">
          <img src="<?php echo get_template_directory_uri(); ?>/imagens/pinguim.png" alt="" />
        </div>

      </div> <!-- # Rodapé -->
    </div> <!-- # layout960px -->

    <?php wp_footer(); ?>
    <script src="<?php echo get_template_directory_uri(); ?>/js/scripts.min.js"></script>
    
    <!-- Google -->
    <script>
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-43732021-1']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol
          ? 'https://ssl' 
          : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
      })();
    </script>
  </body>
</html>