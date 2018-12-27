<?php
/**
 * Created by PhpStorm.
 * User: mich2
 * Date: 27-12-2018
 * Time: 12:33
 */

use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Resource;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory as AclList;

class SecurityPlugin extends Plugin
{


    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        // Check whether the 'auth' variable exists in session to define the active role
        $auth = $this->session->get('auth');

        if (!$auth) {
            $role = 'Guests';
        } else {
            $role = 'Admins';

            //TODO maybe remove this?
            //the user is logged in as an admin, there is no need to check the acl if the user has permission for a
            //resource because this role has access to all resources
            //return;
        }


        // Take the active controller/action from the dispatcher
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        // Obtain the ACL list
        $acl = $this->getAcl();

        // Check if the Role have access to the controller (resource)
        $allowed = $acl->isAllowed($role, $controller, $action);

        if ($allowed != Acl::ALLOW) {
            // If he doesn't have access forward him to the index controller
            $this->flashSession->error(
                "You don't have access to this page, login with a user account that has access and try again."
            );

            $dispatcher->forward(
                [
                    'controller' => 'user',
                    'action' => 'index',
                ]
            );

            // Returning 'false' we tell to the dispatcher to stop the current operation
            return false;
        }
    }

    /**
     * Returns an existing or new access control list
     *
     * @returns AclList
     */
    public function getAcl()
    {
        $acl = new AclList();
        $acl->setDefaultAction(Acl::DENY);
        // Register roles
        $roles = [
            'guests' => new Role(
                'Guests',
                'Anyone browsing the site who is not signed in is considered to be a "Guest".'
            ),
            'admins' => new Role(
                'Admins',
                'A logged in user that has access to all resources in the system.'
            ),
        ];
        foreach ($roles as $role) {
            $acl->addRole($role);
        }

        //Define public resources
        $publicResources = [
            'index' => ['index'],
            'user' => ['index', 'login', 'create'],
            'article' => ['archive', 'detail'],
            'error' => ['show401', 'show404', 'show500']
        ];

        //add public resources to acl
        foreach ($publicResources as $resource => $actions) {
            $acl->addResource(new Resource($resource), $actions);
        }

        //Grant access to all public resources for all roles
        foreach ($roles as $role) {
            foreach ($publicResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow($role->getName(), $resource, $action);
                }
            }
        }

        //grants the admin role access to all resources in the system.
        $acl->allow('Admins', '*', '*');

        //The acl is stored in session, APC would be useful here too
        $this->persistent->acl = $acl;

        return $this->persistent->acl;
    }

}