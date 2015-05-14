<?php
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
?>
  
<h3 class="tekst">Provjerite da li ste ispravno popunili kontakt formu</h3>

<span class="tekst" id="imeS">Ime: <?php echo isset($ime)?htmlspecialchars($ime, ENT_QUOTES, "UTF-8"):"" ?></span><br />
<span class="tekst" id="prezimeS">Prezime: <?php echo isset($prezime)?htmlspecialchars($prezime, ENT_QUOTES, "UTF-8"):"" ?></span><br />
<span class="tekst" id="datumRodjenjaS">Datum rodjenja: <?php echo isset($datumRodjenja)?htmlspecialchars($datumRodjenja, ENT_QUOTES, "UTF-8"):"" ?></span><br />
<span class="tekst" id="mailS">E-mail: <?php echo isset($mail)?htmlspecialchars($mail, ENT_QUOTES, "UTF-8"):"" ?></span><br />
<span class="tekst" id="gradS">Grad: <?php echo isset($grad)?htmlspecialchars($grad, ENT_QUOTES, "UTF-8"):"" ?></span><br />
<span class="tekst" id="pbrojS">Postanski broj: <?php echo isset($pbroj)?htmlspecialchars($pbroj, ENT_QUOTES, "UTF-8"):"" ?></span><br />
<span class="tekst" id="vrstaKontaktaS">vrstaKontakta: <?php echo isset($vrstaKontakta)?htmlspecialchars($vrstaKontakta, ENT_QUOTES, "UTF-8"):"" ?></span><br />
<span class="tekst" id="kontaktS">Kontakt: <?php echo isset($kontakt)?htmlspecialchars($kontakt, ENT_QUOTES, "UTF-8"):"" ?></span><br />
<span class="tekst" id="ocjenaS">ocjena: <?php echo isset($ocjena)?htmlspecialchars($ocjena, ENT_QUOTES, "UTF-8"):"" ?></span><br />

<br />
<span class="tekst">Da li ste sigurni da zelite poslati ove podatke?</span><br />
<input type="button" value="Siguran sam" onclick="sendMail()">

<br />
<h3 class="tekst">Ako ste pogresno popunili formu, mozete ispod prepraviti unesene podatke</h3>
<br />
<?php } ?>

      <form action="localhost/kontakt.php" onsubmit="return validno() && provjeriPbroj()"> <?php /* dodao ovdje i provjeriPbroj, da sprijecim slanje forme ako nije ok */ ?>
        <label for="ime" class="tekst">Ime:</label> <input id="ime" type="text" name="ime" <?php if(isset($ime)) { ?> value="<?php echo htmlspecialchars($ime, ENT_QUOTES, "UTF-8") ?>" <?php } ?> onchange="provjeriIme()"><span id="errorIme" class="error"><?php $imeOk?"":"Morate unijeti ime" ?></span><br />
        <label for="prezime" class="tekst">Prezime:</label> <input id="prezime" type="text" name="prezime" <?php if(isset($prezime)) { ?> value="<?php echo htmlspecialchars($prezime, ENT_QUOTES, "UTF-8") ?>" <?php } ?> onchange="provjeriPrezime()"><span id="errorPrezime" class="error"><?php $prezimeOk?"":"Morate unijeti prezime" ?></span><br />
        <label for="datumRodjenja" class="tekst">Datum ro&#273;enja:</label> <input id="datumRodjenja" type="date" name="datumRodjenja" <?php if(isset($datumRodjenja)) { ?> value="<?php echo htmlspecialchars($datumRodjenja, ENT_QUOTES, "UTF-8") ?>" <?php } ?> onchange="provjeriDatum()"><span id="errorDatumRodjenja" class="error"><?php $datumRodjenjaOk?"":"Morate unijeti ispravan datum" ?></span><br />
        <label for="mail" class="tekst">E-mail:</label> <input id="mail" type="email" name="mail" <?php if(isset($mail)) { ?> value="<?php echo htmlspecialchars($mail, ENT_QUOTES, "UTF-8") ?>" <?php } ?> onchange="provjeriMail()"><span id="errorMail" class="error"><?php $mailOk?"":"Morate unijeti ispravan e-mail" ?></span><br />
        <label for="grad" class="tekst">Grad:</label> <input id="grad" list="gradovi" name="grad" <?php if(isset($grad)) { ?> value="<?php echo htmlspecialchars($grad, ENT_QUOTES, "UTF-8") ?>" <?php } ?> ><span id="errorGrad" class="error"></span><br />
        <datalist id="gradovi">
          <option value="Sarajevo">
          <option value="Mostar">
          <option value="Zenica">
          <option value="Biha&#263;">
          <option value="Tuzla">
          <option value="Travnik">
          <option value="Jajce">
          <option value="Cazin">
          <option value="Konjic">
          <option value="Jablanica">
        </datalist>
        <label for="pbroj" class="tekst">Po&#353;tanski broj:</label> <input id="pbroj" type="text" <?php if(isset($pbroj)) { ?> value="<?php echo htmlspecialchars($pbroj, ENT_QUOTES, "UTF-8") ?>" <?php } ?> ><span id="errorPbroj" class="error"><?php $mailOk?"":"Nije moguce potvrditi validnost" ?></span><br />
        <select id="vrstaKontakta" name="vrstaKontakta" <?php if(isset($vrstaKontakta)) { ?> value="<?php echo htmlspecialchars($vrstaKontakta, ENT_QUOTES, "UTF-8") ?>" <?php } ?> onchange="provjeriKontakt()">
          <option value="">Izaberite...</option>
          <option value="pitanje" <?php if(isset($vrstaKontakta)) if($vrstaKontakta == "pitanje") echo "selected"; ?>>Pitanje</option>
          <option value="sugestija" <?php if(isset($vrstaKontakta)) if($vrstaKontakta == "sugestija") echo "selected"; ?> >Sugestija</option>
          <option value="kritika" <?php if(isset($vrstaKontakta)) if($vrstaKontakta == "kritika") echo "selected"; ?> >Kritika</option>
          <option value="pohvala" <?php if(isset($vrstaKontakta)) if($vrstaKontakta == "pohvala") echo "selected"; ?> >Pohvala</option>
        </select><br />
        <textarea id="kontakt" name="kontakt" onchange="provjeriKontakt()"><?php if(isset($kontakt)) echo htmlspecialchars($kontakt, ENT_QUOTES, "UTF-8") ?>
        </textarea><span id="errorKontakt" class="error"><?php $kontaktOk?"":"Ako ste izabrali vrstu kontakta morate ostaviti komentar" ?></span><br />
        <label for="ocjena" class="tekst">Ocjena: </label><span class="tekst">0</span> <input id="ocjena" type="range" name="ocjena" <?php if(isset($ocjena)) { ?> value="<?php echo htmlspecialchars($ocjena, ENT_QUOTES, "UTF-8") ?>" <?php } ?> > <span class="tekst">5</span><br />
        <input type="button" value="Po&#353;alji" onclick="sendForm()">
        <input type="button" value="Reset" onclick="resetForm()">
      </form>