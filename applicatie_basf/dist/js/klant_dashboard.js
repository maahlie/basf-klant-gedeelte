//date

var vandaag = new Date();
var maanden = new Array("januari", 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');
var datum = (vandaag.getDate() + " " + maanden[vandaag.getMonth()]);
document.getElementById("datum").innerHTML = datum;

// time

(function startTime() {
    var d = new Date();
    var n = d.toLocaleTimeString();
    document.getElementById("tijd").innerHTML = n;
    setTimeout(startTime);
  })();

// week

var elm = document.createElement('input')
elm.type = 'week'
elm.valueAsDate = new Date()
var week = elm.value.split('W').pop()
document.getElementById("week").innerHTML = week;

