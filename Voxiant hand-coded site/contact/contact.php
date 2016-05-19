<?php
switch (@$_POST['do'])
{
	case "sent":		
		foreach($_POST as $field=>$value)
		{
			if($field != "submit")
			{
				if($value == "")
				{
					$blanks[]=$field;					
				}
			}
		}
		/*If fields left blank*/
		if(isset($blanks))
		{	
			foreach($blanks as $value)
			{			
				if($value =="name")
				{$err_name ="Required";}
				if($value =="email")
				{$err_email ="Required";}
				if($value =="message")
				{$err_message ="Required";}
				if($value =="phone")
				{$err_phone ="Required";}
				
			}	
		
		}
		if(@sizeof($blanks)>0){						
			extract($_POST);
			include("contact_form.inc");			
			unset($blanks);
			
		}
		else {
			/*Filled data*/
			foreach($_POST as $field=>$value)
			{
				if(!empty($value))
				{
					if(eregi("email",$field))
					{
						if(!ereg("^.+@.+\..+$",$value))
						{
							$errors[]="$value";
						}
					}
				}
				
			}//Bad email address
			if(@is_array($errors))
			{
				$err_email="Invalid email";
				extract($_POST);
				include("contact_form.inc");			
				unset($blanks);
				unset($errors);
			}
			else{
			
			/*Good email and filled data*/
			/*Check for phone number*/
			foreach($_POST as $field=>$value)
			{
				if(!empty($value))
				{
					if(eregi("phone",$field))
					{
						if(!ereg("^([0-9]{10}|[0-9]{3}\-[0-9]{3}\-[0-9]{4}|[0-9]{3}\.[0-9]{3}\.[0-9]{4})$",$value))
						{
							$errors2[]="$value";
						}
					}
				}
				
			}//Bad email address
			if(@is_array($errors2))
			{
				$err_phone="Invalid phone number";
				extract($_POST);
				include("contact_form.inc");			
				unset($blanks);
				unset($errors);
				unset($errors2);
			}
			else{
			
				$from = $_POST["name"];
				$email = $_POST["email"];
				$subject = $_POST["subject"];
				$message = $_POST["message"];
				$phone =$_POST["phone"];
				
				$full_message = "Mesasge from voxiantsolutions.com contact form" . "\n" .
				"Sender's IP address: " . $_SERVER['REMOTE_ADDR'] . "\n" . 
				"Sender's browser: " . $_SERVER['HTTP_USER_AGENT'] . "\n" .
				"-----------------------------------------------------------" . "\n" .
				"Name: " . $from . "\n" . 
				"Reply-to email: " . $email . 
				"\n"."Phone Number: ".$phone.
				"\n"."Subject: ".$subject.
				"\n"."Message: " . $message;
				$mesejo= $full_message;
				$subjecto ="Message from Voxiant Website";
				
				//Confirmation email
				$subjCF="We got your message!";
				$sendermessage = "Hello there! ". "\n\n"."Thank you for contacting Voxiant Solutions (www.voxiantsolutions.com)"."\n".
				"This is an automated mail delivery confirmation message."."\n\n"."Your message: "."\n".
				"=========================================================================="."\n".
				$message. "\n".
				"=========================================================================="."\n".
				"\n\n"."Has been successfully sent to us."."\n".
				"Please allow us 1-2 business days to get back to you and we are excited and looking forward to talking with you soon."."\n\n".
				"Best Regards,"."\n"."Client Services"."\n"."Voxiant Solutions"."\n"."Indianapolis, IN"."\n"."www.voxiantsolutions.com"."\n"."lclay@leonardclay.com";
				$msgCF = $sendermessage;
				$headers = 'From: lclay@leonardclay.com' . "\r\n".'Reply-to: lclay@leonardclay.com'."\r\n".'X-Mailer: PHP/'. phpversion();

				mail("lclay@leonardclay.com",$subjecto, $mesejo, "From: $email");
				mail($email,$subjCF, $msgCF, $headers);
				echo "<p class='msg_sent'>Message Sent!</p>
					<p class='msg_sent_sub'>Thank you $from for contacting Voxiant Solutions.</p>
					<p class='msg_sent_sub'>You should receive a confirmation message stating that
					we have received your message, within next few minutes. If not, You can write us 
					a email to be sure that we got your message!</p>
					<p class='msg_sent_sub'>In any case we will get back to you as soon as possible. Cheers!</p>";
				
				}
			}
		}		
		
		
	break;
	
	default:
	include ("contact_form.inc");
	
}


?>
