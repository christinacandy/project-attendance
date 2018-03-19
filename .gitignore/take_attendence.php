<?php
  if(isset($_POST['sign']))
  {
	 $link = mysqli_connect("localhost", "root", "", "anits");
         $harika=$_POST["Hari"];
         $pravarsha=$_POST["prava"];
         $prasanna=$_POST["prasu"];
         $christina=$_POST["candy"];
         $mounika=$_POST["mouni"];
         $ravali=$_POST["ravali"];
	 $sql="INSERT INTO stu(harika,pravarsha,prasanna,christina,mounika,ravali) VALUES('$harika','$pravarsha','$prasanna','$christina','$mounika','$ravali')";
	 if(mysqli_query($link, $sql))
		  echo "Records inserted succesfully";
		  else
		       "Records not inserted";
   }
?>

            