<?php


$purchases_count = $purchases_amount = $online_purchase_count = $online_purchase_amount = $utility_purchase_count = $utility_purchase_amount = $service_purchase_count = $service_purchase_amount = $instore_purchase_count = $instore_purchase_amount  = $macro_pack_purchase_count = $macro_pack_purchase_amount = $macro_product_purchase_count = $macro_product_purchase_amount =$mega_pack_purchase_count = $mega_pack_purchase_amount = $mega_product_purchase_count = $mega_product_purchase_amount =$macro_purchase_count = $macro_purchase_amount = $mega_purchase_count = $mega_purchase_amount = 0;  

 

$macro_count = $macro_amount = $mega_count = $mega_amount = 0 ;

if(!empty($purchases)) {
  foreach ($purchases as $purchase) {
      if($purchase['type']=='Purchase') {
          if($purchase['order_type']=='Online') {
             $online_purchase_amount = $online_purchase_amount + $purchase['amount'];
             $online_purchase_count = $online_purchase_count + 1;
          }
          if($purchase['order_type']=='Utility') {
              $utility_purchase_amount = $utility_purchase_amount + $purchase['amount'];
              $utility_purchase_count = $utility_purchase_count + 1;
          }
          if($purchase['order_type']=='Instore') {
              $service_purchase_amount = $service_purchase_amount + $purchase['amount'];
              $instore_purchase_count = $instore_purchase_count + 1;
          }
          if($purchase['order_type']=='Macro') {
          		if($purchase['purchase_type']=='Pack') {
          			$macro_pack_purchase_amount = $macro_pack_purchase_amount + $purchase['amount'];
              	$macro_pack_purchase_count = $macro_pack_purchase_count + 1;
          		} else {
          			$macro_product_purchase_amount = $macro_product_purchase_amount + $purchase['amount'];
              	$macro_product_purchase_count = $macro_product_purchase_count + 1;
          		}
              $macro_purchase_amount = $macro_purchase_amount + $purchase['amount'];
              $macro_purchase_count = $macro_purchase_count + 1;
          }
          if($purchase['order_type']=='Mega') {
          		if($purchase['purchase_type']=='Pack') {
          			$mega_pack_purchase_amount = $mega_pack_purchase_amount + $purchase['amount'];
              	$mega_pack_purchase_count = $mega_pack_purchase_count + 1;
          		} else {
          			$mega_product_purchase_amount = $mega_product_purchase_amount + $purchase['amount'];
              	$mega_product_purchase_count = $mega_product_purchase_count + 1;
          		}
              $mega_purchase_amount = $mega_purchase_amount + $purchase['amount'];
              $mega_purchase_count = $mega_purchase_count + 1;
          }
          
      }
      if($purchase['type']=='Pack') {

      				if($purchase['order_type']=='Macro') {
	              $macro_amount = $macro_amount + $purchase['amount'];
              	$macro_count = $macro_count + 1;
          		}
          		if($purchase['order_type']=='Mega') {
	              $mega_amount = $mega_amount + $purchase['amount'];
              	$mega_count = $mega_count + 1;
          		}
              
      }
  }
}


?>

