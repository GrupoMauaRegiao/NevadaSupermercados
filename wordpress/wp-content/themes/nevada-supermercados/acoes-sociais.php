<?php
  $camposAcoesSociais = array(
    "Imagem Ação Social"
  );
  
  function queryAgita($nPosts) {
    return query_posts("order=DESC&posts_per_page=$nPosts&category_name='agita'");
  }
  $agita = count(queryAgita(20));

  function queryDoacaoSangue($nPosts) {
    return query_posts("order=DESC&posts_per_page=$nPosts&category_name='campanha-de-doacao-de-sangue'");
  }
  $doacaoSangue = count(queryDoacaoSangue(20));

  function queryVacinacao($nPosts) {
    return query_posts("order=DESC&posts_per_page=$nPosts&category_name='campanha-de-vacinacao'");
  }
  $vacinacao = count(queryVacinacao(20));

  function queryGincanaSolidaria($nPosts) {
    return query_posts("order=DESC&posts_per_page=$nPosts&category_name='gincana-solidaria'");
  }
  $gincanaSolidaria = count(queryGincanaSolidaria(20));

  function queryExameVista($nPosts) {
    return query_posts("order=DESC&posts_per_page=$nPosts&category_name='exame-de-vista'");
  }
  $exameVista = count(queryExameVista(20));
?>

<div class="cabecalho-pagina <?php echo $post->post_name; ?>">
  <div class="titulo-pagina">
    <h1>Quem somos</h1>
    <h2><?php the_title(); ?></h2>
  </div>
</div>

