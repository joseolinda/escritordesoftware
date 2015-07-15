<?php

$string = "123456543er  trtyttyf--=#$%$#@@fkldlsmdflkms.php";
$pattern =array('/-/', '/=/', '/@/', '/$/', '/ /');

$novaString = preg_replace($pattern, '', $string);
echo $novaString.'<br><hr>';

$string = "String com numeros 123456789 .e símbolos !@#$%¨&*()_+";
$nova_string = preg_replace("/[^a-zA-Z\s]/", "", $string);
echo $nova_string;

?>