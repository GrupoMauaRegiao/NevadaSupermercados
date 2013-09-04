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
              <a target="_blank" href="https://www.facebook.com/nevadasupermercados">Siga-nos</a>
              <a target="_blank" href="https://www.facebook.com/nevadasupermercados">
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
    <script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
    
    <!-- Google -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-43732021-1', 'nevadasupermercados.com.br');
      ga('send', 'pageview');
    </script>
  </body>
</html>