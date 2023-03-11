document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode();
    checkBlackBackground();
});

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');
    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    } else{
        navegacion.classList.add('mostrar');

        //Tambien se puede hacer un toggle
        //navegacion.classList.toggle('mostrar');
    }
}

function darkMode(){

    const preferencia = window.matchMedia('(prefers-color-scheme: dark)');

    if(preferencia.matches){
        document.body.classList.add('dark-mode');
    }
    else{
        document.body.classList.remove('dark-mode');

    }

    preferencia.addEventListener('change',function(){
        if(preferencia.matches){
            document.body.classList.add('dark-mode');
        }
        else{
            document.body.classList.remove('dark-mode');
    
        }
    })
    const botonDarkMode = document.querySelector('.dark-mode-button');
    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
        toggleCookie();
    });
}

// cookies
function checkBlackBackground() {
    if (getValueCookie() == "true") {
      document.body.classList.toggle("dark-mode");
    }
  }
 
  function toggleCookie() {
    // if exists
    if (document.cookie.match(/^(.*;)?\s*dark-mode\s*=\s*[^;]+(.*)?$/)) {
      // get values
      if (getValueCookie() == "true") {
        setCookie("dark-mode", false, 30);
      } else {
        setCookie("dark-mode", true, 30);
      }
    } else {
      // this means, is the first time u press the button, and white is default
      setCookie("dark-mode", true, 30);
    }
  }
 
  function setCookie(cName, cValue, expDays) {
    let date = new Date();
    date.setTime(date.getTime() + expDays * 24 * 60 * 60 * 1000);
    const expires = "expires=" + date.toUTCString();
    document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
  }
 
  function getValueCookie() {
    return (document.cookie.match(
      /^(?:.*;)?\s*dark-mode\s*=\s*([^;]+)(?:.*)?$/
    ) || [, null])[1];
  }