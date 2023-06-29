<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <title>Sorrisi d'Argento - Auth</title>
        <meta charset="utf-8"/>
        <meta name="author" content="Gruppo 53"/>
        <meta name="description" content="Pagina di autenticazione relativa al sito 'Sorrisi d'Argento'"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="keywords" content="Volontariato anziani assistenza"/>
        <link rel="icon" href="../images/icon.jpg" type="image/jpg"/>
        <link rel="stylesheet" type="text/css" href="./log.css"/>
        <script src="./log.js"></script>
    </head>

    <body>
        <div class="container">
            <!--  Header -->
            <?php include("../Homepage/header.php"); ?>

            <!-- Form -->
            <div class="row">
				<div class="column">
                    <!-- pulsanti per switchare tra i form -->
					<h6>
                        <button class="login-btn" id="accedi">Accedi</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="reg-btn" id="registrati">Registrati</button>
                    </h6>
					
					<div class="form">
						<div class="form-divider">
                            <!-- corpo del form di login -->
							<div class="login-form">
								<div class="form-wrapper">
                                    <form id="AccediForm">
                                        <div class="form-fieldset">
                                            <input type="email" class="fieldset-style" id="log-email" placeholder="La tua email"></br></br>
                                            <input type="password" class="fieldset-style" id="log-psw" placeholder="La tua password"></br></br></br>
                                        </div>

									    <input type="submit" class="login-button" name="AccediButton" value="Accedi"></br></br>
                                    </form>
                                </div>
			      			</div>

                            <!-- corpo del form di registrazione -->
							<div class="register-form">
								<div class="form-wrapper">
                                    <form id="RegisterForm" onsubmit="return validateForm();">
                                        <div class="form-fieldset">
                                            <input type="text" class="fieldset-style" id="reg-name" placeholder="Il tuo nome" required></br></br>
                                            <input type="text" class="fieldset-style" id="reg-surname" placeholder="Il tuo cognome" required></br></br>
                                            
                                            <p style="font-size: bolder; font-weight: 500; margin-bottom: 15px;">Data di nascita</p>
                                            <input type="date" class="fieldset-style" id="reg-date" required></br></br>
                                            
                                            <input type="radio" class="radio-btn" id="radiobtn" name="sex" style="vertical-align: middle"/>
                                            <label class="radio-btn" for="radiobtn">M</label>

                                            <input type="radio" class="radio-btn" id="radiobtn" name="sex" style="vertical-align: middle"/>
                                            <label class="radio-btn" for="radiobtn">F</label>

                                            <input type="radio" class="radio-btn" id="radiobtn" name="sex" style="vertical-align: middle"/>
                                            <label class="radio-btn" for="radiobtn">Altro</label></br></br>
                                            
                                            <input type="email" class="fieldset-style" id="reg-email" placeholder="La tua email" required></br></br>
                                            <input type="password" class="fieldset-style" id="reg-pass" placeholder="La tua password" required></br></br>
                                        </div>

									    <input type="submit" class="register-button" name="RegistratiButton" value="Registrati">
                                    </form>
				      			</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>

            <?php 
                 if ($_SERVER["REQUEST_METHOD"] == "POST" ) {    
                    if (isset($_POST["RegistratiButton"])) {
                        include("logindatab.php");


                        $name = $_POST["name"];
                        $surname = $_POST["surname"]; 
                        $birthdate = $_POST["date"];
                        $sesso = $_POST["sex"];
                        $email = $_POST["email"];
                        $pass = $_POST["pass"];
                        $hash = password_hash($pass, PASSWORD_DEFAULT);

                        $query = "INSERT INTO Utente (nome, cognome, nascita, sesso, email, password)
                        VALUES ('$name', '$surname', '$birthdate','$sesso', '$email', '$hash');" ; 

                        $result= pg_query($db,$query);
                        
                        if($result){
                            echo '<script type="text/javascript">';
                            echo 'alert("Registrazione avvenuta con successo!");';
                            echo '</script>';
                            pg_close($db);
                          }else{
                            echo '<script type="text/javascript">';
                            echo 'alert(" Utente è gia registrato! Si prega di effettuare il login");';
                            echo '</script>';
                            pg_close($db);
                          }
                  
                    }
                        else if (isset($_POST["AccediButton"])) {
                            include("logindatab.php");

                            $email = trim($_POST["email"]); 
                            $pass =  trim($_POST["pass"]); 
                    
                            $query = "SELECT nome, email, password FROM Utente WHERE email = '$email';";
                    
                            $result2= pg_query($db,$query); 
                    
                            $row= pg_fetch_assoc($result2);
                    
                            $hash = $row['pass'];

                            
                    
                            if (!password_verify($pass, $hash)) {
                              echo '<script type="text/javascript">';
                              echo "alert('L''email o la password inserite non sono corrette, si prega di riprovare ;)');";
                              echo '</script>'; 
                              pg_close($db);
                            } else {
                              $_SESSION['name'] = $row[0];
                              $_SESSION['isLoggedIn'] = true;
                              $_SESSION['email'] = $row[1];
                              pg_close($db);
                             
                            }      
                          } 

                        }
            ?>

            <!-- Footer -->
            <?php include("../Homepage/footer.php"); ?>
        </div>
    </body>
</html>