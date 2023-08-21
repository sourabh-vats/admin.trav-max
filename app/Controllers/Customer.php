<?php

namespace App\Controllers;

class Customer extends BaseController
{

    public function index()
    {
        $data['title'] = 'Partners';
        $customermodel = model('Customer_model');
        $data['customer'] = $customermodel->get_all_customer();

        //load the view
        $data['main_content'] = 'admin/customer_list';
        return view('includes/admin/template', $data);
    }

    public function update($id)
    {
        $customermodel = model('Customer_model');
        $data['customer'] = $customermodel->get_all_customer_id($id);
        $data['parentid'] = $customermodel->parent_profile($data['customer'][0]['parent_customer_id']);

        // If save button was clicked and the request method is POST
        if ($this->request->getMethod() === 'post' && $id == $this->request->getPost('cid')) {
            $validation = $this->validate([
                'f_name' => 'required|trim|min_length[2]',
                'status' => 'required|trim',
                'phone' => 'required|trim|min_length[6]',
                'email' => 'required|trim|valid_email|min_length[6]',
                'declare' => 'required'
            ]);

            if ($validation) {
                // Form validation passed
                // Process form data and update customer

                $image = '';
                $panimage = '';
                $aadharimage = '';

                // File upload logic goes here

                $data_to_store = [
                    'f_name' => $this->request->getPost('f_name'),
                    'l_name' => $this->request->getPost('l_name'),
                    'email' => $this->request->getPost('email'),
                    'gender' => $this->request->getPost('gender'),
                    'image' => $image,
                    // Other form fields
                    // ...
                ];

                $return = $customermodel->update_customer($id, $data_to_store);
                $session = session();
                if ($return) {
                    $session->setFlashdata('flash_message', 'updated');
                    return redirect()->to(base_url('admin/customer/edit/' . $id));
                } else {
                    $session->setFlashdata('flash_message', 'not_updated');
                }
            }
        }

        // Load the view
        $data['main_content'] = 'admin/customer_update';
        return view('includes/admin/template', $data);
    }


    public function info()
    {

        $customermodel = model('Customer_model');
        $id = service('uri')->getSegment(4);
        $data['tax'] = $customermodel->get_all_card();
        $data['profile'] = $customermodel->get_all_customer_id($id);
        $data['myfriends'] = array();
        $data['direct'] = array();
        $dis_level = 1;
        $team = array();
        $ids = array($data['profile'][0]['customer_id']);
        $p = 0;
        while ($p < 1) {
            $myfriends = $customermodel->my_friends_in($ids);
            if (!empty($myfriends)) {
                $team[$dis_level] = $myfriends;
                if ($dis_level == 1) {
                    $data['direct'] = $myfriends;
                }
                $ids = array_column($myfriends, 'customer_id');
                $dis_level++;
            } else {
                $p++;
            }
        }
        $data['myfriends'] = $team;

        $data['total_partner'] = $team;
        $left_count = array_column($team, 'macro');
        $team_consume = array_column($team, 'consume');
        $data['macro_partner'] = array_count_values($left_count);
        $data['team_consume'] = array_count_values($team_consume);
        $data['incomes'] = $customermodel->total_incomes($id);
        $data['online_purchase'] = $customermodel->get_user_upload_receipt($data['profile'][0]['customer_id']);
        $data['macro_purchase'] = $customermodel->getall_macro_purchases_by_id($data['profile'][0]['id']);
        $data['activity_log'] = $customermodel->get_all_activity_log($data['profile'][0]['customer_id']);

        $data['purchases'] = $customermodel->get_all_purchases_by_user($data['profile'][0]['id']);
        //load the view
        $data['main_content'] = 'admin/user_profile';
        return view('includes/admin/template', $data);
    }

