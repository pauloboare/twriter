<?php
$getUrl = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
$setUrl = (empty($getUrl) ? 'index': $getUrl);
$Url = explode('/', $setUrl);
var_dump($Url);
?>