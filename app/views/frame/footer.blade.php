</div> <!-- /row -->

            <!--Displays the Social Media Icons when Internet is Available-->
            <div class="row">
                <div class="col-lg-12 text-center v-center" style="font-size:39pt;">
                    <a href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i class="fa fa-facebook"></i></a>  <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-github"></i></a> <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
            </div><!-- /row -->

        </div> <!-- /container full -->

        <!--Footer-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br><br>
                    <i class="glyphicon glyphicon-"></i>
                    <p class="pull-right"><a href="#">UDCHAT Team</a>&nbsp; ©Copyright<sup>TM</sup> 2013</p>
                    <br><br>
                </div>
            </div>
        </div> <!-- end Footer-->

        {{HTML::script("js/jquery-1.10.2.min.js")}}
        {{HTML::script("js/bootstrap.min.js")}}
        
        @if(Session::get('global')=='signup')
            <script>
                $('#signupModal').fadeIn(100,function(){
                    $('#signupModal').modal('show');
                });
            </script>
        @endif
        
        @if(Session::get('global')=='login' || Session::get('global')=='Account Credentials Dont Match')
            <script>
                $('#loginModal').fadeIn(100,function(){
                    $('#loginModal').modal('show');
                });
            </script>
        @endif
        
    </body>
</html>