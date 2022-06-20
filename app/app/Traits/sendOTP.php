<?php 
namespace App\Traits;
trait SendOTP{
    public function __construct(){
        $this->key = '7QKagTsw2ZtNVOTFDTFwNzh6wymr1zJByAv8xvkgfEywY2ky9j4mh8Uzw5c1';
    }
    public function SendOTP($phone, $otp){
        $client = new \GuzzleHttp\Client();
        $response =  $client->get(
            'http://bulksmsnigeria.com/api/v1/sms/create',
            [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'query' => [
                    'api_token'=> 'rlmdQ2UOMOLsVHGQ13jfmgUCZY4sAEtCiniTY3fi7xCfQlBbylnCe8kYGxpw',
                    'to'=> $phone,
                    'from'=> 'payant',
                    'gateway'=>'2',
                    'body'=> 'YCT APP One Time Password is '.$otp. ', Please note that this OTP expires in 10 minutes',
                ],
            ]
        );
        $body = $response->getBody();
        $return = json_decode($body, true);
        return $return;   
    }
}