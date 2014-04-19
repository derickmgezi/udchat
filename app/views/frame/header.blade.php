<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Welcome</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Core CSS - Include with every page -->
        {{HTML::style("css/bootstrap.min.css")}}
        {{HTML::style("css/font-awesome.css")}}
        {{HTML::style("css/my-home.css")}}

        <!-- SB Admin CSS - Include with every page -->
        {{HTML::style("css/sb-admin.css")}}

        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container-full">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <strong class="my-Logo">
                            UDCHAT
                        </strong>
                    </a>
                </div><!-- /.navbar-header -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-top-links navbar-right">
                        @include('frameComponent.message')
                        @include('frameComponent.alert')
                        <li><a href="#"><strong><em>20 Users Online</em></strong></a></li>
                    </ul>
                    <!-- /.navbar-top-links -->
                </div>

            </nav><!-- /.navbar-static-top -->

            <div class="row">