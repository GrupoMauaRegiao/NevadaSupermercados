<?php get_header(); ?>
      <div class="slides">
        <?php $CSSclasses = array("esquerda", "centro", "direita"); ?>
        <?php query_posts('order=DESC&posts_per_page=3&category_name=Banner'); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php if (get_post_meta($post->ID, 'Imagem BANNER', true)) : ?>
              <?php $i = $wp_query->current_post; ?>
              <div class="slide <?php echo $CSSclasses[$i]; ?>">
                <img src="<?php echo get_post_meta($post->ID, 'Imagem BANNER', true); ?>" alt="" />
              </div>
            <?php endif; ?>
          <?php endwhile; else: ?>
        <?php endif; ?>
        <div class="controles">
          <div class="anterior"></div>
          <div class="proximo"></div>
        </div>
      </div> <!-- # Slides -->

      <div class="ofertas">
        <div class="cabecalho-secao">
          <h2>Ofertas</h2>
        </div>

        <div class="oferta">
          <div class="imagem-produto">
            <img src="<?php echo get_template_directory_uri(); ?>/imagens/produto01.jpg" alt="" />
          </div>
          <div class="informacao">
            <div class="nome-produto">
              <p title="Asa de Frango Kg.">Asa de Frango Kg.</p>
            </div>
            <div class="preco">
              <p><span>R$</span> 5,78</p>
            </div>
          </div>
        </div>

        <div class="oferta">
          <div class="imagem-produto">
            <img src="<?php echo get_template_directory_uri(); ?>/imagens/produto02.jpg" alt="" />
          </div>
          <div class="informacao">
            <div class="nome-produto">
              <p title="Biscoito Vitarella 400 g.">Biscoito Vitarella 400 g.</p>
            </div>
            <div class="preco">
              <p><span>R$</span> 2,79</p>
            </div>
          </div>
        </div>

        <div class="oferta">
          <div class="imagem-produto">
            <img src="<?php echo get_template_directory_uri(); ?>/imagens/produto03.jpg" alt="" />
          </div>
          <div class="informacao">
            <div class="nome-produto">
              <p title="Margarina Qualy 500 g.">Margarina Qualy 500 g.</p>
            </div>
            <div class="preco">
              <p><span>R$</span> 3,79</p>
            </div>
          </div>
        </div>

        <div class="oferta">
          <div class="imagem-produto">
            <img src="<?php echo get_template_directory_uri(); ?>/imagens/produto04.jpg" alt="" />
          </div>
          <div class="informacao">
            <div class="nome-produto">
              <p title="Biscoito Vitarella 400 g.">Biscoito Vitarella 400 g.</p>
            </div>
            <div class="preco">
              <p><span>R$</span> 2,79</p>
            </div>
          </div>
        </div>
      </div><!-- # Ofertas -->

      <div class="multimidia">
        <div class="jornal">
          <div class="issuuembed" data-configid="0/3739593"></div>
          <div class="rodape-jornal">
            <p>Jornal de Ofertas</p>
          </div>
        </div>
        <div class="videos">
          <div class="cabecalho-secao">
            <h2>Vídeos</h2>
          </div>
          <div class="player">
            <iframe src="http://www.youtube.com/embed/lempeC72Tyg?rel=0"></iframe>
          </div>
        </div>
      </div> <!-- # Multimídia -->

      <div class="sombra-topo"></div>

      <div class="campanhas">
        <div class="campanha1">
          <div class="hortifruti">
            <p>Terça-feira é<br />
               dia de hortifruti</p>
          </div>
        </div>
        <div class="campanha2">
          <div class="carne">
            <p>Quinta-feira é<br />
               dia de carne</p>
          </div>
        </div>

        <div class="sombra-lateral"></div>
        
        <div class="cartao">
          <div class="animacao-cartao">

          </div>
          <div class="informacao">
            <p>Faça já o seu <br />
               <span>Cartão Nevada</span></p>
            <p>Cheio de vantagens!</p>
          </div>
        </div>
      </div><!-- # Campanhas -->
<?php get_footer(); ?>