<div class="textual">
  <div class="texto">
    <p>A rede Nevada de supermercados, em parceria com algumas empresas, visa sempre 
    buscar o melhor para você cliente! Em nossas lojas você pode encontrar alguns 
    projetos sócias, veja alguns deles:</p>
  </div>

  <div class="evento-social">
    <div class="cabecalho-textual-acoes-sociais">
      <h2>Agita – AE / Atitude Solidária</h2>
    </div>
    <div class="texto">
      <p>Um projeto voltado para a melhor idade! Com alongamentos, ginástica e passeios em parques. <i>"Visamos sempre deixar a terceira idade sair de sua rotina, criando novos hábitos e melhorando a sua saúde"</i>. Este projeto ocorre nas lojas 3 e 5. Entre em contato para saber maiores informações sobre os dias e horários.</p>
    </div>

    <?php if ($agita > 0): ?>
      <div class="apresentacao-slides">
        <div class="player">
          <div class="imagem-destacada">
            <?php queryAgita(1); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, $camposAcoesSociais[0], true); ?>&amp;w=735&amp;h=491" alt="" />
              <?php endwhile; else: ?>
            <?php endif; ?>
          </div>

          <div class="lista-imagem">
            <?php queryAgita(20); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, $camposAcoesSociais[0], true); ?>&amp;w=100&amp;h=080" alt="" />
              <?php endwhile; else: ?>
            <?php endif; ?>
          </div>

          <?php if ($agita > 1): ?>
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
  </div> <!-- Evento Social -->

  <div class="evento-social">
    <div class="cabecalho-textual-acoes-sociais">
      <h2>Campanha de Doação de Sangue</h2>
    </div>
    <div class="texto">
      <p>O Supermercado Nevada é o primeiro comércio do ABC junto ao Hemocentro São Lucas, a criar uma campanha de doação de sangue, <i>"sabemos da importância da doação de sangue para o nosso país; o banco de sangue esta escasso, e está parceria irá ajudar a todos!"</i>. Seja você também um amigo doador, ligue em nosso supermercado (3) e saiba maiores informações! DOE SANGUE, DOE VIDA! (Em média a cada doação, são salvas 4 vidas).</p>
    </div>

    <?php if ($doacaoSangue > 0): ?>
      <div class="apresentacao-slides">
        <div class="player">
          <div class="imagem-destacada">
            <?php queryDoacaoSangue(1); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, $camposAcoesSociais[0], true); ?>&amp;w=735&amp;h=491" alt="" />
              <?php endwhile; else: ?>
            <?php endif; ?>
          </div>

          <div class="lista-imagem">
            <?php queryDoacaoSangue(20); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, $camposAcoesSociais[0], true); ?>&amp;w=100&amp;h=080" alt="" />
              <?php endwhile; else: ?>
            <?php endif; ?>
          </div>

          <?php if ($doacaoSangue > 1): ?>
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
  </div> <!-- Evento Social -->

  <div class="evento-social">
    <div class="cabecalho-textual-acoes-sociais">
      <h2>Campanha de Vacinação</h2>
    </div>
    <div class="texto">
      <p>O Supermercado Nevada já é considerado um "ponto" de vacinação. Junto ao Governo do Estado, todas as campanhas realizadas para a gripe e poliomielite são feitas também em nossa loja (3), o nome da Rede Nevada vincula-se sempre nos documentos oficias de todo o nosso país, como um polo oficial de campanhas.</p>
    </div>

    <?php if ($vacinacao > 0): ?>
      <div class="apresentacao-slides">
        <div class="player">
          <div class="imagem-destacada">
            <?php queryVacinacao(1); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, $camposAcoesSociais[0], true); ?>&amp;w=735&amp;h=491" alt="" />
              <?php endwhile; else: ?>
            <?php endif; ?>
          </div>

          <div class="lista-imagem">
            <?php queryVacinacao(20); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, $camposAcoesSociais[0], true); ?>&amp;w=100&amp;h=080" alt="" />
              <?php endwhile; else: ?>
            <?php endif; ?>
          </div>

          <?php if ($vacinacao > 1): ?>
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
  </div> <!-- Evento Social -->

  <div class="evento-social">
    <div class="cabecalho-textual-acoes-sociais">
      <h2>Gincana Solidária / Atitude Solidária</h2>
    </div>
    <div class="texto">
      <p>A preocupação com a população vai além de estar em nossos supermercados. Pensando assim, criamos as gincanas internas, que visam arrecadar para a população alimentos e roupas para o inverno, criando equipes em um disputa saudável, promovendo a união de nossas lojas!</p>
    </div>

    <?php if ($gincanaSolidaria > 0): ?>
      <div class="apresentacao-slides">
        <div class="player">
          <div class="imagem-destacada">
            <?php queryGincanaSolidaria(1); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, $camposAcoesSociais[0], true); ?>&amp;w=735&amp;h=491" alt="" />
              <?php endwhile; else: ?>
            <?php endif; ?>
          </div>

          <div class="lista-imagem">
            <?php queryGincanaSolidaria(20); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, $camposAcoesSociais[0], true); ?>&amp;w=100&amp;h=080" alt="" />
              <?php endwhile; else: ?>
            <?php endif; ?>
          </div>

          <?php if ($gincanaSolidaria > 1): ?>
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
  </div> <!-- Evento Social -->

  <div class="evento-social">
    <div class="cabecalho-textual-acoes-sociais">
      <h2>Exame de Vista</h2>
    </div>
    <div class="texto">
      <p>Atualmente uma da principais preocupações é a visão, algo indispensável para todos, pensando assim o supermercado Nevada (5) oferece exames de vista durante o ano para toda a população, fique atento em nosso site, ou ligue em nossa loja(5) para maiores informações!</p>
    </div>

    <?php if ($exameVista > 0): ?>
      <div class="apresentacao-slides">
        <div class="player">
          <div class="imagem-destacada">
            <?php queryExameVista(1); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, $camposAcoesSociais[0], true); ?>&amp;w=735&amp;h=491" alt="" />
              <?php endwhile; else: ?>
            <?php endif; ?>
          </div>

          <div class="lista-imagem">
            <?php queryExameVista(20); ?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, $camposAcoesSociais[0], true); ?>&amp;w=100&amp;h=080" alt="" />
              <?php endwhile; else: ?>
            <?php endif; ?>
          </div>

          <?php if ($exameVista > 1): ?>
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
  </div> <!-- Evento Social -->
</div>