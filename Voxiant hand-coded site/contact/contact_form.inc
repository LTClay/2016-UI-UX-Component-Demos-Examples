<?php
/* File: contact_form.inc
* Desc: Displays login page. Page displays two forms:
* one form for entering an existing login name
* and password and another form for the
* information needed to apply for a new account.
*/
include("reasons.inc");
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	<div class="first">
		<div class="container">
			<div class="label">
				<p class="field">Your name:</p>
				<?php if(isset($err_name)){echo"<p class='error'>$err_name</p>";}?>				
			</div>
			
			<input id="name" type="text" value="<?php echo @$name ?>" name="name"/>
		</div>
		<div class="container">
			<div class="label">
				<p class="field">Your email address:</p>
				<?php if(isset($err_email)){echo"<p class='error'>$err_email</p>";}?>	
			</div>
			
			<input id="email" type="text" value="<?php echo @$email ?>" name="email"/>
		</div>
		<div class="container">
			<div class="label">
				<p class="field">Your phone number:</p>
				<?php if(isset($err_phone)){echo"<p class='error'>$err_phone</p>";}?>	
			</div>
			
			<input id="phone" type="text" value="<?php echo @$phone ?>" name="phone"/>
		</div>
		<div class="container">
			<div class="label">
				<p class="field">Reason for contacting:</p>
			</div>
			<select id="subject" name="subject">
				<?php
				$reasonName=getReasonName();
				$reasonValue=getReasonValue();
				for ($r=1;$r<=7;$r++)
				{
					$reasonN=$reasonName[$r];
					$reasonV=$reasonValue[$r];
					echo"<option value='$reasonV'>$reasonN</option>\n";					
				}
				?>				
			</select>
		</div>
	</div>
	<div class="second">
		<div class="container">
			<div class="label">
				<p class="field">Message:</p>
				<?php if(isset($err_message)){echo"<p class='error'>$err_message</p>";}?>	
			</div>
			
			<textarea id="message" cols="35" rows="7" name="message" ><?php echo @$message ?></textarea>
			<div class="subbmit_btn">
				<button  type="reset">Cancel</button>
				<button  type="submit" name="submit">Send</button>
				<input type="hidden" value="sent" name="do">
			</div>
		</div>
	</div>
</form>
