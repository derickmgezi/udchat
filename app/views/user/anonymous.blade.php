@include('frame.mainHeader+sidebar')

                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header my-Calibri-Font">Chat Anonymously</h2>
                    </div><!-- /.col-lg-12 -->
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12">
                                @include('component.anonymousChatBox')
                            </div><!-- /.col-lg-12 -->
                            <div class="col-lg-12">
                                <h2 class="page-header my-Calibri-Font">Previous Anonymous Conversations</h2>
                                <div class="row">
                                    <div class="col-lg-12">
                                        @include('component.anonymousConversationBox')
                                    </div><!-- /.col-lg-12 -->
                                </div><!-- /.row -->
                            </div><!-- /.col-lg-12 -->
                        </div><!-- /row -->
                    </div><!-- /.col-lg-8 -->
                    <div class="col-lg-4">
                        @include('component.posterList')
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
                
@include('frame.mainFooter')
