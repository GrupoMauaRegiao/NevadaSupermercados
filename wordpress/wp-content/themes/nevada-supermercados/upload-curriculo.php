<?php
  $nomeArquivo = (isset($_SERVER["HTTP_AJAXUPLOAD"]) ? $_SERVER["HTTP_AJAXUPLOAD"] : false);

  if ($nomeArquivo) {
    file_put_contents("uploads/" . $nomeArquivo, file_get_contents("php://input"));
    exit();
  }
?>