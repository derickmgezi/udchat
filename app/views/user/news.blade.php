@include('frame.mainHeader+sidebar')

                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header"><div class="alert alert-warning"><div class="text-info">UDSM News</div></div></h2>
                        <div class="row">
                            @include('component.newsBox')
                            @include('component.newsBox')
                        </div><!-- /rpw -->
                    </div><!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <h2 class="page-header"><div class="alert alert-warning"><div class="text-info">College News</div></div></h2>
                        <div class="row">
                            @include('component.newsBox')
                            @include('component.newsBox')
                        </div><!-- /row -->
                    </div><!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <h2 class="page-header"><div class="alert alert-warning"><div class="text-info">From Our Top Correspondents</div></div></h2>
                        <div class="row">
                            @include('component.newsBox')
                            @include('component.newsBox')
                        </div><!-- /row -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

@include('frame.mainFooter')