<?php
require_once('config.php');

class functions{

    static function users(){

        $ds = ldap_connect(config::$LDAPHOST, config::$LDAPPORT) or die('no connect');
        if(!ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3)){

        ldap_close($ds);
        die("");
        }

        ldap_set_option(null, LDAP_OPT_DEBUG_LEVEL, 7);
        ldap_set_option(null, LDAP_OPT_REFERRALS, 0);



        ldap_bind($ds, 'CN=Administrator, CN=users, DC=sz-ybbs, DC=local', 'htl');
        if($ds == FALSE){
            die("");
        }

        $dn = "ou=uebung,"."dc=".config::$ORGANIZATION;
        $filter = "(&(objectClass=organizationalPerson)(objectCategory=user))";
        $sr = ldap_search($ds, $dn, $filter) or die("Error in search query: ".ldap_error($ds));
        $result = ldap_get_entries($ds,$sr);
        $user_amount = ldap_count_entries($ds,$sr);
        $user = array();

        for($i=0;$i<$user_amount;$i++){
            $user[$i] = $result[$i]["cn"][0];
        }

        return $user;

        ldap_close($ds);
    }

    static function groups(){

        $ds = ldap_connect(config::$LDAPHOST, config::$LDAPPORT) or die('no connect');
        if(!ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3)){
            ldap_close($ds);
            die("");
        }


        ldap_bind($ds, 'CN=Administrator, CN=users, DC=sz-ybbs, DC=local', 'htl');
        if($ds == FALSE){die("");}

        $dn = "ou=uebung,"."dc=".config::$ORGANIZATION;
        $filter = "(objectClass=group)";
        $sr = ldap_search($ds, $dn, $filter) or die("Error in search query: ".ldap_error($ds));
        $result = ldap_get_entries($ds,$sr);

        $groups = array();
        $group_amount = ldap_count_entries($ds,$sr);

        for($i=0;$i<$group_amount;$i++){
            $groups[$i] = $result[$i]["cn"][0];
        }

        return $groups;


        ldap_close($ds);
    }

    static function forcepwchange($username){

        $ds = ldap_connect(config::$LDAPHOST, config::$LDAPPORT) or die('no connect');
        if(!ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3)){
            ldap_close($ds);
            die("");
        }

        ldap_bind($ds, 'CN=Administrator, CN=users, DC=sz-ybbs, DC=local', 'htl');
        if($ds == FALSE){die("");}

        $dn = "ou=uebung,"."dc=".config::$ORGANIZATION;
        $filter = "(samaccountname=".$username.")";
        $sr = ldap_search($ds, $dn, $filter) or die("Error in search query: ".ldap_error($ds));
        $result = ldap_get_entries($ds,$sr);
        $userdata=array();
        $dn = $result[0]["dn"];
        $userdata["pwdlastset"][0]=0;

        ldap_modify($ds,$dn,$userdata);

        ldap_close($ds);
    }


    static function delUser($username){

        $ds = ldap_connect(config::$LDAPHOST, config::$LDAPPORT) or die('no connect');
        if(!ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3)){

            ldap_close($ds);
            die("");
        }

        ldap_set_option(null, LDAP_OPT_DEBUG_LEVEL, 7);
        ldap_set_option(null, LDAP_OPT_REFERRALS, 0);



        ldap_bind($ds, 'CN=Administrator, CN=users, DC=sz-ybbs, DC=local', 'htl');
        if($ds == FALSE){
            die("");
        }

        $dn = "cn=".$username.",ou=uebung,dc=".config::$ORGANIZATION;
        ldap_delete($ds,$dn);

        ldap_close($ds);
    }

}



?>