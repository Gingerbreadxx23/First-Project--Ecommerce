<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="styles\style.css">
<link rel="stylesheet" href="styles\faqs.css">

<?php
  require ('./includes\header.php');
?>
 <!--faq--------------> 
    
<body>
    <h1 style="text-align: center;">Frequently Asked Questions</h1>
    <div class="wrapper">
        
      <!-- 1st -->
      <div class="parent-tab">
        <input type="radio" name="tab" id="tab-1" checked>
        <label for="tab-1">
          <span>FAQ1</span>
          <div class="icon"><i class="fas fa-plus"></i></div>
        </label>
        <div class="content">
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates cupiditate cumque soluta alias deserunt
            doloribus incidunt hic accusamus quisquam? Consequatur et nulla ut explicabo aspernatur quis ipsum repudiandae id
            veritatis!</p>
        </div>
      </div>
  
      <!-- 2ND -->
      <div class="parent-tab">
        <input type="radio" name="tab" id="tab-2">
        <label for="tab-2">
          <span>FAQ2</span>
          <div class="icon"><i class="fas fa-plus"></i></div>
        </label>
        <div class="content">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa quos expedita architecto labore animi, autem
            temporibus itaque aliquam, illum quibusdam est voluptas alias omnis consectetur nobis quas cum dolor ad!</p>
        </div>
      </div>
  
      <!-- 3RD -->
      <div class="parent-tab tab-3">
        <input type="radio" name="tab" id="tab-3">
        <label for="tab-3" class="tab-3">
          <span>FAQ3</span>
          <div class="icon"><i class="fas fa-plus"></i></div>
        </label>
        <div class="content">
          <!-- 3RD.1 -->
          <div class="child-tab">
            <input type="checkbox" name="sub-tab" id="tab-4">
            <label for="tab-4">
              <span>FAQ3.1</span>
              <div class="icon"><i class="fas fa-plus"></i></div>
            </label>
            <div class="sub-content">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum error tempore, recusandae rerum perspiciatis quas
                dolorum officia expedita amet debitis explicabo perferendis harum possimus accusamus velit suscipit maxime dolore
                et.</p>
            </div>
          </div>
          <!-- 3.2 -->
          <div class="child-tab">
            <input type="checkbox" name="sub-tab" id="tab-5">
            <label for="tab-5">
              <span>FAQ3.2</span>
              <div class="icon"><i class="fas fa-plus"></i></div>
            </label>
            <div class="sub-content">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium et fugiat culpa soluta perferendis, at itaque!
                Accusamus porro, doloribus officia eveniet similique recusandae iure deleniti natus molestias fugiat neque
                perspiciatis.</p>
            </div>
          </div>
        </div>
      </div>
  
      <!-- 4TH -->
      <div class="parent-tab">
        <input type="radio" name="tab" id="tab-6">
        <label for="tab-6">
          <span>FAQ4</span>
          <div class="icon"><i class="fas fa-plus"></i></div>
        </label>
        <div class="content">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae libero consequatur amet exercitationem earum eos
            debitis laborum facere saepe porro ipsum harum aliquid, repellat repellendus quas consectetur, impedit architecto
            enim!</p>
        </div>
      </div>
    </div>
    <?php 
  require ('./includes\footer.php');
?>