<?php
  if (PATH_SEPARATOR == ";") {
    $quebraLinha = "\r\n";
  } else {
    $quebraLinha = "\n";
  }

  $nomeArquivo = (isset($_SERVER["HTTP_AJAXUPLOAD"]) ? $_SERVER["HTTP_AJAXUPLOAD"] : false);
  $nomeArquivo = ereg_replace("[^a-zA-Z0-9_]", ".", strtr($nomeArquivo, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC-"));

  if ($nomeArquivo) {
    file_put_contents("uploads/" . $nomeArquivo, file_get_contents("php://input"));

    $destino = "curriculo@nevadasupermercados.com.br";
    $url = "http://nevadasupermercados.com.br";
    $diretorio = $url . "/wp-content/themes/nevada-supermercados1/uploads/" . $nomeArquivo;
    $corpoMensagem = "Um currículo foi recebido e poderá ser visualizado utilizando o link:<br /> <a href='$diretorio'>$nomeArquivo</a>";
    $mensagem = "<p>" . $corpoMensagem . "</p>";
    $assunto = "Currículo recebido pelo site";

    $headers .= "MIME-Version: 1.1" . $quebraLinha;
    $headers .= "Content-type: text/html; charset=utf-8" . $quebraLinha;
    $headers .= "From: " . $destino . $quebraLinha;

    if(!mail($destino, $assunto, $mensagem, $headers , "-r" . $destino)) {
      mail($destino, $assunto, $mensagem, $headers);
    }
    exit();
  }
?>