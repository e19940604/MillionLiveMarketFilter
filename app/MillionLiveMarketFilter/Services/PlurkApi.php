<?php
/**
 * Created by PhpStorm.
 * User: e19940604
 * Date: 2017/8/1
 * Time: 下午3:54
 */

namespace MillionLiveMarketFilter\Services;


use GuzzleHttp\Client;

class PlurkApi
{
    private $consumer_key;
    private $consumer_secret;
    private $oauth_token;
    private $oauth_token_secret;
    private $oauth_signature;

    public function __construct( ){
        $this->consumer_key = env('CONSUMER_KEY');
        $this->consumer_secret = env('CONSUMER_SECRET');
        $this->oauth_token = env('ACCESS_TOKEN');
        $this->oauth_token_secret = env('ACCESS_TOKEN_SECRET');

    }

    public function plurk( $method , $url , $query = [] ){
        $client = new Client();

        $parameters = array_merge( $this->initRequest() , $query );
        $parameters['oauth_signature'] = $this->generateSignature( $method , $url , $parameters );

        $fullURL = $url . "?";

        foreach ( $parameters as $key => $value ){
            $fullURL .= '&' . $key . "=" . $value;
        }

        $res = $client->request( $method , $fullURL );
        $response = $res->getBody()->getContents();
        dd( \GuzzleHttp\json_decode( $response ));
    }


    private function initRequest (){
        return [
            'oauth_nonce' => rawurldecode( md5("xgnid" . time() )),
            'oauth_timestamp' => rawurldecode( time() ),
            'oauth_consumer_key' => rawurldecode($this->consumer_key),
            'oauth_signature_method' => rawurldecode("HMAC-SHA1"),
            'oauth_version' => rawurldecode('1.0'),
            'oauth_token' => rawurldecode($this->oauth_token) ,
        ];
    }

    /**
     * @param $method
     * @param $url
     * @param $parameters [ oauth* => value ]
     */
    private function generateSignature( $method , $url , $parameters ){

        $parameterString = "";
        ksort( $parameters );
        foreach ( $parameters as $key => $value ){
            $parameterString .=  '&' .$key . "=" . $value ;
        }
        $parameterString = ltrim( $parameterString , '&' );

        $base = $method . '&' . urlencode($url) . '&' . urlencode( $parameterString );

        $key = rawurlencode($this->consumer_secret) .'&'. rawurldecode($this->oauth_token_secret);

        $oauth_signature = urlencode( base64_encode(hash_hmac("sha1", $base, $key, true)) );

        return $oauth_signature;
    }
}