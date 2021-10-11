			Hello <i>{{ $contactMail->receiver }}</i>,
			<p>E-Mail was submited at erikssonbil.nu</p><br>
			 
			<div>
			<p><b>Namn:</b>&nbsp;{{ $contactMail->name }}</p>
			<p><b>Tel:</b>&nbsp;{{ $contactMail->telephone_number }}</p>
			<p><b>E-Post:</b>&nbsp;{{ $contactMail->e_mail }}</p>
			<p><b>Meddelande:</b>&nbsp;{{ $contactMail->message }}</p>
			</div>
			  
			<br/>
			<i>{{ $contactMail->sender }}</i>
