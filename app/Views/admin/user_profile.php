<?php $user = $profile[0];






$cashback = $approved_cashback = $pending_cashback = $redeem_cashback = $moneyback = $approved_moneyback = $pending_moneyback = $redeem_moneyback = $credits = 0;
if (!empty($incomes)) {
  foreach ($incomes as $inc) {
    //if($inc['type']=='MoneyBack') { $moneyback = $moneyback + $inc['tamount']; }
    if ($inc['type'] == 'Credits') {
      $credits = $credits + $inc['tamount'];
    }

    if ($inc['type'] == 'MoneyBack') {
      if ($inc['status'] == 'Approved') {
        $approved_moneyback = $approved_moneyback + $inc['tamount'];
      }
      if ($inc['status'] == 'Pending') {
        $pending_moneyback = $pending_moneyback + $inc['tamount'];
      }
      if ($inc['status'] == 'Redeem') {
        $redeem_moneyback = $redeem_moneyback + $inc['tamount'];
      }

      $moneyback = $moneyback + $inc['tamount'];
    }

    if ($inc['type'] == 'Cash Back') {
      if ($inc['status'] == 'Approved') {
        $approved_cashback = $approved_cashback + $inc['tamount'];
      }
      if ($inc['status'] == 'Pending') {
        $pending_cashback = $pending_cashback + $inc['tamount'];
      }
      if ($inc['status'] == 'Redeem') {
        $redeem_cashback = $redeem_cashback + $inc['tamount'];
      }
      $cashback = $cashback + $inc['tamount'];
    }
  }
}







$purchases_count = $purchases_amount = $online_purchase_count = $online_purchase_amount = $utility_purchase_count = $utility_purchase_amount = $service_purchase_count = $service_purchase_amount = $instore_purchase_count = $instore_purchase_amount =  0;



$macro_purchases_count = $macro_purchases_amount = 0;

$macro_count = $macro_amount = 0;

if (!empty($purchases)) {
  foreach ($purchases as $purchase) {
    if ($purchase['type'] == 'Purchase') {
      if ($purchase['order_type'] == 'Online') {
        $online_purchase_amount = $online_purchase_amount + $purchase['amount'];
        $online_purchase_count = $online_purchase_count + 1;
      }
      if ($purchase['order_type'] == 'Utility') {
        $utility_purchase_amount = $utility_purchase_amount + $purchase['amount'];
        $utility_purchase_count = $utility_purchase_count + 1;
      }
      if ($purchase['order_type'] == 'Instore') {
        $service_purchase_amount = $service_purchase_amount + $purchase['amount'];
        $instore_purchase_count = $instore_purchase_count + 1;
      }

      if ($purchase['order_type'] == 'Macro') {
        $macro_purchases_amount = $macro_purchases_amount + $purchase['amount'];
        $macro_purchases_count = $macro_purchases_count + 1;
      }
    }
    if ($purchase['type'] == 'Pack') {
      $macro_amount = $macro_amount + $purchase['amount'];
      $macro_count = $macro_count + 1;
    }
  }
}

$purchases_count = $online_purchase_count + $utility_purchase_count + $instore_purchase_count + $macro_count + $macro_purchases_count;
$purchases_amount = $online_purchase_amount + $utility_purchase_amount + $service_purchase_amount + $macro_purchases_amount;

?>
<style>
  .member_login {
    background: none !important;
    border: none;
    padding: 0 !important;
    font-family: arial, sans-serif;
    color: #069;
    cursor: pointer;
  }
  
</style>


