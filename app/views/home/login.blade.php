@include('frame.header')

<div class="col-lg-12 text-center v-center">
    <h1>Hello Derick. R</h1>
    <p class="lead">If this is your Account then Login</p>
    <p>
        {{ Form::open(array('route'=>'login','class'=>'col-lg-12')) }}
            <div class="input-group" style="width:340px;text-align:center;margin:0 auto;">
                {{ Form::password('nname',array('class'=>'form-control input-lg','title'=>'Dont worry, we will not share your information with anyone.','placeholder'=>'Enter your nick name'))}}
                <span class="input-group-btn">
                    {{Form::submit('LOGIN',array('class'=>'btn btn-lg btn-primary'))}}
                </span>
            </div>
            {{Form::token()}}
        {{ Form::close() }}
    </p>
    <div class="input-group" style="width:340px;text-align:center;margin:0 auto;">
        <!--SIGNIN Button trigger modal -->
        <button class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#loginModal">Sign-in With Different Account</button>
    </div>
    <p>
        <div class="input-group" style="width:340px;text-align:center;margin:0 auto;">
            <!-- Signup trigger modal -->
            <button class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#signupModal">Sign-up With New Account</button>
        </div>
    </p>
</div>

<!--SIGNIN Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title my-popups-header" id="myModalLabel">Make sure That You Fill in All The Fields</h3>
            </div>
            <div class="modal-body panel-body">
                {{ Form::open(array('route' =>'news','class'=>'form col-md-12 center-block')) }}
                <div class="form-group">
                    {{ Form::text('fname','',array('type'=>"text",'class'=>"form-control input-lg",'placeholder'=>"Enter Your First Name"))}}
                </div>
                <div class="form-group">
                    {{ Form::text('sname','',array('type'=>"text",'class'=>"form-control input-lg",'placeholder'=>"Enter Your Sur Name"))}}
                </div>
                <div class="input-group" style="text-align:center;margin:0 auto;">
                    {{ Form::password('nname',array('class'=>'form-control input-lg','title'=>'Dont worry, we will not share your information with anyone.','placeholder'=>'Enter your nick name'))}}
                    <span class="input-group-btn">
                        {{Form::submit('SIGNIN',array('class'=>'btn btn-lg btn-danger'))}}
                    </span>
                </div>
                {{ Form::close() }}
                <hr>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title my-popups-header" id="myModalLabel">Make sure That You Fill in All The Fields</h3>
            </div>
            <div class="modal-body panel-body">
                {{ Form::open(array('route' =>'news','class'=>'form col-md-12 center-block')) }}
                <div class="form-group">
                    {{ Form::text('username','',array('type'=>"text",'class'=>"form-control input-lg",'placeholder'=>"Enter Your First Name"))}}
                </div>
                <div class="form-group">
                    {{ Form::text('username','',array('type'=>"text",'class'=>"form-control input-lg",'placeholder'=>"Enter Your Sur Name"))}}
                </div>
                <div class="form-group">
                    <!--{{Form::select('genger',array(''=>'Select Gender','M'=>'Male','F'=>'Female'),'',array('class'=>'form-control input-lg'))}}-->

                    <select class="form-control input-lg">
                        <option disabled="" selected="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="input-group" style="text-align:center;margin:0 auto;">
                    {{ Form::password('password',array('class'=>'form-control input-lg','title'=>'Dont worry, we will not share your information with anyone.','placeholder'=>'Enter your nick name'))}}
                    <span class="input-group-btn">
                        {{Form::submit('SIGNUP',array('class'=>'btn btn-lg btn-success'))}}
                    </span>
                </div>
                {{ Form::close() }}
                <hr>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@include('frame.footer')