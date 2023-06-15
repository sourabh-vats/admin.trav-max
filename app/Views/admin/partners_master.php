<?php


//echo '<pre>'; print_r($customers); die();
$micro = $micro_active = $micro_deactive = $macro = $macro_active = $macro_deactive = $mega = $mega_active = $mega_deactive = 0;

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
      if($cus['macro']==66) { 
          $mega = $mega + $cus['count'];
          if($cus['consume']==0) { $mega_deactive = $mega_deactive + $cus['count']; }
          else { $mega_active = $mega_active + $cus['count']; }

      }
  }
}

$active_partner = $micro_active+$macro_active+$mega_active;


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



?>



<div class="page-heading">

        <h2>Dashboard > Partners Master<!--  <?php echo session('full_name');?>  ---></h2>
      </div>
	  
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
   

		<div class="dashbord_table"> 
				
				<!-- Your Page Content Here -->
				
              
                  <div class="dashbord_table">
                    <!--   <div class="bread_cream inner_page">
                          <h4><a href="#">Dashboard</a></h4>
                          <h6>Partners Master</h6>
                      </div> -->
                      <div class="row">
                          <div class="col-sm-4">
                              <a href="<?php echo base_url(); ?>admin/micro">
                                <div class="total_div blue partners_page">
                                    <h2><?php echo $micro; ?></h2>
                                    <p>Micro Partners</p>
                                </div>
                              </a>
                          </div>
                          <div class="col-sm-4">
                              <a href="<?php echo base_url(); ?>admin/macro">
                                <div class="total_div yellow partners_page">
                                    <h2><?php echo $macro; ?></h2>
                                    <p>Macro Partners</p> 
                                </div>
                              </a>
                          </div>
                          <div class="col-sm-4">
                                <a href="<?php echo base_url(); ?>admin/mega">
                                <div class="total_div org partners_page">
                                    <h2><?php echo $mega; ?></h2>
                                    <p>Mega Partners</p>
                                </div>
                                </a>
                          </div>
                      </div>
                      
                      </div>
                  </div>
				  
				  
                  <div class="table_cont">
                        <h3 class="blue_head">MICRO PARTNER</h3>
						<h3 class="partners_deta left">Partners Details</h3><table class="table table-striped">
                          
                          
                          <tbody>
                            <tr>
                              <td class="price_name">Total Partners</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $micro+$macro+$mega; ?></td>
                            </tr>
                            <tr>
                              <td>Total Active Partners</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $active_partner; ?></td>
                            </tr>
                            <tr>
                              <td>Total Inactive Partners</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $micro+$macro+$mega-$active_partner; ?></td>
                            </tr>
                          </tbody>
                        </table>
                        <h3 class="partners_deta left">Purchase Details</h3><table class="table table-striped">
                          
                          <tbody>
                            <tr>
                              <td class="price_name">Total No. Of Purchases <span class="utility">(Online + Utility + Services + Instore)</span></td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $micro_orders_num+$micro_online_num+$macro_orders_num+$macro_online_num; ?></td>
                            </tr>
                            <tr>
                              <td class="price_name">Total Amount of Purchases <span class="utility">(Online + Utility + Services + Instore)</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $micro_orders_sum[0]['amount']+$micro_online_sum[0]['amount']+$macro_orders_sum[0]['amount']+$macro_online_sum[0]['amount']+0; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No. Of</span> Online Purchases</td>
                              <td class="rate_text"></td>
                              <td class="price_rate"><?php echo $micro_online_num+$macro_online_num; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Online Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $micro_online_sum[0]['amount']+$macro_online_sum[0]['amount']+0; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No. Of</span> Utility Purchases</td>
                              <td class="rate_text"></td>
                              <td class="price_rate">0</td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Utility Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0</td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No. Of</span> Services Purchases</td>
                              <td class="rate_text"></td>
                              <td class="price_rate">0</td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Services Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0</td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No. Of</span> Instore Purchases</td>
                              <td class="rate_text"></td>
                              <td class="price_rate">0</td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Instore Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">1</td>
                            </tr>
                          </tbody>
                        </table>
                        <h3 class="partners_deta v">Cashback Details</h3><table class="table table-striped">
                          
                          <tbody>
                            <tr>
                              <td class="price_name">Total Cashback <span class="utility">(Online + Utility + Services + Instore)</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $micro_cashback+$macro_cashback; ?></td>
                            </tr>
                          </tbody>
                        </table>
                  </div>
				  
				  
                  <div class="table_con">
                    <h3 class="online_cashback left">Online Cashback <span class="online_rupes">(₹)</span></h3><table class="table table-bordered">
                      
                      <tbody>
                        <tr>
                          <td>Total</td>
                          <td>Approved</td>
                          <td>Pending</td>
                          <td>Redeemed</td>
                        </tr>
                        <tr>
                          <td><?php echo $micro_cashback+$macro_cashback; ?></td>
                          <td><?php echo $micro_approved_cashback+$macro_approved_cashback; ?></td>
                          <td><?php echo $micro_pending_cashback+$macro_pending_cashback; ?></td>
                          <td><?php echo $micro_redeem_cashback+$macro_redeem_cashback; ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <h3 class="online_cashback left">Utility Cashback <span class="online_rupes">(₹)</span></h3><table class="table table-bordered">
                      
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
                    <h3 class="online_cashback left">Services Cashback <span class="online_rupes">(₹)</span></h3><table class="table table-bordered">
                      
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
                    <h3 class="online_cashback left">Instore Cashback <span class="online_rupes">(₹)</span></h3><table class="table table-bordered">
                      
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
                        <h3 class="yellow_head">MACRO PARTNER</h3>
						<h3 class="partners_deta left">Partners Details</h3><table class="table table-striped">
                          
                          
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
                              <td class="price_rate"><?php echo $micro_orders_num; ?></td>
                            </tr>
                            <tr>
                              <td class="price_name">Total Amount of Purchases  <span class="utility">(Macro Product + Macro Pack)</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate"><?php echo $micro_orders_sum[0]['amount']+0; ?></td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No.</span> of <span class="price_name">Macro Product Purchases</span></td>
                              <td class="rate_text"></td>
                              <td class="price_rate">0</td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Macro Product Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0</td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">No.</span> of <span class="price_name">Macro Pack Purchases</span></td>
                              <td class="rate_text"></td>
                              <td class="price_rate">0</td>
                            </tr>
                            <tr>
                              <td>Total <span class="price_name">Amount</span> of <span class="price_name">Macro Pack Purchases</span></td>
                              <td class="rate_text">₹</td>
                              <td class="price_rate">0</td>
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
                        <h3 class="partners_deta">Income Details</h3><table class="table table-striped">
                          
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
                  </div>
              </div>