<div class="Profile_table Profileeee">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td class="price_name kk" colspan="5">Profile Information</td>
        <td class="price_rate kk ">


          <form method="post" action="<?php echo base_url(); ?>../index.php/vc_site_admin/user/super_admin_login" target="_blank" class="form form-inline"> <input type="hidden" class="form-control" required value="<?php echo $user['customer_id']; ?>" name="bcono" style="height:auto;"> <i class="fa fa-eye"></i> <button type="submit" name="submit" class="member_login" value="Login"> View Partners Dashboard </button> <input type="hidden" name="auth" value="<?php echo md5('@#96pp~~' . md5('AdWinAdmin')); ?>">


          </form>
        </td>
      </tr>
      <tr>
        <td class="imgg" rowspan="5"><img class="img-responsive" src="<?php echo base_url(); ?>images/logo.png" alt="Profile"> </td>
        <td class="rate_text"><b>Name :</b></td>
        <td class="rate_text"><?php echo $user['f_name'] . ' ' . $user['l_name']; ?></td>
        <td class="rate_text"><b>Contact No. :</b></td>
        <td class="price_rate"><?php echo $user['phone']; ?></td>
        <td class="price_rate"><span>Last Visit: <?php echo date('Y-m-d', strtotime($user['last_visit'])); ?> </span></td>
      </tr>

      <tr>
        <td class="rate_text"><b>ZKey :</b></td>
        <td class="rate_text"><?php echo $user['customer_id']; ?></td>
        <td class="rate_text"><b>Email ID :</b></td>
        <td class="price_rate"><?php echo $user['email']; ?></td>
        <td class="price_rate"><span>KYC Status: Verified</span></td>
      </tr>

      <tr>
        <td class="rate_text"><b>Status :</b></td>
        <td class="rate_text"><?php if ($user['macro'] == 0) {
                                echo  'Micro';
                              } elseif ($user['macro'] <= 33) {
                                echo  'Macro';
                              } else {
                                echo  'Mega';
                              } ?></td>
        <td class="rate_text"><b>Address :</b></td>
        <td class="price_rate"><?php echo $user['address']; ?></td>
      </tr>

      <tr>
        <td class="rate_text"><b>Joining Date :</b></td>
        <td class="rate_text"><?php echo date('Y/m/d', strtotime($user['rdate'])); ?></td>
        <td class="rate_text"><b>Occupation :</b></td>
        <td class="price_rate">Self Employed</td>


      </tr>

      <tr>
        <td class="rate_text"><b>Parent Zkey :</b></td>
        <td class="rate_text"><?php echo $user['direct_customer_id']; ?></td>
        <td class="rate_text"><b>Parent Name :</b></td>
        <td class="rate_text"><?php echo $user['df_name'] . ' ' . $user['dl_name']; ?></td>


      </tr>

    </tbody>
  </table>

</div>

<div class="boxesss Profileeee">
  <div class="row">
    <div class="col-sm-3">
      <a href="<?php echo base_url(); ?>admin/customer/total_partners/<?php echo $user['id']; ?>">
        <div class="total_div color1 partners_page">
          <p>Total Partners</p>
          <h2><?php echo count($myfriends); ?></h2>

        </div>
      </a>
    </div>
    <div class="col-sm-3">
      <a href="<?php echo base_url(); ?>/admin/customer/total_purchase/<?php echo $profile[0]['id']; ?>">
        <div class="total_div color2 partners_page">
          <p>Total Purchases</p>
          <h2><?php echo $purchases_count; ?></h2>

        </div>
      </a>
    </div>
    <div class="col-sm-3">

      <div class="total_div color3 partners_page">
        <p>Total Cashback</p>
        <h2>₹ <?php echo $cashback;  ?></h2>

      </div>

    </div>
    <div class="col-sm-3">

      <div class="total_div color4 partners_page">
        <!--  <h2>19</h2> -->
        <p>Total Moneyback</p>
        <h2>₹ <?php echo $moneyback;  ?></h2>

      </div>

    </div>

    <div class="col-sm-3">

      <div class="total_div color5 partners_page">
        <p>Total Income</p>
        <h2>₹ <?php echo $cashback + $moneyback;  ?></h2>
      </div>

    </div>
    <div class="col-sm-3">
      <a href="<?php echo base_url(); ?>admin/customer/total_partners/<?php echo $user['id']; ?>">
        <div class="total_div color6 partners_page">
          <p>Active Circles</p>
          <h2><?php echo count($myfriends); ?></h2>

        </div>
      </a>
    </div>

    <div class="col-sm-3">
      <div class="total_div color7 partners_page">
        <p>My Wallet</p>
        <h2><?php echo $profile[0]['income_wallet']; ?></h2>
      </div>
    </div>


    <div class="col-sm-3">
      <div class="total_div color8 partners_page">
        <p>My Credits</p>
        <h2><?php echo $credits; ?></h2>
      </div>
    </div>
  </div>
