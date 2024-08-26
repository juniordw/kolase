window.addEventListener('load',   fn , false )
 function fn() {
     if(document.getElementById('preloader')){
         setTimeout(() => {
             document.getElementById('preloader').style.visibility = 'hidden';
             document.getElementById('preloader').style.opacity = '0';
         }, 350);
     }
 }
 function windowScroll() {
   const navbar = document.getElementById("navbar");
   if (
     document.body.scrollTop >= 50 ||
     document.documentElement.scrollTop >= 50
   ) {
     navbar.classList.add("nav-sticky");
   } else {
     navbar.classList.remove("nav-sticky");
   }
 }
 window.addEventListener("scroll", (ev) => {
   ev.preventDefault();
   windowScroll();
 });

 function toggleMenu() {
   document.getElementById('isToggle').classList.toggle('open');
   var isOpen = document.getElementById('navbar')
   if (isOpen.style.display === "block") {
       isOpen.style.display = "none";
   } else {
       isOpen.style.display = "block";
   }
 };
 
 var mybutton = document.getElementById("back-to-top");
 window.onscroll = function () {
     scrollFunction();
 };
 
 function scrollFunction() {
     if(mybutton!=null){
         if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
             mybutton.style.display = "block";
         } else {
             mybutton.style.display = "none";
         }
     }
 }
 
 function topFunction() {
     document.body.scrollTop = 0;
     document.documentElement.scrollTop = 0;
 }
 
 feather.replace();
 
 var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
 var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
   return new bootstrap.Tooltip(tooltipTriggerEl)
 });

function easy_background(selector, sld_args) {

  function empty_img(x) {
    if (x) {
      return "<img src='" + x + "'>";
    } else {
      return "";
    }
  }

  var def_del = 3000;

  var p = document.createElement("div");
  p.innerHTML = " ";
  p.classList.add("easy_slider");

  document.body.insertBefore(p, document.body.firstChild);
  sld_args.slide.forEach(function(v, i) {
    if (v) {
      document.querySelector(".easy_slider").innerHTML += empty_img(v);
      if (typeof sld_args.delay[i] == 'undefined' || typeof sld_args.delay[i] == '' || sld_args.delay[i] == 0) {
        sld_args.delay[i] = def_del;
      }
    }

  });

  document.querySelector(".easy_slider").style.display = "none";

  document.querySelector(selector).style.backgroundSize = "cover";
  document.querySelector(selector).style.backgroundRepeat = "no-repeat";
  document.querySelector(selector).style.backgroundPosition = "center center";


  setTimeout(function() {
    if (typeof sld_args.transition_timing === 'undefined') {
      sld_args.transition_timing = "ease-in";
    }
    if (typeof sld_args.transition_duration === 'undefined') {
      sld_args.transition_duration = 500;
    }
    var transition = "all " + sld_args.transition_duration + 'ms ' + sld_args.transition_timing;
    document.querySelector(selector).style.WebkitTransition = transition;
    document.querySelector(selector).style.MozTransition = transition;
    document.querySelector(selector).style.MsTransition = transition;
    document.querySelector(selector).style.OTransition = transition;
    document.querySelector(selector).style.transition = transition;
  }, 100);

  var n = 1;
  var li = 0;

  function slider() {
    sld_args.slide.forEach(function(vvv, iii) {
      if (n > 1) {
        var delay = li;
        setTimeout(function() {

          document.querySelector(selector).style.backgroundImage = "url('" + vvv + "')";

        }, delay);
        li = li + sld_args.delay[iii];

      } else { 
        n++;
        li = sld_args.delay[iii];

        document.querySelector(selector).style.backgroundImage = "url('" + vvv + "')";

      }

    });

  };

  slider();

  setInterval(function() { 
    slider();
  }, sld_args.delay.length);

}

