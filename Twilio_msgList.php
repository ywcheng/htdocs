<?php 
    include_once('inc/Twilio_conf.php');

    $messages = $client->account->messages->getIterator(0, 50, array(   
    )); 
     
    foreach ($messages as $message) { 
        echo $message->body; 
    }