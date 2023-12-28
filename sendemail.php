<?php
    require 'vendor/autoload.php';

    class sendemail{

        public static function sendmail($to, $subject, $content){

            $key = 'C7893F0F02849BDE67879EBB4A595034AC5F0B0C0D198B9E33887961A7F11056A91913B7640FC396CEBB13C0225992B4';
            $email = new \SendGrid\Mail\Mail();
            $email->setfrom('danieljohnj@gmail.com', 'daniel email');
            $email->setsubject($subject);
            $email->addTo($to);
            $email->addcontent('text/plain', $content);

            $emailapi = new \SendGrid($key);

            try{

                $response = $emailapi->send($email);
                return $response;


            }catch(exception $e){

                echo 'Email exception caught :' . $e->getMessage() ."\n";
                return false;
                
            }
        }
    }



?>