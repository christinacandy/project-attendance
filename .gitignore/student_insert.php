<?php
$conn=mysqli_connect("localhost","root","");

$db=mysqli_select_db($conn,"anits");
$rollno=$_POST["rn"];
$name=$_POST["n"];
$message=$_POST["c"];


$rn=mysqli_real_escape_string($conn,$rollno);

$n=mysqli_real_escape_string($conn,$name);

$c=mysqli_real_escape_string($conn,$message);




$sql=mysqli_query($conn,"insert into report(rollno,name,message) values ('$rn','$n','$c') ");
if(!$sql) {
print "query not executed";
} else {
print "Data Entered Sucessfully!";

}
?>
<!DOCTYPE html>
<html>
<style>
button {
    background-color: black;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 20%;
}
</style>
<body> 
<a href="home.html" target="blank"><button type="button">HOME</button></a></br>

</html>