{
    "timeline_id":"<?php echo $timeline->id ?>",
    "name":"<?php echo $timeline->name ?>",
    "ticks":[
            <?php for($i=0;$i<count($timeline->tickArr);$i++): ?>
                {
                    "tick_id":"<?php echo $timeline->tickArr[$i]->id ?>",
                    "label":"<?php echo $timeline->tickArr[$i]->label ?>"
                }
                <?php if($i < count($timeline->tickArr)-1) echo ","; ?>
            <?php endfor; ?>
            ]
}