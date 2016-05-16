<?php

//criptgrafia comeca aqui

    $vstr = "texto";
    $numc = strlen($vstr);

  for($i = 0; $i < $numc; $i++){
    $astr[] = ord($vstr[$i]);
  }
  foreach ($astr as $pstr){
  echo $pstr . "<br>";
  }
print_r($astr);
$bcstr = base64_encode($pstr);     
echo $bcstr . "<br>";


//decriptografia comeca aqui
   $bdstr = base64_decode($bcstr);
echo $bdstr  . "<br>";    
echo $pstr  . "<br>";
 

?>