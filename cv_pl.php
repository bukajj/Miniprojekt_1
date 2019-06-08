<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="pl" dir="ltr">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="styles.css">
	<title>CV</title>
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
		<div class="edu"><div class="col-4">
			<h2>Wykształcenie</h2>
			<ul>
				<li>Informatyka | Politechnika Wrocławska | Inżynier | stacjonarny | <br>10/2017-02/2019</li><br>
				<li>Informatyka | Politechnika Opolska | Inżynier | niestacjonarny | <br>03/2019-obecnie</li>
			</ul>
		</div></div>
		<div class="exp"><div class="col-8">
			<h2>Doświadczenie</h2>
			<p><b>Tester oprogramowania |Teleste Video Networks Sp.z o.o. | 03/2019-obecnie</b></p>
			<ul>
				<li>Testowanie manualne i automatyczne</li>
				<li>Pisanie testów automatycznych w JavaScript z użyciem Selenium</li>
				<li>Odtwarzanie i raportownie będów</li>
				<li>Tworzenie nowych przypadków testowych</li>
			</ul><br>
            <p><b>Młodszy specjalista ds. monitorowania systemów IT |KRD BIG S.A. | 07/2018-03/2019</b></p>
			<ul>
				<li>Monitorowanie pracy systemów IT</li>
				<li>Zgłaszanie błędów i awarii</li>
				<li>Wyszukiwanie i wstępna analiza błędów(czytanie log'ów, przeszukiwanie baz danychoraz kodu)</li>
				<li>Naprawa błędów</li>
				<li>Pisanie zapytań w SQL</li>
				<li>Praca z narzędziami takimi jak: MS SQL Server, Jira, EA, logFaces</li>
			</ul><br>
		</div></div>
		<div class="lang"><div class="col-4">
			<h2>Języki</h2>
			<ul>
				<li>Angielski - zaawansowany</li><br>
				<li>Niemiecki - podstawowy</li>
			</ul>
		</div></div>
        
		<div class="skills"><div class="col-8">
			<h2>Umiejętności</h2>
			<ul>
				<li>SQL, C++, Java, Python, Scala, OOP – poziom podstawowy</li>
				<li>GIT, GitHub</li>
				<li>Jira, logFaces</li>
				<li>MS Office</li>
				<li>Prawo jazdy kat.B</li>
			</ul>
		</div></div>
        <div class="obj"><div class="col-4">
			<h2>Cel</h2>
			<p>Nauka i doskonalenie własnego warsztatu programistycznego. W przyszłości zarządzanie projektami informatycznymi lub udział w 	projektach poświęconych tworzeniu i rozwojowi AI
			</p>
        </div></div>
        <div class="hobby"><div class="col-4">
			<ul><div id="height"><h2>Hobby</h2>
                <li>AI</li></div>
				<li>Fantastyka kryminał</li>
				<li>Rock</li>
				<li>Biznes, ekonomia, finanse</li>
			</ul>
		</div></div>
		<div id="cv"><a href="cv_pl.pdf" download="cv_pl.pdf"><div class="download"><div class="col-8"><h2>Pobierz CV</h2></div></div></a></div>
        </div><br>
       
        <center><table>
             <input id="myInput" type="text" placeholder="Search..">
            <thead>
            <tr>
                <th>Narzędzie</th>
                <th>Poziom opanowania(1-5)</th>
            </tr></thead>
            <tbody id="myTable">
            <tr>
                <td>Java</td>
                <td>3</td>
            </tr>
            <tr>
                <td>C++</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Python</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Django</td>
                <td>2</td>
            </tr>
            <tr>
                <td>JavaScript</td>
                <td>1</td>
            </tr>
            <tr>
                <td>JQery</td>
                <td>1</td>
            </tr>
            <tr>
                <td>CSS</td>
                <td>2</td>
            </tr>
            <tr>
                <td>HTML</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Scala</td>
                <td>2</td>
            </tr>
            <tr>
                <td>GIT</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Jira</td>
                <td>4</td>
            </tr>
            <tr>
                <td>Testy manualne</td>
                <td>4</td>
            </tr>
            <tr>
                <td>Testy automatyczne</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Jenkins</td>
                <td>3</td>
            </tr>
            </tbody>
        </table></center>
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