<?php

namespace Chloe\Timetracking\Model\Manager;

use Chloe\Timetracking\Model\DB;
use Chloe\Timetracking\Model\Entity\Project;
use RedBeanPHP\R;
use RedBeanPHP\RedException\SQL;

class ProjectManager {

    public function getProjects(int $user_fk) {
        $project = R::findAll("project", 'user_fk = ?', [$user_fk]);
        var_dump($project);
    }

    public function getProject(int $id, int $user_fk) {
        $project = R::findOne("project", "id = ? AND user_fk = ?", [$id, $user_fk]);
        var_dump($project);
    }

    public function add(Project $proj) {
        $project = R::dispense("project");

        $project->name = $proj->getName();
        $project->time = $proj->getTime();
        $project->date = $proj->getDate();
        $project->userFk = $proj->getUserFk()->getId();

        try {
            R::store($project);
        }
        catch (SQL $e) {
            echo "Une erreur est survenue !";
        }
    }

    public function updateTimeDate(Project $proj) {
        $project = R::load("project", $proj->getId());

        $project->time = $proj->setTime($proj->getTime());
        $project->date = $proj->setDate($proj->getDate());

        try {
            R::store($project);
        }
        catch (SQL $e) {
            echo "Une erreur est survenue";
        }
    }

    public function updateTime(Project $proj) {
        $project = R::load("project", $proj->getId());

        $project->time = $proj->setTime($proj->getTime());

        try {
            R::store($project);
        }
        catch (SQL $e) {
            echo "Une erreur est survenue";
        }
    }

    public function delete(int $id) {
        R::trash("project", $id);
    }
}