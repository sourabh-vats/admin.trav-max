

<div class="page-heading">

        <h2>Total Purchase  <?php echo session('full_name');?></h2>
      </div>
  <div class="boxesss Purchasessss">
    <div id="example_wrapper" class="dataTables_wrapper">
        <div id="example_wrapper" class="dataTables_wrapper no-footer">
            
			<div class="tablee" style="width:100%; overflow-x:auto;">
 <div id="example_wrapper" class="dataTables_wrapper">
        
      <table id="example" class="table table-bordered table-hover customer-table">
      
         <thead>
            
            
            <tr role="row">
               <th>S No.</th>
               <th >Date</th>
               <th >Type of Purchase </th>
               <th>Transaction ID</th>
               <th>Purchase Amount</th>
               <th>Purchase Status </th>
               <th>View</th>
           
            </tr>
         </thead>
         <tbody>


            <?php

            if(!empty($purchases)) { $i = 1;
                foreach ($purchases as $value) {
                    echo '<tr><td>'.$i.'</td><td>'.$value['rdate'].'</td><td>'.$value['order_type'].' '.$value['purchase_type'].' '.$value['type'].'</td><td>'.$value['transaction_id'].'</td><td>'.$value['amount'].'</td><td>'.$value['status'].'</td><td><a href="'.base_url().'admin/customer/info/'.$value['cid'].'">View</a></td>';
                    $i++;
                }
            }
            ?>  
         </tbody>
      </table> 
   </div>
</div>



<!-- <div class="tablee" style="width:100%; overflow-x:auto;">
            <table id="example" class="table table-bordered table-hover customer-table dataTable no-footer" role="grid" aria-describedby="example_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 18px;" aria-label="S No.: activate to sort column descending" aria-sort="ascending">S No.</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 36px;" aria-label="Image: activate to sort column ascending">Date</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 42px;" aria-label="Product Name : activate to sort column ascending">Transaction Id</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 40px;" aria-label="Product Type: activate to sort column ascending">Category</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 70px;" aria-label="Category/Sub Category: activate to sort column ascending">Merchant Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 42px;" aria-label="Product Code : activate to sort column ascending">Description</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 43px;" aria-label="Product MRP (₹): activate to sort column ascending">Amount (₹)</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 39px;" aria-label="Special Offer: activate to sort column ascending">Cashback (₹)</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 49px;" aria-label="Cashback (₹) : activate to sort column ascending">Approved (₹)</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 85px;" aria-label="Moneyback(₹): activate to sort column ascending">Pending (₹)</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 72px;" aria-label="Income Account(₹): activate to sort column ascending">Redeemed (₹)</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if(!empty($online_purchase)) { $i = 1; 
                        foreach ($online_purchase as $value) {
                            $approved = $pending = $redeem = 0;
                            if($value['status']=='' || $value['status']=='Pending') { $pending = $value['amount']; }
                            elseif($value['status']=='Approved') { $approved = $value['amount']; }
                            elseif($value['status']=='Redeem') { $redeem = $value['amount']; }
                            echo '<tr><td>'.$i.'</td><td>'.$value['rdate'].'</td><td>47040274...</td><td>Online</td><td>'.$value['website'].'</td><td>'.$value['description'].'</td><td>'.$value['amount'].'</td><td>'.$value['cashback'].'</td><td>'.$approved.'</td><td>'.$pending.'</td><td>'.$redeem.'</td><td><span class="statu"><p> '.$value['status'].' </p></span></td></tr>';
                            $i++;
                        }
                    } ?>

                </tbody>
            </table>
            <div>
            
            
        </div>
        
    </div> -->




</div>






