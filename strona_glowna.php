<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="styles.css">
	<title>Strona główna</title>
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
    </script>
    <script>
        $(document).ready(function(){
            $("#click").click(function(){
                if ($("#click").val() == 'Szary'){
                    $("#mp").css("background-color","rgba(100, 100, 100, 0.5)");
                    $("#mp").css("color","white");
                    $("#click").val("Biały");
                } else{
                    $("#mp").css("background-color","rgba(255,255,255,0.8)");
                    $("#mp").css("color","rgba(60,110,235,1)");
                    $("#click").val("Szary");
                }
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
			<div class="container" >
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
    </div>
	<div class="row">
        <div  id="mp">
            <img src="jj.jpg" class="col-2">
            <article class="col-9">
                <h2>O mnie:</h2>
                <p>Studiuję informatykę na Politechnice Opolskiej oraz pracuję jako tester oprogramownia w Teleste Video Networks Sp. z o.o. Pracuję i mieszam we Wrocławiu.</p>
                <h3>O mojej pracy:</h3>
                <p>Aktuanie pracuję jako tester. Tworzę przypadki testowe, testy automatyczne, testuję oprogramowanie, szukam i raportuję błędy, oraz współpracuję z programistami. Głównie zajmuję się testowaniem aplikacji webowych oraz systemów opartych o domeny CCTV oraz GIS. Mam także doświadczenie w pracy przy utrzymaniu systemów IT, głównie baz i hurtowni danych, ale także komponentów webowych. </p>
                <h3>Edukacja:</h3>
                <p>Swoją przygodę z informatyką rozpocząłem na Politechnice Wrocławskiej. Chcąc rozwijać swoją wiedzę także w praktyce postanowiłem podjąć pracę. Po niecałym roku doszedłem do wniosku, że nie jestem w stanie łączyć studiów dziennych z pracą na pełen etat, stąd decyzja o porzeniesieniu na Politechnikę Opolską na studia niestacjonarne. Uczę się jednak nie tylko poprzez pracę i studiowanie, ale również sam swój warsztat. Głównie jest to programowanie w Pythonie oraz algorytmika, co wiąże się z moimi zainteresowaniami.</p>
                <h3>IT hobby:</h3>
                <p>Interesuje mnie sztuczna inteligncja, programowanie oraz algorytmika. Lubię programowanie w Pythonie oraz Scali i Ocamlu. Jeśli chodzi o algorytmikę, uważam że najciekawsze są algorytmy ewolucyjne. Interesuję się także nowinkami IT oraz uwielbiam podcasty programistyczne takie jak DevTalk, Stacja IT  czy Developer Tea.</p>
                <h3>Hobby</h3>
                <p>Interesuję się głównie historią i finansami. Uwielbiam historię obu wojen światowych. Lubię także czytać książki, najbardziej fantastykę i kryminał.</p>
        </article>
            <div class="col-2"><input type="button" onclick="change()" value="Szary" id="click"></div>
            </div>
	</div><br>
	<footer class="footer">
		<h3>Jakub Jadwiszczak</h3>
		<h4>E-mail: jakub.jadwiszczak.96@gmail.com</h4>
		<h4>Tel: +48 606-281-027</h4>
		<center><a href="https://www.facebook.com/jakub.jadwiszczak.1"><img src="fb.jpg" height="30" width="30"></a>
		<a href="https://www.linkedin.com/in/j-jadwiszczak"><img src="linkedin.jpg" height="35" width="35"></a>
		<a href="https://github.com/bukajj" id="github"><img src="github.jpg" height="30" width="30"></a></center>
	</footer>
</body>
</html>