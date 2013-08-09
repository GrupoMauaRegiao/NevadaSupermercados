<?php
  $nomeArquivo = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);

  if ($nomeArquivo) {
    file_put_contents('uploads/' . $nomeArquivo, file_get_contents('php://input'));
    exit();
  } else {
    $arquivo = $_FILES['selecionar-curriculo'];
    foreach ($arquivo['error'] as $id => $err) {
      if ($err == UPLOAD_ERR_OK) {
        $nomeArquivo = $arquivo['name'][$id];
        move_uploaded_file($arquivo['tmp_name'][$id], 'uploads/' . $nomeArquivo);
      }
    }
  }
?>