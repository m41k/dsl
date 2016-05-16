<html>
<body>
<select name="select" size=1 onChange="getStates(this);">
<option value="">selecione</option>
<option value="TESTE 1"> Teste 1 </option>
<option value="TESTE 2"> Teste 2 </option>
<option value="TESTE 3"> Teste 3 </option>
<option value="TESTE 4"> Teste 4 </option>
<option value="TESTE 5"> Teste 5 </option>
</select>
</body>
</html>
<Script Language="JavaScript">
function getStates(what) {
   if (what.selectedIndex != '') {
      var estado = what.value;
      document.location=('exemplo.php?estado=' + estado);
   }
}
</Script>
<?php

$estado=$_GET['estado'];
echo $estado;
?>
