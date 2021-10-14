function clickme(smallImg) {

    var fullImg = document.getElementById("imagebox");
    fullImg.src = smallImg.src;

}
//Scroll effect
window.addEventListener("scroll", function(){
    var header = document.querySelector("header");
      header.classList.toggle('sticky', window.scrollY > 0);
    });

    function goBack() {
        window.history.back();
    }