<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-graph text-success">
                        </i>
                    </div>
                    <div>Destination

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="error"></div>
                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <form method="post" id="destination_form_edit">
                            <div class="position-relative form-group">
                                <label for="tour_name" class="">Tour Name</label>
                                <input name="tour_name"  value="<?= $result['tour_name'] ?>" type="text" class="form-control" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="location" class="">Location</label>
                                <input name="location"  value="<?= $result['location'] ?>" type="text" class="form-control" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="introduction" class="">Introduction</label>
                                <textarea name="introduction" class="form-control" required><?= $result['introduction'] ?></textarea>
                            </div>
                            <div class="position-relative form-group">
                                <label for="duration" class="">Duration</label>
                                <input name="duration" value="<?= $result['duration'] ?>" type="text" class="form-control" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="price" class="">Price</label>
                                <input name="price" value="<?= $result['price'] ?>" type="text" class="form-control" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="image" class="">Image</label>
                                <div>
                                    <img src="<?= base_url('assets/images/destination/').$result['image'];?>" height="100px" width="100px">
                                </div>
                            </div>
                            <div class="position-relative form-group">
                                <label for="image" class="">Change Image</label>
                                <input name="image" id="image" type="file" class="form-control-file" accept="image/*" >
                            </div>
                            <input type="hidden" class="destination_id" id="<?= $result['id'];?>">
                            <button class="mt-1 btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'script.php'; ?>

<script>

    CKEDITOR.replace('introduction');

    $('#destination_form_edit').submit(function(e){

        e.preventDefault();
        let id = $('.destination_id').attr('id');

        $.ajax({
            url:'<?= base_url('admin/update_destination/'); ?>'+id,
            type:"post",
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            dataType: 'json',
            success: function(data){

                if(data.error === 0){
                    window.scrollTo(0, 0);
                    $('#error').html("<div class='alert alert-success'>" +
                        "<a href='#' class='close' data-dismiss='alert'>&times;</a>" +
                        "<strong>Success! </strong>" + data.msg +
                        "</div>");
                    window.setTimeout(function () {
                        $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
                            $(this).remove();
                            window.location.href = '<?= base_url('admin/view_destination')?>';
                        });
                    }, 1000);
                }
                else{
                    $('#error').html("<div class='alert alert-danger'>" +
                        "<a href='#' class='close' data-dismiss='alert'>&times;</a>" +
                        "<strong>Error! </strong>" + data.msg +
                        "</div>");
                }
            }
        });
    })
    $('#view_destination').addClass('mm-active');

</script>