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
        <li><a href="javascript:void(0);" onclick="setContent('http://localhost/index-content.php')">Naslovnica</a></li>
        <li><a href="javascript:void(0);" onclick="setContent('http://localhost/lokacije.html')">Lokacije</a></li>
        <li><a href="javascript:void(0);" onclick="setContent('http://localhost/sponzori.html')">Sponzori</a></li>
        <li><a href="javascript:void(0);" onclick="setContent('http://localhost/kontakt.php')">Kontakt</a></li>
        <li><a href="javascript:void(0);" onclick="setContent('http://localhost/predmeti.html')">Predmeti</a></li>
      </ul>
    </div>
<div id="sadrzaj">
  
  <?php
  class Novost {
    var $naslov;
    var $slika;
    var $opis;
    var $datum;
    var $link;
    var $autor;
    var $detalji;

    function Novost ($n, $s, $o, $d, $l, $a, $de) {
      $this->$naslov = $n;
      $this->$slika = $s;
      $this->$opis = $o;
      $this->$datum = $d;
      $this->$link = $l;
      $this->$autor = $a;
      $this->$detalji = $de;
    }
  }

  $novosti = array();

  $filesx = scandir('/novosti');
  $files = array_diff($filesx, array('..', '.'));
  $brFiles = count($files, 1);
  
  for($j = 0; $j < $brFiles; $j++) {
    $crtice = false;
    $file = fopen('/novosti/' . $files[$j], 'r');
    $dat = fgets($file);
    $aut = fgets($file);    
    $nas = fgets($file);
    $sli = fgets($file);
    $opi = "";
    $det = "";
    $lin = "http://localhost/index.php";
    while(!feof($file)) {
      $temp = fgets($file);
      if(!$crtice) {
        if($temp != "--") $opi .= $temp;
        else $crtice = true;
      }
      else {
        $det .= $temp;
      }
    }
    fclose($file);
    $novost = new Novost($nas, $sli, $opi, $dat, $lin, $aut, $det);
    array_push($novosti, $novost);
  }

  $br = count($novosti);
  for($i = 0; $i < $br; $i++) {
?>

        <div class="novost">
          <span class="novostNaslov tekst"><?php echo $novosti[$i]->$naslov ?></span><br />
          <span class="novostAutor tekst"><?php echo $novosti[$i]->$autor ?></span><br />
          <span class="novostDatum tekst"><?php echo $novosti[$i]->$datum ?></span><br />
          <span class="novostDatum tekst"><?php echo $novosti[$i]->$opis ?></span><br />
          <?php if($novosti[$i]->$detalji != "") { ?><span class="novostDetalji"><a  href="javascript:void(0);" onclick="setContent('<?php echo $novosti[$i]->$link ?>')">Detaljnije...</a></span><br /><?php } ?>
        </div>

<?php
  }
?>
  
      </div>
  </body>
</html>