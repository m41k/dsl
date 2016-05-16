<?
$arquivo = "logup.php";
$texto = $_POST["texto"];

if(is_writable($arquivo)) {
$manipular = fopen("$arquivo", "w");

if(!$manipular) {
echo "Erro<br /><br />Não foi possível abrir o arquivo.";
}
if(!fwrite($manipular, $texto)) {
echo "Erro<br /><br />Não foi possível gravar as informações no arquivo.";
}
echo "O texto foi gravado com sucesso!";

fclose($manipular);
}
else {
echo "O $arquivo não tem permissões de leitura e/ou escrita.";
}
?>
