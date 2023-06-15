 <div class="col-sm-2 side-bar" style="float:left;">
   <h3><strong>main navigation</strong></h3>
   <ul>
     <li class="dropdown"><a class="dropdown-toggle active" href="<?php echo base_url(); ?>welcome">Dashboard</a></li>
     <li class="dropdown"><a href="<?php echo base_url(); ?>admin/customer">Customer</a></li>
     <li class="dropdown"><a href="<?php echo base_url(); ?>admin/update_user">Update User</a></li>

     <li class="dropdown ">
       <a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo base_url(); ?>admin/customer/partners_master" aria-expanded="true"> Partners &nbsp;<i class="fa fa-angle-down"></i></a>
       <ul role="menu" class="dropdown-menu">
         <li> <a href="<?php echo base_url(); ?>admin/customer/partners_master">Master</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/micro">Micro Partners</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/macro">Macro Partners</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/mega">Mega Partners</a></li>
       </ul>
     </li>
     <li class="dropdown ">
       <a data-toggle="dropdown" class="dropdown-toggle" href="" aria-expanded="true">Purchase &nbsp;<i class="fa fa-angle-down"></i></a>
       <ul role="menu" class="dropdown-menu">
         <li> <a href="<?php echo base_url(); ?>admin/customer/purchase_master">Master</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/customer/macro_purchase">Macro Purchase</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/customer/mega_purchase">Mega Purchase</a></li>
         <hr>
         <li> <a href="<?php echo base_url(); ?>admin/customer/online_purchase">Online Purchase</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/customer/utility_purchase">Utility Purchase</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/customer/services_purchase">Services Purchase</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/customer/instore_purchase">Instore Purchase</a></li>
       </ul>
     </li>

     <li class="dropdown ">
       <a data-toggle="dropdown" class="dropdown-toggle" href="" aria-expanded="true"> Sales Report &nbsp;<i class="fa fa-angle-down"></i></a>
       <ul role="menu" class="dropdown-menu">
         <li> <a href="<?php echo base_url(); ?>admin/report/Cashback">Cashback Report</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/report/MoneyBack">Moneyback Report</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Macro Sales Report</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Mega Sales Report</a></li>
         <hr>
         <li> <a href="<?php echo base_url(); ?>admin/#">Income Report</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Online Report</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Utility Report</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Services Report</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Instore Report</a></li>
       </ul>
     </li>
     <li class="dropdown ">
       <a data-toggle="dropdown" class="dropdown-toggle" href="" aria-expanded="true"> Turnover &nbsp;<i class="fa fa-angle-down"></i></a>
       <ul role="menu" class="dropdown-menu">
         <li> <a href="<?php echo base_url(); ?>admin/#">Macro Sales Turnover</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Mega Sales Turnover</a></li>
         <hr>
         <li> <a href="<?php echo base_url(); ?>admin/#">Online Turnover</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Utility Turnover</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Services Turnover</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Instore Turnover</a></li>
       </ul>
     </li>

     <li class="dropdown "><a href="<?php echo base_url(); ?>admin/customer/support_master"> Support </a>
     <li class="dropdown"><a href="<?php echo base_url(); ?>admin/wallet/add">Wallet Update</a></li>
     <li class="dropdown"><a href="<?php echo base_url(); ?>admin/fund_request_list">Wallet Request</a></li>
     <li class="dropdown"><a href="<?php echo base_url(); ?>admin/wallet/history">Wallet History</a></li>
     <li class="dropdown"> <a class="" href="<?php echo base_url(); ?>logout">Logout</a></li>
   </ul>

   <h3><strong>Inactive</strong></h3>
   <ul>
     <!-- Affiliate Partner -->
     <li class="dropdown ">
       <a data-toggle="dropdown" class="dropdown-toggle" href="" aria-expanded="true"> Affiliate partner &nbsp;<i class="fa fa-angle-down"></i></a>
       <ul role="menu" class="dropdown-menu">
         <li> <a href="<?php echo base_url(); ?>admin/#">Online</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Utility</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Services</a></li>
       </ul>
     </li>
     <!-- Affiliate -->
     <li class="dropdown ">
       <a data-toggle="dropdown" class="dropdown-toggle" href="" aria-expanded="true"> Affiliate &nbsp;<i class="fa fa-angle-down"></i></a>
       <ul role="menu" class="dropdown-menu">
         <li> <a class="" href="<?php echo base_url(); ?>admin/webstores">Affiliate Webstore</a></li>
         <li> <a class="" href="<?php echo base_url(); ?>admin/a_webstore">Affiliate Webstore</a></li>
         <li> <a class="" href="<?php echo base_url(); ?>admin/activity_report">Activity Report</a></li>
         <li> <a class="" href="<?php echo base_url(); ?>admin/affiliate_scheduled">Affiliate Scheduled</a></li>
         <li> <a class="" href="<?php echo base_url(); ?>admin/myoffers">My Offers</a></li>
       </ul>
     </li>
     <!-- Product Master -->
     <li class="dropdown ">
       <a data-toggle="dropdown" class="dropdown-toggle" href="" aria-expanded="true"> Product Master &nbsp;<i class="fa fa-angle-down"></i></a>
       <ul role="menu" class="dropdown-menu">
         <li> <a href="<?php echo base_url(); ?>admin/customer/product_master">Product Master</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Stock</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Delivered Order List</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Cancelled Order List</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Total Products Blocked</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Total Packs Bocked</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Add Product</a>
           <ul role="menu" class="dropdown-menu">
             <li> <a href="<?php echo base_url(); ?>admin/customer/product_master">Macro Product</a></li>
             <li> <a href="<?php echo base_url(); ?>admin/#">Mega Product</a></li>
           </ul>
         </li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Zoogol Shopping</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Total Packs Booked</a></li>
       </ul>
     </li>
     <!-- Bills Updated -->
     <li class="dropdown ">
       <a data-toggle="dropdown" class="dropdown-toggle" href="" aria-expanded="true"> Bills Updated &nbsp;<i class="fa fa-angle-down"></i></a>
       <ul role="menu" class="dropdown-menu">
         <li> <a href="<?php echo base_url(); ?>admin/customer/Online_bills_api">Online Bills (Using API)</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/customer/Online_bills_without_api">Online Bills (Without API)</a></li>
       </ul>
     </li>
     <!-- Commission Report -->
     <li class="dropdown ">
       <a data-toggle="dropdown" class="dropdown-toggle" href="" aria-expanded="true"> Commission Report &nbsp;<i class="fa fa-angle-down"></i></a>
       <ul role="menu" class="dropdown-menu">
         <li> <a href="<?php echo base_url(); ?>admin/online_commision">Online Commission</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/utility_commision">Utility Commission</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/service_commision">Services Commission</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/instore_commision">Instore Commission</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/macro_commision">Macro Commission</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/mega_commision">Mega Commission</a></li>
       </ul>
     </li>
     <!-- Company Data -->
     <li class="dropdown ">
       <a data-toggle="dropdown" class="dropdown-toggle" href="" aria-expanded="true"> Company Data &nbsp;<i class="fa fa-angle-down"></i></a>
       <ul role="menu" class="dropdown-menu">
         <li> <a href="<?php echo base_url(); ?>admin/customer/payout_report">Payout Report</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/customer/TDS_Report">TDS Report</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/customer/admin_charges_report">Admin Charges Report</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/customer/direct_commission">Direct Commission</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/customer/indirect_commission">Indirect Commission</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/customer/replace_commission">Replace(Inactive) Commission</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/customer/upgrade_mamber_commission">Upgrade Mamber Commission</a></li>
       </ul>
     </li>
     <!-- All Reports -->
     <li class="dropdown ">
       <a data-toggle="dropdown" class="dropdown-toggle" href="" aria-expanded="true"> All Reports &nbsp;<i class="fa fa-angle-down"></i></a>
       <ul role="menu" class="dropdown-menu">
         <li> <a href="<?php echo base_url(); ?>admin/#">Member Details</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Payout Reports</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/customer/commission_distribusion">Commission Distribution</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/customer/company_friend_circlee">Company friend Circle</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Friends in Circle</a></li>
       </ul>
     </li>
     <!-- Operator Master -->
     <li class="dropdown ">
       <a data-toggle="dropdown" class="dropdown-toggle" href="" aria-expanded="true"> Operator Master &nbsp;<i class="fa fa-angle-down"></i></a>
       <ul role="menu" class="dropdown-menu">
         <li> <a href="<?php echo base_url(); ?>admin/#">Staff/Department/Group</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">System Operators</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Access Permission</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Access Log Details</a></li>
         <li> <a href="<?php echo base_url(); ?>admin/#">Change Password</a></li>
       </ul>
     </li>
     <li class="dropdown"><a href="<?php echo base_url(); ?>admin/moneyback-closing">Moneyback Closing</a></li>
     <li class="dropdown"> <a class="" href="<?php echo base_url(); ?>admin/franchise">Franchise Area List</a></li>
     <li class="dropdown"> <a class="" href="<?php echo base_url(); ?>admin/sale">Sale</a></li>
     <li class="dropdown"> <a class="" href="<?php echo base_url(); ?>admin/order">Orders</a></li>
     <li class="dropdown"> <a class="" href="<?php echo base_url(); ?>admin/webstores/add"> Add Operators</a></li>
     <li class="dropdown"> <a class="" href="<?php echo base_url(); ?>admin/webstores">Operatores</a></li>
     <li class="dropdown"> <a class="" href="<?php echo base_url(); ?>admin/plan">Browse Plan</a></li>
     <li class="dropdown"> <a class="" href="<?php echo base_url(); ?>admin/review">Review</a></li>
     <li class="dropdown"><a href="<?php echo base_url(); ?>admin/uploadreceipts">Untraced Purchase</a></li>
     <li class="dropdown"> <a class="" href="<?php echo base_url(); ?>admin/activity_log">Activity Log</a></li>
     <li class="dropdown"><a href="<?php echo base_url(); ?>admin/member-login">Member Login</a></li>
     <li class="dropdown"> <a class="" href="<?php echo base_url(); ?>admin/product">Home Slider</a></li>
     <li class="dropdown"> <a class="" href="<?php echo base_url(); ?>admin/tax">Tax</a></li>
     <li class="dropdown"> <a class="" href="<?php echo base_url(); ?>admin/merchant">Merchants List</a></li>
     <li class="dropdown"> <a class="" href="<?php echo base_url(); ?>admin/m_product">Merchant Product</a></li>
     <li class="dropdown"> <a class="" href="<?php echo base_url(); ?>admin/coupon">Coupons</a></li>
     <li class="dropdown"> <a class="" href="<?php echo base_url(); ?>admin/uploadreceipts">Receipts List</a></li>
   </ul>
 </div>
 <!--side bar close -->