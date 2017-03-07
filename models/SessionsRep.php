<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 04.03.17
 * Time: 16:49
 */
namespace app\models;
use app\services\Db;
class SessionsRep
{
    /** @var Db */
    private $conn = null;

    public function __construct()
    {
        $this->conn = Db::getInstance();
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

    public function createNew($userId, $sid, $timeLast)
    {
        return Db::getInstance()->execute(
            "INSERT INTO sessions(userId, sid, lastUpdate) VALUES (? ,? , ?)",
            [$userId, $sid, $timeLast]
        );
    }

    public function updateLastTime($sid, $time = null)
    {
        if (is_null($time)) {
            $time = date('Y-m-d H:i:s');
        }
        return Db::getInstance()->execute(
            "UPDATE sessions SET lastUpdate = '{$time}' WHERE sid = '{$sid}'");
    }

    public function getUidBySid($sid)
    {
        return Db::getInstance()->fetchOne(
            "SELECT userId FROM sessions WHERE sid = ?", [$sid]
        )['userId'];
    }
}