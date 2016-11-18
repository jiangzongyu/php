<?php
	echo "<table width='500' align='right' border='1'>";
	echo "<caption>隔行换色</caption>";
	if(isset($_POST['sub'])){
		$num1 = $_POST['num1'];
		$num2 = $_POST['num2'];
	}
		for($i=0;$i<$num1;$i++){
			if($i%2==0){
				$color="red";
			}else{
				$color="green";
			}
			echo "<tr bgColor=".$color.">";
			for($j=0;$j<$num2;$j++){
				echo "<td>".$i."</td>";
			}
			echo "</tr>";
		}
	echo "</table>"
?>
<meta charest="utf-8">
<form action="06-test.php" method="post">
输入行：<input type="text" name="num1" value=""><br/><br/>
输入列：<input type="text" name="num2" value=""><br/><br/>
<input type="submit" name="sub" value="生成表格">
<input type="reset"  value="重置行列">
</form>