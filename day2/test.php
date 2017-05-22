<?php
$info=array(
    $a=array(1,2,3,4),
    $arr = array('2012 Macbook Pro','2009 iMac','2011 Macbook Air','2007 iPad1'),
);
sort($a);
sort ( $arr );
//rsort($arr);
echo "<table>";
foreach ( $a as  $key  =>  $value) {
    echo $value;
    echo "<br>";
}

echo "</table>";
?>