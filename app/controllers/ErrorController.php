<?php

use TheWall\Core\Helpers\Notifier;

class ErrorController extends Controller {

    public function getIndex() {

        $this->view->render('error/not_found');

    }


}
