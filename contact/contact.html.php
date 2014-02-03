<?php 
  include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/overall_header.html.php'; 
  include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/helper.func.php';
?> 
	
	<div class="content">
      <div class="container">
        <div class="page-header">
          <h1>Contact us</h1>
        </div>
        <div class="row-fluid">
          <!-- Start: CONTACT US FORM -->
          <div class="span4 offset1">
            <div class="page-header">
              <h2>Quick message</h2>
            </div>

            <?php if (isset($error)): ?>
              <p><?php htmlOut($error); ?></p>
            <?php endif ?>
            
            <?php if (isset($success)): ?>
              <p><?php htmlOut($success); ?></p>
            <?php endif ?>
            
            <form class="form-contact-us" action="?send" method="post">
              <div class="control-group">
                <div class="controls">
                  <input type="text" id="inputName" name="name" placeholder="Name">
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <input type="text" id="inputEmail" name="email" placeholder="Email">
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <textarea id="inputMessage" name="message" placeholder="Message"></textarea>
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <input type="submit" class="btn btn-primary btn-large" value="Send">
                </div>
              </div>
            </form>
          </div>
          <!-- End: CONTACT US FORM -->
          <!-- Start: OFFICES -->
          <div class="span5 offset1">
            <div class="page-header">
              <h2>Offices</h2>
            </div>
            <h3>Jakarta</h3>
            <div>
              <address class="pull-left">
                <?php htmlOut($row['officeaddress']); ?>
              </address>
              <div class="pull-left">
                <div class="bottom-space">
                  <i class="icon-phone icon-large"></i> <?php htmlOut($row['officephone']); ?>
                </div>
                <a href="mailto:contact@bootbusiness.com" class="contact-mail">
                  <i class="icon-envelope icon-large"></i>
                </a> <?php htmlOut($row['officemail']); ?>
              </div>
              <div class="clearfix"></div>
            </div>
         </div>
          <!-- End: OFFICES -->
        </div>
      </div>
    </div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/enkaproduction/includes/overall_footer.html.php'; ?>