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