<?
$arquivo = "logup.php";
$texto = $_POST["texto"];

if(is_writable($arquivo)) {
$manipular = fopen("$arquivo", "w");

if(!$manipular) {
echo "Erro<br /><br />N�o foi poss�vel abrir o arquivo.";
}
if(!fwrite($manipular, $texto)) {
echo "Erro<br /><br />N�o foi poss�vel gravar as informa��es no arquivo.";
}
echo "O texto foi gravado com sucesso!";

fclose($manipular);
}
else {
echo "O $arquivo n�o tem permiss�es de leitura e/ou escrita.";
}
?>
