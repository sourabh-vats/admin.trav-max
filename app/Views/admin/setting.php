<div class="page-heading">
    <h2>Settings</h2>
</div>

<?php
helper('form');
$request = \Config\Services::request();
$session = session();
$uri = service('uri');
?>
<?php
// form data
$attributes = array('class' => 'form', 'id' => '');
echo form_open('/admin/setting', $attributes);
?>

<div class="form-group">
    <label>User Cashback Percent:</label>
    <?php
    echo form_input('user_cashback', isset($data['user_cashback']) ? $data['user_cashback'] : '', 'placeholder="" class="form-control"');
    ?>
    <button type="submit" class="btn btn-primary mt-2">Update</button>
</div>
<br>
<div class="form-group">
    <label>Parent Cashback Percent:</label>
    <?php
    echo form_input('parent_cashback', isset($data['parent_cashback']) ? $data['parent_cashback'] : '', 'placeholder="" class="form-control"');
    ?>
    <button type="submit" class="btn btn-primary mt-2">Update</button>
</div>

<?php
echo form_close();
?>

