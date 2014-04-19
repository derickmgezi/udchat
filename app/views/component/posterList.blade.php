<div class="panel panel-default custom-panel">
    <div class="panel-heading">
        <div id="carousel1" class="carousel slide" data-ride="carousel" data-interval="15000">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel1" data-slide-to="1"></li>
                <li data-target="#carousel1" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <a href="#" data-toggle="modal" data-target="#posterModal">{{HTML::image('image/1958298_731473720217722_757409130_n.jpg','',array ('class'=>'img-responsive'))}}</a>
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <a href="#">{{HTML::image('image/1932398_731521816872203_496776285_n.png','',array ('class'=>'img-responsive'))}}</a>
                    <div class="carousel-caption">

                    </div>
                </div><div class="item">
                    <a href="#">{{HTML::image('image/62064_708425345855893_747639324_n.jpg','',array ('class'=>'img-responsive'))}}</a>
                    <div class="carousel-caption">

                    </div>
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel1" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel1" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div><!-- /.col-lg-12 -->
    <div class="panel-heading">
        <div id="carousel2" class="carousel slide" data-ride="carousel" data-interval="15000">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel2" data-slide-to="0" class="active"></li>
                <li data-target="#carousel2" data-slide-to="1"></li>
                <li data-target="#carousel2" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <a href="#">{{HTML::image('image/1504397_623659181003771_1699283824_o.jpg','',array ('class'=>'img-responsive'))}}</a>
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <a href="#" data-toggle="modal" data-target="#posterModal">{{HTML::image('image/1888674_720210111344083_1899269562_n.jpg','',array ('class'=>'img-responsive'))}}</a>
                    <div class="carousel-caption">

                    </div>
                </div><div class="item">
                    <a href="#">{{HTML::image('image/1507870_714874508536934_1309334546_n.png','',array ('class'=>'img-responsive'))}}</a>
                    <div class="carousel-caption">

                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel2" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel2" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div id="carousel3" class="carousel slide" data-ride="carousel" data-interval="15000">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel3" data-slide-to="0" class="active"></li>
                <li data-target="#carousel3" data-slide-to="1"></li>
                <li data-target="#carousel3" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <a href="#">{{HTML::image('image/1525566_716689471688771_1902287854_n.png','',array ('class'=>'img-responsive'))}}</a>
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <a href="#">{{HTML::image('image/1622290_656278097741879_33077804_o.jpg','',array ('class'=>'img-responsive'))}}</a>
                    <div class="carousel-caption">

                    </div>
                </div><div class="item">
                    <a href="#" data-toggle="modal" data-target="#posterModal">{{HTML::image('image/734358_553660431332386_756408789_n.jpg','',array ('class' => 'img-responsive'))}}</a>
                    <div class="carousel-caption">

                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel3" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel3" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>

<!--Preview Poster Modal -->
<div class="modal fade" id="posterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default">
            <div class="panel-heading">
                <ul class="chat">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#UTAWALAcommentModal">
                        <span class="glyphicon glyphicon-eye-open"></span> View Comments
                    </button>
                    <button type="button" class="btn btn-primary pull-right">
                        <span class="fa fa-thumbs-o-up"></span> like
                    </button>
                    <small class="my-pull-right text-muted">
                        <span class="glyphicon glyphicon-thumbs-up"></span> 2 likes &nbsp;
                    </small>
                </ul> 
            </div>
            <div class="panel-body">

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            {{HTML::image('image/1958298_731473720217722_757409130_n.jpg','',array ('class'=>'img-responsive'))}}
                            <div class="carousel-caption">
                                UDSM
                            </div>
                        </div>
                        <div class="item">
                            {{HTML::image('image/1888674_720210111344083_1899269562_n.jpg','',array ('class'=>'img-responsive'))}}
                            <div class="carousel-caption">
                                UTAWALA
                            </div>
                        </div><div class="item">
                            {{HTML::image('image/734358_553660431332386_756408789_n.jpg','',array ('class' => 'img-responsive'))}}
                            <div class="carousel-caption">
                                NKURUMA
                            </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
                <hr>
                <blockquote>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                </blockquote>
            </div>
            <div class="modal-footer panel-footer">
                <div class="input-group">
                    <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your comment here..." />
                    <span class="input-group-btn">
                        <button class="btn btn-success btn-sm" id="btn-chat">
                            <span class="glyphicon glyphicon-send"></span>
                        </button>
                    </span>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
