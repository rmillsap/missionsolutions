<script type="text/javascript">
    $(document).ready(function(){
        $('input[name=email]').focus();
        $('button').click( function() { document.forms[0].submit(); } );
    });
</script>

<form method="POST">


    <h1>Enter Your Email to Reset Your Password</h1>

    <?php echo include_component("ui", "input", array( "type"=>"text", "label"=>"Email", "name"=>"email" ) ) ?>

    <div class="span-24">
        <button class="left">
            <a href="#">Send Link</a>
        </button>
    </div>

</form>