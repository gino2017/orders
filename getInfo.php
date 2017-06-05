<style>
   th,td{ border-bottom:2px dotted aqua; text-align:center;}
</style>
<?php
   error_reporting(0);
   echo '<pre>';
   print_r($_POST);
   echo '</pre>';
   echo '<hr>';
   
   if(!empty($_POST['sbm'])){
      
	  $name = (trim($_POST['name'])!='') ? addslashes(trim($_POST['name'])) : '';
	  $age = (trim($_POST['age'])!='') ? addslashes(trim($_POST['age'])) : '';
	  $sex = $_POST['sex'];
	  
      $con = mysqli_connect('localhost','huwei','123456','huwei') or die('connect error');
	   mysqli_query($con,$sql);
	   $sql = " insert into info values(null, '$name', $age, '$sex', 0) ";
	   //echo $sql;exit;
	   mysqli_query($con,$sql) or die('insert query error');
	   
	   
	   
	   }
	   
	$sql = " select * from info where flag=0 ";
	$res = mysqli_query($con,$sql) or die('select query error');
	echo "<table><tr><th>id</th><th>name</th><th>age</th><th>sex</th><th>flag</th></tr>";
	if($res->num_rows>0){
	  while($row = mysqli_fetch_assoc($res)){
		 echo "<tr><td>".implode('</td><td>',$row)."</td></tr>";
	  }
	}
	echo "</table>";
   
?>

