<?php
require APPROOT . '/views/users/includes/header.php';
?>

<section class="hero-area bg-1 text-center overly">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Contetnt -->
                <div class="content-block">
                    <h1>Buy & Sell Near You </h1>
                    <p>Join the millions who buy and sell from each other <br> everyday in local communities around the
                        world</p>
                    <div class="short-popular-category-list text-center">
                        <h2>Popular Category</h2>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-bed"></i> Hotel</a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-grav"></i> Fitness</a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-car"></i> Cars</a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-cutlery"></i> Restaurants</a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-coffee"></i> Cafe</a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Latest Pet</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, magnam.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- offer 01 -->
            <?php foreach ($data['animal'] as $animal) : ?>

            <div class="col-sm-12 col-lg-4">
                <!-- product card -->
                <div class="product-item bg-light">
                    <div class="card">
                        <div class="thumb-content">
                            <!-- <div class="price">$200</div> -->
                            <td class="pt-3-half">
                                <?php if (!empty($animal->image)) : ?>
                                <img class="card-img-top img-fluid"
                                    src="<?php echo URLROOT . "/public/assets/img/" . $animal->image ?>" width="50"
                                    height="50px">
                                <?php endif; ?>
                            </td>

                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><a href=""><?php echo $animal->name; ?></a></h4>
                            <ul class="list-inline product-meta">
                                <li class="list-inline-item">
                                    <a href=""><i class="fa fa-folder-open-o"></i><?php echo $animal->breed; ?></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href=""><i class="fa fa-calendar"></i><?php echo $animal->age; ?></a>
                                </li>
                            </ul>
                            <p class="card-text"><?php echo $animal->description; ?></p>
                            <div class="product-ratings">
                                <?php if (isUserLoggedIn()) : ?>
                                <a class="btn btn-block btn-primary text-white" href="">Adopt</a>
                                <p>login</p>
                                <?php else:?>
                                <a href="<?php echo URLROOT ?>/auth/register"
                                    class="btn btn-block btn-primary text-white">Adopt</a>
                                not login
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php
require APPROOT . '/views/users/includes/footer.php';
?>