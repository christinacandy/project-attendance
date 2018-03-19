<?php
$a=$_POST["adminid"];
$b=$_POST["password"];
$conn=mysqli_connect("localhost","root","");

$user=mysqli_real_escape_string($conn,$a);
$pass=mysqli_real_escape_string($conn,$b);
$db=mysqli_select_db($conn,"anits");
$check=mysqli_query($conn,"select count(*) from login a where a.adminid='$user' and a.password='$pass' ");
$row=mysqli_fetch_row($check);
if($row[0]==1) {
header('location:teacher.html');
} else {
print "not verified";
}
?>
