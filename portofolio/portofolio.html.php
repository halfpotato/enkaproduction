<?php 
  include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/overall_header.html.php'; 
  include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/helper.func.php';
?> 

	<div class="content">
      <div class="container">
        <div class="page-header">
          <h1>Our works <small>caption for your works</small></h1>
        </div>
        <div class="row">
          <div class="span12">
            <ul class="thumbnails">
              <?php foreach ($lists as $list): ?>
                <li class="span3">
                  <a href="#<?php htmlOut($list['id']); ?>" class="thumbnail" data-toggle="modal">
                    <img src="../<?php htmlOut($list['img']); ?>">
                  </a>
                  <!-- Start: Modal -->
                  <div class="modal hide fade" id="<?php htmlOut($list['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="portfolioList" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h3 id="myModalLabel"><?php htmlOut($list['worktitle']); ?></h3>                    
                    </div>
                    <div class="modal-body">
                      <div class="center-align">
                        <img src="../<?php htmlOut($list['img']); ?>" class="bottom-space-less thumbnail" alt="image name">
                      </div>
                      <p>
                        <?php htmlOut($list['aboutwork']); ?>
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                  </div>
                  <!-- End: Modal -->
                </li>
              <?php endforeach ?>

            <!-- </ul>
            <div class="pagination pagination-centered">
              <ul>
                <li class="disabled">
                  <a href="#">&laquo;</a>
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
                  <a href="#">&raquo;</a>
                </li>
              </ul> -->
            </div>
          </div>    
          <div>
            <p><?php echo $page_number . ' of ' . $last; ?></p>
            <p><?php echo $paginationCtrl; ?></p>
          </div>                                 
        </div>          
      </div>
    </div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/overall_footer.html.php'; ?>