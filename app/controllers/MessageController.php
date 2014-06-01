<?php

use TheWall\Core\Helpers;

class MessageController extends Controller {
    function postCreate() {
        // get + trim vars
        $email = (isset($_POST['email']) ? trim($_POST['email']) : false);
        $text = (isset($_POST['text']) ? trim($_POST['text']) : false);


        // TODO: check if email is registered!

        if( 1 == 1 ) {

            $receiver = UserQuery::create()->filterByEmail($email)->findOne();

            $message = new Message();
            $message->setReceiverId($receiver->getId());
            $message->setSenderId(Helpers\Session::get('user_id'));
            $message->setText($text);

            // Persist message.
            if($message->save()) {
                Helpers\Notifier::add('success', 'Congratulations, your message has been Sent!');
            } else {
                Helpers\Notifier::add('danger', 'Something went wrong while trying to create your message. :(');
            }

        }

        Helpers\URL::redirect('home');
    }
} 