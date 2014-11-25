<div data-target="home-login"></div>
<script type="text/template" id="App-Views-Login">
{{ Form::open(array('url' => 'login', 'class' => 'login')) }}
    {{ Form::token() }}
        @if($errors->has('login'))
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ $errors->first('login', ':message') }}
            </div>
        @endif
        <h6 class=" logo_align"><strong>EXISTING USER</strong></h6>
        <div class="">
            <p class="mB0 base_color logo_align">EMAIL ADDRESS</p>
                {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => '')) }}
            <p class="mB0 base_color logo_align">PASSWORD</p>
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => '')) }}
        </div>
        <span class="line2"></span>
        <span class="login-checkbox font_official" >
            <input class=" mB10 check-box" type="checkbox" name="" value="">REMEMBER MY ID PASSWORD<br>
        </span>
        <button type="button" class="darkbrown btn btn-xs buttonmarg login" data-trigger='login'>LOGIN</button>
{{ Form::close() }}
</script>
