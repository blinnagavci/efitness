<?php

function active($currect_page) {
    $url_array = explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    if ($currect_page == $url) {
        echo 'active'; //class name in css 
    }
}

function startsWith($word, $expression) {
    return substr($word, 0, strlen($expression)) === $expression;
}
function getLastURLPart() {
    $link = $_SERVER['PHP_SELF'];
    $link_array = explode('/', $link);
    $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $link_array);
    return $page = end($withoutExt);
}
