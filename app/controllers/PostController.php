<?php

use TheWall\Core\Helpers\URL;

class PostController extends Controller {
    function getIndex() {
        URL::redirect('error');
    }
} 