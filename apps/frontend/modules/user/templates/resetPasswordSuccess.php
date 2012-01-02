<script type="text/javascript">
    $(document).ready(function(){
        $('input[name=password1]').focus();
        $('button').click( function() { document.forms[0].submit(); } );
    });
</script>

<form method="POST">


    <h1>Enter Your Password Twice to Reset</h1>

    <?php echo include_component("ui", "input", array( "type"=>"password", "label"=>"Password", "name"=>"password1" ) ) ?>
    <?php echo include_component("ui", "input", array( "type"=>"password", "label"=>"Confirm", "name"=>"password2" ) ) ?>

    <div class="span-24">
        <button class="left">
            <a href="#">Reset</a>
        </button>
    </div>

</form>