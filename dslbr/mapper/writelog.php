<?php
$ad = chr(34);//"
$as = chr(39);//'
$ci = chr(36);//$
$texto =
"<?"."\n".
"session_start();"."\n".
"if (".$ci."_SESSION[".$as."validacao".$as."] == ".$ad."1".$ad.")"."\n".
"{"."\n".
"}"."\n".
"else"."\n".
"{"."\n".
"header(".$ad."Location: form.php".$ad.");"."\n".
"}"."\n".
"?>"
;

$c = fopen ('logup.php', 'a+');
     fwrite($c, $texto);
     fclose($c);
?>