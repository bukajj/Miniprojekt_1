<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="styles.css">
	<title>Contact</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script language="JavaScript" type="text/javascript">
        function clock(){
            date = (new Date()).toLocaleString();
            document.getElementById('date').innerHTML=date;
            setTimeout("clock()", 1000);
        } 
    </script>
    <script> 
		$(document).ready(function()
        {
  			$("#flip").click(function()
            {
    			$("#panel").slideToggle(400);
 			});
		});
        
        function toggleFunction(x) 
        {
  		x.classList.toggle("change");
        }
    </script>
    <script> 
        function validateForm() {
            var name = document.forms["myForm"]["firstname"].value;
            var lastname = document.forms["myForm"]["lastname"].value;
            var email = document.forms["myForm"]["email"].value;
            var message = document.forms["myForm"]["message"].value;
            if (name == "" || lastname=="" || email=="" || message=="") {
                alert("Form must be filled out");
                return false;
            }
        }
    </script>
</head>
<body onload="javascript:clock()">
    <div id="date"></div>
          <?php
            if(isset($_SESSION['login']))
            {

                echo '<div id="date">Zalogowany jest: '. $_SESSION['login'].'     </div>';
                // Rozumiem, że tu ma nastąpić połączenie z bazą danych i wybranie pól z tabeli "users" która dotyczy zalogowanego użytkownika.
                // Tutaj powinien znajdować się formularz z "przeklejonymi" danymi
            }

            else
                {
                    echo '<div id="date">Żaden użytkownik nie jest zalogowany     </div>';
                }
        ?>
        <center>
        <?php
                if(isset($_SESSION['login']))
                {
                    echo '<a href="logout.php"><input type="submit" value="Log out"></a>';
                }
                else
                {
                    echo '<a href="login.php"><input type="submit" value="Log in"></a>';
                    echo '<a href="register.php"><input type="submit" value="Register"></a>';
                }
        ?>
        </center>
	<div class="icons">
		<a href="strona_glowna.php"><img src="flaga_polska.jpg" height="30" width="50" alt="PL"></a>
		<a href="main_page.php"><img src="flaga_brytyjska.jpg" height="30" width="50" alt="ENG"></a>
	</div>
	<h1>Sign to the contact list!</h1>
	<div class="menu">
		<div id="flip" onclick="toggleFunction(this)">
			<div class="container" >
 				<div class="bar1"></div>
  				<div class="bar2"></div>
  				<div class="bar3"></div>
			</div>
		</div>
		<div id="panel">
            <div id="main"><a href="main_page.php"><div class="button">Main page</div></a><br></div>
            <div id="cvl"><a href="cv_eng.php"><div class="button">CV</div></a><br></div>
            <div id="contact"><a href="contact.php"><div class="button">Contact</div></a></div>
        </div>
    </div>
	<div class="row">
        <div id="columns">
		<form name="myForm" onsubmit="return validateForm()" method="post" action="contact.php">
            
  			<div class="col-12"><input type="text" name="firstname" placeholder="firstname"></div>
  			<div class="col-12"><input type="text" name="lastname" placeholder="lastname"></div>
            <div class="col-12"><input type="email" name="email" placeholder="email" ></div>
            <div class="col-12"><textarea name="message" rows="2" cols="45" placeholder="Write the subjest you want to raise.."  ></textarea></div>
            <div class="col-12"><input type="submit" value="Submit" name="submit"></div>      
		</form> 
        </div>
	</div><br>
	<div class="footer">
		<h3>Jakub Jadwiszczak</h3>
		<h4>E-mail: jakub.jadwiszczak.96@gmail.com</h4>
		<h4>Tel: +48 606-281-027</h4>
		<center><a href="https://www.facebook.com/jakub.jadwiszczak.1"><img src="fb.jpg" height="30" width="30"></a>
		<a href="https://www.linkedin.com/in/j-jadwiszczak"><img src="linkedin.jpg" height="35" width="35"></a>
		<a href="https://github.com/bukajj" id="github"><img src="github.jpg" height="30" width="30"></a></center>
	</div>
</body>
</html>


<?php
    function filtruj($zmienna)
    {
        $link=mysqli_connect("localhost","root","Kus01k1997r","users");
        if(get_magic_quotes_gpc())
            $zmienna = stripslashes($zmienna); // usuwamy slashe
 
        // usuwamy spacje, tagi html oraz niebezpieczne znaki
        return mysqli_real_escape_string($link,htmlspecialchars(trim($zmienna)));
    }

    if (isset($_POST['submit']))
    {
        $link=mysqli_connect("localhost","root","Kus01k1997r","users");
        $firstname = filtruj($_POST['firstname']);
        $lastname = filtruj($_POST['lastname']);
        $email = filtruj($_POST['email']);
        $message =filtruj($_POST['message']);
 
        // sprawdzamy czy email nie jest już w bazie
        if (mysqli_num_rows(mysqli_query($link,"SELECT email FROM clients WHERE email = '".$email."';")) == 0)
        {
            mysqli_query($link,"INSERT INTO clients (firstname, lastname, email,message)
                VALUES ('".$firstname."', '".$lastname."', '".$email."', '".$message."');");
            
            if (mysqli_num_rows(mysqli_query($link,"SELECT email FROM uzytkownicy WHERE email = '".$email."';")) != 0)
            {
                mysqli_query($link,"INSERT INTO `vip` (`firstname`, `lastname`, `email`)
                VALUES ('".$firstname."', '".$lastname."', '".$email."');");
            }
        }
        else echo "<br><center><h1>Wysłałeś już wiadomość wcześniej.</h1></center>";
    }
?>