<?php

/**
 * timeline actions.
 *
 * @package    missionsolutions
 * @subpackage timeline
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class timelineActions extends BaseAction
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeEdit(sfWebRequest $request)
  {
  }

  public function executeJson_get_ticks(sfWebRequest $request) {
    $subject = "year";
    $roll    = $request->getParameter("roll");

    $this->timeline = TimelineDAO::get($request->getParameter("timeline_id"), $subject, $roll);
  }
}
