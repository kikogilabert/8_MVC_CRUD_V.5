<?php
	class controller_contact {
		
		function view(){
			// echo 'hola view';
			common::load_view('top_page_contact.html', VIEW_PATH_CONTACT . 'contact_list.html');
		}
		
		function send_contact_us(){
			$message = ['type' => 'contact',
						'inputName' => $_POST['name'], 
						'fromEmail' => $_POST['email'], 
						'inputMatter' => $_POST['matter'], 
						'inputMessage1' => $_POST['message']];
			$email = mail::send_email($message);
			
			if (!empty($email)) {
				echo json_encode('Done!');
				return;  
			} else {
				echo json_encode('Error!');
			}
		}
	}
?>
