<?php
  $campoJornal = array(
    "Link ISSUU"
  );
?>

<div class="cabecalho-pagina <?php echo $post->post_name; ?>">
  <div class="titulo-pagina">
    <h1>Ofertas</h1>
    <h2><?php the_title(); ?></h2>
  </div>
</div>

<div class="textual">
  <div class="cabecalho-textual">
    <h2>Jornal de Ofertas</h2>
  </div>

  <div class="jornal">
    <?php query_posts("order=DESC&posts_per_page=1&category_name=Jornal"); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div
          class="issuuembed"
          data-configid="<?php echo get_post_meta($post->ID, $campoJornal[0], true); ?>">
        </div>
      <?php endwhile; else: ?>
    <?php endif; ?>
  </div>
  <div class="sombra-imagem"></div>
</div>