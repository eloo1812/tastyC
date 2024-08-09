<?php
namespace app\routes;

use app\controllers\Home;
use app\controllers\Site;
use app\controllers\promo;
use app\controllers\Perfil;
use app\controllers\promo2;
use app\controllers\Comentar;
use app\controllers\Controle;
use app\controllers\qrcodeSG;
use app\controllers\Favoritos;
use app\controllers\qrcodeGRE;
use app\controllers\CadastroCar;
use app\controllers\CadastroRes;
use app\controllers\comentarios;
use app\controllers\Restaurantes;

$app->get('/', Home::class . ":index");
$app->get('/home', Site::class . ":index")->add($logged);

$app->get('/CadastroRes', CadastroRes::class . ":index")->add($logged); 
$app->post('/cadastrarRes', CadastroRes::class . ":cadastrar");

$app->get('/CadastroCardapio', CadastroCar::class . ":index")->add($logged); 
$app->post('/cadastrarCardapio', CadastroCar::class . ":cadastrar");

$app->get('/promo', promo::class . ":index")->add($logged); 
$app->get('/promo2', promo2::class . ":index")->add($logged); 
$app->get('/qrcodeSG', qrcodeSG::class . ":index")->add($logged); 
$app->get('/qrcodeGRE', qrcodeGRE::class . ":index")->add($logged); 
$app->get('/Restaurantes', Restaurantes::class . ":index")->add($logged); 
$app->get('/comentarios', comentarios::class . ":index")->add($logged); 

$app->get('/perfil/{id}', Perfil::class . ":index")->add($logged); 

$app->post('/comentar', comentarios::class . ":store");

$app->get('/favoritos/{id}', Favoritos::class . ":index")->add($logged); 
$app->post('/favoritar/{idrefeicao}/{idUser}', Favoritos::class . ":store");
$app->delete('/favoritos/delete/{id}', Favoritos::class . ":destroy");


$app->get('/controle/{idUser}', Controle::class . ":index")->add($logged); 
$app->post('/controle/{idrefeicao}/{idUser}', Controle::class . ":store");
$app->delete('/controle/delete/{id}', Controle::class . ":destroy");