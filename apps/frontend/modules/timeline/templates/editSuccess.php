<?php 
    echo include_component("timeline", "show", array(
        "timeline_id"=>$sf_request->getParameter("id")
    ));
?>