</div>




<div class="tabssss Profileeee">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">My Account</a></li>
    <li><a data-toggle="tab" href="#menu1">My Payment</a></li>
    <li><a data-toggle="tab" href="#menu2">Purchases</a></li>
    <li><a data-toggle="tab" href="#menu3">KYC Details</a></li>
    <li><a data-toggle="tab" href="#menu4">Activity Logs</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="Colll">
        <h1>My Partners</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name">Total Partners</td>
              <td class="price_rate"><?php echo count($total_partner); ?></td>
            </tr>
            <tr>
              <td class="price_name">Partners In Circles 1 </td>
              <td class="price_rate"> <?php echo count($direct); ?> </td>
            </tr>
            <tr>
              <td>Active Circles </td>
              <td class="price_rate"><?php end($myfriends);
                                      $key = key($myfriends);
                                      if ($key >= 11) {
                                        echo 11;
                                      } else {
                                        echo $key;
                                      } ?></td>
            </tr>
            <tr>
              <td>Micro Partners </td>
              <td class="price_rate"> <?php if (array_key_exists(0, $macro_partner)) {
                                        echo $macro_partner[0];
                                      } else {
                                        echo 0;
                                      } ?></td>
            </tr>
            <tr>
              <td>Macro Partners</td>
              <td class="price_rate"> <?php if (array_key_exists(33, $macro_partner)) {
                                        echo $macro_partner[33];
                                      } else {
                                        echo 0;
                                      } ?></td>
            </tr>
            <tr>
              <td>Mega Partners </td>
              <td class="price_rate"><?php if (array_key_exists(66, $macro_partner)) {
                                        echo $macro_partner[66];
                                      } else {
                                        echo 0;
                                      } ?></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td> &nbsp;</td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td> &nbsp;</td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td> &nbsp;</td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td> &nbsp;</td>
              <td class="price_rate"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="Colll">
        <h1>My Purchases</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name">No. of Purchases</td>
              <td class="price_rate"><?php echo $purchases_count; ?></td>
            </tr>
            <tr>
              <td class="price_name">Amount of Purchases</td>
              <td class="price_rate"> ₹<?php echo $purchases_amount; ?> </td>
            </tr>
            <tr>
              <td>No. Online Purchases </td>
              <td class="price_rate"><?php echo $online_purchase_count; ?></td>
            </tr>
            <tr>
              <td>Amount of Online Purchases </td>
              <td class="price_rate"> ₹<?php echo $online_purchase_amount; ?></td>
            </tr>
            <tr>
              <td>No. of Macro Purchase </td>
              <td class="price_rate"><?php echo $macro_purchases_count; ?></td>
            </tr>
            <tr>
              <td>Amount of Macro Purchase </td>
              <td class="price_rate"> ₹<?php echo $macro_purchases_amount; ?></td>
            </tr>
            <tr>
              <td>Utility Purchases</td>
              <td class="price_rate"> ₹<?php echo $utility_purchase_count; ?></td>
            </tr>
            <tr>
              <td>Utility Amount </td>
              <td class="price_rate">₹<?php echo $utility_purchase_amount; ?></td>
            </tr>

            <tr>
              <td>Services Purchases </td>
              <td class="price_rate">₹<?php echo $service_purchase_count; ?></td>
            </tr>
            <tr>
              <td>Services Amount </td>
              <td class="price_rate">₹<?php echo $service_purchase_amount; ?></td>
            </tr>
            </tr>
            <tr>
              <td>Instore Purchases </td>
              <td class="price_rate">₹<?php echo $instore_purchase_count; ?></td>
            </tr>
            </tr>
            <tr>
              <td>Instore Amount </td>
              <td class="price_rate">₹<?php echo $instore_purchase_amount; ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="Colll">
        <h1>My Cashback</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name">Total Cashback</td>
              <td class="price_rate">₹<?php echo $cashback; ?></td>
            </tr>
            <tr>
              <td class="price_name">Approved Cashback </td>
              <td class="price_rate"> ₹<?php echo $approved_cashback; ?> </td>
            </tr>
            <tr>
              <td>Pending Cashback </td>
              <td class="price_rate">₹<?php echo $pending_cashback; ?></td>
            </tr>
            <tr>
              <td>Redeemed Cashback </td>
              <td class="price_rate"> ₹<?php echo $redeem_cashback; ?></td>
            </tr>
            <tr>
              <td>Online Cashback</td>
              <td class="price_rate"> ₹0</td>
            </tr>
            <tr>
              <td>Utility Cashback </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Services Cashback </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Instore Cashback </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Macro Cashback </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Mega Cashback </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td> Cashback </td>
              <td class="price_rate">₹0</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="Colll">
        <h1>My Moneyback</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name">Total Moneyback</td>
              <td class="price_rate">₹<?php echo $moneyback; ?></td>
            </tr>
            <tr>
              <td class="price_name">Total Purchases Amount</td>
              <td class="price_rate"> ₹<?php echo array_sum(array_column($online_purchase, 'amount')) + array_sum(array_column($macro_purchase, 'amount')); ?> </td>
            </tr>
            <tr>
              <td>Total Eligibility </td>
              <td class="price_rate">₹<?php echo $profile[0]['eligibility']; ?></td>
            </tr>
            <tr>
              <td>Approved Moneyback </td>
              <td class="price_rate"> ₹<?php echo $approved_moneyback; ?></td>
            </tr>
            <tr>
              <td>Pending Moneyback</td>
              <td class="price_rate"> ₹<?php echo $pending_moneyback; ?></td>
            </tr>
            <tr>
              <td>Redeemed Moneyback </td>
              <td class="price_rate">₹<?php echo $redeem_moneyback; ?></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="Colll">
        <h1>My Income</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name">Total Income</td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td class="price_name">Approved Income </td>
              <td class="price_rate"> ₹0 </td>
            </tr>
            <tr>
              <td>Pending income </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Redee Income </td>
              <td class="price_rate"> ₹0</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td class="price_rate"> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td class="price_rate"></td>
            </tr>

          </tbody>
        </table>
      </div>

    </div>


    <div id="menu1" class="tab-pane fade">
      <div class="Colll">
        <h1>My Payments</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name">Total Payments</td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td class="price_name">Partners In Circles </td>
              <td class="price_rate"> ₹0 </td>
            </tr>
            <tr>
              <td>Active Circles </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Micro Partners </td>
              <td class="price_rate"> ₹0</td>
            </tr>
            <tr>
              <td>Macro Partners</td>
              <td class="price_rate"> ₹0</td>
            </tr>
            <tr>
              <td>Mega Partners </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td> &nbsp;</td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td> &nbsp;</td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td> &nbsp;</td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td> &nbsp;</td>
              <td class="price_rate"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="Colll">
        <h1>My Purchases</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name">No. of Purchases</td>
              <td class="price_rate"><?php echo count($online_purchase) + count($macro_purchase); ?></td>
            </tr>
            <tr>
              <td class="price_name">Amount of Purchases</td>
              <td class="price_rate"> ₹<?php echo array_sum(array_column($online_purchase, 'amount')) + array_sum(array_column($macro_purchase, 'amount')); ?> </td>
            </tr>
            <tr>
              <td>Online Purchases</td>
              <td class="price_rate"><?php echo count($online_purchase); ?></td>
            </tr>
            <tr>
              <td>Online Amount</td>
              <td class="price_rate"> ₹ <?php echo array_sum(array_column($online_purchase, 'amount')); ?></td>
            </tr>
            <tr>
              <td>Utility Purchases</td>
              <td class="price_rate"> ₹0</td>
            </tr>
            <tr>
              <td>Utility Amount </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Utility Purchases </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Services Purchases </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Services Amount </td>
              <td class="price_rate">₹0</td>
            </tr>
            </tr>
            <tr>
              <td>Instore Purchases </td>
              <td class="price_rate">₹0</td>
            </tr>
            </tr>
            <tr>
              <td>Instore Amount </td>
              <td class="price_rate">₹0</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="Colll">
        <h1>My Cashback</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name">Total Cashback</td>
              <td class="price_rate">₹ <?php echo $cashback; ?></td>
            </tr>
            <tr>
              <td class="price_name">Approved Cashback </td>
              <td class="price_rate"> ₹<?php echo $approved_cashback; ?> </td>
            </tr>
            <tr>
              <td>Pending Cashback </td>
              <td class="price_rate">₹<?php echo $pending_cashback; ?></td>
            </tr>
            <tr>
              <td>Redeemed Cashback </td>
              <td class="price_rate"> ₹<?php echo $redeem_cashback; ?></td>
            </tr>
            <tr>
              <td>Online Cashback</td>
              <td class="price_rate"> ₹0</td>
            </tr>
            <tr>
              <td>Utility Cashback </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Services Cashback </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Instore Cashback </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Macro Cashback </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Mega Cashback </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td> Cashback </td>
              <td class="price_rate">₹0</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="Colll">
        <h1>My Moneyback</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name">Total Moneyback</td>
              <td class="price_rate">₹<?php echo $moneyback; ?></td>
            </tr>
            <tr>
              <td class="price_name">Total Purchases Amount</td>
              <td class="price_rate"> ₹<?php echo array_sum(array_column($online_purchase, 'amount')) + array_sum(array_column($macro_purchase, 'amount')); ?> </td>
            </tr>
            <tr>
              <td>Total Eligibility </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Approved Moneyback </td>
              <td class="price_rate"> ₹<?php echo $approved_moneyback; ?></td>
            </tr>
            <tr>
              <td>Pending Moneyback</td>
              <td class="price_rate"> ₹<?php echo $pending_moneyback; ?></td>
            </tr>
            <tr>
              <td>Redeemed Moneyback </td>
              <td class="price_rate">₹<?php echo $redeem_moneyback; ?></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="Colll">
        <h1>My Income</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name">Total Moneyback</td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td class="price_name">Total Purchases Amount </td>
              <td class="price_rate"> ₹0 </td>
            </tr>
            <tr>
              <td>Total Eligibility </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Approved Moneyback </td>
              <td class="price_rate"> ₹0</td>
            </tr>
            <tr>
              <td>Pending Moneyback</td>
              <td class="price_rate"> ₹0</td>
            </tr>
            <tr>
              <td>Redeemed Moneyback </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td class="price_rate"></td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="Colll">
        <h1>My Income</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name">Total Income</td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td class="price_name">Approved Income </td>
              <td class="price_rate"> ₹0 </td>
            </tr>
            <tr>
              <td>Pending Income </td>
              <td class="price_rate">₹0</td>
            </tr>
            <tr>
              <td>Redeemed Income </td>
              <td class="price_rate"> ₹0</td>
            </tr>

            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
            <tr>
              <td>&nbsp; </td>
              <td class="price_rate"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div id="menu2" class="tab-pane fade">
      <div class="Colll Untraced">

        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#menu11">Untraced Purchases</a></li>
          <li><a data-toggle="tab" href="#menu22">Upload Purchases</a></li>
          <li><a data-toggle="tab" href="#menu33">Cancelled Purchase</a></li>
        </ul>
        <div class="tab-content">
          <div id="menu11" class="tab-pane fade in active">

            <table class="table table-striped Accountttt">
              <tbody>
                <tr>
                  <th class="price_name">S.No.</th>
                  <th class="price_name">Date</th>
                  <th class="price_name">Website</th>
                  <th class="price_name">Transaction Id</th>
                  <th class="price_name">Amount(₹)</th>
                  <th class="price_rate">Remarks</th>
                  <th class="price_rate">Transaction Id</th>
                </tr>
                <tr>
                  <td class="price_name">01</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                </tr>
                <tr>
                  <td class="price_name">01</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                </tr>
                <tr>
                  <td class="price_name">01</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                </tr>

              </tbody>
            </table>
          </div>
          <div id="menu22" class="tab-pane fade">

            <table class="table table-striped Accountttt">
              <tbody>
                <tr>
                  <th class="price_name">S.No.</th>
                  <th class="price_name">Bill Date</th>
                  <th class="price_name">Bill No.</th>
                  <th class="price_name">Merchant ZKey</th>
                  <th class="price_name">Stote Name</th>
                  <th class="price_rate">City</th>
                  <th class="price_rate">Contact No.</th>
                  <th class="price_rate">Description</th>
                  <th class="price_rate">Quantity</th>
                  <th class="price_rate">Amount(₹)</th>
                  <th class="price_rate">Uploaded Bill</th>
                </tr>
                <tr>
                  <td class="price_name">01</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                </tr>
                <tr>
                  <td class="price_name">01</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                </tr>
                <tr>
                  <td class="price_name">01</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                </tr>

              </tbody>
            </table>

          </div>
          <div id="menu33" class="tab-pane fade">
            <table class="table table-striped Accountttt">
              <tbody>
                <tr>
                  <th class="price_name">S.No.</th>
                  <th class="price_name">Date</th>
                  <th class="price_name">Transaction ID</th>
                  <th class="price_name">Type of Purchase</th>
                  <th class="price_name">Merchant Name</th>
                  <th class="price_rate">Amount(₹)</th>
                </tr>
                <tr>
                  <td class="price_name">01</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                </tr>
                <tr>
                  <td class="price_name">01</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                </tr>
                <tr>
                  <td class="price_name">01</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                  <td class="price_rate">0</td>
                </tr>

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>


    <div id="menu3" class="tab-pane fade zkey">
      <div class="Colll">
        <h1>Members Zkey</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name"><?php echo $profile[0]['customer_id']; ?></td>
            </tr>


          </tbody>
        </table>
      </div>
      <div class="Colll">
        <h1>Partner Name</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name"><?php echo $profile[0]['f_name'] . ' ' . $profile[0]['l_name']; ?></td>

            </tr>

          </tbody>
        </table>
      </div>
      <div class="Colll">
        <h1>Member Photo</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name"><?php if ($profile[0]['image'] != '') {
                                        echo '<img width="50" src="' . base_url() . '/images/user/' . $profile[0]['image'] . '" >';
                                      } ?></td>

            </tr>

          </tbody>
        </table>
      </div>
      <div class="Colll">
        <h1>ID Proof</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name"><?php if ($profile[0]['aadharimage'] != '') {
                                        echo '<img width="50" src="' . base_url() . '/images/user/' . $profile[0]['aadharimage'] . '" >';
                                      } ?></td>

            </tr>

          </tbody>
        </table>
      </div>
      <div class="Colll">
        <h1>Address Proof</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name"></td>

            </tr>

          </tbody>
        </table>
      </div>
      <div class="Colll">
        <h1>Bank ID Proof</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name"></td>

            </tr>

          </tbody>
        </table>
      </div>

      <div class="Colll">
        <h1>Verify Status</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name"></td>

            </tr>

          </tbody>
        </table>
      </div>
      <div class="Colll">
        <h1>Verify Date</h1>
        <table class="table table-striped Accountttt">
          <tbody>
            <tr>
              <td class="price_name"></td>

            </tr>

          </tbody>
        </table>
      </div>
    </div>

    <div id="menu4" class="tab-pane fade">
      <div class="Collll">

        <table class="table table-striped Accountttt">
          <thead>
            <tr>
              <th class="sno1">S.No.</th>
              <th class="activity">Activity</th>
              <th>Tracking Ticket</th>
              <th>Date</th>
              <th>Time</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td class="">1</td>
              <td class="">https://www.flipkart.com/?s_kwcid=AL!739!3!537313974918!e!!g!!flipkart&gclsrc=aw.ds&&semcmpids</td>
              <td class="">34545228</td>
              <td class="">12/5/2021</td>
              <td class="">7:15 AM</td>
            </tr>
            <tr>
              <td class="">2</td>
              <td class="">https://www.flipkart.com/?s_kwcid=AL!739!3!537313974918!e!!g!!flipkart&gclsrc=aw.ds&&semcmpids</td>
              <td class="">34545228</td>
              <td class="">12/5/2021</td>
              <td class="">7:15 AM</td>
            </tr>


          </tbody>
        </table>


      </div>
    </div>
  </div>
