<?php
	require_once("commonCode.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="IMG/IconLogo.png">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/commonCode.css">
	<link rel="stylesheet" type="text/css" href="CSS/contact.css">
	<title>Contact Us | Bengal Gazette</title>
</head>
<body>
	<div id="main_body">
		<?php TITLE_LOGO(); ?>
		<?php NAVIGATION_BAR(); ?>
		
		<div style="background-color: #bcae8f;padding: 20px 100px;">
			<div class="info">Contact With Us</div>
			<p>You can contact us by sending an email to
				<a href="#"> admin@BengalGazette.com</a><br>
			or by submitting your message using the form below:</p><br>

			<script language="JavaScript" type="text/javascript">
			function validate()
			{
				if( (document.emailForm.text.value=="") || (document.emailForm.email.
					value.search("@")==-1) || (document.emailForm.email.value.search("[@*.*]")==-1))
				{
					alert( "Please make sure the form is complete and valid." );
				}else if ( (document.emailForm.email.value.search(";") != -1) ||
			 		(document.emailForm.email.value.search(",") != -1) ||
			 		(document.emailForm.email.value.search(" ") != -1) )
				{
					alert( "You cannot enter more than one e-mail address." );
				}
				else {
					alert("Message Sent...");
					document.emailForm.submit();
				}
			}
			</script>
			<form method="post" name="emailForm" target="_top" id="emailForm" action="">
				<div class="contact_email">
					<label for="contact_name">Enter your name:</label>
					<br>
					<input value="" id="inputtext1" name="name" class="inputbox" type="text" />
					<br>
					<label for="contact_email">E-mail address:</label>
					<br>
					<input name="email" id="inputtext2" class="inputbox" value="" type="email">
					<br>
					a<label for="contact_subject">Message subject:</label>
					<br>
					<input name="subject" id="inputtext2" class="inputbox" value="" type="text">
					<br><br>
					<label for="contact_text">Enter your message:</label>
					<br>
					<textarea cols="50" rows="10" name="text" id="contact1" class="inputbox"></textarea>
					<br><br>
					<input id="inputsubmit1" name="send" value="Send" class="button" onclick="validate()" type="button">
					<input id="inputsubmit1" type="reset" value="Reset" name="reset">
				</div>
			</form>
		</div>
		<?php FOOTER(); ?>
	</div>
</body>
</html>