<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Welcome</title>

        <!-- Core CSS - Include with every page -->
        {{HTML::style("css/bootstrap.min.css")}}
        {{HTML::style("css/font-awesome.min.css")}}
        {{HTML::style("css/my-home.css")}}
        {{HTML::style("css/custom.css")}}
<!--        {{HTML::style("css/style1.css")}}-->
        
        <!-- Page-Level Plugin CSS - Dashboard -->
        <!--{{HTML::style("css/morris-0.4.3.min.css")}}-->
        {{HTML::style("css/timeline.css")}}

        <!-- SB Admin CSS - Include with every page -->
        {{HTML::style("css/sb-admin.css")}}

    </head>

    <body>
<!--        <ul class="cb-slideshow">
            <li><span>Image 01</span><div></li>
            <li><span>Image 02</span></li>
            <li><span>Image 03</span></li>
            <li><span>Image 04</span></li>
            <li><span>Image 05</span></li>
            <li><span>Image 06</span></li>
        </ul>-->

        <div id="wrapper">

            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <strong class="my-Logo">
                            UDCHAT<sup>@</sup>
                        </strong>
                        <em>Friends</em>
                    </a>
                </div><!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    @include('frameComponent.message')
                    @include('frameComponent.alert')
                    @include('frameComponent.user')
                    <li>
                        <a href="#">
                            <strong>
                                <em>
                                    {{count(User::where('status',1)->whereNotIn('id',array(Auth::user()->id))->get())}} Users Online
                                </em>
                            </strong>
                        </a>
                    </li>
                </ul><!-- /.navbar-top-links -->
            </nav><!-- /.navbar-static-top -->

            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div><!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{URL::route('news')}}"><i class="fa fa-home"></i></span> Home</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-comment"></i> Chat<span class="fa fa-chevron-down pull-right"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::route('friendList')}}"><i class="fa fa-user"></i>&nbsp; With Friends</a>
                                </li>
                                <li>
                                    <a href="{{URL::route('anonymousUsers')}}"><span class="fa fa-random"></span>&nbsp; Anonymously</a>
                                </li>
                            </ul><!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users"></i>&nbsp;Discussions<span class="fa fa-chevron-down pull-right"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::route("debate")}}"><i class="fa fa-suitcase"></i> Debate</a>
                                </li>
                                <li>
                                    <a href="#login.html"><i class="fa fa-briefcase"></i> Forum<span class="fa fa-chevron-circle-down pull-right"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="{{URL::route("education")}}"><i class="fa fa-book"></i>&nbsp;Educational</a>
                                        </li>
                                        <li>
                                            <a href="{{URL::route('politics')}}"><i class="fa fa-flag"></i>&nbsp;Political</a>
                                        </li>
                                        <li>
                                            <a href="{{URL::route('social')}}"><i class="fa fa-globe"></i>&nbsp;Social</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul><!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bullhorn"></i> Advertise Here<span class="fa fa-chevron-down pull-right"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{URL::route('regular')}}"><i class="fa fa-money"></i> Regular</a>
                                </li>
                                <li>
                                    <a href="{{URL::route('business')}}"><i class="fa fa-dollar"></i> Business</a>
                                </li>
                            </ul><!-- /.nav-second-level -->
                        </li>
                    </ul><!-- /#side-menu -->
                </div><!-- /.sidebar-collapse -->
            </nav><!-- /.navbar-static-side -->

            <div id="page-wrapper">
