<?php

namespace Chloe\Timetracking\Model\Manager;

use Chloe\Timetracking\Model\DB;
use Chloe\Timetracking\Model\Entity\User;
use RedBeanPHP\R;

class UserManager {

    public function getUser(int $id) {
        $project =  R::findOne("project", 'id:?', [$id]);

        return json_encode($project);
    }

}