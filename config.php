<?php
/* You can edit all this stuff. */
$apiurl = "https://solus.fliphost.net/api/client";							// URL to your API client URL, provided by your host
$apikey = "MBU8J-OXTP9-6FM70";												// Your API Key, provided by your host
$apihash = "09c999cb43e981f5eb4bcaacdf26e335948bb890";						// Your API Hash, provided by your host
$dynamicUpdates = true;														// Poll the API every 5 seconds, set to false if you don't want this feature
$refreshRate = "1000";														// Time in milliseconds before refreshing values from API
$trustedIP = array("173.22.40.33","209.234.71.242");											// Allow these IP addresses
$onlineMessage = "This is good, very good.";								// Message below "It's Online" text
$onlineReload = "It's Good, Reload Anyway?";								// Text for online reload button
$offlineMessage = "Something must be wrong, this is not good at all.";		// Message below "It's offline" text
$offlineReload = "Try Again?";												// Text for offline reload button
$theShortURL = 'http://goo.gl/rxZiN';										// URL that will be shared when people click share on twitter of google+ buttons
/* You should probably stop editing now. Only edit stuff after this if you know what you're doing. */

include 'thestuff.php';

$headers = apache_request_headers(); $real_client_ip = $headers["X-Forwarded-For"];

$status = new status();
$getStuff = $status->performAction($apiurl,$apikey,$apihash,"status");

$statusMessage = $getStuff['statusmsg'];

$memory = explode(",",$getStuff['mem']);
$totalMem = $status->formatBytes($memory[0]);
$usedMem = $status->formatBytes($memory[1]);
$availMem = $status->formatBytes($memory[2]);
$memPercent = round($memory[1]/$memory[0], 0)*100;

$disk = explode(",",$getStuff['hdd']);
$totalDisk = $status->formatBytes($disk[0]);
$usedDisk = $status->formatBytes($disk[1]);
$availDisk = $status->formatBytes($disk[2]);
$diskCalc = $disk[0]*100; if ($diskCalc > 0) { $diskPercent = round($disk[1]/$diskCalc, 0); } else { $diskPercent = 0; }

$bandwidth = explode(",",$getStuff['bw']);
$totalBW = $status->formatBytes($bandwidth[0]);
$usedBW = $status->formatBytes($bandwidth[1]);
$availBW = $status->formatBytes($bandwidth[2]);
$bwCalc = $bandwidth[0]*100; if ($bwCalc > 0) { $bwPercent = round($bandwidth[1]/$bwCalc, 0); } else { $bwPercent = 0; }
