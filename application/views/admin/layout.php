<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />

    <link href="<?= base_url(); ?>assets2/main.css" rel="stylesheet">
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

    <?php  include 'header.php'; ?>

    <div class="app-main">
        <?php include 'sidebar.php' ?>

        <?php $this->load->view($view); ?>

    </div>
</div>
<script type="text/javascript" src="<?= base_url(); ?>assets2/scripts/main.js"></script>
</body>
</html>
