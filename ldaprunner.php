<?php

define('LDAP_CN', '');      // <- Your assigned CN goes here.
define('LDAP_PASSWORD', ''); // <- Your password goes here.
define('LDAP_BINDDN', 'cn='.LDAP_CN.',ou=Specials,dc=hawaii,dc=edu');
define('LDAP_SEARCHBASE', 'dc=hawaii,dc=edu');

class Host 
{
    const HOST = 'ldaps://ldap.hawaii.edu';
    const PORT = 636;

    function host() {
        return self::HOST;
    }
    
    function port() {
        return self::PORT;
    }    
}

class LdapRunner
{    
    const CN         = LDAP_CN; 
    const PASSWORD   = LDAP_PASSWORD; 
    const BINDDN     = LDAP_BINDDN;
    const SEARCHBASE = LDAP_SEARCHBASE;
    
    private $connection;
    
    function __construct() {
        $h = new Host();
        $conn = ldap_connect($h->host(), $h->port());
                
        ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($conn, LDAP_OPT_REFERRALS, 0);
        ldap_set_option($conn, LDAP_OPT_TIMELIMIT, 5);            
        ldap_set_option($conn, LDAP_OPT_NETWORK_TIMEOUT, 5); 
        
        $this->connection = $conn;        
    }

    function __destruct() {
        if (isset($this->connection)) {
            ldap_close($this->connection);            
        }
    }
       
    function search($uid) {        
        $conn = $this->connection;
        $bound = ldap_bind($conn, self::BINDDN, self::PASSWORD);

        $attributes = array("cn", "uid", "uhUuid", "mail");
        $filter = "(uid=$uid)";

        $result = ldap_search($conn, self::SEARCHBASE, $filter, $attributes);
        $info = ldap_get_entries($conn, $result);

        if ($info["count"] > 0) {
            for ($i = 0; $i < $info["count"]; $i++) {
                for ($j = 0; $j < $info[$i]["count"]; $j++){
                    $data = $info[$i][$j];
                    for ($k = 0; $k < $info[$i][$data]["count"]; $k++) {
                        printf("%12s --> %s\n", $data, $info[$i][$data][$k]);
                    }
                }
            }
        }
    }    
}

// Main program.
$runner = new LdapRunner();
for ($i = 1; $i < count($argv); $i++) {
    $runner->search($argv[$i]);    
}

?>