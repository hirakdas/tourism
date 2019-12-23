<div class="site-section">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <span class="text-serif text-primary">Book Now</span>
                <h3 class="heading-92913 text-black"><?= $destination['tour_name'] ?>, <?= $destination['location'] ?></h3>
                <form class="row" id="booking_form" method="post">
                    <div class="form-group col-md-6">
                        <label for="input-1">Full Name:</label>
                        <input type="text" name="full_name" class="form-control" id="input-1" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input-2">Number of People:</label>
                        <input type="text" name="people" class="form-control" id="input-2">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input-3">Date From:</label>
                        <input type="text" name="date_from" class="form-control datepicker" id="input-3">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input-4">Date To:</label>
                        <input type="text" name="date_to" class="form-control datepicker" id="input-4">
                    </div>


                    <div class="form-group col-md-6">
                        <label for="input-6">Email Address</label>
                        <input type="email" name="email" class="form-control" id="input-6">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input-7">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="input-7" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input-7"><strong><h3>Pay: Rs <?= $destination['price']; ?></h3></strong></label>
                    </div>

                    <input type="hidden" name="tour_id" value="<?= $destination['id'] ?>">
                    <input type="hidden" name="tour_name" value="<?= $destination['tour_name'] ?>">
                    <input type="hidden" name="price" value="<?= $destination['price'] ?>">



                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary py-3 px-5">Book Now</button>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets2/scripts/bootbox.locales.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets2/scripts/bootbox.min.js"></script>
<script>
    $(document).on('submit','#booking_form', function(e){
        e.preventDefault();
        $.ajax({
            url:'<?= base_url('main/bookings'); ?>',
            type:"post",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            dataType: 'json',
            success: function(data){
                if(data.error === 0){
                    bootbox.alert(data.msg);
                }
            }
        });
    });

    $('.bootbox-accept').click(function(){
        alert('hi');
    })

</script>