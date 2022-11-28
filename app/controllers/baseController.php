<?php

class baseController {
    function renderView($view, $data = null) {
        ob_start();

        require_once(__DIR__."/../{$view}.php");

        $content = ob_get_contents();

        ob_end_clean();

        echo $content;
    }

    function renderViewFrontend($view, $data = null) {
        ob_start();

        require_once(__DIR__."/../{$view}.php");

        $content = ob_get_contents();

        ob_end_clean();

        echo $content;
    }
}