<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| Email Settings
| -------------------------------------------------------------------
| Configuration of outgoing mail server.
| */
$config=array();
$config['protocol'] = 'sendmail';
$config['smtp_host'] = 'mail.codexives.com';
$config['smtp_port'] = '465';
$config['smtp_timeout'] = '4';
$config['smtp_user'] = 'info@codexives.com';
$config['smtp_pass'] = 'info@123CDX';
$config['charset'] = 'utf-8';
$config['mailtype'] = 'html';
$config['wordwrap'] = TRUE;
$config['newline'] = "\r\n";
