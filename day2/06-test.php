<?php
date_default_timezone_set ( 'Asia/beijing' );
$info=array(
    "软件版本："=>array(
        array("软件版本：",$_SERVER [ 'SERVER_SOFTWARE' ]),
    ),
    "端口："=>array(
        array("端口：",$_SERVER [ 'SERVER_PORT' ]),
    ),
    "服务名："=>array(
        array("服务名：",$_SERVER [ 'SERVER_NAME' ]),
    ),
    "文档路径："=>array(
        array("文档路径：",$_SERVER [ 'DOCUMENT_ROOT' ]),
    ),
    "文件路径："=>array(
        array("文件路径：",$_SERVER [ 'SCRIPT_FILENAME' ]),
    ),
    "运行时间："=>array(
        array("运行时间：",date("Y-m-d h:i:s")),
    )
);
echo "<table align='center' width='500' border='1'>";
foreach($info as $tablename=>$table){
    //echo "<h6>".$tablename."</h6>";
    echo "<br>";
    foreach($table as $row){
       // echo "<br>";
        echo "<tr>";
        if(is_array($row)){
            foreach($row as $col){
                echo "<td>";
                echo $col;
                echo "</td>";
            }
        }
        echo "</tr>";
    }
}
 echo "</table>";
?>