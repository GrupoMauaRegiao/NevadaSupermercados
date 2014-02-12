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

  $campoVideo = array(
    "Link YOUTUBE"
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
              <div class="issuuembed">
                <?php echo get_post_meta($post -> ID, $campoJornal[0], true); ?>
              </div>
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
            <?php query_posts("order=DESC&posts_per_page=1&category_name=Video"); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <iframe
                  class="youtube"
                  src="<?php echo get_post_meta($post->ID, $campoVideo[0], true); ?>">
                </iframe>
              <?php endwhile; else: ?>
            <?php endif; ?>
          </div>
        </div>
      </div> <!-- # Multimídia -->

      <div class="sombra-topo"></div>

      <div class="campanhas">
        <div class="campanha1">
          <div class="mais-informacoes">
            <p>Com frutas, verduras e legumes de ótima qualidade para você!</p>
            <p>Nas compras acima de R$ 20,00 você ganha um brinde de nosso 
            hortifruti, venha conferir!</p>
          </div>
          <div class="aba"></div>
        </div>
        
        <div class="campanha2">
          <div class="mais-informacoes">
            <p>Ofertas arrasadoras do nosso setor de açougue!</p>
          </div>
          <div class="aba"></div>
        </div>

        <div class="campanha3">
          <div class="mais-informacoes">
            <p>Os melhores e mais deliciosos produtos de nossa padaria,
            com um preço pra lá de imperdível!</p>
          </div>
          <div class="aba"></div>
        </div>
      </div>
      
      <a href="<?php bloginfo('url'); ?>/produtos-e-servicos/cartao-da-loja">
        <div class="display-cartao">
          <div class="cartao"></div>
          <div class="lista-de-vantagens">
            <ul>
              <li>Crédito aprovado na hora <span>(sujeito a análise)</span> </li>
              <li>Tem até 40 dias para pagar</li>
              <li>Limite é liberado na hora</li>
              <li>Parcelamos em até 3x sem juros</li>
              <li>Sem taxa de adesão</li>
              <li>Sem anuidade</li>
            </ul>
          </div>
        </div>
      </a>
<?php get_footer(); ?>