<?php


function title($content){
    echo `<h1>$content</h1>`;
}

function buttonPHP($content, $redirect, $method){
    echo '<form action="'.$redirect.'" method="'.$method.'"><button type="submit">'.$content.'</button></form>';
}
