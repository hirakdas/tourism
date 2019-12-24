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
                        <table id="destination_table">
                            <thead>
                            <tr class="text-center">
                                <th>Action</th>
                                <th>Tour Name</th>
                                <th>Location</th>
                                <th>Introduction</th>
                                <th>Duration</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

</div>
<?php include'script.php' ?>
<script>
    $(document).ready(function() {

        $('#destination_table').DataTable({
            ajax: "<?= base_url('admin/fetch_destination'); ?>",
            paging: true,
            columnDefs: [ {
                targets: [3,5],
                render: function ( data, type, row ) {
                    return data.substr( 0, 15);
                }
            } ],
        });
    });

    $(document).on('click','.delete', function(e){
        e.preventDefault();
        let id = $(this).attr("id");
        bootbox.confirm({
            message: "Are you sure you want to delete it?",
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
                        url:'<?= base_url('admin/delete_destination/'); ?>'+id,
                        type:"post",
                        processData:false,
                        contentType:false,
                        cache:false,
                        dataType: 'json',
                        success: function(data){
                            if(data.error === 0){
                                bootbox.alert(data.msg);
                                $('#destination_table').DataTable().ajax.reload();
                            }
                        }
                    });
                }

            }
        });

        });
</script>