<?php
  $campoSlideNossasLojas = array(
    "Imagem Slide Nossas Lojas"
  );
?>


<div class="cabecalho-pagina <?php echo $post->post_name; ?>">
  <div class="titulo-pagina">
    <h1>Quem somos</h1>
    <h2><?php the_title(); ?></h2>
  </div>
</div>

<div class="textual">
  <div class="cabecalho-textual">
    <h2>História</h2>
  </div>

  <div class="texto">
    <p>Eles trabalhavam na lavoura em sua cidade natal. Sem estudo ou profissão,
     decidiram vir para São Paulo trabalhar no comércio e encontraram a 
     oportunidade de montar um supermercado.</p>

    <p>Assim começa a história da família dos irmãos Domingos da Silva, que 
    deixaram sua cidade natal, no interior do Paraná, para tentarem uma vida 
    melhor. João, um dos irmãos, veio primeiro para 'sondar o terreno', e 
    encontrou muitas oportunidades. Logo que conseguiu um emprego na indústria, 
    chamou o irmão José.</p>

    <p>Com ideia fixa, não queriam saber de outra coisa, e em 1980 compraram um 
    mercadinho chamado Nevada. "Era uma loja pequena, tinha apenas 
    100 m<sup>2</sup>  e dois funcionários. Não era nem aqui na avenida, 
    era lá em cima", lembra José, apontando para a rua lateral da loja atual.</p>

    <p>Naquela época já havia concorrência com grandes redes, mas para se 
    destacar os irmãos sempre usaram a criatividade. "Conforme fomos crescendo e
     conquistando clientes, procuramos oferecer o máximo de praticidade. 
     Incluímos setores como padaria, espaço para frios fatiados na hora, 
     açougue, além do setor de hortifruti sempre com produtos fresquinhos e de 
     boa procedência", explica.</p>

    <p>Preço justo e qualidade nos produtos deram destaque ao espaço de compras 
    localizado em um dos bairros mais populosos da cidade, o Jardim Zaíra. "A 
    conquista da preferência do cliente é uma briga diária, a todo o tempo 
    estamos pensando sobre o que podemos melhorar para manter nossos clientes e 
    conquistar novos", informa o filho de um dos sócios da Rede Nevada e 
    responsável pelo marketing da empresa, Michael Fialho da Silva.</p>

    <p>Apostar em atendimento humanizado e que conforte o cliente no momento da 
    compra também foi a saída encontrada pelos irmãos em busca de diferencial. 
    Sob o lema 'Somos do bairro. Você conhece', a empresa cresceu e se 
    consolidou, mostrando que com suor, iniciativa e muito esforço é possível 
    crescer, mesmo em território com forte concorrência e repleto 
    de adversidades.</p>

    <p>Os momentos de aflição por conta das oscilações do mercado não 
    intimidaram os irmãos, que se dedicavam em tempo integral ao negócio. 
    "Nossa maior dificuldade era com a segurança. No início éramos assaltados 
    quase todos os dias. Hoje contamos com uma estrutura de segurança mais 
    adequada ao porte da loja, mas foi um tempo difícil", lembra José.</p>

    <p>Após alguns anos, o restante da família também veio para Mauá, e juntos 
    compraram o mercado Esperança. Alguns anos depois adquiriram o mercado 
    Zaíra. "Trabalhamos todos juntos, cada irmão cuida de uma loja. 
    Assim nos desenvolvemos, como uma grande família", diz.</p>

    <p>Hoje, após 32 anos, estão com cinco lojas. Para fortalecer ainda mais a 
    marca, agora todas as lojas formam o Grupo Nevada de Supermercados, 
    uma empresa sólida que emprega diretamente mais de 450 pessoas.</p>
  </div>

  <div class="imagem">
    <div class="proprietarios">
      <img src="<?php echo get_template_directory_uri(); ?>/imagens/proprietarios.jpg" alt="" />
    </div>
  </div>

  <div class="cabecalho-textual">
    <h2>As Lojas</h2>
  </div>

  <div class="apresentacao-slides">
    <div class="player">
      <div class="imagem-destacada">
        <?php query_posts("order=DESC&posts_per_page=1&category_name='Slide Nossas Lojas'"); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, $campoSlideNossasLojas[0], true); ?>&amp;w=735&amp;h=491" alt="" />
          <?php endwhile; else: ?>
        <?php endif; ?>
      </div>

      <div class="lista-imagem">
        <?php query_posts("order=DESC&posts_per_page=20&category_name='Slide Nossas Lojas'"); ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo get_post_meta($post->ID, $campoSlideNossasLojas[0], true); ?>&amp;w=150&amp;h=100" alt="" />
          <?php endwhile; else: ?>
        <?php endif; ?>
      </div>
    </div>
  </div> <!-- Apresentação de Slides -->

</div>