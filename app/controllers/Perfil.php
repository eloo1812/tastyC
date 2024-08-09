<?php 
namespace app\controllers;

use app\classes\Flash;
use app\database\models\Usuario;

class Perfil extends Base {

    public function __construct()
    {
        $this->user = new Usuario;
    }

    public function index($request, $response, $args)
    {
        $id = filter_var($args['id'], FILTER_SANITIZE_NUMBER_INT);

        $user = $this->user->findBy('id', $id);

        if (!$user)
        {
            Flash::set('message', 'Usuário não encontrado', 'danger');
            return \app\helpers\redirect($response, '/');
        }

        $messages = Flash::getAll();

        return $this->getTwig()->render($response, $this->setView('site/perfil'), [
            'title' => 'Editar Conta',
            'user' => $user,
            'messages' => $messages
        ]);    
    }
}