<?php

use CodeIgniter\Model;

class Users_model extends Model
{

    function validates($user_name, $password)
    {
        $db = \Config\Database::connect();
        $query = $db->table('membership')
            ->select('*')
            ->where('user_name', $user_name)
            ->where('pass_word', $password)
            ->get();
        $result = $query->getResult();
        if (count($query->getResultArray()) == 1) {
            $return['login'] = true;
            foreach ($query->getResult() as $row) {
                $return['user_id'] = $row->id;
                $return['full_name'] = $row->first_name;
                $return['email'] = $row->email_addres;
                $return['user_level'] = $row->user_level;
                $return['permission'] = $row->permission;
            }
            return $return;
        } else {
            return false;
        }
    }

    public function add_income($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('incomes');
        $builder->insert($data);
    }

    public function get_customer_data_by_id($blissid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('customer as c');
        $builder->select('c.*, d.id as did, d.customer_id as dcustomer_id, d.direct as ddirect');
        $builder->join('customer as d', 'd.customer_id = c.customer_id', 'left');
        $builder->where('c.customer_id', $blissid);
        $query = $builder->get();

        return $query->getResultArray();
    }
    public function get_package($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('package_purchase');
        $builder->select('*');
        $builder->where('user_id', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function get_package_data($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('package');
        $builder->select('*');
        $builder->where('id', $id);

        $query = $builder->get();

        return $query->getResultArray();
    }
    public function update_profile($id, $data_to_store)
    {
        $db = \Config\Database::connect();

        $builder = $db->table('customer');
        $builder->where('id', $id);
        $builder->update($data_to_store);

        return true;
    }
    public function update_manual($table, $where, $data_to_store)
    {
        $db = db_connect();

        $builder = $db->table($table);
        $builder->where($where);
        $builder->update($data_to_store);

        return true;
    }
    public function add_transactional_wallet($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('transaction_wallet');
        $builder->insert($data);
    
        return $builder->insertGetID();
    }
    
    public function add_purchases($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('purchases');
        $builder->insert($data);
        $insertId = $db->insertID();
        return $insertId;
    }
    public function load_wallet($id, $amount, $column)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('customer');
        $builder->set($column, "$column + $amount", false);
        $builder->where('id', $id);
        $builder->update();
    }
    public function add_installment($data)
    {
        $db = \Config\Database::connect();
        $db->table('installment')->insert($data);
        return $this->db->affectedRows() > 0;
    }
    function distribution(){
		echo 'distribution starts here';
	}
    public function parent_profile($blissid)
{
    $db = \Config\Database::connect();
    return $db->table('customer')
        ->where('customer_id', $blissid)
        ->get()
        ->getResultArray();
}

}
