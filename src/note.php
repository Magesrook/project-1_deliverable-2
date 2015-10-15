<?php
/**
 * Created by PhpStorm.
 * books: Mark
 * Date: 10/8/2015
 * Time: 7:06 PM
 */


require_once '../vendor/autoload.php';

// init Silex app
$app = new Silex\Application();

$app['debug'] = true;

$books = array(
    '00001'=> array(
        'name' => 'Mark Schulz',
        'phone' => '801-555-1234',
        'email' => 'map@att.net',
        'booksname' => 'magesroook',
    ),
    '00002' => array(
        'name' => 'Bill Smith',
        'phone' => '801-555-9999',
        'email' => 'igoesonline@att.net',
        'booksname' => 'igoonlinenow',
    ),
);

$app->get('/', function() use ($books) {

    return json_encode($books);
});

$app->get('/{stockcode}', function (Silex\Application $app, $stockcode) use ($books) {

    if (!isset($books[$stockcode])) {
        $app->abort(404, "Stockcode {$stockcode} does not exist.");
    }
    return json_encode($books[$stockcode]);
});

$app->run();
