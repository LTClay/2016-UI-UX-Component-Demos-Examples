<?php

?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">					
			<table id='rsvpForm'><tr>
				<td>Your Full Name:*
				<?php 
					if(isset($erName)){
					echo "<p class='error'>$erName</p>";
				}?>
				<br>
				<input id='in34'type='text' name='gName'value="<?php echo @$gName ?>"/></td>
			</tr><tr>
				<td>Email Address:*
				<?php if(isset ($erEmail)){echo "<p class='error'>$erEmail</p>";}?><br>
				<input id='in34'type='text' name='gEmail'value="<?php echo @$gEmail ?>"/></td>
			</tr><tr>
				<td>Phone Number:<br>
				<input id='in34'type='text' name='gPhone'value="<?php echo @$gPhone ?>"/></td>
			</tr><tr>
				<td>Number of people attending (including you):*
				<?php if(isset ($erPPL)){echo "<p class='error'>$erPPL</p>";}?><br>
				<input id='in34'type='text' name='noPPL'value="<?php echo @$noPPL ?>"/></td>
			</tr><tr>
				<td>What is your business Status*:
					<?php if(isset ($er_buStatus)){echo "<p class='error'>$er_buStatus</p>";}?><br>				
					<input type='radio' name='buStatus'onclick='buSS()' id='sel1'value='bS1'>I own a business<br>
					<input type='radio' name='buStatus'onclick='buSS()' id='sel2'value='bS2'>I am planning on starting a business<br>
					<input type='radio' name='buStatus'onclick='buSS()' id='sel3'value='bS3'>I represents a startup business<br>
					<input type='radio' name='buStatus'onclick='buSS()' id='sel4'value='bS4'>None of the above<br>
				</td>
			</tr>
			<script type = 'text/javascript'>
				function buSS() {
				if ((document.getElementById('sel1').checked)|| 
					(document.getElementById('sel2').checked)||
					(document.getElementById('sel3').checked)){
				document.getElementById('busOwn').style.display='';
				}else {
				document.getElementById('busOwn').style.display='none';
				}
				if ((document.getElementById('sel4').checked)){
				document.getElementById('Bnone').style.display='';
				}else {
				document.getElementById('Bnone').style.display='none';
				}}
				</script>
			<tr id='Bnone' style='display:none;'>
				<td>
					Then what would you say your current business status*:
					<?php if(isset ($er_busCsta)){echo "<p class='error'>$er_busCsta</p>";}?><br>
					<input id='in34'type='text' name='busCsta'value="<?php echo @$busCsta ?>"/>
				</td>
			</tr>
			<tr id='busOwn' style='display:none;'>
				<td>Please tell us more about your business<br>
				Your business name*:
				<?php if(isset ($er_busName)){echo "<p class='error'>$er_busName</p>";}?><br>
				<input id='in34'type='text' name='busName'value="<?php echo @$busName ?>"/><br>
			
				Industry of your business:<br>
				<input id='in34'type='text' name='busInd'value="<?php echo @$busInd ?>"/><br>
				Your busines website*:
				<?php if(isset ($er_busWeb)){echo "<p class='error'>$er_busWeb</p>";}?><br>
				<input id='in34'type='text' name='busWeb'value="<?php echo @$busWeb ?>"/></td>
			</tr><tr>
				<td>Would your business be interested in these services*:
				<?php if(isset ($er_services)){echo "<p class='error'>$er_services</p>";}?><br>
				<input type='checkbox' name='sevWeb' value='web'/>Website Designing<br>
					<input type='checkbox' name='sevBrand' value='brandID'/>Brand Identity Creation<br>
					<input type='checkbox' name='sevPrint' value='print'/>Print (Graphic) Design<br>
					<input type='checkbox' name='sevBizC' value='bizCard'/>Business Card Design<br>
					<input type='checkbox' name='sevNone' value='none'/>Don't think so<br></td>
			</tr><tr>	
				<td><button name='rsvp' value='submit'>Request invitation for the event</button><br>
				<p class='r47'>* Required fields</p></td>
			</tr>
			</table>
		</form>
