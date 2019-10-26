<?php

class MailManager {
    /**
     * Sends a mail to emailaddresses in array.
     * @param $emailAddresses Array of emailadresses
     * @param $subject the subject
     * @param $message the message
     * @return unknown_type
     */
    public static function SendEmail($emailAddress, $subject, $message){        
        if(GlobalConfig::SEND_EMAILS) {
            return mail($emailAddress , $subject , $message, GlobalConfig::MAIL_HEADER);    
        }
        return true;  
    }    
}