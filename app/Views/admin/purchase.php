<div class="page-heading">
    <h2>Purchase</h2>
</div>

<?php
helper('form');
$request = \Config\Services::request();
// flash messages
$session = session();
$uri = service('uri');
?>

<?php
// form data
$attributes = array('class' => 'form', 'id' => '', 'enctype' => 'multipart/form-data');
echo form_open(base_url().'admin/purchase/' . $uri->getSegment(3), $attributes);

?>

    <fieldset>
        <div class="form-group">
            <label>Trav ID:</label>
            <?php
            echo form_input('trav_id', '', 'placeholder="" class="form-control"');
            ?>
        </div>
        <div class="form-group">
            <label>Purchase Type:</label>
            <?php
            $options = array(
                'Air_ticket' => 'Air ticket',
                'Hotel_Booking' => 'Hotel Booking',
                'Visa_Application' => 'Visa Application',
                'Study_Abrod' => 'Study Abrod',
                'Pr' => 'Pr',
                'Others' => 'Others',

                // Add more options as needed
            );
            echo form_dropdown('purchase_type', $options, '', 'class="form-control"');
            ?>
        </div>
        <div class="form-group">
            <label>Amount:</label>
            <?php
            echo form_input('amount', '', 'placeholder="" class="form-control"');
            ?>
        </div>
        <div class="form-group">
            <label>Date of Purchase:</label>
            <?php
            echo form_input('purchase_date', '', 'placeholder="" class="form-control datepicker"');
            ?>
        </div>
        <div class="form-group">
            <label>Mode of Payment:</label>
            <?php
            $payment_options = array(
                'upi' => 'UPI',
                'bank_transfer' => 'Bank Transfer',
                'cash' => 'Cash',
                // Add more options as needed
            );
            echo form_dropdown('payment_mode', $payment_options, '', 'class="form-control"');
            ?>
        </div>
        <div class="form-group">
            <label>Invoice:</label>
            <?php
            echo form_input('invoice', '', 'placeholder="" class="form-control"');
            ?>
        </div>
        <div class="form-group">
            <label>Upload Document:</label>
            <?php
            echo form_upload('document', '', 'class="form-control"');
            ?>
        </div>
        <div class="form-group">
            <label>Cashback (Between 100 and 1000):</label>
            <?php
            echo form_input('cashback', '', 'placeholder="" class="form-control"');
            ?>
        </div>
        <div class="form-group">
            <?php
            echo form_submit('submit', 'Submit', 'class="btn btn-primary"');
            ?>
        </div>
    </fieldset>
<?php
    echo form_close();
?>
