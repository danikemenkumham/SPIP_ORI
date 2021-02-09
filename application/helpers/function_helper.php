<?php

function limit_string($summary){
    $limit = 100;
    if (strlen($summary) > $limit)
        $summary = substr($summary, 0, strrpos(substr($summary, 0, $limit), ' ')) . '...';
    echo $summary;
}

?>