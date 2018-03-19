<?php
$conn=mysqli_connect("localhost","root","");

$db=mysqli_select_db($conn,"gits");
$a=$_POST["ID"];
$user=mysqli_real_escape_string($conn,$a);
$result = mysqli_query($conn,"select rollno,name,attendence from attendence where rollno='$user'");
//fetch tha data from the database
print " 
<table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"#C0C0C0\"><tr> 
<td width=10>roll</td> 
<td width=10>name</td> 
<td width=10>attendence</td> 

</tr>"; 

while($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
{ 
print "<tr>"; 
print "<td>" . $row[0] . "</td>"; 
print "<td>" . $row[1] . "</td>"; 
print "<td>" . $row[2] . "</td>"; 
print "</tr>"; 
} 
print "</table>"; 

?>
<!DOCTYPE html>
<html>
<body> 
<a href="index.html" target="blank"><button type="button">HOME</button></a></br>

</html>
