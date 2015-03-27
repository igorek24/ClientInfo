<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Start Page</title>
<link href="main.css" rel="stylesheet" type="text/css" />
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//www.theigor.net/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 5]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//www.theigor.net/piwik/piwik.php?idsite=5" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
</head>

<body>
<!-- Heather Bar -->
<div id="heather"><table width="100%">
  <tr>
    <th>&nbsp;</th>
    <th><h1 id="logo"><a href="https://www.www.theigor.net">TheIgor.NET</a></h1></th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>
</table>
<!-- End of Heather Bar -->
<?php
 // HTTPS or HTTP message
if( isset($_SERVER['HTTPS'] ) ){
    echo '<p class="pgreen">Yeay!!! Page was requested over HTTPS!</p>';
}else{
    echo '<p class="pred">Warning! This page was requested over HTTP!</p>';
}

?>
<!-- Client Info -->
<table class="ClienInfoTabl">
  <tr> <!-- ClientIP Address -->
    <td><?php echo "Your IP address:" ?></td>
    <td><?php $params->IPAddress = $_SERVER['REMOTE_ADDR'];	
	echo "$params->IPAddress"; ?></td>
  </tr>
  <tr> <!-- Client Revers DNS -->
    <td><?php echo "<p>Your rDNS:</p>"; ?></td>
    <td><?php $ip = getenv("REMOTE_ADDR");
	$domain = gethostbyaddr($ip);
	 echo "<p>$domain</p>"; ?></td>
  </tr>
  <tr> <!-- Clients Country -->
    <td><?php echo "<p>You are in:</p>"; ?></td>
    <td><?php $client = new SoapClient("http://www.webservicex.net/geoipservice.asmx?WSDL");
			  $params = new stdClass;
			  $params->IPAddress = $_SERVER['REMOTE_ADDR'];
			  $result = $client->GetGeoIP($params);
			  $countryName = $result->GetGeoIPResult->CountryName;
			  echo "<p>$countryName</p>";?></td>
  </tr>
  <tr> <!-- Clients Coutry Code (US) (RU) etc... -->
    <td><?php echo "<p>Country code:</p>"; ?></td>
    <td><?php $client = new SoapClient("http://www.webservicex.net/geoipservice.asmx?WSDL");
			  $params = new stdClass;
			  $params->IPAddress = $_SERVER['REMOTE_ADDR'];
			  $result = $client->GetGeoIP($params);
			  $countryCode = $result->GetGeoIPResult->CountryCode;
			  echo "<p>$countryCode</p>";?></td>
  </tr>
  <tr> <!-- Clients Operating System version -->
    <td><?php echo "<p>Your OS:</p>";?></td>
    <td><?php $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
// Get OS Info from the browser
function getOS() { 

    global $user_agent;
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
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
    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }   
    return $os_platform;
}
$user_os = getOS();
echo  "<p>$user_os</p>";
?></td>
  </tr>
  <tr><!-- Clients Browser Version -->
    <td><?php echo "<p>Your browser:</p>"; ?></td>
    <td><?php $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
	function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $version= "";
    // Get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
   
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
   
    return array(
        						'userAgent' => $u_agent,
        						'name'      => $bname,
        						'version'   => $version,
        						'pattern'    => $pattern
    );
}
$ua = getBrowser();
$user_browser= $ua['name'] . " " . $ua['version'];
echo "<p>$user_browser</p>";
 ?></td>
  </tr>
</table>
<!-- Weather -->
<?php
 
$geoplugin = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']) );
 
if ( is_numeric($geoplugin['geoplugin_latitude']) && is_numeric($geoplugin['geoplugin_longitude']) ) {
 
	$lat = $geoplugin['geoplugin_latitude'];
	$long = $geoplugin['geoplugin_longitude'];
	//set farenheight for US
	if ($geoplugin['geoplugin_countryCode'] == 'US') {
		$tempScale = 'fahrenheit';
		$tempUnit = '&deg;F';
	} else {
		$tempScale = 'celsius';
		$tempUnit = '&deg;C';
	}
	require_once('classes/ParseXml.class.php');
 
	$xml = new ParseXml(); 
	$xml->LoadRemote("http://api.wunderground.com/auto/wui/geo/ForecastXML/index.xml?query={$lat},{$long}", 3);
	$dataArray = $xml->ToArray();
 
	$html = "<br /><center><h2>Weather forecast for " . $geoplugin['geoplugin_city'] . "," . " " . $geoplugin['geoplugin_regionCode'];
	$html .= "</h2><table cellpadding=5 cellspacing=10><tr>";
 
	foreach ($dataArray['simpleforecast']['forecastday'] as $arr) {
 
		$html .= "<td align='center'><span style=\"color:green; text-shadow: 1px 1px 1px #666;\";>" . $arr['date']['weekday'] . "</span></br>";
		$html .= "<img class='weathericon'; src='http://icons-pe.wxug.com/i/c/a/" . $arr['icon'] . ".gif' border=0 /><br /><br />";
		$html .= "<span style=\"color:red; text-shadow: 1px 1px 1px #666;\";>High:" . " " . $arr['high'][$tempScale] . $tempUnit . " </span><br />";
		$html .= "<span style=\"color:#0085F6; text-shadow: 1px 1px 1px #666;\";>Low:" . " " . $arr['low'][$tempScale] . $tempUnit . "</span>";
		$html .= "</td>";
 
 
	}
	$html .= "</tr></table>";
 
	echo $html;
}
 
?>
</body>
</html>
