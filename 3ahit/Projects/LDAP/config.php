<?php
define("lf","<br/>");
class config
{
	static $ORGANIZATION = "sz-ybbs,dc=local";
	static $DOMAIN = "sz-ybbs.local";
	static $LDAPHOST = "ldap://192.168.178.203";
	static $LDAPPORT = 389;
	static $MAXUSER = 500;
	
	static $LDAPADMIN = "Administrator";
	static $LDAPPASS = "htl";
	
	static $username = "Administrator";
	static $password = "htl";
	const BASEDN = "ou=uebung,dc=sz-ybbs,dc=local";
	
}

?>