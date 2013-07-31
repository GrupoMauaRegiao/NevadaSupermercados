      <div class="rodape">
        <div class="menu">
          <ul>
            <li>
              <a href="<?php bloginfo('url'); ?>/index.php/quem-somos">Quem somos</a>
              <ul>
                <li><a href="<?php bloginfo('url'); ?>/index.php/nossas-lojas">Nossos Lojas</a></li>
                <li><a href="">Ações Socias</a></li>
                <li><a href="">Trabalhe Conosco</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Produtos e Serviços</a>
              <ul>
                <li><a href="#">Entrega em domicílio</a></li>
                <li><a href="#">Cartão da Loja</a></li>
                <li><a href="#">Serviços, Cursos e Paletras</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Ofertas</a>
              <ul>
                <li><a href="#">Promoções</a></li>
                <li><a href="#">Jornal de ofertas</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Colaboradores</a>
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
  </body>
</html>