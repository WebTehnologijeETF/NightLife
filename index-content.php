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