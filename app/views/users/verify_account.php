<?php
require APPROOT . '/views/users/includes/header.php';
?>

    <section class="popular-deals section bg-gray" style="height: 84vh">
      <div class="container mb-4">
        <div class="row">
          <div class="col-md-10 offset-md-1 col-lg-12 offset-lg-0">
            <!-- Edit Personal Info -->

            <!-- Change Email Address -->
            
            <div class="widget change-email mb-0">
            <?php if(!empty($data['verificationCodeError'])): ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $data['verificationCodeError']; ?>
              </div>
              <?php endif;?>
              <h1 class="widget-header user">Account Registration Verification</h1>
              <form action="<?php echo URLROOT; ?>/auth/verifyAccount" method="POST">

                <div class="form-group">
                  <label>Verification Code</label>
                  <input type="text" class="form-control" name="verificationCode" placeholder="Enter Verification Code" />
                </div>
                <!-- Submit Button -->
                <button class="btn btn-block btn-primary" type="submit" name="submit">SUBMIT</button>
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </section>

  
<?php
require APPROOT . '/views/users/includes/footer.php';
?>