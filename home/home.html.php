<?php 
  include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/overall_header.html.php'; 
  include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/helper.func.php';
?> 
  
    <div class="content">
      <!-- Start: slider -->      
        <div class="slider">
        <div class="container-fluid">
          <div id="heroSlider" class="carousel slide">

            <div class="carousel-inner">
              <div class="active item">
                <div class="hero-unit">
                  <div class="row-fluid">
                    <div class="container">
                      <div class="span7">
                        <h1 class="padding-left">SOME SERVICE</h1>
                        <p class="padding-left">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, alias, autem numquam aut nemo velit magni accusamus enim officia voluptatem nihil vitae exercitationem ullam expedita modi ab animi doloremque illum!
                        </p>
                        <h3 class="padding-left">                        
                          <a href="../service/" class="btn btn-large">MORE</a>
                          <!-- <a href="hire_process.php" class="btn btn-primary btn-large">Hire Us</a> -->
                        </h3>                      
                      </div>
                      <div class="span5 padding-right">
                        <img src="../assets/img/placeholder.png" class="thumbnail">
                      </div>
                    </div>                    
                  </div>                  
                </div>
              </div>
              <?php foreach ($list as $key): ?>
              <div class="item">
                <div class="hero-unit">
                  <div class="row-fluid">
                    <div class="container">
                      <div class="span7">
                        <h1 class="padding-left"><?php htmlOut($key['name']); ?></h1>
                        <p class="padding-left">
                          <?php htmlOut($key['description']); ?>
                        </p>
                        <h3 class="padding-left">
                          <a href="../service/?srvd=<?php htmlOut($key['id']); ?>" class="btn btn-large">MORE</a>
                          <!-- <a href="hire_process.php" class="btn btn-primary btn-large">Hire Us</a> -->
                        </h3>                      
                      </div>
                      <div class="span5 padding-right">
                        <img src="../<?php htmlOut($key['img']) ?>" class="thumbnail">
                      </div>
                    </div>                    
                  </div>                  
                </div>
              </div>
              <?php endforeach ?>
      
              <!--div class="item">
                <div class="hero-unit">
                  <div class="row-fluid">
                    <div class="container">
                      <div class="span7">
                        <h1 class="padding-left">SOME SERVICE</h1>
                        <p class="padding-left">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, alias, autem numquam aut nemo velit magni accusamus enim officia voluptatem nihil vitae exercitationem ullam expedita modi ab animi doloremque illum!
                        </p>
                        <h3 class="padding-left">                        
                          <a href="#" class="btn btn-large">MORE</a>
                          <! <a href="hire_process.php" class="btn btn-primary btn-large">Hire Us</a>>
                        </h3>                      
                      </div>
                      <div class="span5 padding-right">
                        <img src="../assets/img/placeholder.png" class="thumbnail">
                      </div>
                    </div>                    
                  </div>                  
                </div>
              </div-->
            </div>
            <a class="left carousel-control" href="#heroSlider" data-slide="prev">‹</a>
            <a class="right carousel-control" href="#heroSlider" data-slide="next">›</a>
          </div>
        </div>
      </div>
      <!-- End: slider -->
      <!-- Start: PRODUCT LIST -->
      <div class="container">
        <!-- <div class="pagination-centered">  -->
          <!-- <div>
            <h2 class="text-center">Our products</h1>
          </div> -->
          <div class="row-fluid">
            <ul>
              <li class="span4">                
                <div class="caption">
                  <h3><i class="icon-user"></i>ABOUT US</h3>
                  <p>
                    <?php htmlOut($row['about']); ?>
                  </p>
                  <a href="../about" class="btn btn-primary btn-medium">READ MORE</a>
                </div>
              </li>
              <li class="span4">
                <div class="caption">              
                  <h3><i class="icon-folder-open"></i>PORTOFOLIO</h3>
                  <p>
                    <ul>
                      <li>Portofolio Perusahaan</li>
                      <li>Portofolio Perusahaan</li>
                      <li>Portofolio Perusahaan</li>
                      <li>Portofolio Perusahaan</li>
                    </ul>
                  </p>
                  <a href="../portofolio" class="btn btn-primary btn-medium">READ MORE</a>
                </div>
              <li class="span4">               
                <div class="caption">
                  <h3><i class="icon-question-sign"></i>WHY US</h3>
                  <p>
                    <?php htmlOut($row['whyus']); ?>
                  </p>
<!--                   <a href="#" class="btn btn-primary btn-medium">READ MORE</a> -->
                </div>
              </li>              
            </ul>                  
          </div>
      </div>
      <!-- End: PRODUCT LIST -->
    </div>
    <!-- End: MAIN CONTENT -->

<?php include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/overall_footer.html.php'; ?>