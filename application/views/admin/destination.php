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
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <!--                           <h5 class="card-title">Controls Types</h5>-->
                        <form class="" id="destination_form">
                            <div class="position-relative form-group">
                                <label for="location" class="">Location</label>
                                <input name="location"  type="text" class="form-control" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="introduction" class="">Introduction</label>
                                <textarea name="introduction"  class="form-control" required></textarea>
                            </div>
                            <div class="position-relative form-group">
                                <label for="duration" class="">Duration</label>
                                <input name="duration"  type="text" class="form-control" required>
                            </div>
                            <div class="position-relative form-group">
                                <label for="price" class="">Price</label>
                                <input name="price"  type="text" class="form-control" required>
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

<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

<script>
    $('#destination_form').submit(function(e){
        // console.error(new FormData(this));
        let formData = new FormData();
        formData.append('file', $('#image')[0].files[0]);
        e.preventDefault();
        $.ajax({
            url:'<?= base_url('admin/insert_destination'); ?>',
            type:"post",
            data:formData,
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            dataType: 'json',
            success: function(data){

                if(data.error === 0){

                }
                else{
                    $('#error').html("<div class='alert alert-danger'>" +
                        "<button type='button' class='close' data-dismiss='alert'>x</button>" +
                        "<strong>Error! </strong>" + data.msg +
                        "</div>");
                }
            }
        });
    })
</script>