<?php
require APPROOT . '/views/users/includes/header.php';
?>
<section class="page-search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Advance Search -->
                <div class="advance-search">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" id="inputtext4"
                                    placeholder="What are you looking for">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="inputCategory4" placeholder="Breed">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="inputLocation4" placeholder="Age">
                            </div>
                            <div class=" form-group col-md-2">

                                <button type="submit" class="btn btn-primary">Search Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-result bg-gray">
                    <h2>List of Pets to Adopt</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-grid-list">
                    <div class="row mt-30">
                        <?php foreach ($data['animal'] as $animal) : ?>

                        <div class="col-sm-12 col-lg-4 col-md-6">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="">
                                            <img class="card-img-top img-fluid"
                                                src="<?php echo URLROOT . "/public/assets/img/" . $animal->image ?>"
                                                alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href=""><?php echo $animal->name; ?></a></h4>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href=""><i
                                                        class="fa fa-folder-open-o"></i><?php echo $animal->breed; ?></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href=""><i class="fa fa-calendar"></i><?php echo $animal->age; ?></a>
                                            </li>
                                        </ul>
                                        <p class="card-text">
                                            <?php echo substr_replace($animal->description, '...', 85); ?>
                                        </p>
                                        <div class="product-ratings">
                                            <?php if (isUserLoggedIn()) : ?>
                                            <a class="btn btn-block btn-primary text-white"
                                                href="<?php echo URLROOT . "/pet/" . $animal->id?>">Adopt</a>
                                            <?php else:?>
                                            <a href="<?php echo URLROOT ?>/auth/register"
                                                class="btn btn-block btn-primary text-white">Adopt</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php
require APPROOT . '/views/users/includes/footer.php';
?>