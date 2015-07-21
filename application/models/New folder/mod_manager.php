<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mod_manager extends CI_Model {

    public function __Construct() {
        //parent::__construct();
    }

    function selectdata() {
        $query = $this
                 ->db
                 ->select('*')
                 ->from('tbl_users')
                 ->join('tbl_group','tbl_group.gro_id = tbl_users.gro_id')
                 ->join('tbl_roles','tbl_roles.role_id = tbl_users.rol_id')
                 ->join('tbl_staffs','tbl_staffs.sta_id = tbl_users.sta_id')
                // ->where('user_id',$serialize(value)ssion_id)
                 ->order_by('use_id','DESC')
                 ->get();

               
        return $query;
    }
     
}