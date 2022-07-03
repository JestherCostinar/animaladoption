<?php
require APPROOT . '/views/admin/includes/header.php';
?>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="alert  clearfix">
        <a href="<?php echo URLROOT ?>/animal/create/" type="button" class="btn btn-primary float-right">
            Create Animal
        </a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Animals</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">Image</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Breed</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Health</th>
                            <th class="text-center">Adoption Status</th>
                            <th>Profile</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['animal'] as $animal) : ?>
                        <tr>
                            <td class="pt-3-half">
                                <?php if (!empty($animal->image)) : ?>
                                <img class="rounded mx-auto d-block"
                                    src="<?php echo URLROOT . "/public/assets/img/" . $animal->image ?>" width="50"
                                    height="50px">
                                <?php endif; ?>
                            </td>
                            <td class="pt-3-half"><?php echo $animal->name; ?></td>
                            <td class="pt-3-half"><?php echo $animal->breed; ?></td>
                            <td class="pt-3-half"><?php echo $animal->gender; ?></td>
                            <td class="pt-3-half"><?php echo $animal->age; ?></td>
                            <td class="pt-3-half"><?php echo $animal->vaccinated; ?></td>
                            <td class="pt-3-half">
                                <span class="badge badge-primary"><?php echo $animal->adoption_status; ?></span>
                            </td>
                            <td class="pt-3-half">
                                <span class="table-remove"><button type="button"
                                        class="btn btn-primary btn-rounded btn-sm my-0">
                                        View
                                    </button></span>
                            </td>
                            <td align="center">
                                <form action="<?php echo URLROOT . "/animal/delete/" . $animal->id ?>" method="POST"
                                    style="display: inline ">
                                    <span class="table-remove">
                                        <input type="submit" name="delete" value="Remove"
                                            class="btn btn-danger btn-rounded btn-sm my-0">
                                    </span>
                                </form>
                                <span class="table-remove"><a
                                        href="<?php echo URLROOT . "/animal/update/" . $animal->id ?>" type="button"
                                        class="btn btn-success btn-rounded btn-sm my-0">
                                        Update
                                    </a></span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<?php
require APPROOT . '/views/admin/includes/footer.php';
?>