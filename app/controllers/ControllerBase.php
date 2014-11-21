<?php

namespace Phosphorum\Controllers;

use Phosphorum\Models\Posts;
use Phosphorum\Models\Users;

class ControllerBase extends \Phalcon\Mvc\Controller
{

    public function onConstruct()
    {
            $last_threads = $this
            ->modelsManager
            ->createBuilder()
            ->from(array('p' => 'Phosphorum\Models\Posts'))
            ->groupBy("p.id")
            ->join('Phosphorum\Models\Categories', "r.id = p.categories_id", 'r')
            ->join('Phosphorum\Models\Users', "u.id = p.users_id", 'u')
            ->columns(array('p.title as title_post', 'p.id as id_post', 'p.slug as slug_post', 'r.name as name_category', 'u.name as name_user'))
            ->limit(3)
            ->getQuery()
            ->execute();

            $userId = $this->session->get('identity');
        if ($userId !='') {
            $this->view->count_pm = count($this->db->fetchAll("SELECT *, users.name FROM pm INNER JOIN users ON users.id = pm.sender WHERE pm.read='0' AND pm.to='{$userId}'", \Phalcon\Db::FETCH_OBJ));
        } else {

        }

            $users = Users::find()->getLast();
            $this->view->setVar("threads", Posts::count());
            $this->view->setVar("last_threads", $last_threads);
            $this->view->setVar("users", Users::count());
            $this->view->setVar("users_latest", $users->login);
            $this->view->actionName = $this->dispatcher->getActionName();
    }
}
