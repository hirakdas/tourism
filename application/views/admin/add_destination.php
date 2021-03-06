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

                        <form method="post" id="destination_form">
                            <div class="position-relative form-group">
                                <label for="tour_name" class="">Tour Name</label>
                                <input name="tour_name"  type="text" class="form-control" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="location" class="">Location</label>
                                <input name="location"  type="text" class="form-control" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="introduction" class="">Introduction</label>
                                <textarea id="introduction" class="form-control" required></textarea>
                            </div>
                            <div class="position-relative form-group">
                                <label for="duration" class="">Duration</label>
                                <input name="duration"  type="text" class="form-control" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="price" class="">Price</label>
                                <input name="price"  type="text" class="form-control" onkeypress="return ((event.charCode >= 48 &&  event.charCode <= 57) || (event.charCode >= 0 && event.charCode <= 31) )" maxlength="6" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="image" class="">Image</label>
                                <input name="image" id="image" type="file" class="form-control-file" accept="image/*" required>
                            </div>

                            <button class="mt-1 btn btn-primary" type="submit">Submit</button>
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
    $('#destination_form').submit(function(e){
        e.preventDefault();
        var form_data = new FormData(this);
        form_data.append('introduction', CKEDITOR.instances['introduction'].getData());
        $.ajax({
            url:'<?= base_url('admin/insert_destination'); ?>',
            type:"post",
            data:form_data,
            processData:false,
            contentType:false,
            cache:false,
            dataType: 'json',
            success: function(data){

                if(data.error == 0){
                    $('#destination_form')[0].reset()
                    window.scrollTo(0, 0);
                    $('#error').html("<div class='alert alert-success'>" +
                        "<a href='#' class='close' data-dismiss='alert'>&times;</a>" +
                        "<strong>Success! </strong>" + data.msg +
                        "</div>");
                    window.setTimeout(function() {
                        $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
                            $(this).remove();
                        });
                    }, 2000);
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
    $('#add_destination').addClass('mm-active');
</script>