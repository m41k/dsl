<html>
 <head>
  <title>DSL-BR (Beta)</title>
 </head>
  <body>

 <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td height="100%" width="45%">

    <table width="100%" height="100%" cellspacing="1" cellpadding="1" border="1">
     <tr>
      <td valign="top" bgcolor="#8FBC8F">

<?php

 $erro = 'DSL-BR';

if( isset( $_POST['enviar'] ) ) {

 $caminho = getcwd();
 $dslrep = '/dslrep/';
 $pasta = $_POST['versao'].'/';
 $caminho1 = $caminho.$dslrep.$pasta;
 $erro = '';
 $pathToSave = $caminho1;
 $safe=$_FILES['arquivo']['name'].'.dslbr';    
 $arquivoTmp = $_FILES['arquivo']['tmp_name'];
 $arquivo = $pathToSave.$safe;
 $xave = $caminho1.'/chave.key';
 $pat = $_POST['caminho'].$safe."\n";
 $cxave = file($xave);

    // A variavel $_FILES ? uma vari?vel do PHP, e ? ela a respons?vel
    // por tratar arquivos que sejam enviados em um formul?rio

//Verifica se todos campos estao preenchidos
 if( ($_FILES['arquivo']['name'] == NULL) or ($_POST['versao'] == NULL) or ($_POST['caminho'] == NULL) or ($_POST['mail'] == NULL) or ($_POST['nome'] == NULL)){
  $erro = "Preencha todos os campos";
 }else{ 

//Verifica se arquivo esta no key

  $cont = count($cxave);
  for ($i=0; $i<=$cont; $i++){
   if (eregi($pat, $cxave[$i])){
    $erro = "Arquivo ja existe, verificar ao lado";
    $existe = "1";
   }
  }

if ( $existe != "1" ){

   if(!file_exists($caminho1)){
    mkdir ($caminho1, 0777);
   }

//Salvando no arquivo key 
   $a = fopen ($xave, 'a+');
        fwrite($a, $pat);
        fclose($a);

//Escrevendo arquivo LOG
   $data=date("d/m/Y");
   $b = fopen ('logup.php', 'a+');
        fwrite($b,'* '.$data.' - '. $_POST['nome'].' enviou '.$_FILES['arquivo']['name'].' da versao '.$_POST['versao'].' contato '.$_POST['mail']."<br>"."\n");
        fclose($b);
   $erro = 'Dados enviados';

        // Copia o arquivo para o sistema
   if( !move_uploaded_file( $arquivoTmp, $arquivo ) ) {
    $erro = 'Erro no upload. Entre em contato com o administrador';
   }
  }
 }
}
echo $erro;
?>

</td>
</tr>
<tr>
<td>


<form method='POST' enctype='multipart/form-data'>
    <font size=1><u>Dados DSL</u></font> 
    <br>
    <br>
    Versao do DSL: 
    <br> <input type='text' name='versao'>
    <br>
    Arquivo: 
    <br> <input type='file' name='arquivo'> 
    <br>
    Caminho: 
    <br> <input type='text' name='caminho'>
    <br>
    <br>
    <font size=1><u>Dados Pessoais</u></font> 
    <br>
    <br>
    E-mail: 
    <br> <input type='text' name='mail'>
    <br>
    Nome: 
    <br> <input type='text' name='nome'>
    <br>
    <br>
    <input type='submit' value='Enviar' name='enviar'>
</form>
</tr>
</td>
</table> 

   </td>

<td height="100%" width="10%"><center><img src='../img/setas.gif'></center></td>

<td height="100%" width="45%">

<table width="100%" height="100%" cellspacing="1" cellpadding="1" border="1">
<tr>
<td valign="top" align="right" bgcolor="#8FBC8F">

<?php

  $dir = './dslrep/';  
  $ler = opendir($dir);

echo "<select name='select' size=1 onChange='getStates(this);'>";
echo "<option value=''>Versao</option>";

  while (false !== ($file = readdir($ler))) {
      if($file != '..' && $file !='.' && $file !='' && $file !='del.php'){            
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
//  $arquivo2 = file($v2);

 if ( (eregi("key", $v2)) and (file_exists($v2)) ) {  
   $arquivo2 = file($v2);
  } else {
  $arquivo2[] = "";
  }


echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
//echo "<form method='POST' nctype='multipart/form-data'>";
echo "<br><textarea name='texto' rows='20' cols='50' style='background-color: #FFFFFF; color: #000000; border: none;'>";
foreach($arquivo2 as $texto) {
echo $texto;
}
echo "</textarea><br>";
//echo "</form>";

?>
</td>
</tr>
</table> 




</td>
   
  </tr>

  <tr>
   <td></td>
   <td></td>
   <td align="right">
<table>
 <tr>
  <td align="center"><a href="http://www.powerline.com.br/~maik/dsl/"><img src="../img/home.gif" border="0"></a></td>
  <td align="center"><a href="http://www.powerline.com.br/~maik/dsl/help/"><img src="../img/help.gif" border="0"></a></td>
  <td align="center"><a href="http://www.powerline.com.br/~maik/dsl/mapper/"><img src="../img/mapper.gif" border="0"></a></td>
  <td align="center"><a href="http://www.powerline.com.br/~maik/dsl/script/"><img src="../img/term.gif" border="0"></a></td>
 </tr>
 <tr> 
  
  <td align="center"><font size=1><a href="http://www.powerline.com.br/~maik/dsl/">Home</a></font></td>
  <td align="center"><font size=1><a href="http://www.powerline.com.br/~maik/dsl/help/">Ajuda</a></font></td>
  <td align="center"><font size=1><a href="http://www.powerline.com.br/~maik/dsl/mapper/">Mapper</a></font></td>
  <td align="center"><font size=1><a href="http://www.powerline.com.br/~maik/dsl/script/">Script</a></font></td>
  
 </tr> 
 </table>

   </td>
  </tr>


 </table>
</body>
</html> 
