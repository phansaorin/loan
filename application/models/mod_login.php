<?php

if (!defined('BASEPATH'))
        exit('No direct script access allowed');

class Mod_Login extends CI_Model {

        public function __Construct() {
                //parent::__construct();
        }

        /*
         * Login
         * @param string
         * @param string
         * @access public
         * @return array
         */

        public function login($username, $password) {
                $user_log = $this->db
                                 ->select('*')
                                ->from('tbl_users')
                               // ->join('tbl_roles', 'tbl_roles.role_id = tbl_users.rol_id')
                                ->where('tbl_users.username', $username)
                                ->where('tbl_users.password', $password)
                                ->where('tbl_users.status', 1)
                                ->get();
                return $user_log;
        }
}

?> 
