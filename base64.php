<?php
/**
 * Quick PHP script to base 64 a remote file
 *
 * THERE ARE PROBABLY SECURITY RISKS HERE
 *
 * @author Kevin Dew <kevindew@me.com>
 */

if (!isset($_GET['file'])) {
	header('HTTP/1.0 400 Bad Request');
	exit();
}

// is the $_GET['file'] a url
$url = parse_url($_GET['file']);

// try make sure it's an absolute url - so we're not snuck into returning a private local file
if (!
	($url && isset($url['host']) && isset($url['scheme']) && in_array($url['scheme'], array('http', 'https')))
) {
	header('HTTP/1.0 400 Bad Request');
	exit();	
}

// I wince in pain at putting a query parameter directly into this :-/
$contents = @file_get_contents($_GET['file']);

if (!$contents) {
	header('HTTP/1.0 404 Not Found');
	exit();		
}

// next step is to cache the output so we dont have to hit the remote url each time 

// then send cache headers to the browser

header('Content-Type: application/octet-stream');
echo base64_encode($contents);