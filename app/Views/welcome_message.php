<?php
$micro = $micro_active = $micro_deactive = $macro = $macro_active = $macro_deactive = 0;
if(!empty($customers)) {
  foreach ($customers as $cus) {
      if($cus['macro']==0) { 
          $micro = $micro + $cus['count'];
          if($cus['consume']==0) { $micro_deactive = $micro_deactive + $cus['count']; }
          else { $micro_active = $micro_active + $cus['count']; }

      }
      if($cus['macro']==33) { 
          $macro = $macro + $cus['count'];
          if($cus['consume']==0) { $macro_deactive = $macro_deactive + $cus['count']; }
          else { $macro_active = $macro_active + $cus['count']; }

      }
  }
}

$cashback = $moneyback = 0;
if(!empty($micro_incomes)) {
  foreach($micro_incomes as $inc) {
      if($inc['type']=='Cashback') { $cashback = $inc['tamount']; }
      if($inc['type']=='MoneyBack') { $moneyback = $inc['tamount']; }
  }
}




$micro_cashback = $micro_approved_cashback = $micro_pending_cashback = $micro_redeem_cashback = $micro_moneyback = $micro_approved_moneyback = $micro_pending_moneyback = $micro_redeem_moneyback = $micro_credits = 0;

if(!empty($micro_incomes)) {
    foreach($micro_incomes as $inc) {
        if($inc['type']=='Credits') { $micro_credits = $micro_credits + $inc['tamount']; }

        if($inc['type']=='MoneyBack') { 
            if($inc['status']=='Approved') { $micro_approved_moneyback = $micro_approved_moneyback + $inc['tamount']; }
            if($inc['status']=='Pending') { $micro_pending_moneyback = $micro_pending_moneyback + $inc['tamount']; }
            if($inc['status']=='Redeem') { $micro_redeem_moneyback = $micro_redeem_moneyback + $inc['tamount']; }
            $micro_moneyback = $micro_moneyback + $inc['tamount'];
        }

        if($inc['type']=='Cashback') { 
            if($inc['status']=='Approved') { $micro_approved_cashback = $micro_approved_cashback + $inc['tamount']; }
            if($inc['status']=='Pending') { $micro_pending_cashback = $micro_pending_cashback + $inc['tamount']; }
            if($inc['status']=='Redeem') { $micro_redeem_cashback = $micro_redeem_cashback + $inc['tamount']; }
            $micro_cashback = $micro_cashback + $inc['tamount'];
        }
    }
}



$macro_cashback = $macro_approved_cashback = $macro_pending_cashback = $macro_redeem_cashback = $macro_moneyback = $macro_approved_moneyback = $macro_pending_moneyback = $macro_redeem_moneyback = $macro_credits = 0;

if(!empty($macro_incomes)) {
    foreach($macro_incomes as $inc) {
        
        if($inc['type']=='Credits') { $macro_credits = $macro_credits + $inc['tamount']; }

        if($inc['type']=='MoneyBack') { 
            if($inc['status']=='Approved') { $macro_approved_moneyback = $macro_approved_moneyback + $inc['tamount']; }
            if($inc['status']=='Pending') { $macro_pending_moneyback = $macro_pending_moneyback + $inc['tamount']; }
            if($inc['status']=='Redeem') { $macro_redeem_moneyback = $macro_redeem_moneyback + $inc['tamount']; }
            $macro_moneyback = $macro_moneyback + $inc['tamount'];
        }

        if($inc['type']=='Cashback') { 
            if($inc['status']=='Approved') { $macro_approved_cashback = $macro_approved_cashback + $inc['tamount']; }
            if($inc['status']=='Pending') { $macro_pending_cashback = $macro_pending_cashback + $inc['tamount']; }
            if($inc['status']=='Redeem') { $macro_redeem_cashback = $macro_redeem_cashback + $inc['tamount']; }
            $macro_cashback = $macro_cashback + $inc['tamount'];
        }
    }
}


$purchases_count = $purchases_amount = $online_purchase_count = $online_purchase_amount = $utility_purchase_count = $utility_purchase_amount = $service_purchase_count = $service_purchase_amount = $instore_purchase_count = $instore_purchase_amount =  0;  


$micro_purchases_count = $micro_purchases_amount = $micro_online_purchase_count = $micro_online_purchase_amount = $micro_utility_purchase_count = $micro_utility_purchase_amount = $micro_service_purchase_count = $micro_service_purchase_amount = $micro_instore_purchase_count = $micro_instore_purchase_amount =  0; 


