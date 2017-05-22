<?php
/**
 * Created by PhpStorm.
 * User: 大禹哥
 * Date: 2017/1/2
 * Time: 20:19
     */
    $arr = array('2012 Macbook Pro','2009 iMac','2011 Macbook Air','2007 iPad1');
    if(isset($_POST['sub1'])){
        $sub1 = $_POST['sub1'];
        sort($arr);
        foreach ( $a as  $key  =>  $value) {
            echo $value;
            echo "<br>";
        }
    }
    if(isset($_POST['sub2'])) {
        rsort($arr);
        foreach ($a as $key => $value) {
            echo $value;
            echo "<br>";
        }
    }

?>
<form action="07-test.php" method="post">
    <input type="submit" name="sub1" value="正序">
    <input type="reset" name="sub2" value="反序">
</form>