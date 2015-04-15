function validno() {
  var valid = true;
  var ime = document.getElementById("ime");
  var prezime = document.getElementById("prezime");
  var datum = document.getElementById("datumRodjenja");
  var mail = document.getElementById("mail");
  var grad = document.getElementById("grad");
  var kontakt = document.getElementById("kontakt");
  var vrstaKontakta = document.getElementById("vrstaKontakta");

  var mailPattern = /^[a-z,A-Z][a-z,A-Z,\d,\-,\_,\.]*@[a-z,A-Z,\d,\-,\_,\.]{2,}\.[a-z,A-Z]{2,5}$/;
  var datumPattern = /^\d\d?(\.|\/)\d\d?(\.|\/)\d\d\d\d\.?$/;

  if(ime.value.trim() == "") {document.getElementById("errorIme").innerHTML = "Morate unijeti ime"; valid = false;}
  if(prezime.value.trim() == "") {document.getElementById("errorPrezime").innerHTML = "Morate unijeti prezime"; valid = false;}
  if(!mailPattern.test(mail.value)) {document.getElementById("errorMail").innerHTML = "Morate unijeti ispravan e-mail"; valid = false;}
  if(!datumPattern.test(datum.value)) {document.getElementById("errorDatumRodjenja").innerHTML = "Morate unijeti ispravan datum"; valid = false;}
  if(vrstaKontakta.value != "") {if(kontakt.value.trim() == ""){document.getElementById("errorKontakt").innerHTML = "Ako ste izabrali vrstu kontakta morate ostaviti komentar"; valid = false;}}

  return valid;
}

function provjeriIme() {
  var ime = document.getElementById("ime");
  if(ime.value.trim() != "") {document.getElementById("errorIme").innerHTML = "";}
}

function provjeriPrezime() {
  var prezime = document.getElementById("prezime");
  if(prezime.value.trim() != "") {document.getElementById("errorPrezime").innerHTML = "";}
}

function provjeriMail() {
  var mailPattern = /^[a-z,A-Z][a-z,A-Z,\d,\-,\_,\.]*@[a-z,A-Z,\d,\-,\_,\.]{2,}\.[a-z,A-Z]{2,5}$/;
  var mail = document.getElementById("mail");
  if(mailPattern.test(mail.value)) {document.getElementById("errorMail").innerHTML = "";}
}

function provjeriDatum() {
  var datumPattern = /^\d\d?(\.|\/)\d\d?(\.|\/)\d\d\d\d\.?$/;
  var datum = document.getElementById("datumRodjenja");
  if(datumPattern.test(datum.value)) {document.getElementById("errorDatumRodjenja").innerHTML = "";}
}

function provjeriKontakt() {
  var kontakt = document.getElementById("kontakt");
  var vrstaKontakta = document.getElementById("vrstaKontakta");
  if(vrstaKontakta.value != "") {if(kontakt.value.trim() != "") document.getElementById("errorKontakt").innerHTML = "";}
  else document.getElementById("errorKontakt").innerHTML = "";
}

function showSub() {
  document.getElementById("sub").style.display = "block";
}

function hideSub() {
  document.getElementById("sub").style.display = "none";
}

function changeColor(r, g, b){
  var cssRuleCode = document.all ? 'rules' : 'cssRules';
  if(typeof(document.styleSheets[0][cssRuleCode][12].style) !== 'undefined') document.styleSheets[0][cssRuleCode][12].style.color = "rgb(" + r + "," + g + "," + b + ")";
  if(typeof(document.styleSheets[0][cssRuleCode][12].value) !== 'undefined') document.styleSheets[0][cssRuleCode][12].value.color = "rgb(" + r + "," + g + "," + b + ")";
}