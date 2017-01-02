<?php
/**
 * Created by PhpStorm.
 * User: 大禹哥
 * Date: 2016/11/17
 * Time: 19:03
 */
    if(isset($_POST['sub'])){
       // echo"132";
        $file=$_FILES['sfile'];
        $name=$file['name'];
        //echo"ok";
        $arr=array('exe','txt');
        $str=$file['name'];
        $a1=explode('.',$str);
//        echo "<pre>";
//        var_dump($a1);
//        echo "</pre>";
        $num=count($a1)-1;
        $hz=$a1[$num];
        for($i=0;$i<count($arr);$i++){
            $a2=true;
            if($hz==$arr[$i]){
                echo "<script>alert('后缀名不合理')</script>";
            }else{
                if($a2){
                    $wz=move_uploaded_file($file['tmp_name'],"./img/$name");
                    //$mm=move_uploaded_file($file['tmp_name'],"./img/$name");
                    var_dump($wz);
                }else{
                    echo "error";
                }
            }
            $a2=!$a2;
        }
    }

?>
<form action="01-test.php" method="post" enctype="multipart/form-data">
    <input type="file" name="sfile">
    <input type="submit" name="sub" value="上传">

</form>
<?php
echo "后缀:".$hz;
?>