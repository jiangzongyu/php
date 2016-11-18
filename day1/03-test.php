<?php
	 if(isset($_GET['sub'])){
	 	 $num1=$_GET['num1'];
		 $num2=$_GET['num2'];
		 $ysf=$_GET['ysf'];
		 $sum=null;
		 $message="";
		if(is_numeric($num1)&&is_numeric($num2)){
				 if($num2==0&&($ysf=="/"||$ysf=="%")){
			 	$message="第二个数不能为0";
			 }else{
			 	switch ($ysf) {
					 case '+':
					 	$sum=$num1+$num2;
					 break;
					 case '-':
					 	$sum=$num1-$num2;
					 break;
					 case '*':
					 	$sum=$num1*$num2;
					 break;
					 case '/':
						 $sum=$num1/$num2;
					 break;
					 case '%':
						 $sum=$num1%$num2;
					 break;
				 }
			}
		 }else{
		 	$message="必须输入数字";
		 }
	 }
	 
?>
<meta charset="UTF-8" >
<table width="500" align="center" border="1">
	<caption><h1>计算器</h1></caption>
<form action="03-test.php" method="get"  >
	<tr>
		<td>
			<input type="text" name="num1" value=<?php echo $num1?>> 
		</td>
		<td>
			<select name="ysf">
				<option value="+" <?php if($_GET['ysf']=='+'){echo 'selected';} ?>>+</option>
				<option value="-" <?php if($_GET['ysf']=='-'){echo 'selected';} ?>>-</option>
				<option value="*" <?php if($_GET['ysf']=='*'){echo 'selected';} ?>>x</option>
				<option value="/" <?php if($_GET['ysf']=='/'){echo 'selected';} ?>>/</option>
				<option value="%" <?php if($_GET['ysf']=='%'){echo 'selected';} ?>>%</option>
			</select>
		</td>	
		<td>
	 		<input type="text" name="num2" value=<?php echo $num2?>>
	 	</td> 	 
		<td>
			<input type="submit" name="sub" value="计算"><br/>
		</td>	
	 </tr>
	 <?php 
	 	if(isset($_GET['sub'])){
	 		echo "<tr>";
			echo "<td colspan='4'>";
			if(is_null($sum)){
				echo $message;
			}else{
				echo "结果为：".$num1.$ysf.$num2."=".$sum;
			}
			echo "</td>";
			echo "</tr>";
	 	}
	  ?>
</form>
</table>
 