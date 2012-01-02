<script type="text/javascript">
    $(document).ready(function(){
        $('input[name=username]').focus();
        $('button').click( function() { document.forms[0].submit(); } );
    });
</script>

<form method="POST">


    <h1>Enter Your User Name and Password</h1>

    <?php echo include_component("ui", "input", array( "type"=>"text", "label"=>"User Name", "name"=>"username" ) ) ?>
    <?php echo include_component("ui", "input", array( "type"=>"password", "label"=>"Password", "name"=>"password" ) ) ?>


    <div class="span-24">
        <button class="left">
            <a href="#">Log In</a>
        </button>

        <a href="<?php echo url_for("user/recover") ?>" class="button-link left">Recover Password</a>

    </div>

</form>