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

                        <form method="post" id="destination_details_edit">
                            <div class="position-relative form-group">
                                <label for="tour_name" class="">Tour Name</label>
                                <select name="tour_id" id="tour_id" class="form-control" required>
                                    <option value="<?= $tour_name['id']?>"><?=$tour_name['tour_name']?></option>
                                </select>
                            </div>

                            <div class="position-relative form-group">
                                <label for="introduction" class="">Introduction</label>
                                <textarea  id="about" class="form-control" required><?= $text['about']?></textarea>
                            </div>

                            <div class="position-relative form-group">
                                <label for="details" class="">Details</label>
                                <textarea  id="details" class="form-control" required><?= $text['details']?></textarea>
                            </div>

                            <div class="position-relative form-group">
                                <label for="image" class="">Images</label>
                                <input name="files" id="files" type="file" multiple="multiple" class="form-control-file" accept="image/*">
                            </div>

                            <button class="mt-1 btn btn-primary" type="submit">Submit</button>
                        </form>

                        <div class="row image_section">
                            <?php foreach ($img as $row): ?>
                            <div class="col-md-3 mt-5">
                                <div class="img_container text-right">
                                    <button class="btn text-right" onclick="del_img(<?=$row['id']?>)"><i class="fa fa-times" aria-hidden="true"></i></button>
                                    <img src="<?= base_url('assets/images/destination_details/').$row['image']?>" height="200px" width="200px">
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'script.php'; ?>

<script>
    CKEDITOR.replace('details');
    CKEDITOR.replace('about');
    function del_img(id){
        let table_name = 'destination_img';
        bootbox.confirm({
            message: "This is a confirm with custom button text and color! Do you like it?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if(result){
                    $.ajax({
                        url:'<?= base_url('admin/delete/'); ?>'+table_name+'/'+id,
                        type:"post",
                        processData:false,
                        contentType:false,
                        cache:false,
                        dataType: 'json',
                        success: function(data){
                            if(data.error === 0){
                                window.location.reload();
                            }
                        }
                    });
                }

            }
        });


    }

    $('#destination_details_edit').submit(function(e) {
        e.preventDefault();
        let id = $('.destination_id').attr('id');
        var files = $('#files')[0].files;
        var form_data = new FormData(this);
        form_data.append('details', CKEDITOR.instances['details'].getData());
        form_data.append('about', CKEDITOR.instances['about'].getData());
        for(var count = 0; count<files.length; count++) {
            form_data.append("files[]", files[count]);
        }
        $.ajax({
            url: '<?= base_url('admin/update_destination_details/'); ?>' + id,
            type: "post",
            data: form_data,
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json',
            success: function (data) {

                if (data.error === 0) {
                    $('#error').html("<div class='alert alert-success'>" +
                        "<a href='#' class='close' data-dismiss='alert'>&times;</a>" +
                        "<strong>Success! </strong>" + data.msg +
                        "</div>");
                    $('#destination_details_edit')[0].reset();
                    window.scrollTo(0, 0);
                    window.setTimeout(function () {
                        $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
                            $(this).remove();
                            window.location.href = '<?= base_url('admin/view_destination_details')?>';
                        });
                    }, 1000);
                }
                else {
                    $('#error').html("<div class='alert alert-danger'>" +
                        "<a href='#' class='close' data-dismiss='alert'>&times;</a>" +
                        "<strong>Error! </strong>" + data.msg +
                        "</div>");
                }
            }
        });
    });

    $('#view_dest_details').addClass('mm-active');


</script>