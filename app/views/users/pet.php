<?php
require APPROOT . '/views/users/includes/header.php';
?>
<section class="section bg-gray">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <!-- Left sidebar -->
            <div class="col-md-8">
                <div class="product-details">
                    <h1 class="product-title"><?php echo $data['animal']->name; ?></h1>
                    <div class="product-meta">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-user-o"></i>
                                <?php echo $data['animal']->breed; ?></li>
                            <li class="list-inline-item"><i class="fa fa-folder-open-o">
                                </i><?php echo $data['animal']->age; ?></li>
                            <li class="list-inline-item"><i class="fa fa-location-arrow"></i>
                                <?php echo $data['animal']->vaccinated; ?></li>
                        </ul>
                    </div>
                    <div id="carouselExampleIndicators" class="product-slider carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100"
                                    src="<?php echo URLROOT . "/public/assets/img/" . $data['animal']->image ?>"
                                    alt="First slide">
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <h3 class="tab-title">Pet Description</h3>
                                <ul>
                                    <li><strong>Pet Gender: </strong><?php echo $data['animal']->gender; ?>
                                    </li>
                                    <li><strong>Pet
                                            Size: </strong><?php echo $data['animal']->size; ?>
                                    </li>
                                    <li><strong>Pet
                                            Color: </strong><?php echo $data['animal']->color; ?>
                                    </li>
                                    <li><strong>Coat length: </strong><?php echo $data['animal']->coat_length; ?>
                                    </li>
                                    <li><strong>Pet birthdate: </strong><?php echo $data['animal']->birthdate; ?>
                                    </li>
                                    <li><strong>Health Status: </strong><?php echo $data['animal']->vaccinated; ?>
                                    </li>
                                    <li><strong>Is adopted? : </strong><?php echo $data['animal']->adoption_status; ?>
                                    </li>
                                </ul>

                                <p></p>
                                <p><?php echo $data['animal']->description; ?></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="widget price text-center">
                        <h4>Price</h4>
                        <p><?php echo number_format($data['animal']->adoption_fee, 2); ?></p>
                    </div>
                    <!-- Rate Widget -->
                    <div class="widget rate">
                        <!-- Heading -->
                        <h5 class="widget-header text-center"><strong>Animal adoption</strong>
                            <br>
                            3 in 1 Company
                        </h5>
                        <p>Contact: 09218989341</p>
                        <p> Johndaleapon@gmail.com</p>
                        <!-- Rate -->
                        <div class="starrr"></div>
                    </div>

                    <!-- Coupon Widget -->
                    <div class="widget coupon text-center">
                        <!-- Coupon description -->
                        <p>Do you like this pet? <br> Adopt Now!
                        </p>
                        <!-- Submii button -->
                        <a href="" class="btn btn-transparent-white">Adopt Pet</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- Container End -->
</section>