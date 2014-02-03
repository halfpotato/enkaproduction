<?php 
  include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/overall_header.html.php'; 
  include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/helper.func.php';
?> 

    <div class="content">
      <!-- Start: PRODUCT LIST -->
        <div class="container">
          <div class="page-header">
            <h2>Our Service</h2>
          </div>

          <!--?php $b = 1; while ($b <= 2) { ?-->
            
            <div class="row-fluid">
              <ul class="thumbnails">

                <!--?php $a = 1; while ($a <= 4) { ?-->

                      <?php foreach ($lists as $list): ?>
                        <li class="span3">
                          <form action="" method="get">
                            <div class="thumbnail">
                              <img src="../<?php htmlOut($list['img']); ?>" alt="product name">
                                <div class="caption">
                                  <h4><?php htmlOut($list['name']); ?></h4>
                                  <p><?php htmlOut($list['description']); ?></p>
                                  <p><a href="<?php htmlOut($list['catalogue']); ?>">download catalogue</a></p>                  
                                </div>
                              <div class="widget-footer">
                                <input type="hidden" name="srvd" value="<?php htmlOut($list['id']); ?>">
                                <p>
                                  <!-- <a href="hire_process.php" class="btn btn-primary l-margin">Hire Us</a>&nbsp; -->
                                  <input type="submit" value="READ MORE" class="btn">
                                </p>
                              </div>
                            </div>
                          </form>                        
                        </li>
                      <?php endforeach ?>

                  <!--?php $a++; } ?-->

                </ul>
              </div>

          <!--?php $b++; } ?-->
          <p><?php echo $page_number . ' of ' . $last; ?></p>
          <p><?php echo $paginationCtrl; ?></p>
          

<!--           <div class="pagination pagination-centered">
                <ul>
                  <li class="disabled">
                    <a href="#">Previous</a>
                  </li>
                  <li class="active">
                    <a href="#">1</a>
                  </li>
                  <li>
                    <a href="#">2</a>
                  </li>
                  <li>
                    <a href="#">3</a>
                  </li>
                  <li>
                    <a href="#">4</a>
                  </li>
                  <li>
                    <a href="#">5</a>
                  </li>
                  <li>
                    <a href="#">6</a>
                  </li>
                  <li>
                    <a href="#">Next</a>
                  </li>
                </ul>
          </div> -->
        </div>
      <!-- End: PRODUCT LIST -->
    </div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/overall_footer.html.php'; ?>