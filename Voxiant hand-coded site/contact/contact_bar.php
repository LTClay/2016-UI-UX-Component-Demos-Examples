<!-- Start of StatCounter Code -->
<script type="text/javascript">
var sc_project=5253996; 
var sc_invisible=1; 
var sc_partition=59; 
var sc_click_stat=1; 
var sc_security="e414ca45"; 
</script>

<script type="text/javascript"
src="http://www.statcounter.com/counter/counter.js"></script><noscript><div
class="statcounter"><a title="blogspot visitor"
href="http://www.statcounter.com/blogger/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/5253996/0/e414ca45/1/"
alt="blogspot visitor" ></a></div></noscript>
<!-- End of StatCounter Code -->

<div id="contact_wrap">	
		<div id="the_contact" >
		<!--- contact form-->		
		<?php
		if(@$_POST['do'] == "sent")
		{
			echo"<style type='text/css'>
				#the_contact {display:block;}
			</style>";
		} else {
			echo"<style type='text/css'>
				#the_contact {display:none;}
			</style>";
		}
		?>
			<div id="cff_inside">
				<div id="cff_top">
					<p id="contact_34">Use this form to Contact us</p>
					<p id="contact_34b">(All fields are required!)</p>
				</div>
				<div id="cff_left">
					<p>You can also contact us through following methods. </p>
					<p class="email">lclay@leonardclay.com</p>
				  <p>(Leonard Clay) 317.789.5171<br />
				    (Lindsey Quarles) 317.289.0026
			    </p>
					<p>Indianapolis, IN</p>
					
				</div>
				<div id="cff_right">
					<!---Contact Form-->
					<?php
						include'contact/contact.php';
					?>
				</div>
			</div>
		</div>
	
</div>