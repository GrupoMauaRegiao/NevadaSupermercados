<div class="cabecalho-pagina <?php echo $post->post_name; ?>">
  <div class="titulo-pagina">
    <h1>Quem somos</h1>
    <h2><?php the_title(); ?></h2>
  </div>
</div>

<div class="formulario-upload">
  <div class="cabecalho-formulario-upload">
    <h1>Selecione o seu currículo</h1>
  </div>

  <div class="formulario">
    <form action="<?php bloginfo('template_url'); ?>/upload-curriculo.php" method="post" enctype="multipart/form-data">
      <div class="campo-upload">
        <input type="file" name="selecionar-curriculo" />
      </div>
    </form>
  </div>

  <div class="icones-opcoes">
    <div title="Arquivo no formato Microsoft Office Word (.docx ou .doc)" class="icone-docx"></div>
    <div title="Arquivo no formato PDF (.pdf)" class="icone-pdf"></div>
  </div>

  <div class="alertas">
  </div>
</div>