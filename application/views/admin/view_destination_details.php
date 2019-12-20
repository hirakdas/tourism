<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-graph text-success">
                        </i>
                    </div>
                    <div>View Destination

                    </div>
                </div>
            </div>
        </div>


        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    <?php foreach ($result as $row): ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                                <div class="service-39381">
                                    <img src="<?= base_url('assets/images/destination/').$row['image']; ?>" alt="Image" class="img-fluid">
                                    <div class="p-4">
                                        <h3><span class="icon-room mr-1 text-primary"></span> <?=$row['location']?></h3>

                                        <div class="d-flex">
                                            <div class="mr-auto">
                                                <span class="icon-date_range"></span>
                                                <?= $row['duration']; ?>
                                            </div>
                                            <div class="ml-auto price">
                                                <span class="bg-primary">Rs <?= $row['price']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <a href="<?= base_url('admin/edit_destination_details/').$row['id']; ?>" class="btn btn-primary btn-sm update" id="'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="" class="btn btn-danger btn-sm item_delete delete" id="'. $row['id'] .'" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include'script.php' ?>