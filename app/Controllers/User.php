<?php

namespace App\Controllers;

 helper('form');
class User extends BaseController
{
    public function index()
    {
        helper('form');
        return view('login');
    }
    function __encrip_password($password)
    {
        return md5($password);
    }
    function validate_credentials()
    {

        $user_name = $this->request->getpost('user_name');
        $password = $this->__encrip_password($this->request->getpost('password'));
        echo $user_name;
        die();
        $userModel = model('Users_Model');
        $is_valid = $userModel->validates($user_name, $password);

        if (isset($is_valid['login']) && $is_valid['login'] == 'true') {
            $data = array('user_name' => $user_name, 'permission' => $is_valid['permission'], 'full_name' => $is_valid['full_name'], 'email' => $is_valid['email'], 'role' => $is_valid['user_level'], 'user_id' => $is_valid['user_id'], 'is_admin_logged_in' => true);
            session()->set($data);
            return redirect()->to(base_url('welcome'));
        } else {
            $data['message_error'] = 'Invalid credentials. Please try again.'; // Error message
            return view('login', $data); // Load the view with the error message
        }
        
    }
    function admin_welcome()
    {
        if (session()->get('is_admin_logged_in')) {
        } else {
            redirect(base_url() . '');
        }

        $customermodel=model('Customer_model');
        $data['customers'] = $customermodel->get_all_customer_num();

        /* Micro online and offline purchase*/
		$data['micro_orders_num'] = $customermodel->get_all_manual_num('orders',array('role'=>'Micro'));
		$data['micro_orders_sum'] = $customermodel->get_all_manual_sum('orders','total_amount',array('role'=>'Micro'));
		$data['micro_online_num'] = $customermodel->get_all_manual_num('upload_receipt',array('role'=>'Micro'));
		$data['micro_online_sum'] = $customermodel->get_all_manual_sum('upload_receipt','amount',array('role'=>'Micro'));

        $data['macro_num'] = $customermodel->get_all_manual_num('transaction_wallet',array('type'=>'Activate Account'));
		$data['macro_sum'] = $customermodel->get_all_manual_sum('transaction_wallet','amount',array('type'=>'Activate Account'));

		$data['online_commission'] = $customermodel->get_all_manual_sum('upload_receipt','commission');

        $data['purchases'] = $customermodel->get_all_purchases();
		$data['micro_incomes'] = $customermodel->get_all_incomes('Micro');
		$data['macro_incomes'] = $customermodel->get_all_incomes('Macro');

        $data['main_content'] = 'welcome_message'; 
        return view('includes/admin/template', $data); 

    }
}
