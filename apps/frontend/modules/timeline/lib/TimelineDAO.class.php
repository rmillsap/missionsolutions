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

    public static function get($timelineId, $subject="year", $toggle=0) {
        $t = self::_toTimeline(TimelinePeer::retrieveByPK($timelineId));

        //$startDate = mktime(0,0,0,01,01,date("Y"));
        //$endDate   = mktime(0,0,0,12,01,date("Y"));

        $tickArr = array();

        for($i=1;$i<=12;$i++) {
            $date = mktime(0,0,0,$i,01,date("Y")+$toggle);
            array_push($tickArr, new TickModel($i, date('M-y' , $date)));
        }

        $t->tickArr = $tickArr;

        return $t;
    }

    private static function _toTimeline(Timeline $timelineDb) {
        return new TimelineModel($timelineDb->getId(), $timelineDb->getName(), UserDAO::get($timelineDb->getId()));
    }

}
?>
