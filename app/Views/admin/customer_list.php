<script type="text/javascript"> 
function deleteConfirm(url)
 {
    if(confirm('Do you want to Delete this record ?'))
    {
        window.location.href=url;
    }
 }
</script>
<div class="page-heading">
<!-- <a class="btn btn-primary flr" href="<?php echo base_url().'admin/customer/add'; ?>">Add New</a > -->
        <h2><?php echo $title; ?></h2>
      </div>
 
      <?php
      //flash messages
      if(session()->getFlashdata('flash_message')){
        if(session()->getFlashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> customer updated with success.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-danger">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
	  //print_r($restaurants);
      ?>

	   <div class="table-responsive">
<table id="example" class="table table-bordered table-hover customer-table"> 
	<thead> <tr><th>ID</th> <th>Partner Name</th><th>Zkey ID</th><th>status</th><th>Date of Joining</th><th>Parent Name</th><th>Parent Key</th><th>City</th><th>Phone</th><th>Email</th><!-- <th>Delete</th> --> <th>View</th></tr> </thead> 
<tbody> 
<?php 
$i = 1;
foreach($customer as $con){ 
	if($con['macro'] > 0){
		$franchisee_value='Yes';
	}
	else{
		$franchisee_value='No';
	}
	echo '<tr><td>'.$i.'</td><td><a href="'.base_url().'admin/customer/edit/'.$con['id'].'">'.$con['f_name'].'</a></td><td>'.$con['customer_id'].'</td><td>'.$con['status'].'</td><td>'.date('Y/m/d',strtotime($con['rdate'])).'</td><td>'.$con['parent_customer_id'].'</td><td>'.$con['direct_customer_id'].'</td><td>'.$con['city'].'</td><td>'.$con['phone'].'</td><td><a href="'.base_url().'admin/customer/edit/'.$con['id'].'">'.$con['email'].'</a></td><td><a href="customer/info/'.$con['id'].'">View</a></td>';
?> <!--
<td><form method="post" action="<?php echo base_url(); ?>../index.php/vc_site_admin/user/super_admin_login" target="_blank" class="form form-inline">	  <p> 		  <input type="hidden" class="form-control" required value="<?php echo $con['customer_id']; ?>" name="bcono" style="height:auto;"> 		  <input type="submit" name="submit" class="btn btn-primary" value="Login">	  	  <input type="hidden" name="auth" value="<?php echo md5('@#96pp~~'.md5('AdWinAdmin'));?>">	  </p>	</form></td>- -->
	
<!-- <td><a class="delete" onclick="javascript:deleteConfirm('<?php echo base_url().'admin/customer/del/'.$con['id'];?>');" deleteConfirm href="#">Delete</a></td> -->
		<?php echo '</tr>';
$i++;
}
?>
</tbody> 
</table>
</div>
