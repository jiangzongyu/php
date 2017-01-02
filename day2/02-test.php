<?php
if(isset($_POST['sub'])){
    $num=$_POST['num'];
    $array  = array( '02-11备忘录：外地出差'  =>  '02-11' ,  '03-22备忘录：同学聚餐'  =>  '03-22' );
    //var_dump($array);
    //echo $array[1];
    if($num=='02-11'){
        //echo "<script>alert('02-11备忘录：同学聚餐');</script>";
        echo $num=array_search ( $num,  $array );
    }else if($num=='03-22'){
        //echo "<script>alert('03-22备忘录：外地出差');</script>";
        echo $num=array_search ($num ,  $array );
    }else if($num!='02-11'||$num!='03-22'){
        //echo "<script>alert('无备忘录');</script>";
         echo "无备忘录";
    }


}

?>
<meta charset="utf-8">
<form action="02-test.php" method="post" align="center">
    <caption><h3>单击查询当前日程</h3></caption>
    <input type="text" name="num" value=""><br/><br/>
    <input type="submit" name="sub" value="查询">
    <input type="reset" name="res" value="重置">
</form>
