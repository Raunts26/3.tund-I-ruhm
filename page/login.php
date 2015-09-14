<?php
	//Lehe nimi
	$page_title = "UCP";
	//Faili nimi
	$page_file = "login.php";
?>
<?php 

	/* user_form.php
	Jutumarkide vahele input elemendi NAME
	
	echo $_POST["email"];
	echo $_POST["password"];*/

	//Kontrolli ss kui kasutaja vajutab submit

	//Logimise errorid
	$email_error = "";
	$password_error = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//isset uurib kas muutuja on loodud ning ega poleks olematu/kehtetu
		//Uurib, mis nuppu on vajutatud, antul juhul logi sissem $_POST["login"]
		if (isset($_POST["btnlogin"])) {
		//Kontrolli kasutaja e-posti ja parooli, et see poleks tühi
			if (empty($_POST["email"])) {
				$email_error = "Palun sisesta e-posti aadress!";
			
			} else {
				$email = $_POST["email"];
			}
			if (empty($_POST["password"])) {
				$password_error = "Palun sisesta parool!";
			
			}
		}
	}
	
	//Registreerumise errorid
	$reg_email_error = "";
	$reg_password_error = "";
	$reg_password_repeat_error = "";
	$reg_name_error = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST["btnregister"])) {
			//Kontrolli kasutaja e-posti ja parooli, et see poleks tühi
			if (empty($_POST["reg_email"])) {
				$reg_email_error = "Palun sisesta e-posti aadress!";
				
			}	
			if (empty($_POST["reg_name"])) {
				$reg_name_error = "Palun sisesta enda nimi!";
				
			}
			
			if (empty($_POST["reg_password"])) {
				$reg_password_error = "Palun sisesta parool!";
				
			} elseif (strlen($_POST["reg_password"]) < 8) {
			$reg_password_error = $reg_password_error. "Teie parool on alla 8 tähemärgi!";
				
				
			}
			if (empty($_POST["reg_password_repeat"])) {
			$reg_password_repeat_error = "Teie parool ei kattunud eelneva parooliga!";
				
			}
		}
	} 
	
	//Reg Errorid lõpp
	
	//Muutujad väärtustega
	
	$email = "";
	
	
?>
<?php require_once("../header.php"); ?>
				<div id="login">
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
						<h2>Logi sisse</h2>
						<input name="email" type="email" placeholder="E-post" value="<?php echo $email; ?>"> <?php echo $email_error; ?><br><br>
						<input name="password" type="password" placeholder="Parool"> <?php echo $password_error; ?><br><br>
						
						<input type="submit" name="btnlogin" value="Logi sisse">
					</form>
				</div>

				<div id="register">
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
						<h2>Registreeru</h2>
						<input name="reg_email" type="email" placeholder="E-post" value="<?php echo $email; ?>">* <?php echo $reg_email_error; ?><br><br>
						<input name="reg_name" type="text" placeholder="Teie nimi">* <?php echo $reg_name_error; ?><br><br>						
						<input name="reg_password" type="password" placeholder="Parool">* <?php echo $reg_password_error;?><br><br>
						<input name="reg_password_repeat" type="password" placeholder="Korda parooli">* <?php echo $reg_password_repeat_error; ?><br><br>
						
						<input type="submit" name="btnregister" value="Registreeru">
					</form>
				</div>

<?php require_once("../footer.php"); ?>