    public function total_partners()
    {
        $customermodel = model('Customer_model');
        $id = service('uri')->getSegment(4);
        $data['profile'] = $customermodel->get_all_customer_id($id);
        $data['myfriends'] = array();
        $dis_level = 1;
        $team = array();
        $income_array = array();
        $ids = array($data['profile'][0]['customer_id']);
        $inc_ids = array($data['profile'][0]['id']);
        $p = 0;
        while ($p < 1) {
            $myfriends = $customermodel->my_friends_in_with_purchase($ids);
            $incomes = $customermodel->get_user_total_income_type($inc_ids);
            if (!empty($myfriends)) {
                $team[$dis_level] = $myfriends;
                $income_array[$dis_level]['MoneyBack'] = 0.00;
                $income_array[$dis_level]['Income'] = 0.00;
                if (!empty($incomes)) {
                    foreach ($incomes as $value) {

                        if ($value['type'] == 'MoneyBack') {
                            $income_array[$dis_level]['MoneyBack'] = $value['tamount'];
                        }
                        if ($value['type'] == 'Income') {
                            $income_array[$dis_level]['Income'] = $value['tamount'];
                        }
                    }
                }


                $dis_level++;
                $ids = array_column($myfriends, 'customer_id');
                $inc_ids = array_column($myfriends, 'id');
            } else {
                $p++;
            }
        }
        $data['total_partner'] = $team;
        $data['income_array'] = $income_array;

        //load the view
        $data['main_content'] = 'admin/total_partners';
        return view('includes/admin/template', $data);
    }

    public function total_purchase()
    {

        $customermodel = model('Customer_model');
        $id = service('uri')->getSegment(4);
        $data['tax'] = $customermodel->get_all_card();
        $data['profile'] = $customermodel->get_all_customer_id($id);

        $data['purchases'] = $customermodel->get_all_purchases_with_detail($id);
        //load the view
        $data['main_content'] = 'admin/total_purchase';
        return view('includes/admin/template', $data);
    }

    public function micro()
    {
        $customermodel = model('Customer_model');
        $data['customer'] = $customermodel->get_all_customer('0');
        //echo '<pre>'; print_r($data['customer']); die();
        $data['title'] = 'Micro Partners';
        //load the view
        $data['main_content'] = 'admin/customer_list';
        return view('includes/admin/template', $data);
    }
    public function macro()
    {
        $customermodel = model('Customer_model');
        $data['customer'] = $customermodel->get_all_customer(33);
        $data['title'] = 'Macro Partners';
        //load the view
        $data['main_content'] = 'admin/customer_list';
        return view('includes/admin/template', $data);
    }
    public function mega()
    {
        $customermodel = model('Customer_model');
        $data['customer'] = $customermodel->get_all_customer(1);
        $data['title'] = 'mega Partners';
        //load the view
        $data['main_content'] = 'admin/customer_list';
        return view('includes/admin/template', $data);
    }

    public function partners_master()
    {
        $customermodel = model('Customer_model');
        $data['customers'] = $customermodel->get_all_customer_num();

        /* Micro online and offline purchase*/
        $data['micro_orders_num'] = $customermodel->get_all_manual_num('orders', array('role' => 'Micro'));
        $data['micro_orders_sum'] = $customermodel->get_all_manual_sum('orders', 'total_amount', array('role' => 'Micro'));
        $data['micro_online_num'] = $customermodel->get_all_manual_num('upload_receipt', array('role' => 'Micro'));
        $data['micro_online_sum'] = $customermodel->get_all_manual_sum('upload_receipt', 'amount', array('role' => 'Micro'));



        /* Macro online and offline purchase*/
        $data['macro_orders_num'] = $customermodel->get_all_manual_num('orders', array('role' => 'Macro'));
        $data['macro_orders_sum'] = $customermodel->get_all_manual_sum('orders', 'total_amount', array('role' => 'Macro'));
        $data['macro_online_num'] = $customermodel->get_all_manual_num('upload_receipt', array('role' => 'Macro'));
        $data['macro_online_sum'] = $customermodel->get_all_manual_sum('upload_receipt', 'amount', array('role' => 'Macro'));


        $data['macro_num'] = $customermodel->get_all_manual_num('transaction_wallet', array('type' => 'Activate Account'));
        $data['macro_sum'] = $customermodel->get_all_manual_sum('transaction_wallet', 'amount', array('type' => 'Activate Account'));



        $data['online_commission'] = $customermodel->get_all_manual_sum('upload_receipt', 'commission');

        $data['micro_incomes'] = $customermodel->get_all_incomes('Micro');
        $data['macro_incomes'] = $customermodel->get_all_incomes('Macro');
        //load the view
        $data['main_content'] = 'admin/partners_master';
        return view('includes/admin/template', $data);
    }

