<?php 
  $mapas = array(
    "https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Av.+Presidente+Castelo+Branco,+1210+-+Jardim+Za%C3%ADra+-+Mau%C3%A1+-+SP&amp;aq=&amp;sll=-23.669657,-46.460487&amp;sspn=0.00211,0.00331&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=Av.+Pres.+Castelo+Branco,+1210+-+Jardim+Zaira,+Mau%C3%A1+-+S%C3%A3o+Paulo,+09321-375,+Rep%C3%BAblica+Federativa+do+Brasil&amp;z=15&amp;ll=-23.65458,-46.446651&amp;output=embed",
    "https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Av.+Presidente+Castelo+Branco,+1740+-+Jardim+Za%C3%ADra+-+Mau%C3%A1+-+SP.&amp;aq=&amp;sll=-23.65458,-46.446651&amp;sspn=0.008442,0.013239&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=Av.+Pres.+Castelo+Branco,+1740+-+Jardim+Zaira,+Mau%C3%A1+-+S%C3%A3o+Paulo,+09321-375,+Rep%C3%BAblica+Federativa+do+Brasil&amp;ll=-23.649792,-46.442556&amp;spn=0.023587,0.059996&amp;z=15&amp;iwloc=A&amp;output=embed",
    "https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Av.+Presidente+Castelo+Branco,+2415+-+Jardim+Za%C3%ADra+-+Mau%C3%A1+-+SP.&amp;aq=&amp;sll=-23.651758,-46.442503&amp;sspn=0.008442,0.013239&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=Av.+Pres.+Castelo+Branco,+2415+-+Jardim+Zaira,+Mau%C3%A1+-+S%C3%A3o+Paulo,+09321-375,+Rep%C3%BAblica+Federativa+do+Brasil&amp;ll=-23.64704,-46.438007&amp;spn=0.023587,0.059996&amp;z=15&amp;iwloc=A&amp;output=embed",
    "https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Rua+Eug%C3%AAnio+Negri,+31+-+Jardim+Za%C3%ADra+-+Mau%C3%A1+-+SP&amp;aq=&amp;sll=-23.647895,-46.437567&amp;sspn=0.008442,0.013239&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=Av.+Eug%C3%AAnio+Negri,+31+-+Jardim+Zaira,+Mau%C3%A1+-+S%C3%A3o+Paulo,+09321-190,+Rep%C3%BAblica+Federativa+do+Brasil&amp;ll=-23.646333,-46.424875&amp;spn=0.023587,0.059996&amp;z=15&amp;iwloc=A&amp;output=embed",
    "https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Rua+Jos%C3%A9+Moreira,+471+-+Jardim+Esperan%C3%A7a+-+Mau%C3%A1+-+SP.&amp;aq=&amp;sll=-23.64765,-46.426356&amp;sspn=0.008442,0.013239&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=Av.+Jos%C3%A9+Moreira,+471+-+Vila+Tavares,+Mau%C3%A1,+09341-120,+Rep%C3%BAblica+Federativa+do+Brasil&amp;ll=-23.676992,-46.41758&amp;spn=0.023582,0.060081&amp;z=15&amp;iwloc=A&amp;output=embed"
  );
?>

<div class="cabecalho-pagina <?php echo $post->post_name; ?>">
  <div class="titulo-pagina">
    <h1>Localização</h1>
  </div>
</div>

<div class="textual">
  <div class="cabecalho-textual">
    <h2>Endereços</h2>
  </div>

  <div class="texto">
    <div class="endereco">
      <span>
        <p>
          <span class="grande">Loja 1</span><br />
          Av. Presidente Castelo Branco, 1210 - Jardim Zaíra - Mauá - SP.<br />
          Fone <span class="pequeno">+55 11</span> 4516 2005
        </p>
      </span>

      <div class="mapa">
        <iframe src="<?php echo $mapas[0]; ?>"></iframe>
      </div>
    </div>

    <div class="endereco">
      <span>
        <p>
          <span class="grande">Loja 2</span><br />
          Av. Presidente Castelo Branco, 1740 - Jardim Zaíra - Mauá - SP.<br />
          Fone <span class="pequeno">+55 11</span> 4541 7181
        </p>
      </span>

      <div class="mapa">
        <iframe src="<?php echo $mapas[1]; ?>"></iframe>
      </div>
    </div>

    <div class="endereco">
      <span>
        <p>
          <span class="grande">Loja 3</span><br />
          Av. Presidente Castelo Branco, 2415 - Jardim Zaíra - Mauá - SP.<br />
          Fone <span class="pequeno">+55 11</span> 4545 8702 | 4545 8723
        </p>
      </span>

      <div class="mapa">
        <iframe src="<?php echo $mapas[2]; ?>"></iframe>
      </div>
    </div>

    <div class="endereco">
      <span>
        <p>
          <span class="grande">Loja 4</span><br />
          Rua Eugênio Negri, 31 - Jardim Zaíra - Mauá - SP.<br />
          Fone <span class="pequeno">+55 11</span> 4518 2625 | 4541 8386
        </p>
      </span>

      <div class="mapa">
        <iframe src="<?php echo $mapas[3]; ?>"></iframe>
      </div>
    </div>

    <div class="endereco">
      <span>
        <p>
          <span class="grande">Loja 5</span><br />
          Rua José Moreira, 471 - Jardim Esperança - Mauá - SP.<br />
          Fone <span class="pequeno">+55 11</span> 4576 1577 | 4576 5677
        </p>
      </span>

      <div class="mapa">
        <iframe src="<?php echo $mapas[4]; ?>"></iframe>
      </div>
    </div>
  </div>
</div>