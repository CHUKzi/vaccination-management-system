/*loading*/
window.addEventListener("load", function(){
document.querySelector(".loader").classList.add("hidden");
});

/*animate-time*/

AOS.init({
easing: 'ease-out-back',
duration: 1000
});