<?php

  $options_to_enable = array();
  $options_to_enable['url'] = trim($_POST['url']);
  $host_str = parse_url($options_to_enable['url'], PHP_URL_HOST);
  if((isset($_POST['method'])) && (trim($_POST['method']) != "")) {
    $options_to_enable['method'] = trim($_POST['method']);
  }
  if((isset($_POST['method'])) && (trim($_POST['method']) != "") 
  && ((trim(strtolower($_POST['method'])) == "post") || (trim(strtolower($_POST['method'])) == "put"))) {
    if((isset($_POST['data'])) && (trim($_POST['data']) != "")) {
      $options_to_enable['data'] = trim($_POST['data']); 
    }
  }
  $options_to_enable['randomAgent'] = 'true';
  $options_to_enable['tech'] = 'BEUSTQ';
  $options_to_enable['tamper'] = '';

  if((isset($_POST['submit'])) && (trim($_POST['submit']) == "Deep Scan Mode")) {
    $options_to_enable['level'] = 1;
    $options_to_enable['risk'] = 1;
    $options_to_enable['getAll'] = 'true';
  } else {
    $options_to_enable['level'] = 3;
    $options_to_enable['risk'] = 2;
  }

?>