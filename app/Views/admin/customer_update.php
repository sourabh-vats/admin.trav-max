     <style>
       label.checkbox {
         padding-left: 20px;
       }

       .add-more-d-area-div-parent input {
         margin-bottom: 6px;
       }

       label.checkbox {
         font-weight: normal;
       }
     </style>
     <div class="page-heading"><a class="btn btn-primary flr" href="<?php echo base_url() . 'admin/customer'; ?>">Back</a>
       <h2>Update Customer</h2>
     </div>

     <?php
      //flash messages
      $session = session();
      if ($session->getFlashdata('flash_message')) {
        if ($session->getFlashdata('flash_message') == 'updated') {
          echo '<div class="alert alert-success">';
          echo '<a class="close" data-dismiss="alert">×</a>';
          echo '<strong>Well done!</strong> Customer updated successfully.';
          echo '</div>';
        } elseif ($image_error == 'true') {
          echo '<div class="alert alert-danger">';
          echo '<a class="close" data-dismiss="alert">×</a>';
          echo '<strong>Image !</strong> should not be empty please upload image.';
          echo '</div>';
        } else {
          echo '<div class="alert alert-danger">';
          echo '<a class="close" data-dismiss="alert">×</a>';
          echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';
        }
      }
      //print_r($restaurants);
      ?>

     <?php
      //form data
      $attributes = array('class' => 'form', 'id' => '');

      //form validation
      $validation = \Config\Services::validation();
      //   echo $validation->getError();
      //print_r($editor);
      helper('form');
      $uri = service('uri');
      echo form_open('admin/customer/edit/' . $uri->getSegment(4), ['class' => 'form-signin', 'enctype' => 'multipart/form-data']);
      $user = $customer[0];
      ?>

     <fieldset style="width:0px">
       <input type="hidden" value="<?php echo $user['id']; ?>" name="cid">
       <input type="hidden" value="<?php echo $user['var_status']; ?>" name="var_status">

       
       <p>&nbsp;</p>


       <div class="form-group col-sm-2">
         <label>Unique Code</label>
         <input type="text" class="form-control" readonly name="bsacode" value="<?php echo $user['customer_id']; ?>">
       </div>

       <div class="form-group col-sm-3">
         <label>Image</label>
         <input style="padding:0px;" type="file" class="form-control" name="image">
         <input type="hidden" value="<?php echo $user['image']; ?>" name="image_old">
       </div>
       <div class="form-group col-sm-2">
         <?php if ($user['image'] != '') {
            echo '<img src="http://wishzon.com/images/user/' . $user['image'] . '" width="50" height="50">';
          } ?>
       </div>

       <div class="form-group col-sm-2">
         <label>Sponsor Code</label>
         <input type="text" class="form-control" readonly value="<?php echo $user['parent_customer_id']; ?>">
       </div>

       <div class="form-group col-sm-3">
         <label>First Name</label>
         <input type="text" class="form-control" name="f_name" value="<?php if (service('request')->getVar('f_name') != '') {
                                                                        echo service('request')->getVar('f_name');
                                                                      } else {
                                                                        echo $user['f_name'];
                                                                      } ?>">
       </div>

       <div class="form-group col-sm-3">
         <label>Last Name</label>
         <input type="text" class="form-control" name="l_name" value="<?php if (service('request')->getVar('l_name') != '') {
                                                                        echo service('request')->getVar('l_name');
                                                                      } else {
                                                                        echo $user['l_name'];
                                                                      } ?>">
       </div>
       <div class="form-group col-sm-3">
         <label>DOJ</label>
         <input type="text" class="form-control" readonly value="<?php echo date('d F Y', strtotime($user['rdate'])); ?>">
       </div>




       <div class="form-group col-sm-4">
         <label>Phone</label>
         <input type="number" class="form-control" name="phone" value="<?php if (service('request')->getVar('phone') != '') {
                                                                          echo service('request')->getVar('phone');
                                                                        } else {
                                                                          echo $user['phone'];
                                                                        } ?>">
       </div>

       <div class="form-group col-sm-4">
         <label>Email</label>
         <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>">
       </div>

       <div class="form-group col-sm-6">
         <label>Address</label>
         <input type="text" class="form-control" name="address" value="<?php if (service('request')->getVar('address') != '') {
                                                                          echo service('request')->getVar('address');
                                                                        } else {
                                                                          echo $user['address'];
                                                                        } ?>">
       </div>
       <div class="form-group col-sm-6">
         <label>City</label>
         <input type="text" class="form-control" name="city" value="<?php if (service('request')->getVar('city') != '') {
                                                                      echo service('request')->getVar('city');
                                                                    } else {
                                                                      echo $user['city'];
                                                                    } ?>">
       </div>

       <div class="form-group col-sm-4">
         <label>State</label>
         <input type="text" class="form-control" name="state" value="<?php if (service('request')->getVar('state') != '') {
                                                                        echo service('request')->getVar('state');
                                                                      } else {
                                                                        echo $user['state'];
                                                                      } ?>">
       </div>
       <div class="form-group col-sm-4">
         <label>Pincode</label>
         <input type="number" class="form-control" name="pincode" value="<?php if (service('request')->getVar('pincode') != '') {
                                                                            echo service('request')->getVar('pincode');
                                                                          } else {
                                                                            echo $user['pincode'];
                                                                          } ?>">
       </div>




       <div class="form-group col-sm-6">
         <label>PAN No</label>
         <input type="text" class="form-control" name="pancard" value="<?php if (service('request')->getVar('pancard') != '') {
                                                                          echo service('request')->getVar('pancard');
                                                                        } else {
                                                                          echo $user['pancard'];
                                                                        } ?>">
       </div>

       <div class="form-group col-sm-4">
         <label>Upload Pan Image</label>
         <input style="padding:0px;" type="file" class="form-control" name="panimage">
         <input type="hidden" value="<?php echo $user['panimage']; ?>" name="panimage_old">
         <label><input type="checkbox" name="applied_pan" <?php if ($user['applied_pan'] == 'yes') {
                                                            echo 'checked="checked"';
                                                          } ?> value="yes"> Applied for PAN Card </label>
       </div>
       <div class="form-group col-sm-2">
         <?php if ($user['panimage'] != '') {
            echo '<a href="http://wishzon.com/images/user/' . $user['panimage'] . '" target="_blank"><img src="http://wishzon.com/images/user/' . $user['panimage'] . '" style="width:auto;max-width:64px;"></a>';
          } ?>
       </div>

       <div class="form-group col-sm-6">
         <label>Aadhar No</label>
         <input type="text" class="form-control" name="aadhar" value="<?php if (service('request')->getVar('aadhar') != '') {
                                                                        echo service('request')->getVar('aadhar');
                                                                      } else {
                                                                        echo $user['aadhar'];
                                                                      } ?>">
       </div>
       <div class="form-group col-sm-4">
         <label>Upload Aadhar</label>
         <input style="padding:0px;" type="file" class="form-control" name="aadharimage">
         <input type="hidden" value="<?php echo $user['aadharimage']; ?>" name="aadharimage_old">
         <label><input type="checkbox" name="applied_aadhar" <?php if ($user['applied_aadhar'] == 'yes') {
                                                                echo 'checked="checked"';
                                                              } ?> value="yes"> Applied for Aadhar Card </label>
       </div>

       <div class="form-group col-sm-2">
         <?php if ($user['aadharimage'] != '') {
            echo '<a href="http://wishzon.com/images/user/' . $user['aadharimage'] . '" target="_blank"><img src="http://wishzon.com/images/user/' . $user['aadharimage'] . '" style="width:auto;max-width:64px;"></a>';
          } ?>
       </div>



       <div class="form-group col-sm-6">
         <label>Status</label>
         <select name="status" class="form-control custom-select">
           <option <?php if ($user['status'] == 'active') {
                      echo 'selected="selected"';
                    } ?> value="active">Active</option>
           <option <?php if ($user['status'] == 'deactive') {
                      echo 'selected="selected"';
                    } ?> value="deactive">Deactive</option>
         </select>
       </div>


       <div class="form-group col-sm-6">
         <label>Franchise</label>
         <select name="franchisee" class="form-control custom-select">
           <option <?php if ($user['franchisee'] == '0') {
                      echo 'selected="selected"';
                    } ?> value="0">No</option>
           <option <?php if ($user['franchisee'] == '1') {
                      echo 'selected="selected"';
                    } ?> value="1">Yes</option>
         </select>
       </div>




       <div class="form-group  col-lg-12">
         <p><input type="checkbox" name="terms" checked required value="yes"> By clicking become an distributor, you are agreeing to the privacy policy and the terms & conditions of the Gangland</p>
       </div>


       <h4 style="text-align:center;clear:both;padding-top:20px; color:#fe980f;">Enter Bank Details</h4>
       <div class="col-sm-6 form-group"><label>Bank Name</label> <input type="text" name="bank_name" value="<?php if (service('request')->getVar('bank_name') != '') {
                                                                                                              echo service('request')->getVar('bank_name');
                                                                                                            } else {
                                                                                                              echo $user['bank_name'];
                                                                                                            } ?>" class="form-control"></div>
       <div class="col-sm-6 form-group"><label>Branch</label> <input type="text" name="branch" value="<?php if (service('request')->getVar('branch') != '') {
                                                                                                        echo service('request')->getVar('branch');
                                                                                                      } else {
                                                                                                        echo $user['branch'];
                                                                                                      } ?>" class="form-control"></div>
       <div class="col-sm-6 form-group hide"><label>City</label> <input type="text" name="bank_city" value="<?php if (service('request')->getVar('bank_city') != '') {
                                                                                                              echo service('request')->getVar('bank_city');
                                                                                                            } else {
                                                                                                              echo $user['bank_city'];
                                                                                                            } ?>" class="form-control"></div>
       <div class="col-sm-6 form-group"><label>State</label> <input type="text" name="bank_state" value="<?php if (service('request')->getVar('bank_state') != '') {
                                                                                                            echo service('request')->getVar('bank_state');
                                                                                                          } else {
                                                                                                            echo $user['bank_state'];
                                                                                                          } ?>" class="form-control"></div>
       <div class="col-sm-6 form-group hide"><label>Account Name</label> <input type="text" name="account_name" value="<?php if (service('request')->getVar('account_name') != '') {
                                                                                                                          echo service('request')->getVar('account_name');
                                                                                                                        } else {
                                                                                                                          echo $user['account_name'];
                                                                                                                        } ?>" class="form-control"></div>
       <div class="col-sm-6 form-group hide"><label>Account Type</label> <input type="text" name="account_type" value="<?php if (service('request')->getVar('account_type') != '') {
                                                                                                                          echo service('request')->getVar('account_type');
                                                                                                                        } else {
                                                                                                                          echo $user['account_type'];
                                                                                                                        } ?>" class="form-control"></div>
       <div class="col-sm-6 form-group"><label>Account No.</label> <input type="number" name="account_no" value="<?php if (service('request')->getVar('account_no') != '') {
                                                                                                                    echo service('request')->getVar('account_no');
                                                                                                                  } else {
                                                                                                                    echo $user['account_no'];
                                                                                                                  } ?>" class="form-control"></div>
       <div class="col-sm-6 form-group"><label>IFSC Code</label> <input type="text" name="ifsc" value="<?php if (service('request')->getVar('ifsc') != '') {
                                                                                                          echo service('request')->getVar('ifsc');
                                                                                                        } else {
                                                                                                          echo $user['ifsc'];
                                                                                                        } ?>" class="form-control"></div>



       <div class="col-sm-12 form-group"><label style="font-weight:normal"><input required type="checkbox" name="declare" value="1"> I hereby declared that the details furnished above correct to the best of my knowledge and belief. </label></div>




       <div class="form-group  col-lg-12">
         <button class="btn btn-primary" type="submit">Updates</button> &nbsp;
       </div>

     </fieldset>


     <?php echo form_close(); ?>

     <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
     <script>
       tinymce.init({
         selector: '.textarea-editor',
         browser_spellcheck: true
       });
     </script>