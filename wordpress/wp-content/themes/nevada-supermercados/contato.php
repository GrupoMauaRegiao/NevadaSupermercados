<div class="cabecalho-pagina <?php echo $post->post_name; ?>">
  <div class="titulo-pagina">
    <h1>Contato</h1>
  </div>
</div>

<div class="formulario-contato">
  <div class="formulario">
    <form action="<?php bloginfo('template_url'); ?>/enviar-email.php" method="get" enctype="multipart/form-data">
      <div class="campo-nome">
        <label for="campo-nome">Nome</label><br />
        <input type="text" name="campo-nome" id="campo-nome" maxlength="50" />
      </div>

      <div class="campo-email">
        <label for="campo-email">E-mail</label><br />
        <input type="text" name="campo-email" id="campo-email" maxlength="50" />
      </div>

      <div class="campo-loja">
        <label for="campo-loja">Loja/Destino</label><br />
        <select name="campo-loja" id="campo-loja">
          <option value="default" selected>Selecione o destino da mensagem</option>
          <option value="loja-01">Loja 1</option>
          <option value="loja-02">Loja 2</option>
          <option value="loja-03">Loja 3</option>
          <option value="loja-04">Loja 4</option>
          <option value="loja-05">Loja 5</option>
        </select>
      </div>

      <div class="campo-mensagem">
        <label for="campo-mensagem">Mensagem</label><br />
        <textarea name="campo-mensagem" id="campo-mensagem"></textarea>
      </div>

      <div class="botao-enviar">
        <input type="button" value="Enviar" id="botao-enviar" />
      </div>

    </form>

    <div class="mensagem-sucesso">
      <p>Sua mensagem foi enviada para nós com sucesso!</p>
    </div>

  </div>

  <div class="enderecos">
    <div class="endereco">
      <span>
        <p>
          <span class="grande">Loja 1</span><br />
          Av. Presidente Castelo Branco, 1210<br /> Jardim Zaíra - Mauá - SP.<br />
          Fone <span class="pequeno">+55 11</span> 4516 2005
        </p>
      </span>
    </div>

    <div class="endereco">
      <span>
        <p>
          <span class="grande">Loja 2</span><br />
          Av. Presidente Castelo Branco, 1740<br /> Jardim Zaíra - Mauá - SP.<br />
          Fone <span class="pequeno">+55 11</span> 4541 7181
        </p>
      </span>
    </div>

    <div class="endereco">
      <span>
        <p>
          <span class="grande">Loja 3</span><br />
          Av. Presidente Castelo Branco, 2415<br /> Jardim Zaíra - Mauá - SP.<br />
          Fone <span class="pequeno">+55 11</span> 4545 8702 | 4545 8723
        </p>
      </span>
    </div>

    <div class="endereco">
      <span>
        <p>
          <span class="grande">Loja 4</span><br />
          Rua Eugênio Negri, 31<br /> Jardim Zaíra - Mauá - SP.<br />
          Fone <span class="pequeno">+55 11</span> 4518 2625 | 4541 8386
        </p>
      </span>
    </div>

    <div class="endereco">
      <span>
        <p>
          <span class="grande">Loja 5</span><br />
          Rua José Moreira, 471<br /> Jardim Esperança - Mauá - SP.<br />
          Fone <span class="pequeno">+55 11</span> 4576 1577 | 4578 4187
        </p>
      </span>
    </div>
  </div>
