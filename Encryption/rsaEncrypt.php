<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rsaEncrypt
 *
 * @author aashgar
 */
class rsaEncrypt {
    //put your code here
    public function generateKey() {
        $config = array(
            "digest_alg" => "sha512",
            "private_key_bits" => 1024,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );
      $res = openssl_pkey_new($config);
      openssl_pkey_export($res, $private);
      $public = openssl_pkey_get_details($res);
      file_put_contents('private.key', $private);
      file_put_contents('public.key', $public['key']);
      
    }
    
    public function retrieveKey() {
        $private = file_get_contents('private.key');
        $public = file_get_contents('public.key');
        return array('private'=>$private, 'public'=>$public);
    }
    
    public function encrypt($data,$private, $public, $type) {
        if($type == 1)
            openssl_private_encrypt ($data, $crypted, $private);
        else            
            openssl_public_encrypt($data, $crypted, $public);
                    //,$padding=OPENSSL_PKCS1_PADDING);
        return $crypted;
    }
    
    public function decrypt($data,$private, $public, $type) {
        
        if($type == 1)
            openssl_public_decrypt ($data, $decrypted, $public);
        else
            openssl_private_decrypt ($data, $decrypted, $private);
        
    return $decrypted;
    }
}
