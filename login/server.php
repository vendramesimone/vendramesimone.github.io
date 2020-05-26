<?php
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	

	$errors = array();
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$ruolo= mysqli_real_escape_string($db, $_POST['ruolo']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (empty($ruolo)) { array_push($errors, "ruolo is required"); }
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password, ruolo)
					  VALUES('$username', '$email', '$password','$ruolo')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Hai effettuato l'accesso";
			$_SESSION['ruolo']=$ruolo;
			switch ($ruolo) {
				case 'AMMINISTRATORE':
					header('location: dashboard.php');
					break;
				case 'STUDENTE':
					header('location: studente.php');
					break;
				case 'DOCENTE':
					header('location: docente.php');
					break;

			}

		}

	}

	// ...

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);
			$row= mysqli_fetch_assoc($results);
			
			if (mysqli_num_rows($results) == 1) {
				$ruolo = $row['ruolo'];
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "Hai effettuato l'accesso";
				$_SESSION['ruolo']=$ruolo;
				switch ($ruolo) {
					case 'AMMINISTRATORE':
						header('location: dashboard.php');
						break;
					case 'STUDENTE':
						header('location: studente.php');
						break;
					case 'DOCENTE':
						header('location: docente.php');
						break;

				}



			}else {
				array_push($errors, "Username/password sbagliati");
			}
		}
	}

?>
