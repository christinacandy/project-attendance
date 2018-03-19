 <!doctype html>
<html>
<head>
<h1>SMS Sending Using PHP and Mvaayoo API</h1>
<meta charset="utf-8">
<title>Show MySQL DB Data</title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
 
<table class="table table-bordered">
 <thead>
 <tr>
 <th>ID</th>
 <th>Name</th>
 <th>Year</th>
 <th>Mobile Number</th>
 </tr>
 </thead>
 <tbody>
 <tr>

 <?php
 $con=mysqli_connect("localhost","root","","project");
if(mysqli_connect_error())
{
echo "failed";
}
 
 $result = mysqli_query($con,"SELECT * FROM student");
 
 while($test = mysqli_fetch_array($result))
 {
 $id = $test['id']; 
 echo"<td>".$test['id']."</td>";
 echo"<td>".$test['name']."</td>";
 echo"<td>".$test['year']."</td>";
 echo"<td>".$test['mobile']."</td>"; 
 echo "</tr>";
 }
 mysqli_close($con);
 ?>
</table>

<body align="center">
	
		<form action="msg_confirm.php" method="post">
			 
			  <br>
			  <input type="submit"  name="submit" value="Send SMS"/>
		</form>
</div>
</body>
</html>