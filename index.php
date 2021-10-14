<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GadgetStore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
          <!-- HEADER-->
          <header>
            <a href="index.php" class="brand">XYZ Gadgets</a>
            <div class="menu">
              <div class="btn">
                <i class="fas fa-times close-btn"></i>
              </div>
              
              <a href="index.php">Home</a>
              <a href="about.php">About</a>
              <a href="shop.php">Shop</a>
              <a href="contact.php">Contact</a>
              <a href="login.php"><i class="fas fa-user-alt"></i></a>
              <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
            </div>
            <div class="btn">
              <i class="fas fa-bars menu-btn"></i>
            </div>
          </header>
  </head>
  
<style>
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
  border-radius: 30px;
  transition: 0.4s;
  text-decoration: none;
  display: inline-block;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  
}
.btns:hover{
  background-color: rgb(218, 218, 218);
  color: rgb(34, 33, 33); ;
  
  
}

/*NAVIGATION */

header{
  z-index: 999;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  display: flex;
justify-content: space-between;
align-items: center;
padding: 20px 100px;
transition: 0.6s;
box-sizing: border-box;

}

header .brand{
color: #fff;
font-size: 30px;
font-weight: 700;
text-transform: uppercase;
text-decoration: none;
letter-spacing: 2px;
}

header .menu{
position: relative;
display: flex;
justify-content: center;
align-items: center;
}

header .menu a{
color: #fff;
font-size: 16px;
font-weight: 500;
text-decoration: none;
margin: 0 30px;
padding: 0 10px;
border-radius: 20px;
transition: 0.3s;
transition-property: color;
}
header.sticky{
  background: #292929f8;
  padding: 15px 100px;
  }


header .menu a:hover{
color: #000;
background: #fff;
}

header .btn{
color: #fff;
font-size: 25px;
cursor: pointer;
display: none;
}
 /*--------middle WRAPPPER---*/
.middle-wrapper{
  min-height: 100%;
}
 
 /* CENTER TEXT AND BUTTON */
.section-main{
  position: relative;
  width: 100%;
  min-height: 100vh;
  background: url(img/headphones.jpg) no-repeat;
  background-size: cover;
  background-position: center;
  display:flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  box-sizing: border-box;
 ;
}

.section-main h1{
  color: rgba(224, 223, 223, 0.726);
  font-size: 70px;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 2px;
  line-height: 50px;
  
  }
/* -------------CATEGORY-------*/
.feature-cat{
  margin: 100px 0;
  display: flex;
  justify-content: space-between;
  align-content: center;
  flex-direction: row;
}
.feature-cat img{
  width:300px;
  height:400px;
  padding:20px;
  opacity: 1;
  display: block;
  transition: .4s;
  backface-visibility: hidden;
}
.feature-cat .first-category,.second-category,.third-category{
  position: relative;
  width: 50%;
}

.feature-cat .first-category:hover img{
  opacity: 0.3;
}
.feature-cat .first-category:hover .middle{
  opacity: 1;
}
.feature-cat .second-category:hover img{
  opacity: 0.3;
}
.feature-cat .second-category:hover .middle{
  opacity: 1;
}
.feature-cat .third-category:hover img{
  opacity: 0.3;
}
.feature-cat .third-category:hover .middle{
  opacity: 1;
}

.feature-cat  .middle {
    transition: .5s ;
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%)
}
.feature-cat .category-text {
  background: grey;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
.small-container{
  max-width: 1080px;
  margin-left: 11%;
}

/* -------ADS------*/
.advertisement{
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-content: center;
  background: radial-gradient(#fff,rgb(167, 167, 167));
  margin-top: 70px;
  padding-top: 0%;
  
}
.advertisement img{
  width: 400px;
  height: 400px;
  padding: 70px 5px 50px 5px;
  margin-left: 9%;
  margin-top:0;
}
.ads{
  display: flex;
  justify-content: center;
  align-content: center;
  position: relative;
}
.ad-desc{
  margin-top:15%;
}
.ad-desc h1{
  padding-top: 20px;
  padding-bottom: 20px;
  font-size: 2em;

}
.ad-desc small,p{
  color: rgb(61, 61, 61);
}
.footer{
  margin-top: 100px;
  background: rgb(0, 0, 0);
  color: white;
  height: 200px;
  position: relative;
}
.footer .footer-bottom{
  background: rgb(22, 22, 22);
  color:rgb(158, 158, 158);
  height: 25px;
  position: absolute;
  bottom: 0px;
  left: 0px;
  padding-top: 5px;
  width: 100%;
  text-align: center;
}
.footer .footer-content{
  display: flex;
  padding:10px;
  height: 175px;
}
.footer .footer-content .footer-section{
  flex: auto;
}
.footer .footer-content .links ul a{
  display: block;
  margin-bottom: 7px;
  list-style-type: none;
  text-decoration: none;
  color: rgb(146, 146, 146);
  transition: 0.4s;
}
.footer .footer-content .links ul a:hover{
  color:white;
}
.footer .footer-content .about{
  text-align: center;
}
.footer .footer-content .about p{
  color: rgb(146, 146, 146);
}
.footer .footer-content .social{
  text-align: center;
}
.footer .footer-content .social h3{
  margin-bottom: 30px;
}
.footer .footer-content .social .socials a {
  width: 45px;
  height: 41px;
  padding-top: 5px;
  margin-right: 15px;
  display:inline-block;
  font-size: 1.9em;
  text-align: center;
  color: rgb(146, 146, 146);
  transition: 0.4s;
}
.footer .footer-content .social .socials a:hover{
  color: white;
}

  
</style>

  <body>
    <section class="middle-wrapper">      
        <!-- MAIN SECTION-->
    <section class="section-main">
      <h1>Quality with   Perfection</h1>
      <a href="shop.php" class="btns">Explore now</a>
    </section>
 
    <!-- FEATURED CAT SECTION-->
    <section class="category">
    <div class="small-container">
      <div class="feature-cat">
        <div class="first-category">
          <img src="img\Category1.jpg" alt="">
        <div class="middle">
          <div class="category-text">Category 1</div>
        </div>
        </div>
        <div class="second-category">
          <img src="img\Category2.jpg" alt="">
        <div class="middle">
          <div class="category-text">Category 2</div>
        </div>
        </div>
        <div class="third-category">
          <img src="img\Category3.jpg" alt="">
          <div class="middle">
          <div class="category-text">Category 3</div>
        </div>
        </div>
      </div>
    </div>
  </section>
   <!--------In-store advertisement -->
   <section class="advertisement">
     <div class="ads">
        <img src="img\MiBand-4.png" alt="">
        <div class="ad-desc">
          <p>Exclusively available on GadgetStore</p>
          <h1>Smart Band 4</h1>
          <small><div class="">Lorem ipsum dolor sit amet consectetur adipisicing elit.<br> 
            Dignissimos consequatur cumque quasi eius aliquam neque iusto est quisquam</div></small>
            <a href="shop.php" class="btns">Shop now &#8594</a>
        </div>
     </div>
   </section>
</section>
    
</body> 
<?php 
    require('./includes/footer.php');
    require ('./includes\scripts.php');
?>

</html>
