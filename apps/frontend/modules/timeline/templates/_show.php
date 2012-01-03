<script type="text/javascript">
    var roll = 0;

    $(document).ready(function(){
        // load ticks
        reloadTicks(roll);

        // Milestone clickers
        $('#milestone-1').click(function(e){
            var x = e.pageX;
            var y = e.pageY;

            $('#milestone-dialog-1').dialog(
                {
                    "position":[x,y],
                    "dialogClass":"timeline-dialog"
                }
            );
        });

    });

    function reloadTicks(action) {
         $.ajax({
           type   : "GET",
           data   : "timeline_id=<?php echo $timeline->id ?>&roll="+action,
           url    : "<?php echo url_for("timeline/json_get_ticks") ?>",
           context: document.body,
           success: function(data){
             // TODO: Process an error message, server might be down.
             updateTicks(jQuery.parseJSON(data));
           }
         });
    }

    function updateTicks(data) {
        $("#timeline-<?php echo $timeline->id ?>").html('');
        
        $('#timeline-<?php echo $timeline->id ?>').append("<div id=\"timeline-prev\" class=\"prev\" title=\"Previous\"></div>");

        for(i=0;i<data.ticks.length;i++) {
            $tick  = $("<div class='tick'></div>");
            $label = $("<div class='label'>" + data.ticks[i].label + "</div>");
            $tick.append( $label );
            $("#timeline-<?php echo $timeline->id ?>").append($tick);
        }

        $('#timeline-<?php echo $timeline->id ?>').append("<div id=\"timeline-next\" class=\"next\" title=\"Next\"></div>");

        $('#timeline-prev').click(function(){
            reloadTicks(--roll);
        });

        $('#timeline-next').click(function(){
            reloadTicks(++roll);
        });

    }

</script>

<h1 class="timeline"><?php echo $timeline->name ?></h1>

<div id="timeline-<?php echo $timeline->id ?>" class="timeline clearfix">

    
    <!-- div class="tick">
        &nbsp;
        <div class="label">feb-12</div>
        <div id="milestone-1" class="milestone">x</div>

        <div id="milestone-dialog-1" class="dialog hide" title="Here is the title">
            <p>Here is the dialog</p>
        </div>

    </div -->
    
</div>
<div class="timeline-buttons">
    <!-- div id="timeline-prev" class="prev" title="Previous"></div -->

    <!-- div class="options">
        Subject:
        <select>
            <option>Year</option>
        </select>
    </div -->

    <!-- div id="timeline-next" class="next" title="Next"></div -->
</div>