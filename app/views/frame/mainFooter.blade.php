            </div><!-- /#page-wrapper -->

        </div><!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    {{HTML::script("js/jquery-1.10.2.min.js")}}
    {{HTML::script("js/bootstrap.min.js")}}
    {{HTML::script("js/jquery.metisMenu.js")}}

    <!-- SB Admin Scripts - Include with every page -->
    {{HTML::script("js/sb-admin.js")}}

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    {{HTML::script("js/dashboard-demo.js")}}
    
    @if(Session::has('messageInfor'))
        <script>
                $('#chatModal').fadeIn(100,function(){
                    $('#chatModal').modal('show');
                });
            </script>
            <?php Session::forget('messageInfor'); ?>
    @endif


    </body>

</html>