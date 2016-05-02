<?php



if (isset($_POST['pseudo']) AND isset($_POST['message'])){
    
        setcookie('cookieChat2016', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
	    
	       try
	           {
		           // On se connecte à MySQL
			           $bdd = new PDO('mysql:host=localhost;dbname=test','root','');
				       }
				           catch(Exception $e)
					       {
					                   // En cas d'erreur, on affiche un message et on arrête tout
							               die('Erreur : '.$e->getMessage());
								           }

									       // Insertion du message à l'aide d'une requête préparée
									           $req = $bdd->prepare('INSERT INTO minichat(pseudo, message,date_message) VALUES(:pseudo, :message, NOW())');
										       $req->execute(array(
										       	'pseudo' => htmlspecialchars($_POST['pseudo']),
												'message' => htmlspecialchars($_POST['message'])
													));
													    
													        
														}

														// Redirection du visiteur vers la page du minichat
														header('Location: minichat.php');
														?>
