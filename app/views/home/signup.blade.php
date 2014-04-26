@include('frame.header')

<div class="col-lg-12 text-center v-center">
    <h1>Hello User-PC</h1>
    <br><br><br><br>
    <div class="input-group" style="width:340px;text-align:center;margin:0 auto;">
        <!--SIGNIN Button trigger modal -->
        <button class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#loginModal">Log-in if You Have an Account</button>
    </div>
    <p>
        <div class="input-group" style="width:340px;text-align:center;margin:0 auto;">
            <!-- Signup trigger modal -->
            <button class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#signupModal">Sign-up if You are a New User</button>
        </div>
    </p>
</div>

<!--SIGNIN Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default custom-panel">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title my-popups-header" id="myModalLabel">Make sure That You Fill in All The Fields</h3>
            </div>
            <div class="modal-body panel-body" id="modalContent">
                @if($errors->has('n_name') || Session::get('global') == "Account Credentials Dont Match")
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>
                        @if(Session::get('global') == "Account Credentials Dont Match")
                            <strong>Account Credentials Dont Match</strong>
                        @else
                            {{$errors->first('n_name')}}
                        @endif
                    </strong>
                </div>
                @endif
                <hr>
                {{ Form::open(array('route' =>'login','class'=>'form col-md-12 center-block')) }}
                    <div class="form-group">
                        <div class="input-group" style="text-align:center;margin:0 auto;">
                            <input type="text" name="f_name" class="form-control input-lg" placeholder="Enter Your First Name" {{(Input::old('f_name'))? 'value="'.e(Input::old('f_name')).'"':''}}>
                            <span class="input-group-btn">
                                @if(Input::old('f_name'))
                                    <button type="button" class="btn btn-lg btn-success"><i class="fa fa-check"></i></button>
                                @else
                                    {{($errors->has('f_name'))? '<button type="button" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-user"></i> Required</button>':'<button type="button" class="btn btn-lg btn-info"><i class="glyphicon glyphicon-user"></i></button>'}}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group" style="text-align:center;margin:0 auto;">
                            <input type="text" name="s_name" class="form-control input-lg" placeholder="Enter Your Sir Name" {{(Input::old('s_name'))? 'value="'.e(Input::old('s_name')).'"':''}}>
                            <span class="input-group-btn">
                                @if(Input::old('s_name'))
                                    <button type="button" class="btn btn-lg btn-success"><i class="fa fa-check"></i></button>
                                @else
                                {{($errors->has('s_name'))? '<button type="button" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-user"></i> Required</button>':'<button type="button" class="btn btn-lg btn-info"><i class="glyphicon glyphicon-user"></i></button>'}}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="input-group" style="text-align:center;margin:0 auto;">
                        <input type="password" name="n_name" class="form-control input-lg" placeholder="Enter Your Nick Name" title="Dont worry, we will not share your information with anyone." {{(Input::old('n_name'))? 'value="'.e(Input::old('n_name')).'"':''}}>
                        <span class="input-group-btn">
                            <input type="submit" value="LOGIN" class="btn btn-lg btn-danger">
                        </span>
                    </div>
                    {{Form::token()}}
                {{ Form::close() }}
                <hr>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Signup Modal -->

<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default custom-panel">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title my-popups-header" id="myModalLabel">Make sure That You Fill in All The Fields</h3>
            </div>
            <div class="modal-body panel-body">
                @if($errors->has('nick_name'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$errors->first('nick_name')}}</strong>
                </div>
                @endif<hr>
                {{ Form::open(array('route' =>'signup','class'=>'form col-md-12 center-block')) }}
                    <div class="form-group">
                        <div class="input-group" style="text-align:center;margin:0 auto;">
                            <input type="text" name="first_name" class="form-control input-lg" placeholder="Enter Your First Name" {{(Input::old('first_name'))? 'value="'.e(Input::old('first_name')).'"':''}}>
                            <span class="input-group-btn">
                                @if(Input::old('first_name'))
                                    <button type="button" class="btn btn-lg btn-success"><i class="fa fa-check"></i></button>
                                @else
                                    {{($errors->has('first_name'))? '<button type="button" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-user"></i> Required</button>':'<button type="button" class="btn btn-lg btn-info"><i class="glyphicon glyphicon-user"></i></button>'}}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group" style="text-align:center;margin:0 auto;">
                            <input type="text" name="sir_name" class="form-control input-lg" placeholder="Enter Your Sir Name" {{(Input::old('sir_name'))? 'value="'.e(Input::old('sir_name')).'"':''}}>
                            <span class="input-group-btn">
                                @if(Input::old('sir_name'))
                                    <button type="button" class="btn btn-lg btn-success"><i class="fa fa-check"></i></button>
                                @else
                                    {{($errors->has('sir_name'))? '<button type="button" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-user"></i> Required</button>':'<button type="button" class="btn btn-lg btn-info"><i class="glyphicon glyphicon-user"></i></button>'}}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group" style="text-align:center;margin:0 auto;">
                            <!--{{Form::select('genger',array(''=>'Select Gender','M'=>'Male','F'=>'Female'),'',array('class'=>'form-control input-lg'))}}-->
                            <select name="gender" class="form-control input-lg">
                                <option disabled="" selected="">Select Gender</option>
                                <option value="male" {{(Input::old('gender'))=='male'? 'selected=""':''}}>Male</option>
                                <option value="female" {{(Input::old('gender'))=='female'? 'selected=""':''}}>Female</option>
                            </select>
                            <span class="input-group-btn">
                                @if(Input::old('gender'))
                                    <button type="button" class="btn btn-lg btn-success"><i class="fa fa-check"></i></button>
                                @else
                                    {{($errors->has('gender'))? '<button type="button" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-user"></i> Required</button>':'<button type="button" class="btn btn-lg btn-info"><i class="glyphicon glyphicon-user"></i></button>'}}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="input-group" style="text-align:center;margin:0 auto;">
                        <input type="text" name="nick_name" class="form-control input-lg" placeholder="Enter Your Nick Name" title="Dont worry, we will not share your information with anyone.">
                        <span class="input-group-btn">
                            <input type="submit" value="SIGNUP" class="btn btn-lg btn-success">
                        </span>
                    </div>
                    {{Form::token()}}
                {{ Form::close() }}
                <hr>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@include('frame.footer')
