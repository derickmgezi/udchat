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
    
    @if(Session::has('propose_suggestion_modal'))
        <script>
                $('#proposeModal').fadeIn(100,function(){
                    $('#proposeModal').modal('show');
                });
        </script>
        <?php Session::forget('propose_suggestion_modal'); ?>
    @endif
    
    @if(Session::has('oppose_suggestion_modal'))
        <script>
                $('#opposeModal').fadeIn(100,function(){
                    $('#opposeModal').modal('show');
                });
        </script>
        <?php Session::forget('oppose_suggestion_modal'); ?>
    @endif
    
    @if(Session::has('debate_comment'))
        <script>
                $('#editModal').fadeIn(100,function(){
                    $('#editModal').modal('show');
                });
        </script>
        <?php Session::forget('debate_comment'); ?>
    @endif
    
    @if(Session::has('debate_comment_infor'))
        <script>
                $('#pointOfAdditionModal').fadeIn(100,function(){
                    $('#pointOfAdditionModal').modal('show');
                });
        </script>
        <?php Session::forget('debate_comment_infor'); ?>
    @endif

    </body>

</html>