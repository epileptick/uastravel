<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['paypal_testmode'] = TRUE;

if($config['paypal_testmode']){
  $config['paypal_username'] = 'payment_sandbox_api1.uastravel.com';
  $config['paypal_password'] = '1387427484';
  $config['paypal_signature'] = 'ACJS5tJOEUmNZ1xiL.JnDTZ9qcmDAfyAmSt8Fh3HhNBggBjf8RlWOLmJ';
}else{
  $config['paypal_username'] = '';
  $config['paypal_password'] = '';
  $config['paypal_signature'] = '';
}
