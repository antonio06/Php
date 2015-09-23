<?php
$pesetas=$_POST['pesetas'];

echo $pesetas . " pesetas son " . round(($pesetas*1)/166.386, 3) . " euros";
?>

