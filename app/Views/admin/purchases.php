<div class="page-heading">
    <h2>View Purchases</h2>
</div>

<div class="purchases-list">
    <?php if (!empty($purchases)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Trav ID</th>
                    <th>Purchase Type</th>
                    <th>Amount</th>
                    <th>Purchase Date</th>
                    <th>Payment Mode</th>
                    <th>Invoice</th>
                    <th>Document</th>
                    <th>Cashback</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchases as $purchase): ?>
                    <tr>
                        <td><?php echo $purchase['id']; ?></td>
                        <td><?php echo $purchase['trav_id']; ?></td>
                        <td><?php echo $purchase['purchase_type']; ?></td>
                        <td><?php echo $purchase['amount']; ?></td>
                        <td><?php echo $purchase['purchase_date']; ?></td>
                        <td><?php echo $purchase['payment_mode']; ?></td>
                        <td><?php echo $purchase['invoice']; ?></td>
                        <td><?php echo $purchase['document']; ?></td>
                        <td><?php echo $purchase['cashback']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No purchases found.</p>
    <?php endif; ?>
</div>
