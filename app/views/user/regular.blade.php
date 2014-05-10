@include('frame.mainHeader+sidebar')

<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">
            <img alt="..." height="140" width="140" class="img-responsive pull-left img-circle" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAAErUlEQVR4Xu3YwStscRjG8d8QQnZEFkqyY6NE/n0rlOxkS1ZqrCiFe/udOtPcue6YJ889Gc93Vtz7eo/3eT/9zjl6/X7/V+FDAhMm0APMhElR1iQAGCBICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpgakH8/7+Xs7Ozsrz83M5OTkpi4uLfwRwd3dXbm5uyvr6etnf32/+r9/vl6urq1J/tn729vbKxsbGRMF1fb2JfqkOi6YazOvrazk9PS1vb2+l1+v9BaZd7tPT0wBM+zNLS0vl6OioXF5eNtjq13Nzc2Oj7/p6HTqY+FJTC2Z4eXXaj8BcX1+Xh4eHUmvX1taaE6Y9cba3t8vOzs7g+3rKzM/PNyfP8vJyA6j+/P39fXMCra6uDnC6rjfpqTbxNjsonGowFxcX5eDgYHBKDN+S2tvO1tZWub29/RRMC6ieOI+Pj+X4+Licn5+X9iSq6P7H9TrYsfUSUwumTeGjZ4r232ZmZsru7m5zarQnTHtqjJ4w7feT3naGn5m+cj3rNjto9iPBDN9K2tvMZ7ekFkzNvJ4y9YQaflAeB/Sr1+tgz7ZL/DgwCwsLzVtTfdAd/aysrJTNzc3mremjZ5j6TNHeyuoD8MvLy19vUKMn2levZ9tkR41+HJjR1+oWQHvCjHtLmp2dbbDVt67Dw8PmpKlfD79BffZarVzvs7eyjgxIl4kDM+7vMP96vhm+Nalgxl1P2tQ3KZ56MN8kx5hfAzAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gz6G1HzSbXtC7t7AAAAAElFTkSuQmCC">
            <br>&nbsp;<strong class="my-Antic-Slab-Font">UTAWALA</strong>
            <button class="btn btn-warning pull-right" data-toggle="modal" data-target="#newHeadingModal">
                <i class="fa fa-plus-square"></i> Add Advert
            </button>
        </h2>                    
    </div><!-- /.col-lg-12 -->
    <br>
    <div class="col-lg-12">
        <h2 class="page-header">
            <div class="alert alert-warning">
                <div class="text-info">
                    <span class="my-Calibri-Font">Previous Adverts</span>
                    <div class="input-group col-lg-4 col-lg-offset-4 pull-right">
                        <select class="form-control">
                            <option disabled selected>Arrage By...</option>
                            <option>Most Likes</option>
                            <option>Most Comments</option>
                            <option>Time Created</option>
                        </select>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-refresh"></span></button>
                        </span>
                    </div><!-- /input-group -->
                </div>
            </div>
        </h2>
        <div class="row">
            @include('component.advertBox')
            @include('component.advertBox')
            @include('component.advertBox')
        </div><!-- /row -->
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<!--New Heading Modal -->
<div class="modal fade" id="newHeadingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><a href="#"><span class="glyphicon glyphicon-edit"></span> Write Advert Title</a></h4>
            </div>
            <div class="panel-body">
                <textarea class="form-control" rows="2"></textarea>
            </div>
            <div class="panel-footer modal-footer">
                <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" data-toggle="modal" data-target="#newImageModal">Continue <i class="fa fa-chevron-circle-right"></i></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--New Image Modal -->
<div class="modal fade" id="newImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><a href="#"><span class="glyphicon glyphicon-camera"></span> Add Advert Image(s)</a></h4>
            </div>
            <div class="modal-body panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Reveal Up Full -->
                        <div class="image revealUpFull">
                            {{HTML::image('image/700x400.gif','',array('class'=>'responsive','height'=>'145','width'=>'254'))}}
                            <div class="title">
                                <span class="titleContent" style="opacity: 0.7">
                                    <i class="fa fa-edit"></i> Edit <br><br>
                                    <button class="btn btn-warning"><i class="fa fa-refresh"></i> change</button>
                                    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> delete</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Reveal Up Full -->
                        <div class="image revealUpFull">
                            {{HTML::image('image/700x400.gif','',array('class'=>'responsive','height'=>'145','width'=>'254'))}}
                            <div class="title">
                                <span class="titleContent" style="opacity: 0.7">
                                    <i class="fa fa-edit"></i> Edit <br><br>
                                    <button class="btn btn-warning"><i class="fa fa-refresh"></i> change</button>
                                    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> delete</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Reveal Up Full -->
                        <div class="image revealUpFull">
                            {{HTML::image('image/700x400.gif','',array('class'=>'responsive','height'=>'145','width'=>'254'))}}
                            <div class="title">
                                <span class="titleContent" style="opacity: 0.7">
                                    <i class="fa fa-edit"></i> Edit <br><br>
                                    <button class="btn btn-warning"><i class="fa fa-refresh"></i> change</button>
                                    <button class="btn btn-danger"><i class="fa fa-trash-o"></i> delete</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Reveal Up Full -->
                        <div class="image revealUpFull">
                            {{HTML::image('image/700x400.gif','',array('class'=>'responsive','height'=>'145','width'=>'254'))}}
                            <div class="title">
                                <span class="titleContent" style="opacity: 0.7">
                                    <i class="fa fa-plus-square"></i> Add <br><br>
                                    <button class="btn btn-warning"><i class="fa fa-plus"></i> add</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer panel-footer">
                <button type="button" class="btn btn-warning btn-lg pull-left" data-dismiss="modal" data-toggle="modal" data-target="#newHeadingModal"><i class="fa fa-chevron-circle-left"></i> Back</button>
                <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" data-toggle="modal" data-target="#newContentModal">Continue <i class="fa fa-chevron-circle-right"></i></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--New Content Modal -->
