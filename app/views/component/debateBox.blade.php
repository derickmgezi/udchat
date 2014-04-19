<div class="panel panel-default">
    <div class="panel-heading">
        <ul class="chat">
            <li class="left clearfix">
                <a href="#" title="View My Full Profile">
                    <img title="" height="50" width="50" class="img-responsive pull-left img-circle" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAAErUlEQVR4Xu3YwStscRjG8d8QQnZEFkqyY6NE/n0rlOxkS1ZqrCiFe/udOtPcue6YJ889Gc93Vtz7eo/3eT/9zjl6/X7/V+FDAhMm0APMhElR1iQAGCBICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpAcBIcVEMGAxICQBGiotiwGBASgAwUlwUAwYDUgKAkeKiGDAYkBIAjBQXxYDBgJQAYKS4KAYMBqQEACPFRTFgMCAlABgpLooBgwEpgakH8/7+Xs7Ozsrz83M5OTkpi4uLfwRwd3dXbm5uyvr6etnf32/+r9/vl6urq1J/tn729vbKxsbGRMF1fb2JfqkOi6YazOvrazk9PS1vb2+l1+v9BaZd7tPT0wBM+zNLS0vl6OioXF5eNtjq13Nzc2Oj7/p6HTqY+FJTC2Z4eXXaj8BcX1+Xh4eHUmvX1taaE6Y9cba3t8vOzs7g+3rKzM/PNyfP8vJyA6j+/P39fXMCra6uDnC6rjfpqTbxNjsonGowFxcX5eDgYHBKDN+S2tvO1tZWub29/RRMC6ieOI+Pj+X4+Licn5+X9iSq6P7H9TrYsfUSUwumTeGjZ4r232ZmZsru7m5zarQnTHtqjJ4w7feT3naGn5m+cj3rNjto9iPBDN9K2tvMZ7ekFkzNvJ4y9YQaflAeB/Sr1+tgz7ZL/DgwCwsLzVtTfdAd/aysrJTNzc3mremjZ5j6TNHeyuoD8MvLy19vUKMn2levZ9tkR41+HJjR1+oWQHvCjHtLmp2dbbDVt67Dw8PmpKlfD79BffZarVzvs7eyjgxIl4kDM+7vMP96vhm+Nalgxl1P2tQ3KZ56MN8kx5hfAzAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gwKGE+OMV0AE7Nqz6CA8eQY0wUwMav2DAoYT44xXQATs2rPoIDx5BjTBTAxq/YMChhPjjFdABOzas+ggPHkGNMFMDGr9gz6G1HzSbXtC7t7AAAAAElFTkSuQmCC">
                </a>
                <div class="chat-body clearfix">
                    <div class="header">
                        <strong class="primary-font">Sillent Killer</strong> 
                        <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-time"></span> 12 mins ago
                        </small>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                    </p>
                </div>
            </li>
        </ul>
        <div class="btn-group">
            <button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown">
                <span class="fa fa-cogs">&nbsp;&nbsp;</span><strong>Action </strong> <i class="fa fa-chevron-down"></i>
            </button>
            <ul class="dropdown-menu slidedown">
                <li>
                    <a href="#" data-toggle="modal" data-target="#proposeModal">
                        <span class="fa fa-thumbs-up"></span> <strong>Propose</strong>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#opposeModal">
                        <span class="fa fa-thumbs-down"></span> <strong>Oppose</strong>
                    </a>
                </li>
            </ul>
        </div>
    </div><!-- /.panel-heading -->
    <div class="panel-body">
        <ul class="timeline">
            @include('component.opposerBox')
            @include('component.assistOpposerBox')
            @include('component.proposerBox')
            @include('component.assistProposerBox')
        </ul>
    </div><!-- /.panel-body -->
</div><!-- /.panel -->

<!--Propose Modal -->
<div class="modal fade" id="proposeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-panel panel panel-default">
            <div class="modal-header panel-heading"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><a href="#"><span class="glyphicon glyphicon-transfer"></span> Debate</a></h4>
            </div>
            <div class="modal-body panel-body">
                <ul class="chat">
                    <li class="left clearfix">
                        <button type="button" class="btn btn-info btn-circle btn-lg pull-left">
                            <span class="glyphicon glyphicon-user"></span>
                        </button>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">Sillent Killer</strong> 
                                <small class="pull-right text-muted">
                                    <span class="glyphicon glyphicon-time"></span> 14 mins ago</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                            </p>
                        </div>
                    </li>
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-lg" placeholder="Type your proposal here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-success btn-lg" id="btn-chat">
                                <span class="fa fa-thumbs-up"></span>
                            </button>
                        </span>
                    </div>
                </ul>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Oppose Modal -->
<div class="modal fade" id="opposeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-panel panel panel-default">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><a href="#"><span class="glyphicon glyphicon-transfer"></span> Debate</a></h4>
            </div>
            <div class="modal-body panel-body">
                <ul class="chat">
                    <li class="left clearfix">
                        <button type="button" class="btn btn-info btn-circle btn-lg pull-left">
                            <span class="glyphicon glyphicon-user"></span>
                        </button>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">Sillent Killer</strong> 
                                <small class="pull-right text-muted">
                                    <span class="glyphicon glyphicon-time"></span> 14 mins ago</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                            </p>
                        </div>
                    </li>
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-lg" placeholder="Type your opposal here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-danger btn-lg" id="btn-chat">
                                <span class="fa fa-thumbs-down"></span>
                            </button>
                        </span>
                    </div>
                </ul>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-panel panel panel-default">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><a href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a></h4>
            </div>
            <div class="modal-body panel-body">
                <textarea class="form-control" rows="3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.
                </textarea>
            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-primary btn-lg btn-block">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->