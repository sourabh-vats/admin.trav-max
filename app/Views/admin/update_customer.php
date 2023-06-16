<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
<h1>Customers on Hold</h1>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">Srno.</th>
            <th scope="col">Trav ID</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col">Booking Amount</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($customers as $customer) {
            echo '<tr>
                    <th scope="row">' . $i . '</th>
                    <td class="cust_id" id="' . $customer->id . '">' . $customer->customer_id . '</td>
                    <td>' . $customer->f_name . ' ' . $customer->l_name . '</td>
                    <td class="role">' . $customer->role . " " . $customer->booking_packages_number . 'x</td>
                    <td class="booking_amount">' . $customer->booking_amount . '</td>
                    <td><button class="approve_btn">Approve</button></td>
                 </tr>';
            $i++;
        }
        ?>
    </tbody>
</table>
<form id="approve_customer_form" action="" method="post">
    <input type="text" name="id" id="id">
    <input type="text" name="customer_id" id="customer_id">
    <input type="text" name="booking_amount" id="booking_amount">
</form>
<script>
    $(".approve_btn").click(function() {
        $("#id").val($(this).parent().parent().children(".cust_id").attr("id"));
        $("#customer_id").val($(this).parent().parent().children(".cust_id").text());
        $("#booking_amount").val($(this).parent().parent().children(".booking_amount").text());
        $("#approve_customer_form").submit();
    });
</script>