<div class="page-heading">

        <h2>Purchase Master <!--  <?php echo session('full_name');?>  ---></h2>
      </div>
  <div class="boxesss Purchasessss">
		
		<div class="dashbord_table">
                    <!--   <div class="bread_cream inner_page">
                          <h4><a href="#">Dashboard</a></h4>
                          <h6>Partners Master</h6>
                      </div> -->
                      <div class="row">
                          <div class="col-sm-3">
                              <div class="boxx">
								<div class="topp clra"><p>Online Purchases</p></div>
                                 <div class="leftttt clraa">
									<h2><?php echo $online_purchase_count; ?></h2>
								</div>
								<div class="rightt clraa">
									<h2>₹ &nbsp;<?php echo $online_purchase_amount; ?></h2>
								</div>
                                </div>
                              </a>
							</div>
                        
                           <div class="col-sm-3">
                              <div class="boxx clrb">
								<div class="topp"><p>Utility Purchases</p></div>
                                 <div class="leftttt clrbb">
									<h2><?php echo $utility_purchase_count; ?></h2>
								</div>
								<div class="rightt clrbb">
									<h2>₹ &nbsp;<?php echo $utility_purchase_amount; ?></h2>
								</div>
                                </div>
                              </a>
							</div>
                          
						<div class="col-sm-3">
                              <div class="boxx">
								<div class="topp clrc"><p>Services Purchases</p></div>
                                 <div class="leftttt clrcc">
									<h2><?php echo $service_purchase_count; ?></h2>
								</div>
								<div class="rightt clrcc">
									<h2>₹ &nbsp;<?php echo $service_purchase_amount; ?></h2>
								</div>
                                </div>
                              </a>
							</div>

							<div class="col-sm-3">
                              <div class="boxx">
								<div class="topp clrg"><p>Instore Purchases</p></div>
                                 <div class="leftttt clrgg">
									<h2><?php echo $instore_purchase_count; ?></h2>
								</div>
								<div class="rightt clrgg">
									<h2>₹ &nbsp;<?php echo $instore_purchase_amount; ?></h2>
								</div>
                                </div>
                              </a>
							</div>
                         
						  <div class="col-sm-3">
                              <div class="boxx">
								<div class="topp clrd"><p>Macro Packs Purchases</p></div>
                                 <div class="leftttt clrdd">
									<h2><?php echo $macro_pack_purchase_count; ?></h2>
								</div>
								<div class="rightt clrdd">
									<h2>₹ &nbsp;<?php echo $macro_pack_purchase_amount; ?></h2>
								</div>
                                </div>
                              </a>
							</div>
                          
							  <div class="col-sm-3">
                              <div class="boxx">
								<div class="topp clre"><p>Macro Product Purchases</p></div>
                                 <div class="leftttt clree">
									<h2><?php echo $macro_product_purchase_count; ?></h2>
								</div>
								<div class="rightt clree">
									<h2>₹ &nbsp;<?php echo $macro_product_purchase_amount; ?></h2>
								</div>
                                </div>
                              </a>
							</div>
                         
							  <div class="col-sm-3">
                              <div class="boxx">
								<div class="topp clrf"><p>Mega Packs Purchases</p></div>
                                 <div class="leftttt clrff">
									<h2><?php echo $mega_count; ?></h2> 
								</div>
								<div class="rightt clrff">
									<h2>₹ &nbsp;<?php echo $mega_amount; ?></h2>
								</div>
                                </div>
                              </a>
							</div>
							 <div class="col-sm-3">
                              <div class="boxx">
								<div class="topp clrh"><p>Mega Product Purchases</p></div>
                                 <div class="leftttt clrhh">
									<h2><?php echo $mega_purchase_count; ?></h2> 
								</div>
								<div class="rightt clrhh">
									<h2>₹ &nbsp;<?php echo $mega_purchase_amount; ?></h2>
								</div>
                                </div>
                              </a>
							</div>

                          </div>
                      </div>
                  
<br>
<br>



<div class="tablee" style="width:100%; overflow-x:auto;">
 <div id="example_wrapper" class="dataTables_wrapper">
		
      <table id="example" class="table table-bordered table-hover customer-table">
	  
         <thead>
			
			
            <tr role="row">
               <th>S No.</th>
               <th >Date</th>
               <th >Type of Purchase </th>
               <th>Transaction ID</th>
               <th>Partner Name</th>
               <th>Partner Status </th>
               <th>Partner ZKey</th>
               <th>Purchase Amount</th>
               <th>Purchase Status </th>
               <th>View</th>
           
            </tr>
         </thead>
         <tbody>


         	<?php

         	if(!empty($purchases)) { $i = 1;
         		foreach ($purchases as $value) {
         			echo '<tr><td>'.$i.'</td><td>'.$value['rdate'].'</td><td>'.$value['order_type'].' '.$value['purchase_type'].' '.$value['type'].'</td><td>'.$value['transaction_id'].'</td><td>'.$value['f_name'].' '.$value['l_name'].'</td><td>'.$value['cstatus'].'</td><td>'.$value['customer_id'].'</td><td>'.$value['amount'].'</td><td>'.$value['status'].'</td><td><a href="'.base_url().'admin/customer/info/'.$value['cid'].'">View</a></td>';
         			$i++;
         		}
         	}
         	?>  
         </tbody>
      </table> 
   </div>
</div>
</div>






