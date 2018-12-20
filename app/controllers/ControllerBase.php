<?php
/**
 * Created by PhpStorm.
 * User: mich2
 * Date: 14-12-2018
 * Time: 18:56
 */


use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;

class ControllerBase extends Controller
{
    public function initialize()
    {
        //register all local css assets
        $this->assets->addCss('css/site.css');
        $this->assets->addCss('css/login.css');


        //register all local js assets
        $this->assets->addJs('js/site.js');
    }

    /**
     * @var The whitelisted routes
     */
    private $unsecuredRoutes = [
        ['controller' => 'index', 'action' => 'index'],
        ['controller' => 'user', 'action' => 'index'],
        ['controller' => 'user', 'action' => 'login'],
        ['controller' => 'user', 'action' => 'create'],
        ['controller' => 'article', 'action' => 'archive'],
        ['controller' => 'article', 'action' => 'detail']
    ];

    /**
     * @param Dispatcher $dispatcher
     *
     * @return bool
     */
    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
        if (!$this->session->get('auth') && !$this->isUnsecuredRoute($dispatcher)) {
            $dispatcher->forward(['controller' => 'user', 'action' => 'index']);

            return false;
        }
    }

    /**
     * @param Dispatcher $dispatcher
     *
     * @return bool
     */
    private function isUnsecuredRoute(Dispatcher $dispatcher)
    {
        foreach ($this->unsecuredRoutes as $route) {
            if ($route['controller'] == $dispatcher->getControllerName()
                && $route['action'] == $dispatcher->getActionName()
            ) {
                return true;
            }
        }
        return false;
    }

}
