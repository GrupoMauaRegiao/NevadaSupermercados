<?php 
  $campoBanner = array(
    "Imagem BANNER"
  );

  $camposOferta = array(
    "Imagem OFERTA",
    "MEDIDA (kg, g, dz, un, ..., etc.)",
    "Preço OFERTA"
  );

  $campoJornal = array(
    "Link ISSUU"
  );

  $cssClassesSlides = array("esquerda", "centro", "direita");
?>

<?php get_header(); ?>
      <div class="slides">
        <?php query_posts('order=DESC&posts_per_page=3&category_name=Banner'); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php $i = $wp_query->current_post; ?>
            <div class="slide <?php echo $cssClassesSlides[$i]; ?>">
              <img src="<?php echo get_post_meta($post->ID, $campoBanner[0], true); ?>" alt="" />
            </div>
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

        <?php query_posts("order=DESC&posts_per_page=4&category_name=Oferta"); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="oferta">
              <div class="imagem-produto">
                <img src="<?php echo get_post_meta($post->ID, $camposOferta[0], true); ?>" alt="" />
              </div>
              <div class="informacao">
                <div class="nome-produto">
                  <p title="<?php the_title(); ?>"><?php the_title(); ?></p>
                </div>
                <div class="medida">
                  <p><?php echo get_post_meta($post->ID, $camposOferta[1], true); ?></p>
                </div>
                <div class="preco">
                  <p><span>R$</span> <?php echo get_post_meta($post->ID, $camposOferta[2], true); ?></p>
                </div>
              </div>
            </div>
          <?php endwhile; else: ?>
        <?php endif; ?>
      </div><!-- # Ofertas -->

      <div class="multimidia">
        <div class="jornal">
          <?php query_posts("order=DESC&posts_per_page=1&category_name=Jornal"); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <div
                class="issuuembed"
                data-configid="<?php echo get_post_meta($post->ID, $campoJornal[0], true); ?>"></div>
            <?php endwhile; else: ?>
          <?php endif; ?>
          
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