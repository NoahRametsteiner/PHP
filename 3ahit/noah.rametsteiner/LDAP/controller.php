<?php
require_once('model.php');
class controller{
	
	static function getUsers(){
		$array_users = array();
		$array_users = functions::users();
		return $array_users;
	}
	static function getUserCount(){
		$array_users = array();
		$array_users = functions::users();
		return count($array_users);
	}
	static function getGroups(){
		$array_groups = array();
		$array_groups = functions::groups();
		return $array_groups;
	}
    static function getGroupCount(){
        $array_groups = array();
        $array_groups = functions::groups();
        return count($array_groups);
    }
	static function forcePwdChange($username){
		functions::forcepwchange($username);
	}

    static function delUser($username){
        functions::delUser($username);
    }
}

?>