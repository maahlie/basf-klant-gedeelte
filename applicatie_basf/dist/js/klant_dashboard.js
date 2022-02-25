//date

var vandaag = new Date();
var maanden = new Array("Januari", 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December');
document.getElementById("huidige_dag").innerHTML = vandaag.getDate();
document.getElementById("huidige_maand").innerHTML = maanden[vandaag.getMonth()];
document.getElementById("huidige_jaar").innerHTML = vandaag.getFullYear();

// time

(function startTime() {
    var d = new Date();
    var n = d.toLocaleTimeString();
    document.getElementById("huidige_tijd").innerHTML = n;
    setTimeout(startTime);
  })();

// week

var elm = document.createElement('input')
elm.type = 'week'
elm.valueAsDate = new Date()
var week = elm.value.split('W').pop()
document.getElementById("week").innerHTML = week;

// add boxs

function addboxs(){
  if(localStorage.getItem("meer") == "ja"){
    localStorage.setItem("meer", "nee");
    for(i=0; i<4; i++){
      document.getElementsByClassName("meerboxs")[i].style.display = "none";
    }
    document.getElementById("add-boxs").innerHTML = "Meer";
  }else{
    localStorage.setItem("meer", "ja");
    for(i=0; i<4; i++){
      document.getElementsByClassName("meerboxs")[i].style.display = "flex";
    }
    document.getElementById("add-boxs").innerHTML = "Minder";
  }
}

if(localStorage.getItem("meer") == "ja"){
  for(i=0; i<4; i++){
    document.getElementsByClassName("meerboxs")[i].style.display = "flex";
  }
  document.getElementById("add-boxs").innerHTML = "Minder";
}else{
  for(i=0; i<4; i++){
    document.getElementsByClassName("meerboxs")[i].style.display = "none";
  }
  document.getElementById("add-boxs").innerHTML = "Meer";
}


