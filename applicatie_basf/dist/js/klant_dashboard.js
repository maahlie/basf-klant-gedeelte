
//Date, month and day

var vandaag = new Date();
var maanden = new Array("Januari", 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December');
document.getElementById("huidige_dag").innerHTML = vandaag.getDate();  //Print day in this id
document.getElementById("huidige_maand").innerHTML = maanden[vandaag.getMonth()];  //Print month in this id
document.getElementById("huidige_jaar").innerHTML = vandaag.getFullYear();  //Print year in this id

// Time

(function startTime() {
    var d = new Date();
    var n = d.toLocaleTimeString();
    document.getElementById("huidige_tijd").innerHTML = n; //Print time in this id
    setTimeout(startTime);
  })();

// Week

var elm = document.createElement('input')
elm.type = 'week'
elm.valueAsDate = new Date()
var week = elm.value.split('W').pop()
document.getElementById("week").innerHTML = week;  //Print week in this id

// Add boxs and change the localStorage

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

// If localstorage == "ja" add 4 boxs and if it == "nee" remove 4 boxs

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

// Function for darkmode

var change = document.getElementById("change");
change.onclick = function(){
  var sunmoon = document.getElementById("sunmoon");
  var iframe = document.getElementById('news');
  document.body.classList.toggle("dark-theme");
  iframe.src = iframe.src; // refresh iframe on button click
  if(document.body.classList.contains("dark-theme")){
    sunmoon.classList.remove("mdi-white-balance-sunny");
    sunmoon.classList.add("mdi-theme-light-dark");
    localStorage.setItem("moon", "true");
  }else{
    sunmoon.classList.remove("mdi-theme-light-dark");
    sunmoon.classList.add("mdi-white-balance-sunny");
    localStorage.setItem("moon", "false");
  }
}

// localStorage for darkmode

if(localStorage.getItem("moon") == "true"){
    document.body.classList.toggle("dark-theme");
    sunmoon.classList.remove("mdi-white-balance-sunny");
    sunmoon.classList.add("mdi-theme-light-dark");
  }


