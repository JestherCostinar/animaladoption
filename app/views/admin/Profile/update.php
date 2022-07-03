<?php
require APPROOT . '/views/admin/includes/header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <a href="<?php echo URLROOT; ?>/profile/" class="btn btn-primary mb-3 px-5 py-2">Go back to profile</a>

    <div class="row">

        <!-- First Column -->
        <div class="col-lg-4">

            <!-- Custom Text Color Utilities -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Admin Profile</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <?php if (!$data['adminProfile']->image) : ?>
                            <img class="profile-img" src="<?php echo URLROOT ?>/public/assets/img/default.jpeg" class="rounded-circle" width="150" />
                        <?php else : ?>
                            <img src="<?php echo URLROOT . "/public/assets/img/" . $data['adminProfile']->image ?>" class="rounded-circle" width="150" />
                        <?php endif; ?>
                        <p style="margin-top: 1rem; font-weight: 700; margin-bottom: 7px">Johndale Apon</p>
                        <small>Animal Adoption Administator</small>
                    </div>
                </div>
            </div>

        </div>

        <!-- Second Column -->
        <div class="col-lg-8">

            <!-- Background Gradient Utilities -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">More information
                    </h6>
                </div>
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" action="<?php echo URLROOT . "/profile/update/" . $data['adminProfile']->id ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Profile Picture</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control ps-0 form-control-line" placeholder="Choose profile picture" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">First Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control ps-0 form-control-line" value="<?php echo $data['adminProfile']->firstname ?>" name="firstname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Last Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control ps-0 form-control-line" value="<?php echo $data['adminProfile']->lastname ?>" name="lastname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Username</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control ps-0 form-control-line" value="<?php echo $data['adminProfile']->username ?>" name="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Phone No</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control ps-0 form-control-line" value="<?php echo $data['adminProfile']->contact ?>" name="contact">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" class="form-control ps-0 form-control-line" id="example-email" value="<?php echo $data['adminProfile']->email ?>" name="email">
                            </div>
                        </div>
                        <!-- <label for=""><?php echo URLROOT . "/profile/update/" . $data['adminProfile']->id ?></label> -->
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button type="submit" name="submit" class=" btn btn-success mx-auto mx-md-0 text-white">Save Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->

<?php
require APPROOT . '/views/admin/includes/footer.php';
?>