<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en" dir="ltr">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="styles.css">
	<title>Main Page</title>
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

        function myFunction(x) {
  		x.classList.toggle("change");
        }
    </script>
    <script>
        $(document).ready(function(){
            $("#click").click(function(){
                if ($("#click").val() == 'Grey'){
                    $("#mp").css("background-color","rgba(100, 100, 100, 0.5)");
                    $("#mp").css("color","white");
                    $("#click").val("White");
                } else{
                    $("#mp").css("background-color","rgba(255,255,255,0.8)");
                    $("#mp").css("color","rgba(60,110,235,1)");
                    $("#click").val("Grey");
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
			<div class="container">
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
        <div  id="mp">
            <img src="jj.jpg" class="col-2">
            <article class="col-9">
                <h2>About me:</h2>
                <p>I study Computer Science at Opole University of Technology and work as a Software Tester in Teleste Video Networks Sp. z o.o. I live and work in Wroclaw.</p>
                <h3>About my job:</h3>
                <p>I work as a Software Tester. Icreate test cases and automation tests, I test software, debug and report errors, and cooperate with developers. I test mainly web apps and IT systms baised on CCTV and GIS domains.</p>
                <h3>Education:</h3>
                <p>I began studying at Wroclaw University of Technology, but I wanted to develop my knowledge also in practice and I took a job. Unfortunately, I can't full time study and work. I change university to Opole University of Technology and continue Computer Science on extramural studies. I'm learnig also on my own, mainly Python and algorithms.</p>
                <h3>IT hobby:</h3>
                <p>I'm interesting in AI, programming (mainly Python, Scala anf Ocaml) and algorithms(mainly evolution algorithms). I very like also IT news and podcasts like: DevTalk, Stacja IT and Developer Tea.</p>
                <h3>Hobby</h3>
                <p>I'm interesting in history and finances. I like history of both world wars. I like reading books, mainly fantasy and thriller.</p>
        </article>
        <div class="col-2"><input type="button" onclick="change()" value="Grey" id="click"></div>
        </div></div><br>
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