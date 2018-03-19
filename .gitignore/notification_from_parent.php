<?php
$conn=mysqli_connect("localhost","root","");

$db=mysqli_select_db($conn,"anits");

$result = mysqli_query($conn,"select * from notify");
print " 
<table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\" id=\"AutoNumber2\" bgcolor=\"#C0C0C0\"><tr> 
<td width=10>rollno</td> 
<td width=10>name</td> 
<td width=10>message</td>  
 

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
<a href="insert.html" target="blank"><button type="button">back</button></a></br>

</html>
