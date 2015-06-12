<?php
stream_context_set_default(
  array(
    'http' => array(
      'method' => 'HEAD'
    )
  )
);

$url = 'http://192.168.1.19/socket.php';

$headers = get_headers($url);

if($headers==false) echo "ERROR";

echo "hello2";

echo '<pre>'.print_r($headers,true).'</pre>';
/*

$upgrade = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
           "Upgrade: WebSocket\r\n" .
           "Connection: Upgrade\r\n" .
           "WebSocket-Origin: " . $origin . "\r\n" .
           "WebSocket-Location: ws://" . $host . $resource . "\r\n" .
           "\r\n";

$handshake = true;

socket_write($socket,$upgrade.chr(0),strlen($upgrade.chr(0)));
*/
?>