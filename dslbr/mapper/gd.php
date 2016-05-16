<?php
// mais uma vez, mantendo a sessão aberta
session_start();

// função do gd, para criar uma imagem, com o tamanho definido
// largura, altura
$imagem = imagecreate(50, 15);

// função que define a cor de fundo da imagem gerada pelo gd
// em meu caso, amarelo
$fundo = imagecolorallocate($imagem, 152, 251, 152);

// função que define a cor da fonte, em meu caso, preto.
$fonte = imagecolorallocate($imagem, 0, 0, 0);

// desenhando a imagem, baseada nos padrões informados acima
// verificando a sessão aberta, para informar ao formulário o que foi digitado
imagestring($imagem, 4, 0, 0, $_SESSION['autenticagd'], $fonte);

// header, necessário
header("Content-type: image/png");

// formato da imagem, no meu caso utilizei PNG.
// vc pode usar imagejpeg, imagegif, etc. Veja as referências no manual do php
imagepng($imagem);
?>