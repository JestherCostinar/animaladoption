<?php
require APPROOT . '/views/admin/includes/header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <a href="<?php echo URLROOT; ?>/animal/" class="btn btn-primary mb-3 px-5 py-2">Go back to list of animals</a>

    <div class="row">

        <!-- Second Column -->
        <div class="col-lg-12">

            <!-- Background Gradient Utilities -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Animal information
                    </h6>
                </div>
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" action="<?php echo URLROOT ?>/animal/create/" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Pet Image</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control ps-0 form-control-line" placeholder="Choose profile picture" name="pet_image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Pet Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control ps-0 form-control-line" name="pet_name" placeholder="Enter Pet Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Pet Breed</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control ps-0 form-control-line" name="pet_breed" placeholder="Enter Pet Breed">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 mb-0">Pet Gender</label>
                            <div class="col-md-12">
                                <select class="form-control input-sm" name="pet_gender">
                                    <option value="None" selected="selected">---Select Pet Gender---</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Pet Size</label>
                            <div class="col-md-12">
                                <select class="form-control input-sm" name="pet_size">
                                    <option value="None" selected="selected">---Select Pet Size---</option>
                                    <option value="Small">Small (0-25 lbs)</option>
                                    <option value="Medium">Medium (26-60 lbs)</option>
                                    <option value="Large">Large (61-100 lbs)</option>
                                    <option value="Extra Large">Extra Large (101 lbs or more)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Pet Color</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control ps-0 form-control-line" name="pet_color" placeholder="Enter Pet Color">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Vaccinated</label>
                            <div class="col-md-12">
                                <select class="form-control input-sm" name="pet_vaccinated">
                                    <option value="None" selected="selected">---Choose health information of pet---</option>
                                    <option value="Vaccination up to date">Vaccination up to date</option>
                                    <option value="Not Vaccinated">Not Vaccinated</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Pet Age</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control ps-0 form-control-line" name="pet_age" placeholder="Enter Pet Age">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Pet Coat Length</label>
                            <div class="col-md-12">
                                <select class="form-control input-sm" name="coat_length" required="">
                                    <option value="None" selected="selected">---Select Pet Coat Length---</option>
                                    <option value="Hairless">Hairless</option>
                                    <option value="Short">Short</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Long">Long</option>
                                    <option value="Wire">Wire</option>
                                    <option value="Curly">Curly</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Adoption Fee</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control ps-0 form-control-line" name="adoption_fee" placeholder="Enter Adoption Fee">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Pet Description</label>
                            <div class="col-md-12">
                                <textarea class="form-control ps-0 form-control-line" name="pet_description" id="" cols="30" rows="10" placeholder="Description..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button type="submit" name="submit" class=" btn btn-success mx-auto mx-md-0 text-white">Save Information</button>
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