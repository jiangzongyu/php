<?php 
	if(isset($_POST['sub'])){
		$num = $_POST['num'];
		//var_dump($num);
		if(80<=$num&&$num<=100){
			  echo"<script>alert('优秀')</script>";
		}else if(60<=$num&&$num<80){
			 echo"<script>alert('及格')</script>";
		}else if($num < 60&&$num>0){
			echo"<script>alert('不及格')</script>";
		}else if($num == 0){
			echo"<script>alert('提交的分数不能为空')</script>";
		}else{
			echo"<script>alert('输入不合法')</script>";
		}		 
	}
 ?>
<meta charest="utf-8"><form action="05-test.php" method="post">
	输入分数查询 <input type="text" name="num" value ="">
  <input type="submit" name="sub" value="提交查询"> 
  <input type="reset"  value="重置分数"> 
</form>