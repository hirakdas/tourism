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
                                <select name="tour_id" id="tour_id" class="form-control" required>
                                    <option value="">Select Tour</option>
                                </select>
                            </div>

                            <div class="position-relative form-group">
                                <label for="introduction" class="">Introduction</label>
                                <textarea name="about"  class="form-control" required></textarea>
                            </div>

                            <div class="position-relative form-group">
                                <label for="details" class="">Details</label>
                                <textarea name="details"  class="form-control" required></textarea>
                            </div>

                            <div class="position-relative form-group">
                                <label for="image" class="">Images</label>
                                <input name="files" id="files" type="file" multiple="multiple" class="form-control-file" accept="image/*" required>
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

    $(document).ready(function(){
        $.ajax({
            url:"<?php echo base_url('admin/fetch_destination_dropdown'); ?>",
            method:"POST",
            dataType:"json",
            success: function (data) {
                $.each(data, function (key, value) {
                    $("#tour_id").append('<option value="' + value.id + '">' + value.tour_name + '</option>');
                });
            }
        });
    });

    $('#destination_form').submit(function(e){
        e.preventDefault();
        var files = $('#files')[0].files;
        var form_data = new FormData(this);
        for(var count = 0; count<files.length; count++) {
            form_data.append("files[]", files[count]);
        }
        $.ajax({
            url:"<?php echo base_url(); ?>admin/insert_destination_details", //base_url() return http://localhost/tutorial/codeigniter/
            method:"POST",
            data:form_data,
            contentType:false,
            cache:false,
            processData:false,
            dataType: 'json',
            // beforeSend:function()
            // {
            //     $('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
            // },
            success:function(data){
                console.log(data);

                if(data.error == 0){
                    $('#error').html("<div class='alert alert-success'>" +
                        "<a href='#' class='close' data-dismiss='alert'>&times;</a>" +
                        "<strong>Success! </strong>" + data.msg +
                        "</div>");
                    $('#destination_form')[0].reset();
                    window.scrollTo(0, 0);
                    window.setTimeout(function () {
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
</script>