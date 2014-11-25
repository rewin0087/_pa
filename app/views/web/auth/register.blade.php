<div data-target="home-register"></div> 
<script type="text/template" id="App-Views-Register">   
{{ Form::open(array('url' => 'register', 'class' => 'register')) }}
    {{ Form::token() }}
        <h6 class=" logo_align"><strong>NEW USER</strong></h6>
        <div class=""> 
            <p class="mB0 base_color logo_align">FIRST NAME</p>
                {{ Form::text('first_name', '', array('class' => 'form-control', 'placeholder' => '')) }}
            <p class="mB0 base_color logo_align">LAST NAME</p>
                {{ Form::text('last_name', '', array('class' => 'form-control', 'placeholder' => '')) }}
            <p class="mB0 base_color logo_align">EMAIL ADDRESS</p>
                {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => '')) }}
            <p class="mB0 base_color logo_align">PASSWORD </p>
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => '')) }}
            <p class="mB0 base_color logo_align">RE-ENTER PASSWORD</p>
                {{ Form::password('confirm_password', array('class' => 'form-control', 'placeholder' => '')) }}
        </div>
        <span class="line"></span>
        <span class="login-checkbox font_official" >
            <input class="mB10 check-box" type="checkbox" name="terms_condition" value="1">I ACCEPT TERMS AND CONDITIONS<br>
        </span>
        
        <button type="button" class="darkbrown btn btn-xs buttonmarg register" data-trigger='register'>REGISTER</button>
{{ Form::close() }}
</script>
