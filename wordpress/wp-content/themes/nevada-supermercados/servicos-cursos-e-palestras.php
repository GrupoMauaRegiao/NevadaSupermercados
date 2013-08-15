<?php
  $campoCursosPalestras = array(
    "Slides Cursos e Palestras"
  );

  function queryCursosPalestras($nPosts) {
    return query_posts("order=DESC&posts_per_page=$nPosts&category_name='slide-cursos-e-palestras'");
  }
  $cursosPalestras = count(queryCursosPalestras(20));
?>

<div class="cabecalho-pagina <?php echo $post->post_name; ?>">
  <div class="titulo-pagina">
    <h1>Produtos e Serviços</h1>
    <h2><?php the_title(); ?></h2>
  </div>
</div>

<div class="textual">
  <div class="cabecalho-textual">
    <h2>Serviços</h2>
  </div>
  <div class="texto servicos">
    <p>Para melhor atende-los e com um maior conforto em nossas lojas,
    todas são equipadas com o Banco 24 Horas e também em algumas lojas da rede
    temos o *PontoCerto (Carregamento do cartão BOM e Sodexo Refeição) e
    Banco Bradesco (BDN)**<br />
    <span>*Exceto na Loja 3 e 5<br />
    ** Apenas Loja 5</span></p>
  </div>

  <div class="imagem">
    <img src="<?php bloginfo('template_url'); ?>/imagens/banco-24h.jpg" alt="" />
  </div>

  <div class="sombra-servicos">
    
  </div>

  <div class="cabecalho-textual">
    <h2>Cursos e Palestras</h2>
  </div>

  <div class="texto">
    <p>A Rede Nevada está além de oferecer produtos e serviços, oferecemos
    oportunidades visando sempre o bem estar de nosso cliente e uma maior
    qualificação, tanto pessoal, como profissional. A loja 3 de nossa
    rede mensalmente oferece cursos gratuitos para você: cursos motivacionais,
    educacionais, artesanais, educação financeira, liderança, maquiagem,
    alimentação saudável e muito mais. Fique atento em nosso site para mais
    informações ou ligue em nossa loja 3.</p>
  </div>

  <?php if ($cursosPalestras > 0): ?>
    <div class="apresentacao-cursos-palestras apresentacao-slides">
      <div class="player">
        <div class="imagem-destacada">
          <?php queryCursosPalestras(1); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, $campoCursosPalestras[0], true); ?>&amp;w=735&amp;h=491" alt="" />
            <?php endwhile; else: ?>
          <?php endif; ?>
        </div>

        <div class="lista-imagem">
          <?php queryCursosPalestras(20); ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, $campoCursosPalestras[0], true); ?>&amp;w=100&amp;h=080" alt="" />
            <?php endwhile; else: ?>
          <?php endif; ?>
        </div>

        <?php if ($cursosPalestras > 1): ?>
          <div class="controles">
            <div class="voltar">
              <a href="#">&laquo;</a>
            </div>
            <div class="avancar">
              <a href="#">&raquo;</a>
            </div>
          </div>
        <?php endif ?>

      </div>
    </div> <!-- Apresentação de Slides -->
  <?php endif ?>
</div>