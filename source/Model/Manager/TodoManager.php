<?php

namespace Chloe\Timetracking\Model\Manager;

use Chloe\Timetracking\Model\DB;
use Chloe\Timetracking\Model\Entity\Todo;
use RedBeanPHP\R;
use RedBeanPHP\RedException\SQL;

class TodoManager {

    public function getTodo(int $id) {
        $todo = R::findOne("todo", "id = ?", [$id]);
        var_dump($todo);
    }

    public function getTodos(int $project_fk) {
        $todo = R::findAll("todo", "project_fk = ?", [$project_fk]);
        var_dump($todo);
    }

    public function add(Todo $todo) {
        $list = R::dispense("user");

        $list->name = $todo->getName();
        $list->time = $todo->getTime();
        $list->date = $todo->getDate();
        $list->projectFk = $todo->getProjectFk()->getId();

        try {
            R::store($list);
        }
        catch (SQL $e) {
            echo "Une erreur est survenue !";
        }
    }

    public function editName(Todo $todo) {

    }

}