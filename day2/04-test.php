
<meta charset="utf-8">
<form action="04-test.php" method="post">
    <caption>请输入新闻的标题和内容</caption><br><br>
    标题<input type="text" name="text1"><br><br>
    内容<input type="text" name="text2"><br><br>
    日期<input type="text" name="text3"><br><br>
    <input type="submit" name="sub" value="提交">&nbsp;
    <input type="reset" value="重置">
</form>
<?php
/**
 * Created by PhpStorm.
 * User: 大禹哥
 * Date: 2017/1/1
 * Time: 20:39
 */
if(isset($_POST['sub'])){
    $text1=$_POST['text1'];
    $text2=$_POST['text2'];
    $text3=$_POST['text3'];
//    echo $text1;
//    echo $text2;
//    echo $text3;
//    $array[]=4;
    $array=array($text1,$text2,$text3);
//    echo $array;
//    var_dump($array);
    //$array = array('text1','text2','text3');
    $comma_separated  =  implode ( "," ,  $array );
    echo "转换字符的结果：";
//    foreach($array as $key => $value){
//        echo $value;
//    }
    echo $comma_separated;
//    var_dump($comma_separated);
}
?>