$macro_purchases_count = $macro_purchases_amount = $macro_online_purchase_count = $macro_online_purchase_amount = $macro_utility_purchase_count = $macro_utility_purchase_amount = $macro_service_purchase_count = $macro_service_purchase_amount = $macro_instore_purchase_count = $macro_instore_purchase_amount =  0; 

$macro_count = $macro_amount = 0 ;

if(!empty($purchases)) {
  foreach ($purchases as $purchase) {
      if($purchase['type']=='Purchase') {
          if($purchase['order_type']=='Online') {
            if($purchase['role']=='Micro') {
                $micro_online_purchase_amount = $micro_online_purchase_amount + $purchase['amount'];
                $micro_online_purchase_count = $micro_online_purchase_count + 1;
            } 
            elseif($purchase['role']=='Macro') {
                $macro_online_purchase_amount = $macro_online_purchase_amount + $purchase['amount'];
                $macro_online_purchase_count = $macro_online_purchase_count + 1;
            }

             $online_purchase_amount = $online_purchase_amount + $purchase['amount'];
             $online_purchase_count = $online_purchase_count + 1;
          }
          if($purchase['order_type']=='Utility') {
              
              if($purchase['role']=='Micro') {
                  $micro_utility_purchase_amount = $micro_utility_purchase_amount + $purchase['amount'];
                  $micro_utility_purchase_count = $micro_utility_purchase_count + 1;
              } 
              elseif($purchase['role']=='Macro') {
                  $macro_utility_purchase_amount = $macro_utility_purchase_amount + $purchase['amount'];
                  $macro_utility_purchase_count = $macro_utility_purchase_count + 1;
              }

              $utility_purchase_amount = $utility_purchase_amount + $purchase['amount'];
              $utility_purchase_count = $utility_purchase_count + 1;
          }
          if($purchase['order_type']=='Instore') {
              
              if($purchase['role']=='Micro') {
                  $micro_service_purchase_amount = $micro_service_purchase_amount + $purchase['amount'];
                  $micro_service_purchase_count = $micro_service_purchase_count + 1;
              } 
              elseif($purchase['role']=='Macro') {
                  $macro_service_purchase_amount = $macro_service_purchase_amount + $purchase['amount'];
                  $macro_service_purchase_count = $macro_service_purchase_count + 1;
              }


              $service_purchase_amount = $service_purchase_amount + $purchase['amount'];
              $instore_purchase_count = $instore_purchase_count + 1;
          }

          if($purchase['order_type']=='Instore') {
              
              if($purchase['role']=='Micro') {
                  $micro_service_purchase_amount = $micro_service_purchase_amount + $purchase['amount'];
                  $micro_service_purchase_count = $micro_service_purchase_count + 1;
              } 
              elseif($purchase['role']=='Macro') {
                  $macro_service_purchase_amount = $macro_service_purchase_amount + $purchase['amount'];
                  $macro_service_purchase_count = $macro_service_purchase_count + 1;
              }
              $service_purchase_amount = $service_purchase_amount + $purchase['amount'];
              $instore_purchase_count = $instore_purchase_count + 1;
          }
          
      }
      if($purchase['type']=='Pack') {
              $macro_amount = $macro_amount + $purchase['amount'];
              $macro_count = $macro_count + 1;
      }
  }
}

$purchases_count = $online_purchase_count + $utility_purchase_count + $instore_purchase_count + $macro_count;
$purchases_amount = $online_purchase_amount + $utility_purchase_amount + $service_purchase_amount + $macro_amount;

$micro_purchases_count = $micro_online_purchase_count + $micro_utility_purchase_count + $micro_instore_purchase_count;
$micro_purchases_amount = $micro_online_purchase_amount + $micro_utility_purchase_amount + $micro_service_purchase_amount;

$macro_purchases_count = $macro_online_purchase_count + $macro_utility_purchase_count + $macro_instore_purchase_count;
$macro_purchases_amount = $macro_online_purchase_amount + $macro_utility_purchase_amount + $macro_service_purchase_amount;

?>



