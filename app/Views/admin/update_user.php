<div class="page-heading">
    <h2>Update User</h2>
</div>

<?php
helper('form');
$request = \Config\Services::request();
//flash messages
$session = session();
$uri = service('uri');
if ($session->getFlashdata('flash_message')) {
    if ($session->getFlashdata('flash_message')    == 'activated') {
        echo '<div class="alert alert-success">';
        echo '<a class="close" data-dismiss="alert">×</a>';
        echo '<strong></strong> You Become Macro successfully.';
        echo '</div>';
    } elseif ($session->getFlashdata('flash_message')    == 'no_record') {
        echo '<div class="alert alert-danger">';
        echo '<a class="close" data-dismiss="alert">×</a>';
        echo '<strong>Error!</strong>Active Record Not Found. Come Back Soon.';
        echo '</div>';
    } elseif ($session->getFlashdata('flash_message')    == 'already') {
        echo '<div class="alert alert-danger">';
        echo '<a class="close" data-dismiss="alert">×</a>';
        echo '<strong>Error!</strong>You Already Used Activated Your Account.';
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger">';
        echo '<a class="close" data-dismiss="alert">×</a>';
        echo '<strong>Error!</strong>PIN not activated please try again.';
        echo '</div>';
    }
}
?>

<?php
//form data
$attributes = array('class' => 'form', 'id' => '');

//form validation
//  
//print_r($editor);
if (empty($user)) {
    echo form_open(base_url().'admin/update_user', $attributes);
?>
    <fieldset>
        <div class="form-group col-sm-4">
            <label>Customer ID :</label>
            <input type="hidden" name="find_customer" value="yes">
            <?php
            echo form_input('assign_to', '', 'placeholder="" class="form-control"');?>
        </div>
        <div class="form-group  col-lg-12">
            <?php
        echo form_submit('submit', 'Find Customer', 'class="btn btn-large btn-primary"'); ?>
        </div>
    </fieldset>
<?php echo form_close();
} else {
    echo form_open(base_url().'admin/update_user/' . $uri->getSegment(3), $attributes);
?>
    <fieldset>
        <div class="form-group col-sm-4">
            <p>
                <label>Customer: </label>&nbsp;<?php echo $user[0]['f_name'] . ' ' . $user[0]['l_name'] . ' (' . $user[0]['customer_id'] . ')'; ?>
            </p>
            <p><label>Booked Package: </label>&nbsp;<?php echo $package[0]['name']; ?></p>
            <p><label>Payment Plan: </label>&nbsp;<?php echo $user_package_booked[0]['payment_type'];; ?></p>
            <p><label>Package Amount: </label>&nbsp;<?php echo $package[0]['total']; ?></p>
            <p><label>Amount Paid: </label>&nbsp;<?php echo $user_package_booked[0]['amount_paid']; ?></p>
            <p><label>Amount Remaining: </label>&nbsp;<?php echo $user_package_booked[0]['amount_remaining']; ?></p>
            <p><label>Paying Now: </label><input type="number" name="payment" value="" required></p>
            <input type="hidden" name="assign_to" value="<?php echo $user[0]['customer_id']; ?>">
            <input type="hidden" name="product" value="<?php echo $package[0]['total']; ?>">
            <input type="hidden" name="gst" value="">
        </div>
        <div class="form-group  col-lg-12">
            <button class="btn btn-success" type="submit">Update</button> &nbsp;
            <a class="btn btn-primary" href="<?php echo base_url() . 'admin/update_user'; ?>">Back </a>
        </div>
    </fieldset>

<?php
    echo form_close();
} ?>