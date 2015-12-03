<?php
session_start();

if(isset($_POST['submit']) && ($_POST['submit'] != ""))
{
    if(($_POST["email"] != ""))
	{
		$message_body='<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fitness To GO</title>
</head>

<body>
<table ali align="center" style="border-collapse:collapse; width:600px; font-family:Arial, Helvetica, sans-serif;">
	<tr>
		<td style="background:#441050; height:2px;"></td>
	</tr>
	<tr>
		<td style="background: none #EEEEEE; text-align:center; padding:10px;border-bottom:5px solid;"><img src="http://project-demo-server.info/fitness-to-go/images/logo.png" alt="Fitness To Go"/></td>
	</tr>
	<tr>
		<td style="background:#441050; height:2px;"></td>
	</tr>
	<tr>
		<td style="background:#fff;">
			<table style="border-collapse:collapse; width:96%; float:left; margin:2%">
				<tr>
					<td style="font-size:18px; font-weight:bold; color:#333333;">Hello Admin,</td>
				</tr>
                <tr>
					<td style="padding:10px 0; color:#666666; font-size:14px;">
						There is one free consultation request with below details 
					</td>
				</tr>
				<tr>
					<td>
						<table style="width:100%; margin:10px 0; font-size:14px; color:#666666;">
                                                        <tr>
								<td style="border:none; padding:5px; font-size:14px;">Email</td>
								<td style="border:none; padding:5px; font-size:14px;">'.$_POST["email"].'</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="background:#441050; height:2px;"></td>
	</tr>
</table>
</body>
</html>'; 

		$from = $_POST["email"];
		$to = "rhonda@rjfitnesstogo.com";
		$subject = "Fitness to Go Free Consultation Enquiry";
		$message = $message_body;
		$headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=UTF-8\r\n";
                $headers .= "From:" . $from;
	
               
		if(mail($to,$subject,$message,$headers))
		{
			$_SESSION['success'] = "Thanks for contacting us. We will contact you as soon as possible.";
		}
		else
		{
			$_SESSION['error'] = "Sorry Your mail has not been sent. Please try again later.";
		}
	}
	else
	{
		$_SESSION['error'] = "Please fill all required fields properly and try again.";
	}
}
else
{
	$_SESSION['error'] = "Please submit the form properly and try again.";
}
	header('Location: index.php');
	exit;
?>