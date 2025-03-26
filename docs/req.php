<?php
include('./config/conection.php');
class req
{
    private $dbh;
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function saveReqProgres()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $saveArr = [$_POST['progres']];
            for ($i = 0; $i < count($saveArr[0]); $i++) {
                $taskReq = "INSERT INTO progres (progres_task) VALUES ('" . $saveArr[0][$i] . "')";

                $taskPrepare = $this->dbh->prepare($taskReq);

                $taskPrepare->execute();
            }
        }
    }

    public function saveReqCompleted() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $saveArray = [$_POST['completed']];
            for ($i = 0; $i < count($saveArray[0]); $i++) {
                $taskReq = "INSERT INTO completed (completed_task) VALUES ('" . $saveArray[0][$i] . "')";

                $taskPrepare = $this->dbh->prepare($taskReq);

                $taskPrepare->execute();
            }
        }
    }

    public function loadReqProgres() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $loadReq = "SELECT progres_task FROM progres;";

            $loadPrepare = $this->dbh->prepare($loadReq);

            $loadPrepare->execute();
            $load = $loadPrepare->fetchAll();
            return $load;
        }
    }

    public function loadReqCompleted() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $loadReq = "SELECT completed_task FROM completed;";

            $loadPrepare = $this->dbh->prepare($loadReq);

            $loadPrepare->execute();
            $load = $loadPrepare->fetchAll();
            return $load;
        }
    }
}
