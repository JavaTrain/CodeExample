<?php
namespace Users\Controller;

use Users\Models\User as Model;
use Core\Response;
use Core\RedirectResponse;
use Core\Renderer;
use Core\Controller as Base;

class User extends Base{

    public function defaultAction(){

        $mod = new Model();

        $list = $mod->getList();

        $renderer = new Renderer($this->getView('default'));

        $renderer->setVars(array(
            'list' => $list
        ));

        return new Response($renderer->render());
    }

    public function indexAction(){

        $mod = new Model();

        $list = $mod->getList();

        $renderer = new Renderer($this->getView('index'));

        $renderer->setVars(array(
            'list' => $list
        ));

        return new Response($renderer->render());
    }

    public function ajaxAction(){

        $mod = new Model();

        $list = $mod->getList($_POST['role'], $_POST['course']);

        $renderer = new Renderer($this->getView('ajx'));

        $renderer->setVars(array(
            'list' => $list
        ));

        return new Response($renderer->render(), 200, 'success', 'json');
    }

    public function addAction($action){

        $renderer = new Renderer($this->getView('form'));

        $renderer->setVars(array(
            'action' => $action
        ));

        return new Response($renderer->render());
    }

    public function createAction(){

        $mod = new Model();

        $id = $mod->createStud();

        $mod->addCourse($id);

        new RedirectResponse('http://fwork.loc');
    }

    public function deleteAction($id){

        $mod = new Model();

        $mod->delUser($id);

        new RedirectResponse('http://fwork.loc');
    }

    public function editAction($id,$action){

        $mod = new Model();

        $data = $mod->singleUser($id);

        $renderer = new Renderer($this->getView('form'));

        $renderer->setVars(array(
            'action' => $action,
            'data' => $data
        ));

        return new Response($renderer->render());
    }

    public function updateAction(){

        $mod = new Model();

        $mod->updateUser($_POST);

        new RedirectResponse('http://fwork.loc');
    }

    public function errorAction(){

        $renderer = new Renderer($this->getView('error'));

        return new Response($renderer->render());
    }


}