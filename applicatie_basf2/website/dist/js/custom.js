$(function () {
  "use strict";

  $(".preloader").fadeOut();
  // ==============================================================
  // Theme options
  // ==============================================================
  // ==============================================================
  // sidebar-hover
  // ==============================================================

  $(".left-sidebar").hover(
    function () {
      $(".navbar-header").addClass("expand-logo");
    },
    function () {
      $(".navbar-header").removeClass("expand-logo");
    }
  );
  // this is for close icon when navigation open in mobile view
  $(".nav-toggler").on("click", function () {
    $("#main-wrapper").toggleClass("show-sidebar");
    $(".nav-toggler i").toggleClass("ti-menu");
  });
  $(".nav-lock").on("click", function () {
    $("body").toggleClass("lock-nav");
    $(".nav-lock i").toggleClass("mdi-toggle-switch-off");
    $("body, .page-wrapper").trigger("resize");
  });
  $(".search-box a, .search-box .app-search .srh-btn").on("click", function () {
    $(".app-search").toggle(200);
    $(".app-search input").focus();
  });

  // ==============================================================
  // Right sidebar options
  // ==============================================================
  $(function () {
    $(".service-panel-toggle").on("click", function () {
      $(".customizer").toggleClass("show-service-panel");
    });
    $(".page-wrapper").on("click", function () {
      $(".customizer").removeClass("show-service-panel");
    });
  });
  // ==============================================================
  // This is for the floating labels
  // ==============================================================
  $(".floating-labels .form-control")
    .on("focus blur", function (e) {
      $(this)
        .parents(".form-group")
        .toggleClass("focused", e.type === "focus" || this.value.length > 0);
    })
    .trigger("blur");

  // ==============================================================
  //tooltip
  // ==============================================================
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
  // ==============================================================
  //Popover
  // ==============================================================
  $(function () {
    $('[data-toggle="popover"]').popover();
  });

  // ==============================================================
  // Perfact scrollbar
  // ==============================================================
  $(".message-center, .customizer-body, .scrollable").perfectScrollbar({
    wheelPropagation: !0,
  });

  /*var ps = new PerfectScrollbar('.message-body');
    var ps = new PerfectScrollbar('.notifications');
    var ps = new PerfectScrollbar('.scroll-sidebar');
    var ps = new PerfectScrollbar('.customizer-body');*/

  // ==============================================================
  // Resize all elements
  // ==============================================================
  $("body, .page-wrapper").trigger("resize");
  $(".page-wrapper").delay(20).show();
  // ==============================================================
  // To do list
  // ==============================================================
  $(".list-task li label").click(function () {
    $(this).toggleClass("task-done");
  });

  //****************************
  /* This is for the mini-sidebar if width is less then 1170*/
  //****************************
  var setsidebartype = function () {
    var width = window.innerWidth > 0 ? window.innerWidth : this.screen.width;
    if (width < 1170) {
      $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
    } else {
      $("#main-wrapper").attr("data-sidebartype", "full");
    }
  };
  $(window).ready(setsidebartype);
  $(window).on("resize", setsidebartype);
  //****************************
  /* This is for sidebartoggler*/
  //****************************
  $(".sidebartoggler").on("click", function () {
    $("#main-wrapper").toggleClass("mini-sidebar");
    if ($("#main-wrapper").hasClass("mini-sidebar")) {
      $(".sidebartoggler").prop("checked", !0);
      $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
    } else {
      $(".sidebartoggler").prop("checked", !1);
      $("#main-wrapper").attr("data-sidebartype", "full");
    }
  });
});
//Change the style of the 'selected' columns in planner upon changing the endtime
function visualize(row)
{
  //Replace 24 columns with default css classes
  for(i=0;i<24;i++){
    var element = document.getElementById('_Table_Row' + row + '_Column' + i);
    //Check for even or odd numbers; replace even with white and odd with lightgray
    if(i % 2 == 0)
     {
        //even
        element.classList.replace("_Table_Selected", "_Table_White");
        element.classList.replace("_Table_Even_Start_Half_Selected", "_Table_White");
        element.classList.replace("_Table_Even_End_Half_Selected", "_Table_White");
     }
     else
     {
        //odd
        element.classList.replace("_Table_Selected", "_Table_Lightgray");
        element.classList.replace("_Table_Odd_Start_Half_Selected", "_Table_Lightgray");
        element.classList.replace("_Table_Odd_End_Half_Selected", "_Table_Lightgray");
     }
  }

  //Get values from select-options
  var start = document.getElementById('selectstart'+row).value;
  var end = document.getElementById('selectend'+row).value;

  //Declare variables as number
  start = Number(start);  
  end = Number(end);

  //Calculate difference between start and end
  var diff = end - start;

  if(diff > 0){
    end = end - 1;
  }
  else if(diff <= 0)
  {
    return;
  }

  if(start % 1 != 0){
    start = start - 0.5;
    var startdecimal = 1;
  }
  if(end % 1 != 0){
    end = end + 1.5;
    var enddecimal = 1;
  }
  
  //Get the first column of the 'selection'
  var startelement = document.getElementById('_Table_Row' + row + '_Column' + start);
  //Check if column is odd or even; replace white(even) with selected or lightgray(odd) with selected
  if(start % 2 == 0)
     {
        //even
        if (startdecimal == 1) {
          startelement.classList.replace("_Table_White", "_Table_Even_Start_Half_Selected");
          if(diff >= 2){
            document.getElementById('_Table_Row' + row + '_Column' + start).innerHTML = "0"+start;
            startplusone = start + 1;
            document.getElementById('_Table_Row' + row + '_Column' + startplusone).innerHTML = ":30";
            document.getElementById('_Table_Row' + row + '_Column' + startplusone).style.textAlign = "left";
          }
        }else{
          startelement.classList.replace("_Table_White", "_Table_Selected");
          if(diff >= 2){
           document.getElementById('_Table_Row' + row + '_Column' + start).innerHTML = "0"+start+":00";
          }
        }
     }
     else
     {
        //odd
        if (startdecimal == 1) {
          startelement.classList.replace("_Table_Lightgray", "_Table_Odd_Start_Half_Selected");
          if(diff >= 2){
            document.getElementById('_Table_Row' + row + '_Column' + start).innerHTML = "0"+start;
            startstring = start + 1;
            document.getElementById('_Table_Row' + row + '_Column' + startstring).innerHTML = ":30";
          }
        }else{
          startelement.classList.replace("_Table_Lightgray", "_Table_Selected");
          if(diff >= 2){
            document.getElementById('_Table_Row' + row + '_Column' + start).innerHTML = "0"+start+":00";
          }
        }
     }

  //Get the last column of the 'selection'
  var endelement = document.getElementById('_Table_Row' + row + '_Column' + end);
  //Check if column is odd or even; replace white(even) with selected or lightgray(odd) with selected
  if(end % 2 == 0)
     {
        //even
        if (enddecimal == 1) {
          endelement.classList.replace("_Table_White", "_Table_Even_End_Half_Selected");
          if(diff >= 2){
            document.getElementById('_Table_Row' + row + '_Column' + end).innerHTML = ":30";
            endminusone = end - 1;
            document.getElementById('_Table_Row' + row + '_Column' + endminusone).innerHTML = "0"+end;
            document.getElementById('_Table_Row' + row + '_Column' + endminusone).style.textAlign = "right";
          }
        }else{
          endelement.classList.replace("_Table_White", "_Table_Selected");
          if(diff >= 2){
            endstring = end + 1;
            document.getElementById('_Table_Row' + row + '_Column' + end).innerHTML = "0"+endstring+":00";
          }
        }
     }
     else
     {
        //odd
        if (enddecimal == 1) {
          endelement.classList.replace("_Table_Lightgray", "_Table_Odd_End_Half_Selected");
          if(diff >= 2){
            document.getElementById('_Table_Row' + row + '_Column' + end).innerHTML = ":30";
            endminusone = end - 1;
            document.getElementById('_Table_Row' + row + '_Column' + endminusone).innerHTML = "0"+end;
            document.getElementById('_Table_Row' + row + '_Column' + endminusone).style.textAlign = "right";
          }
        }else{
          endelement.classList.replace("_Table_Lightgray", "_Table_Selected");
          if(diff >= 2){
            endstring = end + 1;
            document.getElementById('_Table_Row' + row + '_Column' + end).innerHTML = "0"+endstring+":00";
          }
        }
     }

  //Loop between start and end
  for(i=start;i<end;i++)
  {
    //Get column i of 'selection'
    var fillelement = document.getElementById('_Table_Row' + row + '_Column' + i);
    //Check if column is odd or even; replace white(even) with selected or lightgray(odd) with selected
    if(i % 2 == 0)
      {
          //even
          fillelement.classList.replace("_Table_White", "_Table_Selected");
      }
      else
      {
          //odd
          fillelement.classList.replace("_Table_Lightgray", "_Table_Selected");
      }
  }
}

