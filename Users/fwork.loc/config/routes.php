<?php

return array(
    array(
        'pattern' => '/users',
        'controller' => 'Users\Controller\User',
        'action' => 'default'
    ),
    array(
        'pattern' => '',
        'controller' => 'Users\Controller\User',
        'action' => 'index'
    ),
    array(
        'pattern' => '/ajax',
        'controller' => 'Users\Controller\User',
        'action' => 'ajax'
    ),
    array(
        'pattern' => '/add/{action}',
        'controller' => 'Users\Controller\User',
        'action' => 'add'
    ),
    array(
        'pattern' => '/create',
        'controller' => 'Users\Controller\User',
        'action' => 'create'
    ),
    array(
        'pattern' => '/del/{id}',
        'controller' => 'Users\Controller\User',
        'action' => 'delete',
        'requirements' => array(
            'id'=>'\d+'
        )
    ),
    array(
        'pattern' => '/edit/{id}/{action}',
        'controller' => 'Users\Controller\User',
        'action' => 'edit',
        'requirements' => array(
            'id'=>'\d+'
        )
    ),
    array(
        'pattern' => '/update',
        'controller' => 'Users\Controller\User',
        'action' => 'update'
    ),
    array(
        'pattern' => '/error',
        'controller' => 'Users\Controller\User',
        'action' => 'error'
    ),

);