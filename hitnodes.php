<?php
  if ( $_SERVER["OS"] == "Windows_NT" ) {
    $hostname = strtolower($_SERVER["COMPUTERNAME"]);
  } else {
    $hostname = `hostname`;
    $hostnamearray = explode('.', $hostname);
    $hostname = $hostnamearray[0];
  }
  if ( !ereg("[0-9]{2,4}", $hostname, $match) ) { die("Failed to detect node"); }
  $node = $match[0];
  header("Content-Length: " . $node);
  $response = $hostname . "<br />Padding: ";
  $response = $response . str_repeat('.', $node - strlen($response));
  echo $response;
?>
