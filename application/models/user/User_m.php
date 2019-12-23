<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    public function login($post){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;

    }

    public function get($id=null){
        $this->db->select('user.*, tbl_hospital.id_hospital, tbl_hospital.nama as name_hospital');
        $this->db->from('user');
        $this->db->join('tbl_hospital', 'tbl_hospital.id_hospital = user.id_hospital', 'left');
        if($id != null){
            $this->db->where('id', $id);
        } 
        $query = $this->db->get();
        return $query;
    }

    public function add($post){
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['level'] = $post['level'];
        $params['id_hospital'] = $post['id_hospital'];
        // $params['hospital'] = $post['hospital'] != "" ? $post['hospital'] : null ;
        $this->db->insert('user', $params);
    }

    public function edit($post){
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        if(!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['level'] = $post['level'];
        $params['id_hospital'] = $post['id_hospital'];
        $this->db->where('id', $post['id']);
        $this->db->update('user', $params);
    }

    public function del($id){
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}
