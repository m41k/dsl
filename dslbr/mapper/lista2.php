<html>
 <head>
  <title>DSL-BR</title>
 </head>
  <body>

 <table width="100%" height="100%" border="0" cellspacing="0" 

cellpadding="0">
  <tr>
   <td height="10%" width="20%"></td>
   <td height="10%" width="80%"></td>
  </tr>  
   <td height="90%" width="20%" valign="top">
<b>Versoes</b>
<br><br>
<?php
  
  $dir = getcwd()."/dslrep/";  
  $ler = opendir($dir);


  while (false !== ($file = readdir($ler))) {
      if($file != '..' && $file !='.' && $file !=''){            
            $v = $dir.$file.'/chave.key';          
            $v1= base64_encode($v);
//            $v1 = $dir.$file.'/chave.key';  
            echo "<a href='?texa=$v1'>" . $file . "</a><br>";
         }
  }

?>

</td>
   <td height="90%" width="80%" align="center" valign="top">
<b>Selecione ao lado a versao e verfique quais arquivos estao traduzidos</b>
<br><br>
<?php

    $v2 = base64_decode($_GET['texa']); 
//  $v2 = $_GET['texa'];
//  $arquivo = file($v2);

 if ( (eregi("key", $v2)) and (file_exists($v2)) ) {  
   $arquivo = file($v2);
  } else {
  $arquivo[] = "Selecione a versao";
  }



echo "<form method='POST' nctype='multipart/form-data'>";
echo "<textarea name='texto' rows='25' cols='70'>";
foreach($arquivo as $texto) {
echo $texto;
}
echo "</textarea>";
echo "</form>";

unset($v2);

?>

</td>
<td>
 </table>
</body>
</html> 
