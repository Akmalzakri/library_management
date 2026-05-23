<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        $session = $this->request->getSession();

        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');

        $isLoggedIn =
            $session->check('Auth.id') ||
            $session->check('Auth.User.id') ||
            $session->check('Auth');

        $publicPages = [
            'Pages' => ['display'],
            'Users' => ['login', 'add'],
        ];

        if (
            isset($publicPages[$controller]) &&
            in_array($action, $publicPages[$controller])
        ) {
            return;
        }

        if (!$isLoggedIn) {
            $this->Flash->error('Please login first to access this page.');

            return $this->redirect([
                'controller' => 'Users',
                'action' => 'login'
            ]);
        }
    }
}