<?php

/**
 * Added by Rizzamel 21/12/2020 12:28pm
 */
class ip_checker
{
    public function index()
    {
        $ip_address = $this->get_ip_address();
        return $ip_address;
    }
    public function get_ip_address()
    {
        if ( // check for shared internet/ISP IP
            !empty($_SERVER['HTTP_CLIENT_IP']) && 
            $this->validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }

        // check for IPs passing through proxies
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // check if multiple ips exist in var
            if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
                $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                foreach ($iplist as $ip) {
                    if ($this->validate_ip($ip))
                        return $ip;
                }
            } else {
                if ($this->validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
                    return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
        }

        if (
            !empty($_SERVER['HTTP_X_FORWARDED']) && 
            $this->validate_ip($_SERVER['HTTP_X_FORWARDED'])){
            return $_SERVER['HTTP_X_FORWARDED'];
        }
        if (
            !empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && 
            $this->validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])){
            return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        }
        if (
            !empty($_SERVER['HTTP_FORWARDED_FOR']) && 
            $this->validate_ip($_SERVER['HTTP_FORWARDED_FOR'])){
            return $_SERVER['HTTP_FORWARDED_FOR'];
        }
        if (
            !empty($_SERVER['HTTP_FORWARDED']) && 
            $this->validate_ip($_SERVER['HTTP_FORWARDED'])){
            return $_SERVER['HTTP_FORWARDED'];
        }

        // return unreliable ip since all else failed
        return $_SERVER['REMOTE_ADDR'];
    }
    /**
     * Ensures an ip address is both a valid IP and does not fall within
     * a private network range.
     */
    public function validate_ip($ip) {

        if (strtolower($ip) === 'unknown')
            return false;

        // generate ipv4 network address
        $ip = ip2long($ip);

        // if the ip is set and not equivalent to 255.255.255.255
        if ($ip !== false && $ip !== -1) {
            // getting the unsigned long representation of ip
            // due to discrepancies between 32 and 64 bit OSes and
            // signed numbers (ints default to signed in PHP)
            $ip = sprintf('%u', $ip);
            // do private network range checking
            if ($ip >= 0 && $ip <= 50331647) return false;
            if ($ip >= 167772160 && $ip <= 184549375) return false;
            if ($ip >= 2130706432 && $ip <= 2147483647) return false;
            if ($ip >= 2851995648 && $ip <= 2852061183) return false;
            if ($ip >= 2886729728 && $ip <= 2887778303) return false;
            if ($ip >= 3221225984 && $ip <= 3221226239) return false;
            if ($ip >= 3232235520 && $ip <= 3232301055) return false;
            if ($ip >= 4294967040) return false;
        }
        return true;
    }
}

$ip_checker = new ip_checker();
$ip_checker->index();