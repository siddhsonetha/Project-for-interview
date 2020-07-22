<?php
$arr1 = array(6, 8, 'php', 2.45, 3.56);

$arr2 = array(8, 2.45, 'php', 3.56, 6);

sort($arr1);
sort($arr2);

if($arr1==$arr2)
{
    echo "Both Are Same";
}
else{
    echo "Both Are Not Same";
}
echo "<br><br>";

$clength = count($arr1);
for($x = 0; $x < $clength; $x++) {
    echo $arr1[$x];
    echo "<br>";
}
echo "<br><br>";


$clength = count($arr2);

for($x = 0; $x < $clength; $x++) {
    echo $arr2[$x];
    echo "<br>";
}



?>
