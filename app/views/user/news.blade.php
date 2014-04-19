@include('frame.mainHeader+sidebar')

                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">UDSM News</h2>
                        <div class="row">
                            @include('component.newsBox')
                            @include('component.newsBox')
                        </div><!-- /rpw -->
                    </div><!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <h2 class="page-header">College News</h2>
                        <div class="row">
                            @include('component.newsBox')
                            @include('component.newsBox')
                        </div><!-- /row -->
                    </div><!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <h2 class="page-header">From Our Top Correspondents</h2>
                        <div class="row">
                            @include('component.newsBox')
                            @include('component.newsBox')
                        </div><!-- /row -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->

@include('frame.mainFooter')