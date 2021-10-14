<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles\style.css">
<!-- <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
*{
  margin: 0;
  padding: 0;
  font-family: "Poppins", sans-serif;
}
 body{
  min-height: 100%;
}
 /*----BUTTONS--*/ 
 .btns{
  background-color: rgb(82, 80, 79);
  color:rgb(255, 255, 255);
  margin: 30px 0;
  padding: 8px 30px;
  transition: 0.4s;
  text-decoration: none;
  display: inline-block;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  
}
.btns:hover{
  background-color: rgb(218, 218, 218);
  color: rgb(34, 33, 33); ;
  
}
/*------------CREATE ACCOUNT---------*/
.contact-us-section{
  padding: 40px;
}

.contact-us-section .contact-us-container{

  height: 580px;
  width: 100%;
  padding:15px;
  display: flex;
  margin-left: -1%;
}
.contact-us-section .contact-us-container .contact-img{

  width: 50%;
  height: 570px;
 
}
.contact-us-section .contact-us-container .contact-img img{

  width: 100%;
  height:100%;
 
}
.small-contain{

  display: flex;
  margin-left: 50px;
  flex-direction: column;
  height: 570px;
  width: 40%;
  margin-right: 100px;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  padding-left: 30px;
}
.small-contain h1{

padding-bottom:10;
font-size: 2em;
}
.contact-us-txtbox input{
margin: 5px;
padding-bottom: 10px;
outline: none;
font-size: 20px;
}
.contact-us-txtbox .full-width{
width: 90%;
height: 30px;
margin-bottom: 30px;
}

.small-contain .contact-us-btn{
margin-left: 30%;

}
.small-contain .contact-us-btn input{
font-size: 15px;
width: 50%;}

</style> -->
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