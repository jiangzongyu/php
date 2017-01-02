<?php
    /**
     * Created by PhpStorm.
     * User: 大禹哥
     * Date: 2016/12/31
     * Time: 21:33
     */
    //$num = 5;//要产生多少个随机数;
    //$start = 0; //其实数,可以多位
    //$end = 9;//产生随机数的范围,可以多位
    //$connt = 0;
    while($connt<5){
        $a[]=rand(0,9);//产生随机数
        $ary=array_unique($a);
        $connt=count($ary);
    }
    echo "随机数：";
    foreach ($ary as $key => $value){
        echo "&nbsp;".$value;
    }
?>

