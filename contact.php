<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles\style.css">

<?php
  require ('./includes\header.php');
?>
<body>
<section class="contact-us-section">
        <form>
            <div class="contact-us-container">
             <div class="contact-us-small-contain">
                 <h1>Contact Us</h1>
                  <div class="contact-us-txtbox">
                       <input class="full-width" type="text" placeholder="First Name" name="" id="">
                       <input class="full-width" type="text" placeholder="Email" name="" id="">
                       <input class="full-width" type="text" placeholder="Message" name="" id="" style="height:250px">
                      
                     <div class="contact-us-btn">
                        <input  class="btns" type="button" value="Send" >
                     </div>
                    </div>    
                </div>
                <div class="contact-img">
                    <img src="img\contact.png" alt="">                
                </div>
            </div>
  
         </form>
        </section>

</body>
<?php 
  require ('./includes\footer.php');
?>