<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
require_once 'model/Produto.php';
require_once 'dao/ProdutoDAO.php';

// require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . './vendor/autoload.php';

$app = AppFactory::create();

$app->addBodyParsingMiddleware(); // <<<---- here
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("É isso aí");
    return $response;
});

$app->get('/produtos', function(Request $request, Response $response, array $args){
    $produtoDAO = new ProdutoDAO();
    $produtos = $produtoDAO->read();
    $response->getBody()->write(json_encode($produtos));
    return $response->withHeader('Content-type', 'application/json');
});

$app->post('/produto', function(Request $request, Response $response, array $args){
    $data = $request->getParsedBody();

    $produto = new Produto();   
    $produto->setNome($data['nome']);
    $produto->setDescricao($data['descricao']);
    $produto->setPreco($data['preco']);
    var_dump($produto);
    $produtoDAO = new ProdutoDAO();
    $produtoDAO->create($produto); 
    return  $response->withStatus(201);
});

$app->put('/produto/{id}', function(Request $request, Response $response, array $args){

    $id = $args['id'];
    $data = $request->getParsedBody();

    $produto = new Produto();
    $produto->setNome($data['nome']);
    $produto->setDescricao($data['descricao']);
    $produto->setPreco($data['preco']);
    $produto->setId($id);

    $produtoDAO = new ProdutoDAO();
    $produtoDAO->update($produto);

    return  $response->withStatus(200);

});

$app->delete('/produto/{id}', function(Request $request, Response $response, array $args){
    $id = $args['id'];

    $produtoDAO = new ProdutoDAO();
    $produtoDAO->delete($id);
    return  $response->withStatus(200);
});

$app->run();
