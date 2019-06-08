
<?php
session_start();
$mysql_conn=mysqli_connect("localhost","root","password");
mysqli_select_db($mysql_conn, "users");
?>

<html lang="pl" dir="ltr">
    <head>
	   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	   <link rel="stylesheet" href="styles.css">
	   <title>Login</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script language="JavaScript" type="text/javascript">
        function clock(){
            date = (new Date()).toLocaleString();
    
            document.getElementById('date').innerHTML=date;
            setTimeout("clock()", 1000);
        } 
    </script>
    <script> 
		$(document).ready(function(){
  			$("#flip").click(function(){
    			$("#panel").slideToggle(400);
 			});
		});
	</script>
    <script>
			function myFunction(x) {
  			x.classList.toggle("change");
			}
   
        function myFunction(x) {
  		x.classList.toggle("change");
        }
    </script>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
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
	<h1>Jakub Jadwiszczak</h1>
	<div class="menu">
		<div id="flip" onclick="myFunction(this)">
			<div class="container">
 				<div class="bar1"></div>
  				<div class="bar2"></div>
  				<div class="bar3"></div>
			</div>
		</div>
		<div id="panel">
            <div id="main"><a href="strona_glowna.php"><div class="button">Strona główna</div></a><br></div>
            <div id="cvl"><a href="cv_pl.php"><div class="button">CV</div></a><br></div>
            <div id="contact"><a href="kontakt.php"><div class="button">Kontakt</div></a></div>
        </div>
    </div><br>
        <div class="row">
                    <div id="columns">

                        <form name="myForm1" method="POST" action="login.php" >
                            <div class="col-12"><input type="text" id="firstname" placeholder="login" name="login"></div>
  			                <div class="col-12"><input type="password" id="firstname" placeholder="password" name="haslo"></div>
                            <div class="col-12"><input type="submit" value="Log in" id="submit" name="loguj"></div> 
                        </form>
                    </div>
         </div>
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
    $link=mysqli_connect("localhost","root","password","users");
    if(get_magic_quotes_gpc())
        $zmienna = stripslashes($zmienna); // usuwamy slashe
 
   // usuwamy spacje, tagi html oraz niebezpieczne znaki
    return mysqli_real_escape_string($link, htmlspecialchars(trim($zmienna)));
}
 
if (isset($_POST['loguj']))
{
    $link=mysqli_connect("localhost","root","password","users");
   $login = filtruj($_POST['login']);
   $haslo = filtruj($_POST['haslo']);
   $ip = filtruj($_SERVER['REMOTE_ADDR']);
    
    if(isset($_SESSION['login']))
    {
        echo "<br><center><h1>Użytkownik jest już zalogowany</h1></center>";
        header('refresh: 1;');
    }
    else
    {
         // sprawdzamy czy login i hasło są dobre
        if (mysqli_num_rows(mysqli_query($link, "SELECT login, haslo FROM uzytkownicy WHERE login = '".$login."' AND haslo = '".md5($haslo)."';")) > 0)
        {
            // uaktualniamy date logowania oraz ip
            mysqli_query($link,"UPDATE `uzytkownicy` SET (`logowanie` = '".time().", `ip` = '".$ip."'') WHERE login = '".$login."';");
 
            $_SESSION['zalogowany'] = true;
            $_SESSION['login'] = $login;
 
            // zalogowany
            header('refresh: 1;');
 
        }
        else 
        {
            echo "<br><center><h1>Wpisano złe dane.</h1></center>";
            header('refresh: 1;');
        }
    }
}  
?>