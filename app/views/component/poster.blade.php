<div class="col-lg-6">
                                <div class="panel panel-default">
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
                                    </div>
                                    <div class="panel-footer">
                                        <ul class="chat">
                                            <li class="left clearfix">
                                                <strong class="text-muted">
                                                    <span class="glyphicon glyphicon-time"></span> 2 days ago
                                                </strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-thumbs-up"></span> 2 likes
                                                </small>
                                            </li>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#UTAWALAcommentModal">
                                                <span class="glyphicon glyphicon-eye-open"></span> View Comments
                                            </button>
                                            <button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#changeImageModal">
                                                <span class="fa fa-edit"></span> Change Posters
                                            </button>
                                        </ul>
                                        <!--comment Modal -->
                                        <div class="modal fade" id="UTAWALAcommentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content chat-panel panel panel-default">
                                                    <div class="modal-header panel-heading"> 
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel"><a href="#"><span class="glyphicon glyphicon-inbox"></span> 4 Comments</a></h4>
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
                                                                            <span class="glyphicon glyphicon-time"></span> 2 days ago
                                                                        </small>
                                                                    </div>
                                                                    <p>
                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                            <li class="right clearfix">
                                                                <button type="button" class="btn btn-danger btn-circle btn-lg pull-right">
                                                                    <span class="glyphicon glyphicon-user"></span>
                                                                </button>
                                                                <div class="chat-body clearfix">
                                                                    <div class="header">
                                                                        <small class=" text-muted">
                                                                            <span class="glyphicon glyphicon-time"></span> 13 mins ago</small>
                                                                        <strong class="pull-right primary-font">Peter de Don</strong>
                                                                    </div>
                                                                    <p>
                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                                                    </p>
                                                                </div>
                                                            </li>
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
                                                            <li class="right clearfix">
                                                                <button type="button" class="btn btn-danger btn-circle btn-lg pull-right">
                                                                    <span class="glyphicon glyphicon-user"></span>
                                                                </button>
                                                                <div class="chat-body clearfix">
                                                                    <div class="header">
                                                                        <small class=" text-muted">
                                                                            <span class="glyphicon glyphicon-time"></span> 15 mins ago</small>
                                                                        <strong class="pull-right primary-font">Peter de Don</strong>
                                                                    </div>
                                                                    <p>
                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        <!--Change Image Modal -->
                                        <div class="modal fade" id="changeImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content panel panel-default">
                                                    <div class="modal-header panel-heading"> 
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel"><a href="#"><span class="glyphicon glyphicon-camera"></span> Change Images</a></h4>
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
                                                        <button type="button" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        <!--Edit Content Modal -->
                                        <div class="modal fade" id="editContentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content custom-panel panel panel-default">
                                                    <div class="modal-header panel-heading">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel"><a href="#"><span class="glyphicon glyphicon-edit"></span> Edit Content</a></h4>
                                                    </div>
                                                    <div class="modal-body panel-body">
                                                        <textarea class="form-control" rows="10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.</textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary btn-lg">Save changes</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </div>
                                    <div class="panel-body">
                                        <p>
                                        <blockquote>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </blockquote>
                                        </p>
                                        <button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#editContentModal">
                                            <span class="fa fa-edit"></span> Edit Poster Content
                                        </button>
                                    </div>
                                    <div class="panel-footer">
                                        <center>
                                            <button type="button" class="btn btn-danger" id="delete" data-container="body" data-html="true" data-toggle="popover" title="Are you sure?" data-content="<button class='btn btn-danger'>yes</button>&nbsp;<button class='btn btn-default' id='cancel'>cancel</button>"><span class="glyphicon glyphicon-trash"></span> Delete Poster</button>
                                        </center>
                                    </div>
                                </div>
                                <hr>
                            </div><!-- /.col-lg-6 -->