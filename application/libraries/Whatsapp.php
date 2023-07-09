
<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Whatsapp
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->helper('string');
    }

    public function send_wa_one_to_one()
    {
        $token = 's8mPS9RCLP2gLiaafkEC';
        $target = '0895635131895';
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => 'Test Wa Kebanyak KONTOLL',
                'delay' => '3',
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));
        curl_close($curl);
    }
}
