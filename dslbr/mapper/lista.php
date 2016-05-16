<?php

  $dir = './dslrep/';  
  $ler = opendir($dir);


  while (false !== ($file = readdir($ler))) {
      if($file != '..' && $file !='.' && $file !=''){            
            $v = $dir.$file.'/chave.key';          
            $v1= base64_encode($v);
            echo "<a href='?texa=$v1'>" . $file . "</a><br>";
         }
  }

  
  $v2 = base64_decode($_GET['texa']); 
  $arquivo = file($v2);
echo "<form method='POST' nctype='multipart/form-data'>";
echo "<br><textarea name='texto' rows='20' cols='90'>";
foreach($arquivo as $texto) {
echo $texto;
}
echo "</textarea><br>";
echo "</form>";

?>


