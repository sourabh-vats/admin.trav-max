<?php

use CodeIgniter\Model;

class customer_model extends Model
{
    public function __construct()
    {
        helper('url');
    }
    public function get_all_customer_num()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('customer');
        $builder->select('COUNT(id) as count, consume, macro');
        $builder->groupBy(['consume', 'macro']);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function get_all_manual_num($table, $where = '')
    {
        $db = \Config\Database::connect();
        $builder = $db->table($table);
        $builder->select('id');
        if (!empty($where)) {
            $builder->where($where);
        }
        $query = $builder->get();
        return $query->getNumRows();
    }

    public function get_all_manual_sum($table, $col, $where = '')
    {
        $db = \Config\Database::connect();
        $builder = $db->table($table);
        $builder->selectSum($col, 'amount');
        if ($where != '') {
            $builder->where($where);
        }
        $result = $builder->get()->getResultArray();
        return $result;
    }

    public function get_all_purchases()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('purchases');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function get_all_incomes($role)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('incomes');
        $builder->select('SUM(amount) as tamount, type, status');
        $builder->where('role', $role);
        $builder->groupBy('type');
        $builder->groupBy('status');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function get_all_customer($macro = '')
    {
        $db = \Config\Database::connect();
        $builder = $db->table('customer as c');
        $builder->select('c.*, d.c_name as city');
        $builder->join('referall_ids as d', 'c.city = d.id', 'left');
        if ($macro != '') {
            $builder->where('macro', $macro);
        }
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function get_all_customer_id($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('customer as c');
        $builder->select('c.*, d.f_name as df_name, d.l_name as dl_name');
        $builder->join('customer as d', 'd.customer_id = c.direct_customer_id', 'left');
        $builder->where('c.id', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function parent_profile($blissid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('customer');
        $builder->select('*');
        $builder->where('customer_id', $blissid);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function update_customer($id, $data)
    {
        $db = \Config\Database::connect();
        $db->table('customer')->where('customer_id', $id)->update($data);
        $error = $db->error();

        if (empty($error['message'])) {
            return true;
        } else {
            return false;
        }
    }
    public function get_all_card()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('credit_card_request');
        $builder->select('credit_card_request.*, customer.f_name, customer.l_name, customer.customer_id');
        $builder->join('customer', 'customer.id = credit_card_request.user_id', 'left');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function my_friends_in($cust_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('customer');
        $builder->select('customer_id, f_name, l_name, rdate, direct_customer_id, parent_customer_id, macro, consume');
        $builder->whereIn('parent_customer_id', $cust_id);
        $query = $builder->get();

        return $query->getResultArray();
    }
    public function total_incomes($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('incomes');
        $builder->select('SUM(amount) as tamount, type, status');
        $builder->where('user_id', $id);
        $builder->groupBy(['type', 'status']);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function get_user_upload_receipt($id)
    {
        $db = \Config\Database::connect();
        $query = $db->table('upload_receipt')
            ->select('*')
            ->where('customer_id', $id)
            ->get();

        return $query->getResultArray();
    }
    public function getall_macro_purchases_by_id($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('transaction_wallet as t');
        $builder->select('t.*, c.f_name, c.l_name, c.customer_id, c.status as cstatus, c.id as cid');
        $builder->join('customer as c', 'c.id = t.userid', 'left');
        $builder->where('t.userid', $id);
        $builder->where('t.type', 'Activate Account');
        $query = $builder->get();

        return $query->getResultArray();
    }
    public function get_all_activity_log($zkey)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('WorkWith');
        $builder->select('*');
        $builder->where('zkey', $zkey);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function get_all_purchases_by_user($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('purchases');
        $builder->select('*');
        $builder->where('user_id', $id);

        $query = $builder->get();

        return $query->getResultArray();
    }
    public function my_friends_in_with_purchase($cust_id)
    {
        $db = \Config\Database::connect();
        $query = $db->table('customer as c')
            ->select('c.id, c.customer_id, c.f_name, c.l_name, c.rdate, c.direct_customer_id, c.parent_customer_id, c.macro, c.consume, SUM(p.amount) as tamount, COUNT(p.id) as count')
            ->join('purchases as p', 'p.user_id = c.id', 'left')
            ->whereIn('parent_customer_id', $cust_id)
            ->groupBy('c.customer_id')
            ->get();

        return $query->getResultArray();
    }
    function get_user_total_income_type($cust_id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('incomes');
        $builder->select('SUM(amount) as tamount, type');
        $builder->whereIn('user_id', $cust_id);
        $builder->groupBy('type');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function get_all_purchases_with_detail($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('purchases as p');
        $builder->select('p.*, c.id as cid, c.f_name, c.l_name, c.status as cstatus, c.customer_id');
        $builder->join('customer as c', 'c.id = p.user_id', 'left');
        $builder->where('p.user_id', $id);
        $query = $builder->get();

        return $query->getResultArray();
    }
    public function getall_receipt_order()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('upload_receipt as o');
        $builder->select('o.*, c.f_name, c.l_name, c.customer_id, c.status as cstatus, c.id as cid');
        $builder->join('customer as c', 'c.customer_id = o.customer_id', 'left');
        $query = $builder->get();

        return $query->getResultArray();
    }
    public function getall_macro_purchases()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('transaction_wallet as t');
        $builder->select('t.*, c.f_name, c.l_name, c.customer_id, c.status as cstatus, c.id as cid');
        $builder->join('customer as c', 'c.id = t.userid', 'left');
        $query = $builder->get();

        return $query->getResultArray();
    }
    public function get_all_user_purchases()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('purchases as p');
        $builder->select('p.*, c.id as cid, c.f_name, c.l_name, c.status as cstatus, c.customer_id');
        $builder->join('customer as c', 'c.id = p.user_id', 'left');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
