<?php

/*  if(isset($_POST['ime'])) $ime = $_POST['ime'];
  if(isset($_POST['prezime'])) $prezime = $_POST['prezime'];
  if(isset($_POST['datumRodjenja'])) $datumRodjenja = $_POST['datumRodjenja'];
  if(isset($_POST['mail'])) $mail = $_POST['mail'];
  if(isset($_POST['grad'])) $grad = $_POST['grad'];
  if(isset($_POST['pbroj'])) $pbroj = $_POST['pbroj'];
  if(isset($_POST['vrstaKontakta'])) $vrstaKontakta = $_POST['vrstaKontakta'];
  if(isset($_POST['kontakt'])) $kontakt = $_POST['kontakt'];
  if(isset($_POST['ocjena'])) $ocjena = $_POST['ocjena'];

  //ime, prezime, datumRodjenja, mail(regex), grad, vrstaKontakta+kontakt
  if(preg_match('/^[A-Za-z]+$/', $ime)) $imeOk = true; else $imeOk = false;
  if(preg_match('/^[A-Za-z]+$/', $prezime)) $prezimeOk = true; else $prezimeOk = false;
  if(preg_match('/^(([1-2]?[0-9])|(3?[0-1]))((\.)|(\/))((0?[0-9])|(1[0-2]))((\.)|(\/))20\d\d((\.)|(\/))?$/', $datumRodjenja)) $datumRodjenjaOk = true; else $datumRodjenjaOk = false; //ovdje bi trebalo nesto kao date.parse; regex se moze jos preciznije napraviti ali nije neophodno
  if(preg_match('/^[a-z,A-Z][a-z,A-Z,\d,\-,\_,\.]*@[a-z,A-Z,\d,\-,\_,\.]{2,}\.[a-z,A-Z]{2,5}$/', $mail)) $mailOk = true; else $mailOk = false; //pattern preuzet iz javascript validacije da se ne bi desilo da do servera dodje nesto sto server ne smatra validnim, ili obrnuto
  if(preg_match('/^[A-Za-z\ ]*$/', $grad)) $gradOk = true; else $gradOk = false; //provjera samo da li je unesen, ispravnost se validira ajax-om
  if(preg_match('/^[0-9\ ]*$/', $pbroj)) $pbrojOk = true; else $pbrojOk = false; //eventualno i whitespace - provjera samo da li je unesen, ispravnost se validira ajax-om
  if($vrstaKontakta == "" || $vrstaKontakta == "pitanje" || $vrstaKontakta == "sugestija" || $vrstaKontakta == "kritika" || $vrstaKontakta == "pohvala") $vrstaKontaktaOk = true; else $kontaktOk = false;
  if($vrstaKontaktaOk) {if($vrstaKontakta == "") $kontaktPatern = '/^[A-Za-z\.\,\?\!\-]*$/'; else $kontaktPatern = '/^[A-Za-z\.\,\?\!\-]+$/'; } else $kontaktOk = false;
  if($vrstaKontaktaOk) { if(preg_match('/^[A-Za-z\.\,\?\!\-]+$/', $kontakt)) $kontaktOk = true; else $kontaktOk = false; }
  if(preg_match('/^[0-9]+$/', $ocjena)) $ocjenaOk = true; else $ocjenaOk = false; // mozda ovo i ne treba validirati

  $validno = $imeOk && $prezimeOk && $datumRodjenjaOk && $mailOk && $gradOk && $pbrojOk && $vrstaKontaktaOk && $kontaktOk && $ocjenaOk;
*/

  if(isset($_POST['ime'])) $ime = $_POST['ime']; else $imeOk = false;
  if(isset($_POST['prezime'])) $prezime = $_POST['prezime']; else $prezimeOk = false;
  if(isset($_POST['datumRodjenja'])) $datumRodjenja = $_POST['datumRodjenja']; else $datumRodjenjaOk = false;
  if(isset($_POST['mail'])) $mail = $_POST['mail']; else $mailOk = false;
  if(isset($_POST['grad'])) $grad = $_POST['grad']; else $gradOk = false;
  if(isset($_POST['pbroj'])) $pbroj = $_POST['pbroj']; else $pbrojOk = false;
  if(isset($_POST['vrstaKontakta'])) $vrstaKontakta = $_POST['vrstaKontakta']; else $vrstaKontaktaOk = false;
  if(isset($_POST['kontakt'])) $kontakt = $_POST['kontakt']; else $kontaktOk = false;
  if(isset($_POST['ocjena'])) $ocjena = $_POST['ocjena']; else $ocjenaOk = false;

  //ime, prezime, datumRodjenja, mail(regex), grad, vrstaKontakta+kontakt - validacija je strožija nego na klijentu da bi se minimizirala moguænost XSS-a
  if(isset($ime))
    if(preg_match('/^[A-Za-z]+$/', $ime)) $imeOk = true; else $imeOk = false;
  if(isset($prezime))
    if(preg_match('/^[A-Za-z]+$/', $prezime)) $prezimeOk = true; else $prezimeOk = false;
  if(isset($datumRodjenja))
    if(preg_match('/^(([1-2]?[0-9])|(3?[0-1]))((\.)|(\/))((0?[0-9])|(1[0-2]))((\.)|(\/))20\d\d((\.)|(\/))?$/', $datumRodjenja)) $datumRodjenjaOk = true; else $datumRodjenjaOk = false; //ovdje bi trebalo nesto kao date.parse; regex se moze jos preciznije napraviti ali nije neophodno
  if(isset($mail))
    if(preg_match('/^[a-z,A-Z][a-z,A-Z,\d,\-,\_,\.]*@[a-z,A-Z,\d,\-,\_,\.]{2,}\.[a-z,A-Z]{2,5}$/', $mail)) $mailOk = true; else $mailOk = false; //pattern preuzet iz javascript validacije da se ne bi desilo da do servera dodje nesto sto server ne smatra validnim, ili obrnuto
  if(isset($grad))
    if(preg_match('/^[A-Za-z\ ]*$/', $grad)) $gradOk = true; else $gradOk = false; //provjera samo da li je unesen, ispravnost se validira ajax-om
  if(isset($pbroj))
    if(preg_match('/^[0-9\ ]*$/', $pbroj)) $pbrojOk = true; else $pbrojOk = false; //eventualno i whitespace - provjera samo da li je unesen, ispravnost se validira ajax-om
  if(isset($vrstaKontakta))
    if($vrstaKontakta == "" || $vrstaKontakta == "pitanje" || $vrstaKontakta == "sugestija" || $vrstaKontakta == "kritika" || $vrstaKontakta == "pohvala") $vrstaKontaktaOk = true; else $kontaktOk = false;
  if($vrstaKontaktaOk) {if($vrstaKontakta == "") $kontaktPatern = '/^[A-Za-z\.\,\?\!\-]*$/'; else $kontaktPatern = '/^[A-Za-z\.\,\?\!\-]+$/'; } else $kontaktOk = false;
  if(isset($kontakt))
    if($vrstaKontaktaOk) { if(preg_match('/^[A-Za-z\.\,\?\!\-]+$/', $kontakt)) $kontaktOk = true; else $kontaktOk = false; }
  if(isset($ocjena))
    if(preg_match('/^[0-9]+$/', $ocjena)) $ocjenaOk = true; else $ocjenaOk = false; // mozda ovo i ne treba validirati

  $validno = $imeOk && $prezimeOk && $datumRodjenjaOk && $mailOk && $gradOk && $pbrojOk && $vrstaKontaktaOk && $kontaktOk && $ocjenaOk;


  //za svaki slucaj
  if(isset($ime)) $ime = strip_tags($ime);
  if(isset($prezime)) $prezime = strip_tags($prezime);
  if(isset($datumRodjenja)) $datumRodjenja = strip_tags($datumRodjenja);
  if(isset($mail)) $mail = strip_tags($mail);
  if(isset($grad)) $grad = strip_tags($grad);
  if(isset($pbroj)) $pbroj = strip_tags($pbroj);
  if(isset($vrstaKontakta)) $vrstaKontakta = strip_tags($vrstaKontakta);
  if(isset($kontakt)) $kontakt = strip_tags($kontakt);
  if(isset($ocjena)) $ocjena = strip_tags($ocjena); // nikad se ne zna...

  if($validno) {

    $to = 'ai15295@etf.unsa.ba';
    $subject = 'NightLife kontakt';
    $message = 'Ime i prezime: ' . $ime . ' ' . $prezime . '\r\nDatum rodjenja: ' . $datumRodjenja . '\r\nPostanski broj i grad: ' . $pbroj . ' ' . $grad . '\r\nVrsta kontakta: ' . $vrstaKontakta . '\r\n\r\nKontakt:\r\n' . wordwrap($kontakt, 70, "\r\n") . '\r\nOcjena: ' . $ocjena;
    $headers = 'Reply-To: ' . $mail . "\r\n";
    $headers .= 'Cc: vljubovic@etf.unsa.ba' . "\r\n";

    try { //mozda i ne treba try-catch blok, ali nije viska
      if(mail($to, $subject, $message, $headers)) { ?>
        <span class="tekst">Zahvaljujemo se sto ste nas kontaktirali</span>
<?php
      }
      else { ?>
        <span class="error">Doslo je do greske prilikom slanja e-maila!</span>
<?php
      }
    }
    catch(Exception $e) { ?>
      <span class="error">Doslo je do greske prilikom slanja e-maila!</span>
<?php
    }
  }
  else { ?>
    <span class="error">Poslani podaci nisu prosli validaciju!</span> 
<?php } ?>