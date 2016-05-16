<html>
<head>
<title>teste</title>
</head>
<body>

<form name="form1" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
  <input type="text" name="texto">
  <input type="submit" value="Enviar!">
</form>

<?
$str = $_POST['texto'];

//$first = $str{0};
//$last = $str{strlen($str)-1};
//echo $_POST['texto']{0};
//echo $_POST['texto']{strlen($str)-1};

if (($_POST['texto']{0} != '/') or ($_POST['texto']{strlen($str)-1} != '/')){
 echo "erro";}else{
 echo "certo";}

?>

</body>
</html>