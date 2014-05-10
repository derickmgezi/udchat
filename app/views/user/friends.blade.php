@include('frame.mainHeader+sidebar')

                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header my-Calibri-Font"><div class="alert alert-warning"><div class="text-info">Chat With Friends</div></div></h2>
                    </div><!-- /.col-lg-12 -->
                    <div class="col-lg-8">
                        <div class="row">
                            @include('component.friendChatBox')
                            @include('component.friendConversationBox')
                        </div><!-- /row -->
                    </div><!-- /.col-lg-8 -->
                    <div class="col-lg-4">
                        @include('component.posterList')
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
                
@include('frame.mainFooter')
          