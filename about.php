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
/*-----------ABOUT US---------*/
.about-section {

padding: 40px;
}
.about-section .about-container{
height: 580px;
width: 100%;
padding:15px;
display: flex;
margin-left: -1%;
}

.about-section .about-container .about-img{
margin-top: 50px;
margin-left: 30px;
width: 40%;
height: 465px; 

}
.about-section .about-container .about-img img{

width: 100%;
height:100%;



}
.small-contain{

display: flex;
flex-direction: column;
height: 80%;
width: 40%;
margin-right: 100px;
margin-left: 100px;
margin-top: 50px;
box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
padding-left: 20px;
padding-right: 20px;

}
.small-contain h1{

padding-bottom:10;
font-size: 2em;
}
.small-contain p{

text-align: left;
font-size: 18px;
margin-left: 10px;
margin-right: 10px;
margin-top:10px;

}


</style> -->
<?php
  require ('./includes/header.php');
?>
<body>
    <section class="about-section">
        <form>
            <div class="about-container">
                <div class="about-small-contain">
                    <h1 style="text-align: left-;">About Us</h1>

                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente nihil voluptate magnam magni
                        id provident aut
                        dolores ullam, amet ipsum reiciendis earum. Eveniet alias, eum deleniti accusantium cumque
                        voluptatum dignissimos.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, excepturi eaque. Adipisci,
                        doloribus eum earum
                        sequi ipsum odio dolorem in asperiores quisquam impedit sit deleniti sint iure dicta, totam
                        expedita.  </p>
                </div>
                <div class="about-img">
                    <img src="img\aboutusss.jpg" alt="" align =right>
                </div>
            </div>
        </form>
    </section>
</body>
<?php 
  require ('./includes\footer.php');
?>