    public function purchase_master()
    {
        $customermodel = model('Customer_model');
        $data['orders_num'] = $customermodel->get_all_manual_num('orders');
        $data['orders_sum'] = $customermodel->get_all_manual_sum('orders', 'total_amount');
        $data['online_num'] = $customermodel->get_all_manual_num('upload_receipt');
        $data['online_sum'] = $customermodel->get_all_manual_sum('upload_receipt', 'amount');
        $data['macro_num'] = $customermodel->get_all_manual_num('transaction_wallet');
        $data['macro_sum'] = $customermodel->get_all_manual_sum('transaction_wallet', 'amount', array('type' => 'Activate Account'));
        $data['online_purchase'] = $customermodel->getall_receipt_order();
        $data['macro_purchase'] = $customermodel->getall_macro_purchases();

        $data['total_purchase'] = array_merge($data['online_purchase'], $data['macro_purchase']);
        $sort['rdate'] = array_column($data['total_purchase'], 'rdate');
        array_multisort($sort['rdate'], SORT_ASC, $data['total_purchase']);


        $data['purchases'] = $customermodel->get_all_user_purchases();
        //load the view
        $data['main_content'] = 'admin/purchase_master';
        return view('includes/admin/template', $data);
    }


    public function update_user()
    {
        $data['page_keywords'] = '';
        $data['page_description'] = '';
        $data['page_slug'] = 'Update User';
        $data['page_title'] = 'Update User';
        $Usersmodel = model('Users_model');
        if ($this->request->getMethod() === 'post' && $this->request->getPost('find_customer') !== null) {
            $validationRules = [
                'assign_to' => 'required|trim'
            ];
            $validationErrors = [
                'required' => 'This user does not exist'
            ];
            if ($this->validate($validationRules, $validationErrors)) {
                $findUser = $this->request->getPost('assign_to');
                $findUser = trim($findUser);
                $data['user'] = $Usersmodel->get_customer_data_by_id($findUser);

                // User selected package information
                $data['user_package_booked'] = $Usersmodel->get_package($findUser);
                $data['package'] = $Usersmodel->get_package_data($data['user_package_booked'][0]['package_id']);

                if (empty($data['user'])) {
                    $this->validator->setError('start_date', 'This user does not exist');
                }
            }

            if (empty($this->validator->getErrors())) {
            }
        } elseif ($this->request->getMethod() === 'post') {
            $validationRules = [
                'assign_to' => 'required|trim',
                'product' => 'required'
            ];
            $validationErrors = [
                'required' => 'This user does not exist'
            ];
            if ($this->validate($validationRules, $validationErrors)) {
                $customer_id = $this->request->getPost('assign_to');
                $user = $Usersmodel->get_customer_data_by_id($customer_id);
                if (empty($user)) {
                    $this->validator->setError('assign_to', 'This user does not exist');
                } else {
                    $data['user'] = $user;
                }

                if ($user[0]['macro'] > 0) {
                    $this->validator->setError('hsfdgsd', 'Already Activated.');
                }
            }

            if (empty($this->validator->getErrors())) {
                // Form validation passed
                $return = false;
                $this->income = [];
                $this->matching_amount = [];
                $cust_id = $user[0]['id'];
                $customer_id = $user[0]['customer_id'];
                $data['user_package_booked'] = $Usersmodel->get_package($cust_id);
                $data['package'] = $Usersmodel->get_package_data($data['user_package_booked'][0]['package_id']);
                $package_amount = $data['package'][0]['total'];
                $intallment_amount_left = $package_amount;
                $installment_amount = 0;
                $installment_number = 1;
                $order_id = 0;
                $distribution_amount = 5500;
                $p_amount = $this->request->getPost('payment');

                if ($customer_id !== '' && $cust_id !== '') {
                    $date = date('Y-m-d H:i:s');
                    $data_to_store = [
                        'role' => 'Macro',
                        'package_used' => $date,
                        'macro' => 33,
                        'consume' => 1,
                        'package_amt' => $package_amount
                    ];
                    $Usersmodel->update_profile($cust_id, $data_to_store);
                    $Usersmodel->update_manual('upload_receipt', ['customer_id' => $customer_id], ['role' => 'Macro']);
                    $package_history = [
                        'userid' => $customer_id,
                        'activate_id' => $cust_id,
                        'type' => 'Activate Account',
                        'amount' => $p_amount,
                        'debit' => $p_amount,
                        'status' => 'Debit',
                        'rdate' => date('Y-m-d H:i:s')
                    ];
                    $insert_id = $Usersmodel->add_transactional_wallet($package_history);

                    $add_income = [
                        'amount' => 1100,
                        'user_id' => $user[0]['did'],
                        'type' => 'Direct',
                        'user_send_by' => $cust_id,
                        'status' => 'Approved'
                    ];
                    $Usersmodel->add_income($add_income);

                    $add_purchases = [
                        'amount' => $p_amount,
                        'user_id' => $cust_id,
                        'type' => 'Pack',
                        'order_type' => 'Macro',
                        'order_id' => $insert_id,
                        'role' => 'Macro',
                        'status' => 'Active'
                    ];

                    $Usersmodel->add_purchases($add_purchases);

                    if ($user[0]['ddirect'] === 5) {
                        $Usersmodel->load_wallet($user[0]['did'], 555000, 'eligibility');
                    }

                    $insdate = date('Y-m-d');

                    $pay_installment_query = [
                        'user_id' => $cust_id,
                        'amount' => 5500,
                        'description' => $insdate,
                        'order_id' => $order_id,
                        'pay_date' => $insdate,
                        'installment_no' => 1,
                        'status' => 'Paid'
                    ];
                    $Usersmodel->add_installment($pay_installment_query);
                    $installment_number += 1;
                    $intallment_amount_left -= 5500;
                    if ($intallment_amount_left > 5500) {
                        $installment_amount = 5500;
                    } else {
                        $installment_amount = $intallment_amount_left;
                    }

                    while ($intallment_amount_left > 0) {
                        $pay_date = date('Y-m-d', strtotime("+ 1 month", strtotime($insdate)));
                        $add_salary = [
                            'user_id' => $cust_id,
                            'amount' => $installment_amount,
                            'description' => $insdate,
                            'order_id' => $order_id,
                            'pay_date' => $pay_date,
                            'installment_no' => $installment_number,
                            'status' => 'Active'
                        ];
                        $Usersmodel->add_installment($add_salary);
                        $insdate = $pay_date;
                        $intallment_amount_left -= 5500;
                        $installment_number += 1;
                        if ($intallment_amount_left > 5500) {
                            $installment_amount = 5500;
                        } else {
                            $installment_amount = $intallment_amount_left;
                        }
                    }

                    $Usersmodel->load_wallet($cust_id, 111000, 'eligibility');

                    $Usersmodel->distribution();

                    $dis_level = 1;
                    $p = 0;
                    $parent_customer_id = $user[0]['parent_customer_id'];
                    while ($p < 11) {
                        $parent_user = $Usersmodel->parent_profile($parent_customer_id);
                        if (!empty($parent_user)) {
                            $booster_time = date('Y-m-d', strtotime('+15 days', strtotime($parent_user[0]['package_used'])));

                            if ($dis_level === 1) {
                                $percent = 1100;
                                $direct = 1;
                            }
                            if ($dis_level === 2) {
                                $percent = 1100;
                                $direct = 1;
                            }
                            if ($dis_level === 3) {
                                $percent = 1100;
                                $direct = 1;
                            }
                            if ($dis_level === 4) {
                                $percent = 550;
                                $direct = 3;
                            }
                            if ($dis_level === 5) {
                                $percent = 550;
                                $direct = 3;
                            }
                            if ($dis_level === 6) {
                                $percent = 550;
                                $direct = 3;
                            }
                            if ($dis_level === 7) {
                                $percent = 330;
                                $direct = 5;
                            }
                            if ($dis_level === 8) {
                                $percent = 330;
                                $direct = 5;
                            }
                            if ($dis_level === 9) {
                                $percent = 330;
                                $direct = 5;
                            }
                            if ($dis_level === 10) {
                                $percent = 330;
                                $direct = 5;
                            }
                            if ($dis_level === 11) {
                                $percent = 330;
                                $direct = 5;
                            }

                            if ($parent_user[0]['macro'] >= $direct) {
                                $date = date('Y-m-d H:i:s');
                                $add_income = [
                                    'amount' => $percent,
                                    'user_id' => $parent_user[0]['id'],
                                    'type' => 'Level Income',
                                    'user_send_by' => $cust_id,
                                    'dist_level' => $dis_level,
                                    'description' => 'Macro',
                                    'status' => 'Approved',
                                    'rdate' => $date
                                ];
                                $Usersmodel->add_income($add_income);
                            }

                            $parent_customer_id = $parent_user[0]['parent_customer_id'];
                            $dis_level = $dis_level + 1;
                            $p++;
                        } else {
                            $p = 80;
                        }
                    }
                    $return = TRUE;
                }
                /**************** end payment distribution *******************/
                $session = session();
                if ($return === TRUE) {
                    $session->setFlashdata('flash_message', 'activated');
                    return redirect()->to(base_url('admin/update_user'));
                } else {
                    $session->setFlashdata('flash_message', 'not_updated');
                    return redirect()->to(base_url('admin/update_user'));
                }
            }/*validation run*/
        }

        $data['main_content'] = 'admin/update_user';
        return view('includes/admin/template', $data);
    }

