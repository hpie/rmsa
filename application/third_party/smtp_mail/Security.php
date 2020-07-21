<?php

class Security {

    # Private key



    public static $salt = 'DarshitCodeALl';





    # Encrypt a value using



    public function encrypt_string($input) {

        

        



        $inputlen = strlen($input); // Counts number characters in string $input

        $randkey = rand(1, 9); // Gets a random number between 1 and 9



        $i = 0;

        while ($i < $inputlen) {



            $inputchr[$i] = (ord($input[$i]) - $randkey); //encrpytion 



            $i++; // For the loop to function

        }



        //Puts the $inputchr array togtheir in a string with the $randkey add to the end of the string

        $encrypted = implode('.', $inputchr) . '.' . (ord($randkey) + 50);

        

        

        

        //echo "Before Encrypted Text = $encrypted<br>";

        $encrypted = $this->encrypt_decrypt('encrypt', $encrypted);

        //echo "Encrypted Text = $encrypted<br>";

        

        return $encrypted;

    }



    # Check key



    protected static function _checkKey($key, $method) {

        if (strlen($key) < 32) {

            echo "Invalid public key $key, key must be at least 256 bits (32 bytes) long.";

            die();

        }

    }



    # Decrypt a value using 



    public function decrypt_string($input) {

        

        //echo "Before Decrypted Text = $input<br>";

        $input = $this->encrypt_decrypt('decrypt', $input);

        //echo "Decrypted Text = $input<br>";

        

        

        

        $input_count = strlen($input);



        $dec = explode(".", $input); // splits up the string to any array

        $x = count($dec);

        $y = $x - 1; // To get the key of the last bit in the array 



        $calc = $dec[$y] - 50;

        $randkey = chr($calc); // works out the randkey number



        $i = 0;



        while ($i < $y) {



            $array[$i] = $dec[$i] + $randkey; // Works out the ascii characters actual numbers

            $real .= chr($array[$i]); //The actual decryption



            $i++;

        };



        $input = $real;

        

        

        

       

    

    

    

        return $input;

    }



    #Get Random String - Usefull for public key



    public function genRandString($length = 0) {

        $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        $str = '';

        $count = strlen($charset);

        while ($length-- > 0) {

            $str .= $charset[mt_rand(0, $count - 1)];

        }

        return $str;

    }



    #Mixed Enc Dec 



    private function encrypt_decrypt($action, $string) {

        $output = false;



        $encrypt_method = "AES-256-CBC";

        $secret_key = 'DarshitPrivateCode';

        $secret_iv = 'MobileAppSecret1';



        // hash

        $key = hash('sha256', $secret_key);



        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning

        $iv = substr(hash('sha256', $secret_iv), 0, 16);



        if ($action == 'encrypt') {

            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);

            $output = base64_encode($output);

        } else if ($action == 'decrypt') {

            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);

        }



        return $output;

    }



}
?>