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
                                    <option value="<?= $tour_name[0]['id']?>"><?=$tour_name[0]['tour_name']?></option>
                                </select>
                            </div>

                            <div class="position-relative form-group">
                                <label for="introduction" class="">Introduction</label>
                                <textarea name="about" id="about" class="form-control" required><?= $text[0]['about']?></textarea>
                            </div>

                            <div class="position-relative form-group">
                                <label for="details" class="">Details</label>
                                <textarea name="details" id="details" class="form-control" required><?= $text[0]['details']?></textarea>
                            </div>

                            <div class="position-relative form-group">
                                <label for="image" class="">Images</label>
                                <input name="files" id="files" type="file" multiple="multiple" class="form-control-file" accept="image/*" required>
                            </div>

                            <button class="mt-1 btn btn-primary" type="submit">Submit</button>
                        </form>

                        <div class="row image_section">
                            <?php foreach ($img as $row): ?>
                            <div class="col-md-3 mt-5">
                                <div class="img_container text-right">
                                    <button class="btn text-right"></button>
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
</script>