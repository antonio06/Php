<?php
$baseImponible=$_POST['baseImponible'];

echo "-----FACTURA-----<br>";
echo "Base Imponible " . $baseImponible . " €" . "<br>";
echo "IVA del 21% " . ($baseImponible*21)/100 . " €" . "<br>";
echo "Total de la factura " . ((($baseImponible*21)/100 )+$baseImponible) . " €";
?>