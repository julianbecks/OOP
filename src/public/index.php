<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require '../vendor/autoload.php';
require_once('services/guestbook.php');
require_once('Entities/newEntry.php');

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(['settings' => $config]);

$container = $app->getContainer();

$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig('templates', ['cache' => false]);
    // Instantiate and add Slim specific extension
    $router = $c->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));
    return $view;
};

//DB Connection
$container['db'] = function ($c) {
    $pdo = new PDO("mysql:host=localhost;dbname=Gaestebuch", "Julian", "julian");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

//Start Seite
$app->get('/home', function(Request $request, Response $response) use($container){
    return $this->view->render($response,'home.html');
});

// Alle Datensätze anzeigen
$app->get('/home/view', function (Request $request, Response $response) use($container) {
    $object = new Guestbook();
    return $this->view->render($response, 'view.html',['entries' => $object->select()]);
    
});

//Neuen Eintrag eingeben
$app->get('/home/add', function(Request $request, Response $response){
    return $this->view->render($response,'add.html');
});

//Neuen Eintrag hinzufügen
$app->get('/home/added',function(Request $request, Response $response) use($container){
    $object = new Guestbook();
    $entry = new NewEntry($request->getParam('VN'), $request->getParam('NN'), $request->getParam('Stadt'), $request->getParam('Inhalt'));
    $object->insert($entry);
    return $this->view->render($response, 'added.html');
});

// Eintrag löschen
$app->get('/home/delete', function(Request $request, Response $response) use($container){
    $object = new Guestbook();
    $object->delete($request->getParam('id'));
    return $this->view->render($response,'delete.html');
});

$app->get('/test', function(Request $request, Response $response) use($container){
    $object = new Guestbook();
    return $this->view->render($response, 'test.html',['entries' => $object->select()]);
    // return $this->view->render($response,'test.html');
});

$app->get('/home/Clan', function (Request $request, Response $response) use($container){
    
    $pdotest = new PDO("mysql:host=localhost;dbname=clans", "root", "");
    $sql2 = "SELECT * FROM claninfo";
    $temp5 = $pdotest->prepare($sql2);
    $temp5->execute();
    return $this->view->render($response, 'clans.html',['entries' => $temp5]);
});

$app->get('/home/Clan/{clan}', function (Request $request, Response $response, array $args) use($container){
    $pdo = new PDO("mysql:host=localhost;dbname=clans", "root", "");
    $sql = 'SELECT * FROM `clan` WHERE Kurzel = "$clan"';
    $temp = $pdo->prepare('SELECT * FROM clan WHERE Kurzel = :name');
    $temp->bindParam(':name', $args['clan']);
    $temp->execute();
    return $this->view->render($response, 'clan.html',['entries' => $temp]);
});

$app->run();