<div class="page-heading">

        <h2>Dashboard <?php echo session()->get('full_name');?> </h2>
      </div>
	  
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
   

		<div class="dashbord_table"> 
				
				<!-- Your Page Content Here -->
				
              
                  <div class="dashbord_table">
                      <div class="row">
                          <div class="col-sm-4">
                              <a href="<?php echo base_url(); ?>admin/customer/partners_master">
                                <div class="total_div blue partners_page">
                                    <h2><?php echo $micro+$macro; ?></h2>
                                    <p>Total Partners</p>
                                </div>
                              </a>
                          </div>
                          <div class="col-sm-4">
                              <a href="<?php echo base_url(); ?>admin/customer/purchase_master">
                                <div class="total_div yellow partners_page">
                                    <h2><?php echo $purchases_count; ?></h2>
                                    <p>Total Purchases</p>
                                </div>
                              </a>
                          </div>
                          <div class="col-sm-4">
                                <a href="#">
                                <div class="total_div org partners_page">
                                    <h2><?php echo $macro_sum[0]['amount']+$online_commission[0]['amount']+0; ?></h2>
                                    <p>Total Turnover</p>
                                </div>
                                </a>
                          </div>
                      </div>
                      <div class="row mt-5 pt-5 inner-r-class">
                          <div class="col-sm-4">
                              <a href="#">
                                <div class="total_div blue partners_page">                                     
                                   <h2><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $micro_cashback+$macro_cashback; ?></h2>
                                    <p>Total Cashback</p>
                                </div>
                              </a>
                          </div>
                          <div class="col-sm-4">
                              <a href="#">
                                <div class="total_div yellow partners_page">
									<h2><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $micro_moneyback+$macro_moneyback; ?></h2>  
                                    <p>Total Moneyback</p>
                                </div>
                              </a>
                          </div>
                          <div class="col-sm-4">
                                <a href="#">
                                <div class="total_div org partners_page">
                                    <h2><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $cashback+$moneyback; ?></h2> 
                                    <p> Total Income</p>
                                    
                                </div>
                                </a>
                          </div>
                      </div>
                  </div>
				  
				   <div class="table_cont">
						<h3 class="partners_deta">TURNOVER</h3><table class="table table-striped">
                          <tbody>
                            <tr> 
                              <td class="price_name">Total Turnover</td>
                              <td class="rate_text"></td>
                              <td class="price_rate">₹<?php echo $macro_sum[0]['amount']+$online_commission[0]['amount']+0; ?></td>
                            </tr>
							<tr>  
                              <td class="price_name">Online Purchase Turnover </td>
                              <td class="rate_text"></td>
                              <td class="price_rate"> ₹<?php echo $online_commission[0]['amount']+0; ?> </td>
                            </tr>
                            <tr>
                              <td>Utility Payments Turnover </td>
                              <td class="rate_text"></td>
                              <td class="price_rate">₹0</td>
                            </tr>
                            <tr>
                              <td>Service Turnover </td>
                              <td class="rate_text"></td>
                              <td class="price_rate"> ₹0</td>
                            </tr>
							<tr>
                              <td>Instore Purchase Turnover</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"> ₹0</td>
                            </tr>
							<tr>
                              <td>Macro Turnover </td>
                              <td class="rate_text"></td>
                              <td class="price_rate">₹<?php echo $macro_sum[0]['amount']+0; ?></td>
                            </tr> 
							<tr> 
                              <td>Mega Turnover </td>
                              <td class="rate_text"></td>
                              <td class="price_rate"> ₹0</td>
                            </tr>
                          </tbody>
                        </table>
                        <h3 class="partners_deta left">Purchase Details</h3><table class="table table-striped">
                          
                          <tbody>
                            <tr>
                              <td class="price_name">Total No. Of Purchases <span class="utility">(Online + Utility + Services + Instore)</span></td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $purchases_count; ?></td>
                            </tr>
                            <tr>
                              <td class="price_name">Total Amount of Purchases <span class="utility">(Online + Utility + Services + Instore)</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $purchases_amount; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No. Of</span> Online Purchases</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $online_purchase_count; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Online Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $online_purchase_amount; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No. Of</span> Utility Purchases</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $utility_purchase_count; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Utility Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $utility_purchase_amount; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No. Of</span> Services Purchases</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $service_purchase_count; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Services Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $service_purchase_amount; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No. Of</span> Instore Purchases</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $instore_purchase_count; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Instore Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $instore_purchase_amount; ?></td>
                            </tr>
                          </tbody>
                        </table>
                        <h3 class="partners_deta">Cashback Details</h3><table class="table table-striped">
                          
                          <tbody>
                            <tr>
                              <td class="price_name">Total Cashback <span class="utility">(Online + Utility + Services + Instore)</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $micro_cashback+$macro_cashback; ?></td>
                            </tr>
                          </tbody>
                        </table>
                  </div>
				  
                  <div class="table_cont">
                        <h3 class="blue_head">MICRO PARTNER</h3><h3 class="partners_deta left">Partners Details</h3><table class="table table-striped">
                          
                          
                          <tbody>
                            <tr>
                              <td class="price_name">Total Partners</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $micro; ?></td>
                            </tr>
                            <tr>
                              <td>Total Active Partners</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $micro_active; ?></td>
                            </tr>
                            <tr>
                              <td>Total Inactive Partners</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $micro_deactive; ?></td>
                            </tr>
                          </tbody>
                        </table>
                        <h3 class="partners_deta left">Purchase Details</h3><table class="table table-striped">
                          
                          <tbody>
                            <tr>
                              <td class="price_name">Total No. Of Purchases <span class="utility">(Online + Utility + Services + Instore)</span></td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $micro_purchases_count; ?></td>
                            </tr>
                            <tr>
                              <td class="price_name">Total Amount of Purchases <span class="utility">(Online + Utility + Services + Instore)</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $micro_purchases_amount; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No. Of</span> Online Purchases</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $micro_online_purchase_count; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Online Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $micro_online_purchase_amount; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No. Of</span> Utility Purchases</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $micro_utility_purchase_count; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Utility Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $micro_utility_purchase_amount; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No. Of</span> Services Purchases</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $micro_service_purchase_count; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Services Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $micro_service_purchase_amount; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No. Of</span> Instore Purchases</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $micro_instore_purchase_count; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Instore Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $micro_instore_purchase_amount; ?></td>
                            </tr>
                          </tbody>
                        </table>
                        <h3 class="partners_deta left">Cashback Details</h3><table class="table table-striped">
                          
                          <tbody>
                            <tr>
                              <td class="price_name">Total Cashback <span class="utility">(Online + Utility + Services + Instore)</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $micro_cashback; ?></td>
                            </tr>
                          </tbody>
                        </table>
                  </div>
				  
				  
                  <div class="table_con">
                    <h3 class="online_cashback">Online Cashback <span class="online_rupes">(₹)</span></h3><table class="table table-bordered">
                      
                      <tbody>
                        <tr>
                          <td>Total</td>
                          <td>Approved</td>
                          <td>Pending</td>
                          <td>Redeemed</td>
                        </tr>
                        <tr>
                          <td><?php echo $micro_cashback; ?></td>
                          <td><?php echo $micro_approved_cashback; ?></td>
                          <td><?php echo $micro_pending_cashback; ?></td>
                          <td><?php echo $micro_redeem_cashback; ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <h3 class="online_cashback">Utility Cashback <span class="online_rupes">(₹)</span></h3><table class="table table-bordered">
                      
                      <tbody>
                        <tr>
                          <td>Total</td>
                          <td>Approved</td>
                          <td>Pending</td>
                          <td>Redeemed</td>
                        </tr>
                        <tr>
                          <td>0.00</td>
                          <td>0.00</td>
                          <td>0.00</td>
                          <td>0.00</td>
                        </tr>
                      </tbody>
                    </table>
                    <h3 class="online_cashback">Services Cashback <span class="online_rupes">(₹)</span></h3><table class="table table-bordered">
                      
                      <tbody>
                        <tr>
                          <td>Total</td>
                          <td>Approved</td>
                          <td>Pending</td>
                          <td>Redeemed</td>
                        </tr>
                        <tr>
                            <td>0.00</td>
                            <td>0.00</td>
                            <td>0.00</td>
                            <td>0.00</td>
                        </tr>
                      </tbody>
                    </table>
                    <h3 class="online_cashback">Instore Cashback <span class="online_rupes">(₹)</span></h3><table class="table table-bordered">
                      
                      <tbody>
                        <tr>
                          <td>Total</td>
                          <td>Approved</td>
                          <td>Pending</td>
                          <td>Redeemed</td>
                        </tr>
                        <tr>
                          <td>0.00</td>
                          <td>0.00</td>
                          <td>0.00</td>
                          <td>0.00</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="table_cont">
                        <h3 class="yellow_head">MACRO PARTNER</h3><h3 class="partners_deta left">Partners Details</h3><table class="table table-striped">
                          
                          
                          <tbody>
                            <tr>
                              <td class="price_name">Total Macro Partners <span class="utility">(Active + Inactive)</span></td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $macro; ?></td>
                            </tr>
                            <tr>
                              <td>Total Active Partners</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $macro_active; ?></td>
                            </tr>
                            <tr>
                              <td>Total Inactive Partners</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $macro_deactive; ?></td>
                            </tr>
                          </tbody>
                        </table>
                        <h3 class="partners_deta left">Purchase Details</h3><table class="table table-striped">
                          
                          <tbody>
                            <tr>
                              <td class="price_name">Total No. of Purchases  <span class="utility">(Macro Product + Macro Pack)</span></td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $macro_count + $macro_purchases_count; ?></td>
                            </tr>
                            <tr>
                              <td class="price_name">Total Amount of Purchases  <span class="utility">(Macro Product + Macro Pack)</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $macro_amount + $macro_purchases_amount; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No.</span> of <span class="price_name">Macro Product Purchases</span></td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $macro_purchases_count; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Macro Product Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $macro_purchases_amount; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No.</span> of <span class="price_name">Macro Pack Purchases</span></td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $macro_count; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Macro Pack Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $macro_amount; ?></td>
                            </tr>
                          </tbody>
                        </table>
                        <h3 class="partners_deta left">Moneyback Details</h3><table class="table table-striped">
                          <tbody>
                            <tr>
                              <td class="price_name">Total Moneyback</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $macro_moneyback; ?></td>
                            </tr>
                            <tr>
                              <td>Approved Moneyback</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $macro_approved_moneyback; ?></td>
                            </tr>
                            <tr>
                              <td>Pending Moneyback</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $macro_pending_moneyback; ?></td>
                            </tr>
                            <tr>
                              <td>Redeemed Moneyback</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $macro_redeem_moneyback; ?></td>
                            </tr>
                          </tbody>
                        </table>
                  </div>
                  <div class="table_cont">
                        <h3 class="org_head">MEGA PARTNER</h3>
						<h3 class="partners_deta left">Partners Details</h3><table class="table table-striped">
                          
                          
                          <tbody>
                            <tr>
                              <td class="price_name">Total Macro Partners <span class="utility">(Active + Inactive)</span></td>
                              <td class="rate_text"></td>
                              <td class="price_rate">0</td>
                            </tr>
                            <tr>
                              <td>Total Active Partners</td>
                              <td class="rate_text"></td>
                              <td class="price_rate">0</td>
                            </tr>
                            <tr>
                              <td>Total Inactive Partners</td>
                              <td class="rate_text"></td>
                              <td class="price_rate">0</td>
                            </tr>
                          </tbody>
                        </table>
                        <h3 class="partners_deta left">Purchase Details</h3><table class="table table-striped">
                          
                          <tbody>
                            <tr>
                              <td class="price_name">Total No. of Purchases  <span class="utility">(Mega Product + Mega Pack)</span></td>
                              <td class="rate_text"></td>
                              <td class="price_rate">0</td>
                            </tr>
                            <tr>
                              <td class="price_name">Total Amount of Purchases  <span class="utility">(Mega Product + Macro Pack)</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No.</span> of <span class="price_name">Mega Product Purchases</span></td>
                              <td class="rate_text"></td>
                              <td class="price_rate">0</td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Mega Product Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No.</span> of <span class="price_name">Mega Pack Purchases</span></td>
                              <td class="rate_text"></td>
                              <td class="price_rate">0</td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Mega Pack Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                          </tbody>
                        </table>
						
                        <h3 class="partners_deta left" >Income Details</h3><table class="table table-striped">
                          <tbody>
                            <tr>
                              <td class="price_name">Total Income</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                            <tr>
                              <td>Approved Income</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                            <tr>
                              <td>Pending Income</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                            <tr>
                              <td>Redeemed Income</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                          </tbody>
                        </table>
						
						<h3 class="partners_deta center" >Moneyback</h3><table class="table table-striped">
                          <tbody>
                            <tr>
                              <td class="price_name">Total Moneyback</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                            <tr>
                              <td>Total Approved Moneyback</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                            <tr>
                              <td>Total Pending MoneyBack</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                            <tr>
                              <td>Total Redeemed Cashback</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                          </tbody>
                        </table>
						
						<h3 class="partners_deta center" >Income</h3><table class="table table-striped">
                          <tbody>
                            <tr>
                              <td class="price_name">Total Income</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                            <tr>
                              <td>Total Approved Income</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                            <tr>
                              <td>Total Pending Income</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                            <tr>
                              <td>Total Redeemed Income</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                          </tbody>
                        </table>
						
						<h3 class="partners_deta center" >Company</h3><table class="table table-striped">
                          <tbody>
                            <tr>
                              <td class="price_name">Total Commisson Earned</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                            <tr>
                              <td>Total Commisson From Online</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                            <tr>
                              <td>Total Commisson From Utility</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                            <tr>
                              <td>Total Commisson From Services</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
							<tr>
                              <td>Total Commisson From Instore</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
							<tr>
                              <td>Total Commisson From Cashback</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
							<tr>
                              <td>Total Commisson From Moneyback</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
							<tr>
                              <td>Total Commisson From Income</td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0.00</td>
                            </tr>
                          </tbody>
                        </table>
						
						
                  </div>
              </div>