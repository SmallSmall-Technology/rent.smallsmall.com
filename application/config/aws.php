<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['aws_access_key'] = 'AKIA3X5U4BTTM6R3FGMO';
$config['aws_secret_key'] = '1HEogrRmtnul9J1hC1AtQOosqdM0nm849l3rNSdx';
$config['aws_region'] = 'YOUR_AWS_REGION';

require_once APPPATH . 'third_party/aws/aws-autoloader.php';
use Aws\S3\S3Client;

$client = S3Client::factory(array(
    'credentials' => array(
        'key'    => $config['aws_access_key'],
        'secret' => $config['aws_secret_key'],
    ),
    'region' => $config['aws_region'],
    'version' => 'latest',
));