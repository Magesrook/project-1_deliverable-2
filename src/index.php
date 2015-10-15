<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 10/8/2015
 * Time: 7:05 PM
 */

require_once '../vendor/autoload.php';

// init Silex app
$app = new Silex\Application();

$app['debug'] = true;

$user = array(
    '00001'=> array(
        'name' => 'Mark Schulz',
        'phone' => '801-555-1234',
        'email' => 'map@att.net',
        'username' => 'magesroook',
    ),
    '00002' => array(
        'name' => 'Bill Smith',
        'phone' => '801-555-9999',
        'email' => 'igoesonline@att.net',
        'username' => 'igoonlinenow',
    ),
);

$app->get('/', function() use ($user) {

    return json_encode($user);
});

$app->get('/{stockcode}', function (Silex\Application $app, $stockcode) use ($user) {

    if (!isset($user[$stockcode])) {
        $app->abort(404, "Stockcode {$stockcode} does not exist.");
    }
    return json_encode($user[$stockcode]);
});

$app->run();


$app = new Silex\Application();

$app['debug'] = true;

$books = array(
    '00001'=> array(
        'title' => 'Aeronauts Windlass',
        'auhor' => 'Jim Butcher',
        'publisher' => 'Taw Dor',
        'rating' => 'four stars',
    ),
    '00002' => array(
        'title' => 'Full Moon',
        'auhor' => 'Jim Butcher',
        'publisher' => 'Taw Dor',
        'rating' => 'five stars',
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