<?php
	echo "<table width='500' align='center' border='1'>";
	echo "<caption>隔行换色</caption>";
		for($i=0;$i<100;$i++){
			if($i%2==0){
				$color="red";
			}else{
				$color="green";
			}
			echo "<tr onmouseover=lrow(this) onmouseout=drow(this) bgColor=".$color.">";
			for($j=0;$j<10;$j++){
				echo "<td>".$j."</td>"; 
			}
			echo "</tr>";
		}
	echo "</table>"
?>
<script>
	var ys=null;
	function lrow(obj){
		ys=obj.bgColor;
		obj.bgColor="yellow";
	}
	function drow (obj) {
		obj.bgColor=ys;
	  
	}
</script>