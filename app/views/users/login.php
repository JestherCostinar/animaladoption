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
                    <?php if(!empty($data['loginMessage'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $data['loginMessage']; ?>
                    </div>
                    <?php endif;?>
                    <h1 class="widget-header user">Animal Adoption Login</h1>
                    <form action="<?php echo URLROOT; ?>/auth/login" method="POST">
                        <!-- Current Password -->
                        <div class="form-group">
                            <label for="current-email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" />
                        </div>
                        <!-- New email -->
                        <div class="form-group">
                            <label for="new-email">Password</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="Enter your password" />
                        </div>
                        <!-- Submit Button -->
                        <button class="btn btn-block btn-primary">Login</button>
                    </form>
                    <div id="formFooter" class="text-center">
                        <span><a class="underlineHover" style="text-decoration: underline;" href="#">Forgot
                                Password?</a> | <a class="underlineHover" style="text-decoration: underline;"
                                href="<?php echo URLROOT; ?>/auth/register">Register Account</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
require APPROOT . '/views/users/includes/footer.php';
?>