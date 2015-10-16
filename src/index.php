<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 10/8/2015
 * Time: 7:05 PM
 */
require_once __DIR__.'/../vendor/autoload.php';




use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



// init Silex app
$app = new Silex\Application();

$app['debug'] = true;

$books = array(
    '00001'=> array(
        'title' => 'Aeronauts Windlass',
        'author' => 'Jim Butcher',
        'publisher' => 'Taw Dor',
        'rating' => 'four stars',
    ),
    '00002' => array(
        'title' => 'Full Moon',
        'author' => 'Jim Butcher',
        'publisher' => 'Taw Dor',
        'rating' => 'five stars',
    ),
);

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


$app->get('/book', function(Request $request) use ($books)
{
    $input = '<table style="width:33%">';
    foreach ($books as $get) {
        $input .= '<tr><td>';
        $input .= $get['title'];
        $input .= '</td><td>';
        $input .= $get['author'];
        $input .= '</td><td>';
        $input .= $get['publisher'];
        $input .= '</td><td>';
        $input .= $get['rating'];
        $input .= '</td></tr><br />';
    }
    $input .= '</table">';
    return $input;
});




$app->post('/book', function() use ($books) {
    $output = '<table style="width:33%">';
    foreach ($books as $post) {
        $output .= '<tr><td>';
        $output .= $post['title'];
        $output .= '</td><td>';
        $output .= $post['author'];
        $output .= '</td><td>';
        $output .= $post['publisher'];
        $output .= '</td><td>';
        $output .= $post['rating'];
        $output .= '</td></tr><br />';
    }

    return $output;
    return json_encode($output);
});

$app->get('/user', function(Request $request) use ($user)
{
    $input = '<table style="width:33%">';
    foreach ($user as $get) {
        $input .= '<tr><td>';
        $input .= $get['name'];
        $input .= '</td><td>';
        $input .= $get['phone'];
        $input .= '</td><td>';
        $input .= $get['email'];
        $input .= '</td><td>';
        $input .= $get['username'];
        $input .= '</td></tr><br />';
    }
    $input .= '</table">';
    return $input;
});




$app->post('/user', function() use ($user) {
    $output = '<table style="width:33%">';
    foreach ($user as $post) {
        $output .= '<tr><td>';
        $output .= $post['name'];
        $output .= '</td><td>';
        $output .= $post['phone'];
        $output .= '</td><td>';
        $output .= $post['email'];
        $output .= '</td><td>';
        $output .= $post['username'];
        $output .= '</td></tr><br />';
    }

    return $output;
    return json_encode($output);
});



$app->run();
?>