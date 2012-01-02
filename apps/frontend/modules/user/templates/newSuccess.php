<script type="text/javascript">
    $(document).ready(function(){
        $('input[name=username]').focus();
        $('button').click( function() { document.forms[0].submit(); } );


        $('input[name=username]').keydown(function(event){

            // Allow only backspace and delete
            if (  event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 ) {
                // let it happen, don't do anything
            }
            else {
                // Ensure that it is a number and stop the keypress
                if (event.keyCode < 48 || event.keyCode > 105 ) {
                    event.preventDefault();
                }
            }
        });
    });
</script>

<form method="POST">


    <h1>Create an Account</h1>

    <div class="span-24">
        <h2>Step 1. Select a User Name and Password</h2>
        <?php echo include_component("ui", "input", array( "type"=>"text", "label"=>"User Name", "name"=>"username" ) ) ?>
        <?php echo include_component("ui", "input", array( "type"=>"password", "label"=>"Password", "name"=>"password1" ) ) ?>
        <?php echo include_component("ui", "input", array( "type"=>"password", "label"=>"Confirm Password", "name"=>"password2" ) ) ?>
    </div>

    &nbsp;

    <div class="span-24">
        <h2>Step 2. Enter Your Email</h2>
        <?php echo include_component("ui", "input", array( "type"=>"email", "label"=>"Email", "name"=>"email" ) ) ?>
    </div>
   

    <div class="span-24">
        <button class="left">
            <a href="#">Create User</a>
        </button>

    </div>

</form>