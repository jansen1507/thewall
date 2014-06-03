<?php

use TheWall\Core\Helpers;

class MessageController extends Controller {
    function getIndex() {
        // getting the messages
        $this->view->messages = MessageQuery::create()
            ->filterByReceiverId(Helpers\Session::get('user_id'))
            ->orderById('desc')
            ->find();

        $this->view->render('message/index');
    }
    function postCreate() {
        // get + trim vars
        $email = (isset($_POST['email']) ? trim($_POST['email']) : false);
        $text = (isset($_POST['text']) ? trim($_POST['text']) : false);


        $receiver = UserQuery::create()->filterByEmail($email)->findOne();

        if( !empty($receiver) ) {

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

        } else {
            Helpers\Notifier::add('warning', 'That is not a registered user, sorry!');
        }

        Helpers\URL::redirect('home');
    }
} 