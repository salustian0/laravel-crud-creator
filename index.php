<?php
require 'vendor/autoload.php';
$bootstrap = new \app\Core\Bootstrap();


$config = [
    'request_made' => FILTER_VALIDATE_BOOLEAN,
    'crud_action' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'entity_name' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
];

$data = filter_input_array(INPUT_POST, $config, false);

if(isset($data['request_made'])){

    if($data['crud_action'] == 'create')
        $bootstrap->createCrud($data);
    else if($data['crud_action'] == 'delete')
        $bootstrap->deleteCrud($data);

    return;
}


$bootstrap->render();