    public function update_customer()
    {
        $data['main_content'] = 'admin/update_customer';

        $request = \Config\Services::request();
        $db = db_connect();
        $query = $db->query('
        SELECT c.id, customer_id, f_name, l_name, role, booking_packages_number, SUM(amount) as booking_amount
        FROM customer c LEFT JOIN installment i
        ON c.id = i.user_id
        WHERE c.status = "hold" and i.installment_no = 1
        GROUP BY id, customer_id, f_name, l_name, role, booking_packages_number;
        ');
        $row = $query->getResult();
        $data['customers'] = $row;

        //Total amount to pay

        if ($request->is('post')) {
            $user_id = $request->getVar('id');
            $customer_id = $request->getVar('customer_id');
            $booking_amount = $request->getVar('booking_amount');
            $update_installment_query = '
            UPDATE installment
            SET status = "Paid" 
            WHERE user_id = ' . $user_id . ' and installment_no = 1;
            ';
            if ($db->query($update_installment_query)) {
                //distribution starts here
                $query = $db->query('select parent_customer_id, role, booking_packages_number from customer where id = ' . $user_id);
                $row = $query->getRow();
                $parent_customer_id = $row->parent_customer_id;
                $booking_packages_number = $row->booking_packages_number;
                $amount = (1100 * $booking_packages_number) / 2;
                $add_income__query = 'insert into incomes (user_id, amount, type, user_send_by, pay_type, dist_level, status) values ("' . $parent_customer_id . '", ' . $amount . ', "Level Income", ' . $user_id . ', "travmoney", 1, "Approved");';
                $db->query($add_income__query);
                $add_income__query = 'insert into incomes (user_id, amount, type, user_send_by, pay_type, dist_level, status) values ("' . $parent_customer_id . '", ' . $amount . ', "Level Income", ' . $user_id . ', "travprofit", 1, "Approved");';
                $db->query($add_income__query);
                for ($i = 2; $i <= 5; $i++) {
                    $query = $db->query('select parent_customer_id, role, booking_packages_number from customer where customer_id = "' . $parent_customer_id . '"');
                    $row = $query->getRow();
                    $parent_customer_id = $row->parent_customer_id;
                    $booking_packages_number = $row->booking_packages_number;
                    $amount = 1100 / 2;
                    $add_income__query = 'insert into incomes (user_id, amount, type, user_send_by, pay_type, dist_level, status) values ("' . $parent_customer_id . '", ' . $amount . ', "Level Income", ' . $user_id . ', "travmoney", ' . $i . ', "Approved");';
                    $db->query($add_income__query);
                    $add_income__query = 'insert into incomes (user_id, amount, type, user_send_by, pay_type, dist_level, status) values ("' . $parent_customer_id . '", ' . $amount . ', "Level Income", ' . $user_id . ', "travprofit", ' . $i . ', "Approved");';
                    $db->query($add_income__query);
                }
                $db->query('update customer set status = "active" where id = ' . $user_id);
            } else {
                echo 'Installment no updated!';
            }
        }
        return view('includes/admin/template', $data);
    }


    public function purchase()
    {
        $data['title'] = 'Purchase';
        if ($this->request->getMethod() === 'post') {
            $data = [
                'trav_id' => $this->request->getPost('trav_id'),
                'purchase_type' => $this->request->getPost('purchase_type'),
                'amount' => $this->request->getPost('amount'),
                'purchase_date' => $this->request->getPost('purchase_date'),
                'payment_mode' => $this->request->getPost('payment_mode'),
                'invoice' => $this->request->getPost('invoice'),
                'cashback' => $this->request->getPost('cashback'),
            ];
            print_r($data);
            die();
            // Upload file and get the file name
            $document = $this->request->getFile('document');
            if ($document->isValid() && !$document->hasMoved()) {
                $newName = $document->getRandomName();
                $document->move(ROOTPATH . 'public/uploads', $newName);
                $data['document'] = $newName;
            }

            // Insert data into database using model
            $user_model = model('Users_model');
            $purchase_added = $user_model->add_purchase($data);

            if ($purchase_added) {
                $db = db_connect();
                $user_id = $this->request->getPost('trav_id');
                $purchase_amount = $this->request->getPost('amount');
                $cashback = $this->request->getPost('cashback');
                $user_cashback = $cashback * 0.40;
                $parent_moneyback = $cashback * 0.05;
                //user wallet updates
                $db->query("UPDATE `wallet` SET `eligibility` = `eligibility` + '$purchase_amount' WHERE (`user_id` = '$user_id' and `wallet_type` = 'moneyback')");
                $db->query("UPDATE `wallet` SET `balance` = `balance` + '$user_cashback' WHERE (`user_id` = '$user_id' and `wallet_type` = 'cashback')");
                $db->query("INSERT INTO `transaction` (`user_id`, `wallet_id`, `amount`, `transaction_type`) VALUES ('$user_id', (select wallet_id from wallet where user_id='$user_id' and wallet_type = 'cashback'), '$user_cashback', 'credit')");
                //distribution
                $parent_id = $user_id;//temparary
                for ($i = 0; $i < 5; $i++) {
                    $query   = $db->query('select parent_customer_id from customer where customer_id = "' . $parent_id . '"');
                    $result = $query->getRowArray();
                    if ($result) {
                        $parent_id = $result['parent_customer_id'];
                        $db->query("UPDATE `wallet` SET `balance` = `balance` + '$parent_moneyback' WHERE (`user_id` = '$parent_id' and `wallet_type` = 'moneyback')");
                        $db->query("INSERT INTO `transaction` (`user_id`, `wallet_id`, `amount`, `transaction_type`) VALUES ('$parent_id', (select wallet_id from wallet where user_id='$parent_id' and wallet_type = 'moneyback'), '$parent_moneyback', 'credit')");
                    }else {
                        exit();
                    }    
                }
            }

            // Redirect or display success message
            return redirect()->to(base_url('admin/purchase'))->with('success', 'Purchase added successfully');
        }
        //load the view
        $data['main_content'] = 'admin/purchase';
        return view('includes/admin/template', $data);
    }

    public function purchases()
    {
        $data['title'] = 'Purchases';
        $user_model = model('Users_model');
        $purchases = $user_model->get_purchase_data();

        $data['purchases'] = $purchases;
        //load the view
        $data['main_content'] = 'admin/purchases';
        return view('includes/admin/template', $data);
    }
}
