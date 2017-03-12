<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 04.03.17
 * Time: 16:49
 */
namespace app\models;
use app\base\Application;
use app\services\Db;
class SessionsRep{

    /** @var Db */
    private $conn = null;

    public function __construct(){
        $this->conn = Application::call()->db;
        //return $this->conn;
    }

    /*
    * Очистка неиспользуемых сессий
    */
    public function clearSessions()
    {
        return Db::getInstance()->execute(
            sprintf("DELETE FROM sessions WHERE lastUpdate < %s", date('Y-m-d H:i:s', time() - 60 * 20))
        );
    }

    public function createNew($userId, $sid, $timeLast){
        $sql = "INSERT INTO `sessions` (`userID`, `lastUpdate`, `sid`) VALUES ( :userId, :timeLast, :sid)";
        Application::call()->db->myExecute($sql,[":userId" => $userId, ":timeLast" => $timeLast, ":sid" => $sid]);
        $_SESSION['sid'] = $sid;
    }

    public function updateLastTime($sid, $time = null){

        if (is_null($time)) {
            $time = date('Y-m-d H:i:s');
        }
        return Db::getInstance()->myExecute(
            "UPDATE sessions SET lastUpdate = '{$time}' WHERE sid = '{$sid}'");
    }

    public function getUidBySid($sid)
    {
        return Db::getInstance()->fetchOne(
            "SELECT userId FROM sessions WHERE sid = ?", [$sid]
        )['userId'];
    }
}