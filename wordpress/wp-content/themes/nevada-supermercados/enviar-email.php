<?php
  if (PATH_SEPARATOR == ";") {
    $quebraLinha = "\r\n";
  } else {
    $quebraLinha = "\n";
  }

  $headers = "";
  $destino = "marckfree@gmail.com";
  $campoNome = $_GET["campo-nome"];
  $campoEmail = $_GET["campo-email"];
  $campoLoja = "Mensagem para a " . $_GET["campo-loja"];
  $campoMensagem = $_GET["campo-mensagem"];

  $mensagem = 
    "<p><b>Nome:</b> " . $campoNome . "</p>
     <p><b>E-mail:</b> " . $campoEmail . "</p>
     <p><b>Assunto:</b> " . $campoLoja . "</p>
     <p><b>Mensagem:</b><pre> " . $campoMensagem . "</pre></p>";

  $headers .= "MIME-Version: 1.1" . $quebraLinha;
  $headers .= "Content-type: text/html; charset=utf-8" . $quebraLinha;
  $headers .= "From: " . $campoEmail . $quebraLinha;

  if(!mail($destino, $campoLoja, $campoMensagem, $headers , "-r" . $destino)) {
    mail($destino, $campoLoja, $campoMensagem, $headers);
  }
?>