<script type="text/javascript">
    $(document).ready(function(){
        $('.milestone').click(function(){
            alert("Here");
        });
    });
</script>

<h1><?php echo $timeline->name ?></h1>

<div class="timeline">

    <div class="tick">
        &nbsp;
        <div class="label">jan-12</div>
    </div>
    <div class="tick">
        &nbsp;
        <div class="label">feb-12</div>
        <div class="milestone">x</div>
    </div>
    <div class="tick">
        &nbsp;
        <div class="label">mar-12</div>
    </div>
    <div class="tick">
        &nbsp;
        <div class="label">apr-12</div>
    </div>
    <div class="tick">
        &nbsp;
        <div class="label">may-12</div>
    </div>
</div>