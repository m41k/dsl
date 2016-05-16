<?php

  $dir = './dslrep/';  
  $ler = opendir($dir);

echo "<select name='select' size=1 onChange='getStates(this);'>";
echo "<option value=''>Selecione a versao do DSL para verificar arquivos traduzidos</option>";
echo "<option value=''></option>";

  while (false !== ($file = readdir($ler))) {
      if($file != '..' && $file !='.' && $file !=''){            
            $v = $dir.$file.'/chave.key';          
            $v1= base64_encode($v);

echo "<option value='?texa=$v1'>" . $file . "</option>";

//echo "<a href='?texa=$v1'>" . $file . "</a><br>";
         }
  }
echo "</select>";              


echo " <Script Language='JavaScript'>";
echo " function getStates(what) {";
echo "   if (what.selectedIndex != '') {";
echo "      var vjs = what.value;";
echo "      document.location=(vjs);";
echo "   }";
echo "}";
echo "</Script>";



  $v2 = base64_decode($_GET['texa']); 

 // $v2 = $_GET['texa']; 
//  $arquivo = file($v2);

 if ( (eregi("key", $v2)) and (file_exists($v2)) ) {  
   $arquivo = file($v2);
  } else {
  $arquivo[] = "";
  }

echo "<form method='POST' nctype='multipart/form-data'>";
echo "<br><textarea name='texto' rows='20' cols='50'>";
foreach($arquivo as $texto) {
echo $texto;
}
echo "</textarea><br>";
echo "</form>";

?>




