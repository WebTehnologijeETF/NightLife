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
  var datumPattern = /^\d\d?(\.|\/)\d\d?(\.|\/)\d\d\d\d\.?$/; //ovaj regex nije dovoljno dobar, osim kao indikator da je unesena vrijednost totalno besmislena

  if(ime.value.trim() == "") {document.getElementById("errorIme").innerHTML = "Morate unijeti ime"; valid = false;}
  if(prezime.value.trim() == "") {document.getElementById("errorPrezime").innerHTML = "Morate unijeti prezime"; valid = false;}
  if(!mailPattern.test(mail.value)) {document.getElementById("errorMail").innerHTML = "Morate unijeti ispravan e-mail"; valid = false;}
  if(!datumPattern.test(datum.value)) {
    var arr = datum.value.split('.'); // valjda ce se unositi sa tackom
    var tmp = arr[0];
    arr[0] = arr[1];
    arr[1] = tmp;
    var val = arr.join('/'); // po americki ! 
    if(isNaN(Date.parse(val))) document.getElementById("errorDatumRodjenja").innerHTML = "Morate unijeti ispravan datum"; valid = false;
  }
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

// dodana detaljnija provjeraispravnosti datuma !
function provjeriDatum() {
  var datumPattern = /^\d\d?(\.|\/)\d\d?(\.|\/)\d\d\d\d\.?$/;
  var datum = document.getElementById("datumRodjenja");
  if(datumPattern.test(datum.value)) {
    var arr = datum.value.split('.'); // valjda ce se unositi sa tackom
    if(arr.length == 1) arr = arr[0].split('/'); // za svaki slucaj...
    //if(arr.length == 1) arr = arr[0].split('-'); // ne mislim podrzavati ovaj format unosa !
    var tmp = arr[0];
    arr[0] = arr[1];
    arr[1] = tmp;
    var val = arr.join('/'); // po americki ! 
    if(!isNaN(Date.parse(val))) document.getElementById("errorDatumRodjenja").innerHTML = "";
  }
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

function provjeriPbroj(success) { // prosireno...
  var grad = document.getElementById("grad");
  var pBroj = document.getElementById("pbroj");
  myAjax(
    'GET',
    'http://zamger.etf.unsa.ba/wt/postanskiBroj.php?mjesto=' + grad.value + '&postanskiBroj=' + pBroj.value,
    null,
    function(data) {
      if(data.ok) { document.getElementById("errorPbroj").innerHTML = ""; success(); } 
      else if(data.greska) { document.getElementById("errorPbroj").innerHTML = data.greska; }
      else if(data.error) { document.getElementById("errorPbroj").innerHTML = data.error; }
      else { document.getElementById("errorPbroj").innerHTML = "Nije moguce potvrditi validnost"; }
    },
    function(data) {
      alert('Do&#353;lo je do gre&#353;ke, poku&#353;ajte opet!');
    }
  );
}

function myAjax(method, url, data, success, fail) {
  data = data || null;
  var httpRequest;
  if (window.XMLHttpRequest) {
      httpRequest = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
      try {
        httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
      } 
      catch (e) {
        try {
          httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
        } 
        catch (e) {}
      }
    }
    if (!httpRequest) {
      alert('Va&#353; browser ne podrzava ajax!');
      return false;
    }

  httpRequest.onreadystatechange = function(){
    if (httpRequest.readyState === 4) {
      var test = JSON.parse(httpRequest.responseText);
      if (httpRequest.status === 200) {
          success(test);
      } else {
        fail(test);
      }
    }
  };

  httpRequest.open(method, url, true);
  httpRequest.send(data);
}

function ajaxPageload(method, url, data, success, fail) {
  data = data || null;
  var httpRequest;
  if (window.XMLHttpRequest) {
      httpRequest = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
      try {
        httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
      } 
      catch (e) {
        try {
          httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
        } 
        catch (e) {}
      }
    }
    if (!httpRequest) {
      alert('Va&#353; browser ne podrzava ajax!');
      return false;
    }

  httpRequest.onreadystatechange = function(){
    if (httpRequest.readyState === 4) {
      var test = httpRequest.responseText;
      if (httpRequest.status === 200) {
          success(test);
      } else {
        fail(test);
      }
    }
  };

  httpRequest.open(method, url, true);
  
  if(method == 'POST') httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // dodano...
  
  httpRequest.send(data);
}

function setContent(content) {
  ajaxPageload('GET',
          content,
          null,
          function(data) {
            document.getElementById("sadrzaj").innerHTML = data;
          },
          function(data) {
            alert("Gre&#353;ka: " + data);
          }
         );
}

//novo

function validanPredmet() {
  var naziv = document.getElementById("naziv");
  if(naziv.value.trim() == "") {document.getElementById("errorNaziv").innerHTML = "Morate unijeti naziv"; return false;}
  return true;
}

function provjeriNaziv() {
  var naziv = document.getElementById("naziv");
  if(naziv.value.trim() != "") {document.getElementById("errorNaziv").innerHTML = "";}
}

function dodajPredmet() {
  if(validanPredmet()) {
    var predmet = {};
    predmet.naziv = document.GetElementById("naziv");
    predmet.opis = document.GetElementById("opis");
    predmet.kolicina = document.GetElementById("kolicina");
    predmet.cijena = document.GetElementById("cijena");
    var data = {};
    data.brindexa = 15295;
    data.akcija = "dodavanje";
    data.predmet = JSON.stringify(predmet);
    ajaxPageload(
      'POST',
      'http://zamger.etf.unsa.ba/wt/proizvodi.php',
      data,
      function(x) {alert("Uspjesno dodan!");},
      function(x) {alert("Dodavanje nije uspjelo :(")}
    );
  }
}

// novo...

function resetForm() {
  document.getElementById("ime").value = "";
  document.getElementById("prezime").value = "";
  document.getElementById("datumRodjenja").value = "";
  document.getElementById("mail").value = "";
  document.getElementById("grad").value = "";
  document.getElementById("pbroj").value = "";
  document.getElementById("kontakt").value = "";
  document.getElementById("vrstaKontakta").value = "";
  document.getElementById("ocjena").value = "";

  document.getElementById("errorIme").innerHTML = "";
  document.getElementById("errorPrezime").innerHTML = "";
  document.getElementById("errorDatumRodjenja").innerHTML = "";
  document.getElementById("errorMail").innerHTML = "";
  //document.getElementById("errorGrad").innerHTML = "";
  document.getElementById("errorPbroj").innerHTML = "";
  document.getElementById("errorKontakt").innerHTML = "";
  //document.getElementById("errorVrstaKontakta").innerHTML = "";
  //document.getElementById("errorOcjena").innerHTML = "";
}

function sendForm() {
  
  /*var postData = {
  'ime' : document.getElementById("ime").value,
  'prezime' : document.getElementById("prezime").value,
  'datumRodjenja' : document.getElementById("datumRodjenja").value,
  'mail' : document.getElementById("mail").value,
  'grad' : document.getElementById("grad").value,
  'pbroj' : document.getElementById("pbroj").value,
  'kontakt' : document.getElementById("kontakt").value,
  'vrstaKontakta' : document.getElementById("vrstaKontakta").value,
  'ocjena' : document.getElementById("ocjena").value
  }*/

  var postData = 'ime=' + document.getElementById("ime").value + '&prezime=' + document.getElementById("prezime").value + '&datumRodjenja=' + document.getElementById("datumRodjenja").value + '&mail=' + document.getElementById("mail").value + '&grad=' + document.getElementById("grad").value + '&pbroj=' + document.getElementById("pbroj").value + '&kontakt=' + document.getElementById("kontakt").value + '&vrstaKontakta=' + document.getElementById("vrstaKontakta").value + '&ocjena=' + document.getElementById("ocjena").value;

  if(validno())
  provjeriPbroj(function () {
  ajaxPageload('POST',
          'http://localhost/kontakt.php',
          postData,
          function(data) {
            document.getElementById("sadrzaj").innerHTML = data;
          },
          function(data) {
            alert("Gre&#353;ka: " + data);
          }
         )});
}

function sendMail() {

  /*var postData = {
  'ime' : document.getElementById("imeS").innerHTML,
  'prezime' : document.getElementById("prezimeS").innerHTML,
  'datumRodjenja' : document.getElementById("datumRodjenjaS").innerHTML,
  'mail' : document.getElementById("mailS").innerHTML,
  'grad' : document.getElementById("gradS").innerHTML,
  'pbroj' : document.getElementById("pbrojS").innerHTML,
  'kontakt' : document.getElementById("kontaktS").innerHTML,
  'vrstaKontakta' : document.getElementById("vrstaKontaktaS").innerHTML,
  'ocjena' : document.getElementById("ocjenaS").innerHTML
  }*/

  var postData = 'ime=' + document.getElementById("ime").value + '&prezime=' + document.getElementById("prezime").value + '&datumRodjenja=' + document.getElementById("datumRodjenja").value + '&mail=' + document.getElementById("mail").value + '&grad=' + document.getElementById("grad").value + '&pbroj=' + document.getElementById("pbroj").value + '&kontakt=' + document.getElementById("kontakt").innerHTML.trim() + '&vrstaKontakta=' + document.getElementById("vrstaKontakta").value + '&ocjena=' + document.getElementById("ocjena").value;

  if(validno())
  provjeriPbroj(function () {
  ajaxPageload('POST',
          'http://localhost/mail.php',
          postData,
          function(data) {
            document.getElementById("sadrzaj").innerHTML = data;
          },
          function(data) {
            alert("Gre&#353;ka: " + data);
          }
         )});
}

function fillForm() {
  document.getElementById("ime").value = "awdawd";
  document.getElementById("prezime").value = "awdawddaw";
  document.getElementById("datumRodjenja").value = "1.1.2011";
  document.getElementById("mail").value = "akwudwd@azwgdd.wd";
  document.getElementById("grad").value = "Sarajevo";
  document.getElementById("pbroj").value = "71000";
  document.getElementById("kontakt").value = "kuawdugwkd";
  document.getElementById("vrstaKontakta").value = "pitanje";
  //document.getElementById("ocjena").value = "";
}