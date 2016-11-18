<?php
 	 
    echo file_get_contents('test.txt');
 ?> 
 <meta charest="utf-8">
 <form action="next.php" method="post">
 	<input type="submit" name="sub1" value="同意"/>
 </form>
  <form action="index.php" method="post">
  	 	<input type="submit" name="sub2" value="不同意"/>
  	 </form>