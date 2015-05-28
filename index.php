﻿<?php

function curPageURL() {
 $pageURL = 'http';
 //if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 //if ($_SERVER["SERVER_PORT"] != "80") {
  //$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 //} else {
  $pageURL .= $_SERVER["SERVER_NAME"]; //.$_SERVER["REQUEST_URI"];
 //}
 return $pageURL;
}

$hostUrl = curPageURL();

?>

<!DOCTYPE html>
<html>
  <head>
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Naslovnica - Iza&#273;i.ba</title>
    <meta name="keywords" content="iza&#273;i, izlasci, lokali, kafi&#263;i, nightlyfe" />
    <meta name="author" content="Adnan Islamovi&#263;" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="nightlife.js"></script>
  </head>
  <body>
    <div id="header">
<div id="menuDiv" style="width:100%">
        <!--<ul class="meni">
          <li>
	    <a>Promjena boje</a>
            <div>
              <ul id="podmeni">
                <li><a href="javascript:void(0);" onclick="changeColor(255,0,102)">Standardna</a></li>
                <li><a href="javascript:void(0);" onclick="changeColor(255,0,0)">Crvena</a></li>
                <li><a href="javascript:void(0);" onclick="changeColor(0,255,0)">Zelena</a></li>
                <li><a href="javascript:void(0);" onclick="changeColor(0,0,255)">Plava</a></li>
              </ul>
            </div>
          </li>
        </ul>-->
<ul class="meni">
  <li class="fl"><a href="javascript:void(0);" onclick="showSub()">Promjena boje teksta</a>
<div onmouseout="hideSub()">
  <ul id="sub">
                <li><a href="javascript:void(0);" onclick="changeColor(255,0,102)">Standardna</a></li>
                <li><a href="javascript:void(0);" onclick="changeColor(255,0,0)">Crvena</a></li>
                <li><a href="javascript:void(0);" onclick="changeColor(0,255,0)">Zelena</a></li>
                <li><a href="javascript:void(0);" onclick="changeColor(0,0,255)">Plava</a></li>
              </ul>
</div>
</li>
<li>&nbsp;</li>
</ul>
      </div>
      <img id="logo" src="party.jpeg" alt="logo" />
      <h1>Iza&#273;i.ba</h1>
      <h2>Najbolji na&#269;in za pronala&#382;enje mjesta za izlazak!</h2>
      
    </div>
    <div>
      <ul id="navigacija">
        <li><a href="javascript:void(0);" onclick="setContent('<?php echo $hostUrl ?>/index-content.html')">Naslovnica</a></li>
        <li><a href="javascript:void(0);" onclick="setContent('<?php echo $hostUrl ?>/lokacije.html')">Lokacije</a></li>
        <li><a href="javascript:void(0);" onclick="setContent('<?php echo $hostUrl ?>/sponzori.html')">Sponzori</a></li>
        <li><a href="javascript:void(0);" onclick="setContent('<?php echo $hostUrl ?>/kontakt.php')">Kontakt</a></li>
        <li><a href="javascript:void(0);" onclick="setContent('<?php echo $hostUrl ?>/predmeti.html')">Predmeti</a></li>
      </ul>
    </div>
<div id="sadrzaj">
        <div class="novost">
          <span class="novostNaslov tekst">Mike Vale u Slogi</span><br />
          <span class="novostAutor tekst"></span>Adnan Islamovi&#263;<br />
          <span class="novostDatum tekst">22.3.2015.</span><br />
          <span class="novostDetalji"><a href="javascript:void(0);">Detaljnije...</a></span><br />
        </div>
        <div class="novost">
          <span class="novostNaslov tekst">Karaoke night u Marquee-u</span><br />
          <span class="novostAutor tekst"></span>Adnan Islamovi&#263;<br />
          <span class="novostDatum tekst">20.3.2015.</span><br />
          <span class="novostDetalji"><a href="javascript:void(0);">Detaljnije...</a></span><br />
        </div>
        <div class="novost">
          <span class="novostNaslov tekst">Uskoro otvaranje novog kafi&#263;a &#268;eka</span><br />
          <span class="novostAutor tekst"></span>Adnan Islamovi&#263;<br />
          <span class="novostDatum tekst">17.8.2014.</span><br />
          <span class="novostDetalji"><a href="javascript:void(0);">Detaljnije...</a></span><br />
        </div>
        <div class="novost">
          <span class="novostNaslov tekst">Uskoro otvaranje kluba Subway</span><br />
          <span class="novostAutor tekst"></span>Adnan Islamovi&#263;<br />
          <span class="novostDatum tekst"></span>4.11.2014.<br />
          <span class="novostDetalji"><a href="javascript:void(0);">Detaljnije...</a></span><br />
        </div>
        <div class="novost">
          <span class="novostNaslov tekst"></span><br />
          <span class="novostAutor tekst"></span><br />
          <span class="novostDatum tekst"></span><br />
          <span class="novostDetalji"><a href="javascript:void(0);"></a></span><br />
        </div>
      </div>
  </body>
</html>