<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-graph text-success">
                        </i>
                    </div>
                    <div>View Bookings

                    </div>
                </div>
            </div>
        </div>


        <div class="main-card mb-3 card">
            <div class="card-body" style="max-width: 900px; !important">
                <table id="booking_table">
                    <thead>
                    <tr class="text-center">
                        <th>Action</th>
                        <th>Customer Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Tour Name</th>
                        <th>People</th>
                        <th>Duration</th>
                        <th>Price</th>
                        <th>Amount Paid</th>
                        <th>Booking Date</th>
                        <th>Status</th>
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

        $('#booking_table').DataTable({
            ajax: "<?= base_url('admin/fetch_orders'); ?>",
            paging: true,
            responsive: true
        });
    });

    $(document).on('click','.delete', function(e){
        e.preventDefault();
        let table_name = 'orders';
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
                        url:'<?= base_url('admin/delete/'); ?>'+table_name+'/'+id,
                        type:"post",
                        processData:false,
                        contentType:false,
                        cache:false,
                        dataType: 'json',
                        success: function(data){
                            if(data.error === 0){
                                bootbox.alert(data.msg);
                                $('#booking_table').DataTable().ajax.reload(null,false);
                            }
                        }
                    });
                }

            }
        });

    });

    $('#orders').addClass('mm-active');
</script>