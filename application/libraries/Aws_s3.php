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

    protected function loadAwsCredentials()
    {
        $ssmClient = new SsmClient([
            'version' => 'latest',
            'region'  => 'us-east-1', // The region where Parameter Store parameters are stored.
        ]);

        // Replace the following parameter names with your actual Parameter Store parameter names.
        $awsAccessKey = $ssmClient->getParameter(['Name' => 'ACCESS_KEY_ID', 'WithDecryption' => true]);
        $awsSecretKey = $ssmClient->getParameter(['Name' => 'ACCESS_KEY_SECRET', 'WithDecryption' => true]);
        $awsRegion = $ssmClient->getParameter(['Name' => 'ACCESS_REGION', 'WithDecryption' => true]);
        $awsBucketName = $ssmClient->getParameter(['Name' => 'DEV_BUCKET_NAME', 'WithDecryption' => true]);

        $this->CI->config->set_item('aws_access_key', $awsAccessKey['Parameter']['Value']);
        $this->CI->config->set_item('aws_secret_key', $awsSecretKey['Parameter']['Value']);
        $this->CI->config->set_item('aws_region', $awsRegion['Parameter']['Value']);
        $this->CI->config->set_item('aws_bucket', $awsBucketName['Parameter']['Value']);
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
