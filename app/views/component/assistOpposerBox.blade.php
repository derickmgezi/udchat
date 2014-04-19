<li>
    <div class="timeline-badge warning">
        <span class="glyphicon glyphicon-hand-up"></span>
    </div>
    <div class="timeline-panel">
        <div class="timeline-heading">
            <h4 class="timeline-title">Stranger</h4>
            <p>
                <small class="text-muted">
                    <span class="glyphicon glyphicon-time"></span> 11 hours ago <strong class="pull-right">2 Likes</strong>
                </small>
            </p>
        </div>
        <div class="timeline-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
            <hr>
            <button type="button" class="btn btn-primary pull-right">
                <span class="fa fa-thumbs-o-up"></span> Like
            </button>
            <div class="btn-group">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                    <span class="fa fa-cogs"></span> 
                    <i class="fa fa-chevron-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li data-toggle="modal" data-target="#editModal"><a href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                    </li>
                    <li><a href="#"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </li>
                    <!--<li class="divider"></li>
                    <li><a href="#">Separated link</a>
                    </li>-->
                </ul>
            </div>
        </div>
    </div>
</li>

<!--Point of Addition to Opposition Modal -->
<div class="modal fade" id="POAopposeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-panel panel panel-default">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><a href="#"><span class="fa fa-shield"></span> Point of Addition</a></h4>
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
                            <button class="btn btn-warning btn-lg" id="btn-chat">
                                <span class="glyphicon glyphicon-hand-up"></span>
                            </button>
                        </span>
                    </div>
                </ul>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->