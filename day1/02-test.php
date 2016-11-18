<?php 
	echo"================第一种九九乘法表================";
	echo "<table width='1000' align='center' border='1'>";
		for($i=1;$i<=9;$i++){
			echo "<tr>";
			for($j=1;$j<=$i;$j++){
				echo "<td>";
				echo $j." * ".$i." = ".($i*$j)."&nbsp;";
				echo "</td>";
			}
			
			echo "</tr>";
		}
	echo "</table>";
	echo"================第二种九九乘法表================";
	echo "<table width='1000' align='center' border='1'>";
		for($i=9;$i>=1;$i--){
			echo "<tr>";
			for($j=1;$j<=$i;$j++){
				echo "<td>";
				echo $j." * ".$i." = ".($i*$j)."&nbsp;";
				echo "</td>";
			}
			
			echo "</tr>";
		}
	echo "</table>";
		echo"================第三种九九乘法表================";
	echo "<table width='1000' align='center' border='1'>";
			for($i=9;$i>=1;$i--){
			echo "<tr>";
				for($t=0;$t<9-$i;$t++){
					echo"<td>";
					echo"</td>";
				}
			for($j=1;$j<=$i;$j++){
				echo "<td>";		 
					echo $i." * ".$j." = ".($i*$j)."&nbsp";
				echo "</td>";
			}
			
			echo "</tr>";
		}
	echo "</table>";
		echo"================第四种九九乘法表================";
	echo "<table width='1000' align='center' border='1'>";
		for($i=1;$i<=9;$i++){
			echo "<tr>";
			for($t=8;$t>=$i;$t--){//加空格，
					echo"<td>";
					echo"</td>";
				}
			for($j=1;$j<=$i;$j++){
				echo "<td>";
				echo $i." * ".$j." = ".($i*$j)."&nbsp;";
				echo "</td>";
			}
			
			echo "</tr>";
		}
	echo "</table>";
 ?>

 
 