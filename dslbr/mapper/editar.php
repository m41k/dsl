<?
$arquivo = "logup.php";
$arquivo = file("$arquivo");

echo "<form action=\"gravar.php\" id=\"form\" name=\"form\" method=\"post\">";
echo "Digite o texto:<br /><textarea name=\"texto\" rows=\"20\" cols=\"90\">";
foreach($arquivo as $texto) {
echo "$texto";
}
echo "</textarea><br />";
echo "<input type=\"submit\" value=\"Enviar\">";
echo "</form>";
?>