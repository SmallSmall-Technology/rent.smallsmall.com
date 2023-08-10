<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
use Aws\Ssm\SsmClient;

class Aws_s3
{
    protected $CI;
    protected $s3Client;

    public function __construct()
    {
        $this->CI =& get_instance();

        $this->loadAwsCredentials();
        
        $this->s3Client = new S3Client([
            'version'     => 'latest',
            'region'      => $this->CI->config->item('aws_region'),
            'credentials' => [
                'key'    => $this->CI->config->item('aws_access_key'),
                'secret' => $this->CI->config->item('aws_secret_key'),
            ],
        ]);
    }

    // protected function loadAwsCredentials()
    // {
    //     $ssmClient = new SsmClient([
    //         'version' => 'latest',
    //         'region'  => 'us-east-1', // The region where Parameter Store parameters are stored.
    //     ]);

    //     // Replace the following parameter names with your actual Parameter Store parameter names.
    //     $awsAccessKey = $ssmClient->getParameter(['Name' => 'ACCESS_KEY_ID', 'WithDecryption' => true]);
    //     $awsSecretKey = $ssmClient->getParameter(['Name' => 'ACCESS_KEY_SECRET', 'WithDecryption' => true]);
    //     $awsRegion = $ssmClient->getParameter(['Name' => 'ACCESS_REGION', 'WithDecryption' => true]);
    //     $awsBucketName = $ssmClient->getParameter(['Name' => 'DEV_BUCKET_NAME', 'WithDecryption' => true]);

    //     $this->CI->config->set_item('aws_access_key', $awsAccessKey['Parameter']['Value']);
    //     $this->CI->config->set_item('aws_secret_key', $awsSecretKey['Parameter']['Value']);
    //     $this->CI->config->set_item('aws_region', $awsRegion['Parameter']['Value']);
    //     $this->CI->config->set_item('aws_bucket', $awsBucketName['Parameter']['Value']);
    // }

    protected function loadAwsCredentials()
    {
        $ssmClient = new SsmClient([
            'version' => 'latest',
            'region'  => 'us-east-1', // The region where Parameter Store parameters are stored.
        ]);
    
        try {
            $result = $ssmClient->getParameters([
                'Names'           => ['ACCESS_KEY_ID', 'ACCESS_KEY_SECRET', 'ACCESS_REGION', 'DEV_BUCKET_NAME'],
                'WithDecryption'  => true,
            ]);
    
            $awsConfig = [];
    
            foreach ($result['Parameters'] as $parameter) {
                if ($parameter['Name'] === 'ACCESS_KEY_ID') {
                    $this->CI->config->set_item('aws_access_key', $parameter['Value']);
                } elseif ($parameter['Name'] === 'ACCESS_KEY_SECRET') {
                    $this->CI->config->set_item('aws_secret_key', $parameter['Value']);
                } elseif ($parameter['Name'] === 'ACCESS_REGION') {
                    $this->CI->config->set_item('aws_region', $parameter['Value']);
                    $awsConfig['region'] = $parameter['Value']; // Set the region in the AWS SDK config
                } elseif ($parameter['Name'] === 'DEV_BUCKET_NAME') {
                    $this->CI->config->set_item('aws_bucket', $parameter['Value']);
                }
            }
    
            // Check if the 'region' value is set in the AWS SDK config
            if (!isset($awsConfig['region'])) {
                throw new Exception("'region' configuration is missing.");
            }
    
            // Initialize the S3 client with the updated AWS SDK config
            $this->s3Client = new S3Client([
                'version'     => 'latest',
                'credentials' => [
                    'key'    => $this->CI->config->item('aws_access_key'),
                    'secret' => $this->CI->config->item('aws_secret_key'),
                ],
                'region'      => $awsConfig['region'], // Set the region from the retrieved parameters
            ]);
    
        } catch (Exception $e) {
            // Handle error
        }
    }
                
    // The rest of the code remains the same as before.

    public function uploadFile($file_path, $destination)
    {
        try {
            $this->s3Client->putObject([
                'Bucket' => $this->CI->config->item('aws_bucket'),
                'Key'    => $destination,
                'SourceFile' => $file_path,
            ]);

            return true;

        } catch (S3Exception $e) {

            return false;
        }
    }

    public function getFileUrl($file_key)
    {
        return $this->s3Client->getObjectUrl($this->CI->config->item('aws_bucket'), $file_key);
    }
}
