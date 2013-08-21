<?php 
  $camposOferta = array(
    "Imagem OFERTA",
    "Preço OFERTA"
  );
?>

<div class="cabecalho-pagina <?php echo $post->post_name; ?>">
  <div class="titulo-pagina">
    <h1>Ofertas</h1>
    <h2><?php the_title(); ?></h2>
  </div>
</div>

<div class="display-promocoes">
  <div class="container-display">
    <div class="cabecalho-promocoes">
      <h3>Qualidade<br /> Nevada</h3>
    </div>
    <div class="estrelas">
      <img src="<?php bloginfo('template_url'); ?>/imagens/estrelas.png" alt="" />
    </div>
  </div>
</div>

<div class="todas-ofertas">
  <?php query_posts("order=DESC&posts_per_page=16&category_name=Oferta"); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="oferta">
        <div class="imagem-produto">
          <img src="<?php echo get_post_meta($post->ID, $camposOferta[0], true); ?>" alt="" />
        </div>
        <div class="informacao">
          <div class="nome-produto">
            <p title="<?php the_title(); ?>"><?php the_title(); ?></p>
          </div>
          <div class="preco">
            <p><span>R$</span> <?php echo get_post_meta($post->ID, $camposOferta[1], true); ?></p>
          </div>
        </div>
      </div>
    <?php endwhile; else: ?>
  <?php endif; ?>
</div><!-- # Ofertas -->