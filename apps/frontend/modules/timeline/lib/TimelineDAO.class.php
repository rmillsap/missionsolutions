<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TimelineDAO
 *
 * @author robbymillsap
 */
class TimelineDAO {
    //put your code here

    public static function get($timelineId) {
        return self::_toTimeline(TimelinePeer::retrieveByPK($timelineId));
    }

    private static function _toTimeline(Timeline $timelineDb) {
        $t = new TimelineModel($timelineDb->getId(), $timelineDb->getName(), UserDAO::get($timelineDb->getId()));
        return $t;
    }

}
?>
