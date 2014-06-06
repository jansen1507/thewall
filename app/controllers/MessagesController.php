<?php

use TheWall\Core\Helpers;

class MessagesController extends Controller {
    function getIndex() {
        // getting the messages
        $this->view->messages = MessageQuery::create()
            ->filterByReceiverId(Helpers\Session::get('user_id'))
            ->orderById('desc')
            ->find();

        $this->view->render('messages/inbox');
    }
    function getSent() {
        $this->view->messages = MessageQuery::create()
            ->filterBySenderId(Helpers\Session::get('user_id'))
            ->orderById('desc')
            ->find();

        $this->view->render('messages/sent');
    }
    function postCreate() {
        // get + trim vars
        $username = (isset($_POST['username']) ? trim(Helpers\Sanitizor::escapeHTML($_POST['username'])) : false);
        $text = (isset($_POST['text']) ? trim(Helpers\Sanitizor::escapeHTML($_POST['text'])) : false);


        $receiver = UserQuery::create()->filterByUsername($username)->findOne();

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
    function getShow($id) {
        $this->view->message = MessageQuery::create()->filterById($id)->findOne();

        if($this->view->message->getReceiver()->getId() == Helpers\Session::get('user_id') || $this->view->message->getSender()->getId() == Helpers\Session::get('user_id')) {
            $this->view->render('messages/message');
        } else {
            Helpers\URL::redirect('error');
        }



    }
} 