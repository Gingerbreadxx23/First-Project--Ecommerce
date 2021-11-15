<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles\style.css">

<?php
  require ('./includes\header.php');
  require ('./includes\scripts.php');

  if(isset($_POST['send-message'])){
    echo ' <script>   swal({
      title: "Message Sent ! ",
      text: "Look forward for our reply!",
      icon: "success",
      button: false,  
      timer :2000,
    }); 
    </script> ';
  }
?>
<body>
<section class="contact-us-section">
        <form method="post"> 
            <div class="contact-us-container">
             <div class="contact-us-small-contain">
                 <h1>Contact Us</h1>
                  <div class="contact-us-txtbox">
                       <input class="full-width" type="text" placeholder="First Name" name="" id="" required>
                       <input class="full-width" type="text" placeholder="Email" name="" id required
                       <input class="full-width" type="text" placeholder="Message" name="" id="" style="height:250px" required>
                      
                     <div class="contact-us-btn">
                        <input  class="btns" name="send-message" type="submit" value="Send" >
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