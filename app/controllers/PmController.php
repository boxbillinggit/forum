<?php

/*
 +------------------------------------------------------------------------+
 | Phosphorum                                                             |
 +------------------------------------------------------------------------+
 | Copyright (c) 2013-2014 Phalcon Team and contributors                  |
 +------------------------------------------------------------------------+
 | This source file is subject to the New BSD License that is bundled     |
 | with this package in the file docs/LICENSE.txt.                        |
 |                                                                        |
 | If you did not receive a copy of the license and are unable to         |
 | obtain it through the world-wide-web, please send an email             |
 | to license@phalconphp.com so we can send you a copy immediately.       |
 +------------------------------------------------------------------------+
*/

namespace Phosphorum\Controllers;

use Phalcon\Mvc\Controller;
use Phosphorum\Models\Pm;

/**
 * Class IndexController
 *
 * @package Phosphorum\Controllers
 */
class PmController extends ControllerBase
{

    /**
     * @return \Phalcon\Http\ResponseInterface
     */
    public function pmAction()
    {
        $this->tag->setTitle('Private Message');
        $userId = $this->session->get('identity');

        if ($userId !='') {
	    $phql = "SELECT *, pm.id as privID, users.name FROM pm INNER JOIN users ON users.id = pm.sender WHERE pm.to='{$userId}' AND folder='0'";

            $this->view->pm = $this->db->fetchAll($phql, \Phalcon\Db::FETCH_OBJ);
        } else {
            $this->flashSession->error('You are not logged');
            return $this->response->redirect('');	
        
            $this->view->logged = $this->session->get('identity');
    }

    public function starredAction()
    {
            $this->tag->setTitle('Private Message - Starred');
            $userId = $this->session->get('identity');

        if ($userId !='') {
            $phql = "SELECT *, pm.id as privID, users.name FROM pm INNER JOIN users ON users.id = pm.sender WHERE pm.to='{$userId}' AND folder='1'";

            $this->view->pm = $this->db->fetchAll($phql, \Phalcon\Db::FETCH_OBJ);
        } else {
            $this->flashSession->error('You are not logged');
            return $this->response->redirect('');	
        }

            $this->view->logged = $this->session->get('identity');
    }
	
    public function importantAction()
    {
            $this->tag->setTitle('Private Message - Important');
            $userId = $this->session->get('identity');

        if ($userId !='') {
            $phql = "SELECT *, pm.id as privID, users.name FROM pm INNER JOIN users ON users.id = pm.sender WHERE pm.to='{$userId}' AND folder='2'";

            $this->view->pm = $this->db->fetchAll($phql, \Phalcon\Db::FETCH_OBJ);
        } else {
            $this->flashSession->error('You are not logged');
            return $this->response->redirect('');	
        }

            $this->view->logged = $this->session->get('identity');
    }
	
    public function sentAction()
    {
            $this->tag->setTitle('Private Message - Sent');
            $userId = $this->session->get('identity');

        if ($userId !='') {
            $phql = "SELECT *, pm.id as privID, users.name FROM pm INNER JOIN users ON users.id = pm.sender WHERE pm.to='{$userId}' AND folder='3'";

            $this->view->pm = $this->db->fetchAll($phql, \Phalcon\Db::FETCH_OBJ);
        } else {
            $this->flashSession->error('You are not logged');
            return $this->response->redirect('');	
        }

            $this->view->logged = $this->session->get('identity');
    }
	
    public function draftsAction()
    {
            $this->tag->setTitle('Private Message - Drafts');
            $userId = $this->session->get('identity');

        if ($userId !='') {
            $phql = "SELECT *, pm.id as privID, users.name FROM pm INNER JOIN users ON users.id = pm.sender WHERE pm.to='{$userId}' AND folder='4'";

            $this->view->pm = $this->db->fetchAll($phql, \Phalcon\Db::FETCH_OBJ);
        } else {
            $this->flashSession->error('You are not logged');
            return $this->response->redirect('');	
        }

            $this->view->logged = $this->session->get('identity');
    }

    public function showAction($id)
    {	
            $userId = $this->session->get('identity');

        if ($userId !='') {
            $get_message = "SELECT *, pm.id as privID, users.gravatar_id as gravatar, users.name FROM pm INNER JOIN users ON users.id = pm.sender WHERE pm.to='{$userId}' AND pm.id='{$id}'";
            $this->view->message = $this->db->fetchAll($get_message, \Phalcon\Db::FETCH_OBJ);
		
            $get_title = $this->db->fetchAll($get_message, \Phalcon\Db::FETCH_OBJ);

            $update = \Phosphorum\Models\Pm::findFirst("id=".(int)$id);
            $update->read = 1;
            $update->update();

            $this->tag->setTitle('Show Message - '.$get_title[0]->subject);
        } else {
            $this->flashSession->error('You are not logged');
            return $this->response->redirect('');
        }
    }
}
