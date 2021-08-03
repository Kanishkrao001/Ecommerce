<?php
   
    $header = [
        "alg" => 'HS256',
        "typ" => 'JWT'
    ];

    $payload = [
        "user_id" => 420,
        // "iss" => "kanishk",
        "sub" =>' 10000000000',
        "name" => 'Kanishk',
         "admin" => true
        ];

   
    $header_encoded = base64_encode(json_encode($header));

    $payload_encoded = base64_encode(json_encode($payload));
    

    //build the signature
    $key = 'my_secret';
    $signature = hash_hmac('SHA256', $header_encoded . "." . $payload_encoded, $key);

    $signature_encoded = base64_encode($signature);

    //build and return the token
    $token = $header_encoded . "." . $payload_encoded . "." . $signature;

    echo "this is my token :" . $token . "<br>";
    
    class  jwt{

        public $header = [
            "alg" => 'HS256',
            "typ" => 'JWT'
        ];

        public  $payload = [
            "user_id" => 420,
            // "iss" => "kanishk",
            "sub" =>' 10000000000',
            "name" => 'Kanishk',
             "admin" => true
            ];

        public function encode($arr)
        {
            return base64_encode(json_encode($arr));
        }
    }
    $obj = new jwt();
    $header_encoded = $obj->encode($header);
    $payload_encoded = $obj->encode($payload);

    $key = "secret";
    $signature = hash_hmac('SHA256', $header_encoded . "." . $payload_encoded, $key);
    $signature_encoded = $obj->encode($signature);

    $token = $header_encoded . "." . $payload_encoded . "." . $signature;

    echo "this is my 2nd token :" . $token;

    echo "<br>";
?>