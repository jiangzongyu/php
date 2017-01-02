<?php
while($connt<7){
    $a[]=rand(1,100);//产生随机数
    $ary=array_unique($a);
    $connt=count($ary);
}
$info=array(
    "第一注"=>array(
        $array=array_unique($a),
    ),
    "第二注"=>array(
        $array=array_unique($a),
    ),
    "第三注"=>array(
        $array=array_unique($a),
    ),
    "第四注"=>array(
        $array=array_unique($a),
    ),
    "第五注"=>array(
        $array=array_unique($a),
    )
);

foreach($info as $tablename=>$table){
    echo "<h6>".$tablename."</h6>";
    foreach($table as $row){
        echo "<br>";
        echo "<tr>";

      if(is_array($row)){
          foreach($row as $col){
              echo "<td>";

              echo $col.",";

              echo "</td>";
          }
      }

        echo "</tr>";
    }

    echo "</table>";
}



?>