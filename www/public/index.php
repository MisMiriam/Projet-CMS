<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Test</p>
</body>

</html>

<?php

require_once '../core/router.php';

$router = new Router();
$router->run();
