<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <strong>
            {{Auth::user()->nick_name}}
        </strong> <i class="fa fa-chevron-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a>
        </li>
        <li class="divider"></li>
        <li><a href="{{URL::route('signout')}}"><span class="glyphicon glyphicon-off"></span> Logout</a>
        </li>
    </ul>
    <!-- /.dropdown-user -->
</li><!-- /.dropdown -->