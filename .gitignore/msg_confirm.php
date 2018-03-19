﻿<?php 
$con=mysqli_connect("localhost","root","","project");
if(mysqli_connect_error())
{
echo "failed";
}
	if(isset($_POST["submit"]))
	{
		//echo "submitted";
		//$mno = $_POST["mno"];
		//$message =  $_POST["message"];

		$ch = curl_init();
				$user="prasannakanigiri15@gmail.com:Kspmbd@2468";
		$sql="select mobile from student where id=1";
	
		if($result=mysqli_query($con,$sql))
		{
			if($result->num_rows>0)
			{
					curl_setopt($ch,CURLOPT_URL,"http://api.mVaayoo.com/mvaayooapi/MessageCompose");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_POST, 1);
		
				while($row=mysqli_fetch_assoc($result))
				{
					
					$no=$row["mobile"];
					$senderID="TEST SMS"; 
					$msgtxt= "Your child was absent today "; 
					
					curl_setopt($ch, CURLOPT_POSTFIELDS,"user=$user&senderID=$senderID&receipientno=$no&msgtxt=$msgtxt");
					$buffer = curl_exec($ch);
					if(empty ($buffer))
					{
						 echo " buffer is empty ";
			 		}
					else
					{ 
						echo $buffer;
						echo 'Message Send.';
					} 
					
				}
			}
		}curl_close($ch);
		
	}
?>
 
<html>
	
	<body align="center">
	
		<form action="" method="post">
			 
			 
		</form>
		
		<?php 
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,  "http://api.mvaayoo.com/mvaayooapi/APIUtil");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "user=prasannakanigiri15@gmail.com:Kspmbd@2468&type=0");
			//$buffer = curl_exec($ch);
			//echo $buffer;
			curl_close($ch);
		?>
 
		
	</body>
</html>