<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of encrypt
 *
 * @author aashgar
 */
class aesEncrypt {
    //put your code here
    public function encrypt($data) {
        $cipher="AES-128-CBC";
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $cipherText = openssl_encrypt($data, $cipher, $key, 
                $options=OPENSSL_RAW_DATA, $iv);

        $plianText = openssl_decrypt($cipherText, $cipher,
                $key, $options=OPENSSL_RAW_DATA, $iv);
        return $cipherText.'<br>'.$plianText;
       
        
    }
}
