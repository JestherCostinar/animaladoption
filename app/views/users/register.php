<?php
require APPROOT . '/views/users/includes/header.php';
?>

<section class="popular-deals section bg-gray">
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                <div class="sidebar">
                    <!-- Dashboard Links -->
                    <div class="widget user-dashboard-menu">
                        <img src="https://cdn.totalcomputersusa.com/managed/uploads/sites/42/2019/10/AdobeStock_173145107.jpeg"
                            alt="" width="100%" height="500px" />
                    </div>
                </div>
            </div>
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                <!-- Edit Personal Info -->
                <div class="widget personal-info">
                    <h3 class="widget-header user">
                        Personal Information Registration
                    </h3>
                    <form action="<?php echo URLROOT; ?>/auth/register" method="POST" enctype="multipart/form-data">
                        <!-- First Name -->
                        <div class="form-row">
                            <div class="col">
                                <label for="first-name">First Name<span class="text-danger"> *</span></label>

                                <input type="text" class="form-control" value="<?php echo $data['firstname']; ?>"
                                    placeholder="First name" name="firstname" />
                                <small class="text-danger"><?php echo $data['firstnameError']; ?></small>
                            </div>
                            <div class="col">
                                <label for="last-name">Last Name<span class="text-danger"> *</span></label>

                                <input type="text" class="form-control" value="<?php echo $data['lastname']; ?>"
                                    name="lastname" placeholder="Last name" />
                                <small class="text-danger"><?php echo $data['lastnameError']; ?></small>
                            </div>
                            <div class="col">
                                <label for="last-name">Middle Initial</label>

                                <input type="text" class="form-control" value="<?php echo $data['middleInitial']; ?>"
                                    name="middle_initial" placeholder="Middle Initial" />
                                <small class="text-danger"><?php echo $data['middleInitialError']; ?></small>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="first-name">Address<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" value="<?php echo $data['address']; ?>"
                                name="address" placeholder="Address" />
                            <small class="text-danger"><?php echo $data['addressError']; ?></small>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="first-name">City<span class="text-danger"> *</span></label>

                                <input type="text" class="form-control" value="<?php echo $data['city']; ?>" name="city"
                                    placeholder="City" />
                                <small class="text-danger"><?php echo $data['cityError']; ?></small>

                            </div>
                            <div class="col">
                                <label for="last-name">Region/Country<span class="text-danger"> *</span></label>

                                <input type="text" class="form-control" name="state" placeholder="Region/State"
                                    value="<?php echo $data['state']; ?>" />
                                <small class="text-danger"><?php echo $data['stateError']; ?></small>
                            </div>
                            <div class="col">
                                <label for="last-name">Zip Code<span class="text-danger"> *</span></label>

                                <input type="number" class="form-control" name="zip" placeholder="Zip Code"
                                    value="<?php echo $data['zip']; ?>" />
                                <small class="text-danger"><?php echo $data['zipError']; ?></small>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="first-name">Phone Number<span class="text-danger"> *</span></label>

                                <input type="text" class="form-control" value="<?php echo $data['contact']; ?>"
                                    placeholder="Contact no." name="contact" />
                                <small class="text-danger"><?php echo $data['contactError']; ?></small>
                            </div>
                            <div class="col">
                                <label for="last-name">Email<span class="text-danger"> *</span></label>

                                <input type="email" class="form-control" name="email" placeholder="Email"
                                    value="<?php echo $data['email']; ?>" />
                                <small class="text-danger"><?php echo $data['emailError']; ?></small>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="col">
                                <label for="first-name">Password<span class="text-danger"> *</span></label>
                                <input type="password" class="form-control" name="password" placeholder="Password" />
                                <small class="text-danger"><?php echo $data['passwordError']; ?></small>
                            </div>
                            <div class="col">
                                <label for="last-name">Confirm Password<span class="text-danger"> *</span></label>
                                <input type="password" class="form-control" name="confirmPassword"
                                    placeholder="Confirm Password" />
                                <small class="text-danger"><?php echo $data['confirmPasswordError']; ?></small>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="last-name">Choose Profile Picture</label>
                            <input type="file" class="form-control" name="profile" />
                        </div>

                        <!-- Submit button -->
                        <button name="submit" type="submit" class="btn btn-block btn-primary">
                            Register Information
                        </button>
                        <div class="text-center">
                            <span><a class="underlineHover" style="text-decoration: underline;"
                                    href="<?php echo URLROOT; ?>/auth/">Already have account? Log In</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
require APPROOT . '/views/users/includes/footer.php';
?>