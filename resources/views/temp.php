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

this is my token :eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjo0MjAsInN1YiI6IiAxMDAwMDAwMDAwMCIsIm5hbWUiOiJLYW5pc2hrIiwiYWRtaW4iOnRydWV9.6456bb1d38132877b1d217e08b70b31d21acc60afde60232db7f53aef9f1d756
this is my 2nd token :eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjo0MjAsInN1YiI6IiAxMDAwMDAwMDAwMCIsIm5hbWUiOiJLYW5pc2hrIiwiYWRtaW4iOnRydWV9.4eeb90fc42a42efba32a25c50bd1ec90ca79802aeadc441234cfbb1185d2c2e4