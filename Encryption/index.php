<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <div style="font-size: 25px"> 
    <body>
        <?php
        // put your code here
        echo 'Testing encryption techniques ....<br>';
        $data = 'abc123ABC';
        $b64Data = base64_encode($data);
        echo 'Base 64 of data is: ' . $b64Data . '<br>';
        $OrgnData = base64_decode($b64Data);
        echo 'Original 64 of data is: ' . $OrgnData . '<br>';
        include_once 'rsaEncrypt.php';
        $rsa = new rsaEncrypt();
        //$rsa->generateKey();
        $keys = $rsa->retrieveKey();
        $cypher = $rsa->encrypt($data, $keys['private'],
                $keys['public'], 555);
        echo 'Cypher data is: ' . base64_encode($cypher) . '<br>';
        $orgData = $rsa->decrypt($cypher, $keys['private'],
                $keys['public'], 555);
        echo 'Original data is: ' . $orgData . '<br>';
        
        ?>
    </div>
    </body>
</html>
