paypal.Buttons({
  style: {
    layout:  'vertical',
    color:   'blue',
    shape:   'pill',
    tagline: 'true',
    label:   'paypal'
  }
}).render('#paypal-button-container');


function togglePopup(){
  var element=  document.getElementById("oti")
  element.classList.toggle("active");

}  
