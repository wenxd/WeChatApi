<?php 

class Wechat
{
    public function upload()
    {
        $token = '';
        $url = "https://api.weixin.qq.com/cgi-bin/material/add_material?access_token=" . $token . "&type=image";
        $path = './1.jpg';
        $filedata = ['media' => new \CURLFile(realpath($path), 'image/jpg')];

        $curl = curl_init ();

        if (class_exists ( '\CURLFile' )) {//php5.5跟php5.6中的CURLOPT_SAFE_UPLOAD的默认值不同
            curl_setopt ( $curl, CURLOPT_SAFE_UPLOAD, true );
        } else {
            if (defined ( 'CURLOPT_SAFE_UPLOAD' )) {
                curl_setopt ( $curl, CURLOPT_SAFE_UPLOAD, false );
            }
        }
        curl_setopt ( $curl, CURLOPT_URL, $url );
        if (! empty ( $filedata )) {
            curl_setopt ( $curl, CURLOPT_POST, 1 );
            curl_setopt ( $curl, CURLOPT_POSTFIELDS, $filedata );
        }
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($curl, CURLOPT_USERAGENT, "test");
        $output = curl_exec ( $curl );
        curl_close ( $curl );
        return $output;
    }
  
}
