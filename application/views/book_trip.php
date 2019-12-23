<div class="intro-section" style="background-image: url('<?= base_url(); ?>assets/images/kamakhya_bg.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mx-auto text-center" data-aos="fade-up">
                <h1>About <?= $destination['tour_name'] ?></h1>
                <p><?= $text['about']?></p>
                <p><strong>Rs: <?= $destination['price'] ?></strong></p>
                <p><a href="<?= base_url('main/book_now/').$destination['tour_name']; ?>" class="btn btn-primary py-3 px-5">Book Now</a></p>
            </div>
        </div>
    </div>
</div>


<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <span class="text-serif text-primary">Destination</span>
                <h3 class="heading-92913 text-black text-center"><?= $destination['location'] ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <?= $text['details'] ?>
            </div>

            <?php foreach ($img as $row): ?>
            <div class="col-md-6 col-lg-4 mb-4">

                    <div class="service-39381">
                        <img src="<?= base_url(); ?>assets/images/destination_details/<?=$row['image']?>" alt="Image" class="img-fluid">

                    </div>
            </div>
            <?php endforeach; ?>



        </div>
    </div>
</div>



<div class="site-section bg-image overlay" style="background-image: url('<?= base_url(); ?>assets/images/hero_1.jpg');">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="counter-39392">
                    <h3>349</h3>
                    <span>Number of Yacht</span>
                </div>
            </div>
            <div class="col">
                <div class="counter-39392">
                    <h3>7000+</h3>
                    <span>Customers Satisfied</span>
                </div>
            </div>
            <div class="col">
                <div class="counter-39392">
                    <h3>120</h3>
                    <span>Number of Staffs</span>
                </div>
            </div>
            <div class="col">
                <div class="counter-39392">
                    <h3>493</h3>
                    <span>Sea Destinations</span>
                </div>
            </div>
            <div class="col">
                <div class="counter-39392">
                    <h3>230</h3>
                    <span>Professional Sailors</span>
                </div>
            </div>
        </div>
    </div>
</div>






<!---->
<!--<script>-->
<!--    $('#about_us').addClass('active');-->
<!--</script>-->