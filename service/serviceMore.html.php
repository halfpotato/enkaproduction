<?php 
  include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/overall_header.html.php'; 
  include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/helper.func.php';
?> 

    <div class="content">     
      <div class="container">
        <!-- Start: Service description -->
        <article class="article"> 
          <div class="row bottom-space">
            <div class="span8 offset2">
              <div class="page-header">
                <h1><?php htmlOut($row['name']); ?></h1>
              </div>
            </div>

            <div class="span3 offset2 center-align">
              <img src="../<?php htmlOut($row['img']); ?>" class="thumbnail product-snap" alt="product name">            
            </div>

            <div class="span5">
              <?php htmlOut($row['description']); ?>           
               <hr>
               <div class="span3">
                  <p>
                    Got confused?
                  </p>
                  <a class="btn btn-large btn-block" href="../contact">Contact us</a>
                </div>
          
            </div>
          </div>
        </article>
      </div>
    </div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/overall_footer.html.php'; ?>    
