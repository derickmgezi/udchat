            </div><!-- /#page-wrapper -->

        </div><!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    {{HTML::script("js/jquery-1.10.2.min.js")}}
    {{HTML::script("js/bootstrap.min.js")}}
    {{HTML::script("js/jquery.metisMenu.js")}}
    {{HTML::script("js/jquery.udchat.js")}}

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
    
    @if(Session::get('global') == 'debate_suggestions')
        <script>
                $('#suggestionsModal').fadeIn(100,function(){
                    $('#suggestionsModal').modal('show');
                });
            </script>
    @endif

    @if(Session::get('global') == 'edit_suggestion')
        <script>
                $('#suggestModal').fadeIn(100,function(){
                    $('#suggestModal').modal('show');
                });
            </script>
    @endif
    
    @if(Session::get('global') == 'success_message')
        <script>
                $('#successMessageModal').fadeIn(100,function(){
                    $('#successMessageModal').modal('show');
                });
                
               
                 
            </script>
    @endif



    </body>

</html>