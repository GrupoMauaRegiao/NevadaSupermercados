<?php
  if (PATH_SEPARATOR == ";") {
    $quebraLinha = "\r\n";
  } else {
    $quebraLinha = "\n";
  }

  $campoLoja = $_GET["campo-loja"];

  if ($campoLoja == "Loja 1") {
    $destino = "loja1@nevadasupermercados.com.br";
  } elseif ($campoLoja == "Loja 2") {
    $destino = "loja2@nevadasupermercados.com.br";
  } elseif ($campoLoja == "Loja 3") {
    $destino = "loja3@nevadasupermercados.com.br";
  } elseif ($campoLoja == "Loja 4") {
    $destino = "loja4@nevadasupermercados.com.br";
  } elseif ($campoLoja == "Loja 5") {
    $destino = "loja5@nevadasupermercados.com.br";
  }

  $assunto = "Mensagem do site para a " . $campoLoja;
  $campoEmail = $_GET["campo-email"];
  $campoNome = $_GET["campo-nome"];
  $campoMensagem = "<pre>" . $_GET["campo-mensagem"] . "</pre>";

  $headers = "";
  $headers .= "MIME-Version: 1.1" . $quebraLinha;
  $headers .= "Content-type: text/html; charset=utf-8" . $quebraLinha;
  $headers .= "From: " . $campoEmail . $quebraLinha;

  if(!mail($destino, $assunto, $campoMensagem, $headers , "-r" . $destino)) {
    mail($destino, $assunto, $campoMensagem, $headers);
  }
?>