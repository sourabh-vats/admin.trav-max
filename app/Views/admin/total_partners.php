<?php $user = $profile[0];

//echo '<pre>'; print_r($total_partner); die();



 ?>
<style>
td.rate_text h4 {
    font-weight: bolder;
}
</style>
<div class="page-heading">
<!--a class="btn btn-primary flr" href="https://www.zoogol.blissinfosys.com/main-admin/admin/customer/add">Add New</a--> 
        <h2>Partners</h2>
      </div>
	  
		
				<div class="Profile_table Profileeee partnerss">
					<div class="container">
                        <div class="row">
                             <div class="col-sm-2">
                              <img class = "img-responsive" src="<?php echo base_url();?>images/logo.png" alt="Profile"> 
                              </div>
                              <div class="col-sm-10">
                                   <h2 class="sumit"><?php echo $user['f_name'].' '.$user['l_name']; ?></h2>
                                 </div> 
                                    <div class="col-sm-2">
                                      <ul class="micro-active">
                                        <li><a href="#"></a><span class="key"><i class="fa fa-key" aria-hidden="true"></i></span> <?php echo $user['customer_id']; ?></li>
                                         <li><a href="#"></a><span class="key"><i class="fa fa-key" aria-hidden="true"></i></span> Micro - Active</li>
                                      </ul>
                                    </div>
                                    <div class="col-sm-2">
                                       <ul class="micro-active">
                                        <li><a href="#"></a><span class="key"><strong>@</strong></span> <?php echo $user['email']; ?></li>
                                         <li><a href="#"></a><span class="key"><i class="fa fa-mobile" aria-hidden="true"></i> </span> <?php echo $user['phone']; ?></li>
                                      </ul>
                                    </div>
                                    <div class="col-sm-3">
                                       <ul class="micro-active">
                                        <li><a href="#"></a><span class="key"><i class="fa fa-calendar" aria-hidden="true"></i> </span> <?php echo $user['rdate']; ?></li>
                                         <li><a href="#"></a><span class="key"><i class="fa fa-key" aria-hidden="true"></i></span> <?php echo $user['customer_id']; ?></li>
                                      </ul>
                                    </div>
                                    <div class="col-sm-2">
                                       <ul class="micro-active-soical">
                                        <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                                      </ul>
                                    </div>
                              </div>   

                          </div> 
                  </div>
				  
				
 

<div class="macro-partner">
<h4 style="text-align:center">My Total partners Summary<h4>
  <div class="tabssss Profileeee Circles">
 <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
			<tr>
				<th rowspan="3">Circles</th>
                <th colspan="6">Partners</th>
                <th colspan="4">No. of purchases</th>
                <th colspan="4">Amount of Purchases</th>
                <th rowspan="3">Total Moneyback</th>
                <th rowspan="3">Total income</th>
                <th rowspan="3">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
				<th></th>
				<th colspan="3">Micro</th>
                <th rowspan="2">Macro</th>
                <th rowspan="2">Mega</th>
                <th rowspan="2">Total </th>
                <th rowspan="2">Micro </th>
                <th rowspan="2">Macro</th>
                <th rowspan="2">Mega</th>
                <th rowspan="2">Total</th>
                <th rowspan="2">Micro</th>
                <th rowspan="2">Macro</th>
                <th rowspan="2">Mega</th>
                <th rowspan="2">Total</th>
                <th rowspan="2"></th>
                <th rowspan="2"></th>
                <th rowspan="2"></th>
				
            </tr>
            <tr>
              <th class=""></th>
              <th class="">Active</th>
                <th>Inactive</th>
                <th>Total</th>
            </tr>


            <?php
            $i = 1;
            if(!empty($total_partner)) {
              foreach ($total_partner as $key=>$value) {
                $micro_active = $micro_inactive = $micro_total = $macro = $mega = $total = $micro_purchase = $macro_purchase = $mega_purchase = $total_purchase = $micro_purchase_amt = $macro_purchase_amt = $mega_purchase_amt = $total_purchase_amt = $total_moneyback = $total_income = $total = 0;

                  if(!empty($value)) {
                    foreach($value as $val) {
                        if($val['macro']==0) {
                          if($val['consume']==0) {
                            $micro_inactive = $micro_inactive + 1;
                          } else { $micro_active = $micro_active + 1; }

                          $micro_purchase = $micro_purchase + $val['count'];
                          $micro_purchase_amt = $micro_purchase_amt + $val['tamount']+0;
                        }
                        elseif($val['macro']==33) {
                            $macro = $macro + 1;
                            $macro_purchase = $macro_purchase + $val['count'];
                            $macro_purchase_amt = $macro_purchase_amt + $val['tamount']+0;
                        }
                        elseif($val['macro']==66) {
                            $mega = $mega + 1;
                            $mega_purchase = $mega_purchase + $val['count'];
                            $mega_purchase_amt = $mega_purchase_amt + $val['tamount']+0;
                        }
                    }
                  }
              $micro_total = $micro_inactive + $micro_active;
              $total = $micro_total + $macro + $mega;
              $total_purchase = $micro_purchase + $macro_purchase + $mega_purchase;
              $total_purchase_amt = $micro_purchase_amt + $macro_purchase_amt + $mega_purchase_amt;
              echo '<tr><td>'.$i.'</td><td>'.$micro_active.'</td><td>'.$micro_inactive.'</td><td>'.$micro_total.'</td><td>'.$macro.'</td><td>'.$mega.'</td><td>'.$total.'</td><td>'.$micro_purchase.'</td><td>'.$macro_purchase.'</td><td>'.$mega_purchase.'</td><td>'.$total_purchase.'</td><td>'.$micro_purchase_amt.'</td><td>'.$macro_purchase_amt.'</td><td>'.$mega_purchase_amt.'</td><td>'.$total_purchase_amt.'</td><td>'.$income_array[$key]['MoneyBack'].'</td><td>'.$income_array[$key]['Income'].'</td><td>'.($income_array[$key]['MoneyBack']+$income_array[$key]['Income']).'</td></tr>';
              $i++;
              if($i>11) { break; }
              }
            }

            ?>
        </tbody>
    </table>
	
	
	