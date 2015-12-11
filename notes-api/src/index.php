<?php
/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 12/1/15
 * Time: 6:08 PM
 */

require_once __DIR__ . '/vendor/autoload.php';

use Silex\Application;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();

//$app['debug'] = true;

$notes = [
            '00001'=> [
                        'name' => 'ManagerPlus Desktop',
                        'body' => 'ManagerPlus Asset Management Software, Enterprise edition.',
                        'username' => 'joseyjara',
                        'tag' => 'Asset Management, CMMS'
                      ],
            '00002'=> [
                        'name' => 'ManagerPlus Cloud',
                        'body' => 'ManagerPlus Cloud solution, Corporate and Small business edition',
                        'username' => 'jjara',
                        'tag' => 'M+ Cloud, CMMS Cloud'
                      ]
        ];

$users = [
            '00001' => [
                        'username' => 'jrosep',
                        'password' => 'abc123',
                        'fullName' => 'Janora Jara'
                        ],
            '00002' => [
                        'username' => 'kbeckstead',
                        'password' => 'asdf123',
                        'fullName' => 'Kris Beckstead'
                        ]
        ];

//Root
$app->get('/', function() {
    return new Response('Project 1 Deliverable 2', 200);
});

//get all notes
$app->get('/notes', function() use ($notes){
    return new Response(
        json_encode($notes), 200);
});

//get notes by ID
$app->get('/notes/{id}', function (Application $app, $id) use ($notes) {
    if(!isset($notes[$id]))
    {
        $app->abort(404, "Note ID {id} not found!");
    }
    return new Response(
        json_encode($notes[$id]), 200);
});

//Modify notes by ID
$app->put('/notes/{id}', function (Application $app, Request $request, $id) use ($notes) {
    if(!isset($notes[$id]))
    {
        $app->abort(404, "Note ID {id} not found!");
    }
    $payload = json_decode($request->getContent());
    $notes[$id] = $payload;

    return new Response(
        json_encode($notes), 200);
});

//Delete notes by ID
$app->delete('/notes/{id}', function (Application $app, $id) use ($notes) {
    if(!isset($notes[$id]))
    {
        $app->abort(404, "Note ID {id} not found!");
    }
    unset($notes[$id]);
    return new Response(null, 204);
});

//Add notes - Autogenerate ID
$app->post('/notes', function (Application $app, Request $request) use ($notes) {
    //Validate content
    $contentTypeValid = in_array(
        'application/json',
        $request->getAcceptableContentTypes()
    );

    if (!$contentTypeValid)
    {
        $app->abort(406, 'Invalid content');
    }

    $content = json_decode($request->getContent());
    $newId = uniqid(); // creates ID for note

    $notes[$newId] = [
        'name' => $content->name,
        'body' => $content->body,
        'username' => $content->username,
        'tags' => $content->tags
    ];

    return new Response(
        json_encode($notes), 201);
});

//get users by ID
$app->get('/users/{id}', function (Application $app, $id) use ($users) {
    if(!isset($users[$id]))
    {
        $app->abort(404, "User ID {id} not found!");
    }
    return new Response(
        json_encode($users[$id]), 200);
});

//Modify user by ID
$app->put( '/users/{id}', function (Application $app, Request $request, $id) use ($users) {
    if(!isset($users[$id]))
    {
        $app->abort(404, "User ID {id} not found!");
    }
    $payload = json_decode($request->getContent());
    $users[$id] = $payload;

    return new Response(
        json_encode($users), 200);
});

//Delete user by ID
$app->delete('/users/{id}', function (Application $app, $id) use ($users) {
    if(!isset($users[$id]))
    {
        $app->abort(404, "User ID {id} not found!");
    }
    unset($users[$id]);
    return new Response(null, 204);

});

//Ad users - Autogenerate ID
$app->post('/users', function (Application $app, Request $request) use ($users) {
    //Validate Content
    $contentTypeValid = in_array(
        'application/json',
        $request->getAcceptableContentTypes()
    );

    if (!$contentTypeValid)
    {
        $app->abort(406, 'Invalid content');
    }

    $content = json_decode($request->getContent());

    $newId = uniqid();

    $users[$newId] = [
        'username' => $content->username,
        'password' => $content->password,
        'fullname' => $content->fullname
    ];

    return new Response(
        json_encode($users), 201);
});



$app->run();