<div class="modal fade" id="newContentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><a href="#"><span class="glyphicon glyphicon-edit"></span> Write Advert Content</a></h4>
            </div>
            <div class="panel-body">
                <textarea class="form-control" rows="7"></textarea>
            </div>
            <div class="modal-footer panel-footer">
                <button type="button" class="btn btn-warning btn-lg pull-left" data-dismiss="modal" data-toggle="modal" data-target="#newImageModal"><i class="fa fa-chevron-circle-left"></i> Back</button>
                <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal" data-toggle="modal" data-target="#previewAdvertModal"><i class="fa fa-eye"></i> Preview Advert</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Preview Advert Modal -->
<div class="modal fade" id="previewAdvertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-default">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><hr>
                <ul class="chat">
                    <li class="left clearfix">
                        <a href="#" title="View My Full Profile">
                            <img alt="..." height="50" width="50" class="img-responsive pull-left img-circle" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAAErUlEQVR4Xu3YwStscRjG8d8QQnZEFkqyY6NE/n0rlOxkS1ZqrCiFe/udOtPcue6YJ889Gc93Vtz7eo/3eT/9zjl6/X7/V+FDAhMm0APMhElR1iQAGCBICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpgakH8/7+Xs7Ozsrz83M5OTkpi4uLfwRwd3dXbm5uyvr6etnf32/+r9/vl6urq1J/tn729vbKxsbGRMF1fb2JfqkOi6YazOvrazk9PS1vb2+l1+v9BaZd7tPT0wBM+zNLS0vl6OioXF5eNtjq13Nzc2Oj7/p6HTqY+FJTC2Z4eXXaj8BcX1+Xh4eHUmvX1taaE6Y9cba3t8vOzs7g+3rKzM/PNyfP8vJyA6j+/P39fXMCra6uDnC6rjfpqTbxNjsonGowFxcX5eDgYHBKDN+S2tvO1tZWub29/RRMC6ieOI+Pj+X4+Licn5+X9iSq6P7H9TrYsfUSUwumTeGjZ4r232ZmZsru7m5zarQnTHtqjJ4w7feT3naGn5m+cj3rNjto9iPBDN9K2tvMZ7ekFkzNvJ4y9YQaflAeB/Sr1+tgz7ZL/DgwCwsLzVtTfdAd/aysrJTNzc3mremjZ5j6TNHeyuoD8MvLy19vUKMn2levZ9tkR41+HJjR1+oWQHvCjHtLmp2dbbDVt67Dw8PmpKlfD79BffZarVzvs7eyjgxIl4kDM+7vMP96vhm+Nalgxl1P2tQ3KZ56MN8kx5hfAzAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gz6G1HzSbXtC7t7AAAAAElFTkSuQmCC">
                        </a>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">UTAWALA</strong>&nbsp;&nbsp;&nbsp;
                                <small class="text-muted pull-right">
                                    <span class="glyphicon glyphicon-time"></span>12 mins ago
                                </small>

                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                            </p>
                        </div>
                        <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-thumbs-up"></span> 2 likes
                        </small>
                        <button type="button" class="btn btn-primary">
                            <span class="fa fa-thumbs-o-up"></span> Like
                        </button>
                    </li>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#UTAWALAcommentModal">
                        <span class="glyphicon glyphicon-eye-open"></span> View Comments
                    </button>
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
                            {{HTML::image("image/700x400.gif")}}
                            <div class="carousel-caption">
                                UDSM
                            </div>
                        </div>
                        <div class="item">
                            {{HTML::image("image/700x400.gif")}}
                            <div class="carousel-caption">
                                UTAWALA
                            </div>
                        </div><div class="item">
                            {{HTML::image("image/700x400.gif")}}
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
                <br>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#p1" data-toggle="tab">Page 1</a></li>
                    <li><a href="#p2" data-toggle="tab">Page 2</a></li>
                    <li><a href="#p3" data-toggle="tab">Page 3</a></li>
                    <!--<li><a href="#3" data-toggle="tab">Page 4</a></li>
                    <li><a href="#3" data-toggle="tab">Page 5</a></li>-->
                </ul>
                <br>
                <div class="tabbable">
                    <div class="tab-content">
                        <div class="tab-pane active" id="p1">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                            </p>
                        </div>
                        <div class="tab-pane" id="p2">
                            <p>
                                Korem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                            </p>
                        </div>
                        <div class="tab-pane" id="p3">
                            <p>
                                Dorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                            </p>
                        </div>
                    </div>
                </div> <!-- /tabbable -->
            </div>
            <div class="modal-footer panel-footer">
                <button type="button" class="btn btn-warning btn-lg pull-left" data-dismiss="modal" data-toggle="modal" data-target="#newContentModal"><i class="fa fa-chevron-circle-left"></i> Back</button>
                <button type="button" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Save Advert</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@include('frame.mainFooter')