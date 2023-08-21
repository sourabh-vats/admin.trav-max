<?php echo view('includes/admin/header'); ?>
    
<div class="col-sm-12 panel-body ">

<div>
    <?php echo view('includes/admin/sidebar'); ?>
</div>
<div class="col-sm-10 main-body" style="float:right; padding: 20px;">
    <?php echo view($main_content); ?>
</div>



</div>

<?php echo view('includes/admin/footer'); ?>