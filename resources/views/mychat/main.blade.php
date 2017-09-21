<!DOCTYPE html>
<html lang="en">

	<head>
	
		<!-- Basic -->
    	<meta charset="UTF-8" />

		<title>Dashboard | Nadhif - Responsive Admin Template</title>
		
		<!-- Mobile Metas -->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Import google fonts -->
        <link href="http://fonts.useso.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css" />
        
		<!-- Favicon and touch icons -->
		<link rel="shortcut icon" href="assets/ico/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="assets/ico/apple-touch-icon.png" />
		<link rel="apple-touch-icon" sizes="57x57" href="assets/ico/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="assets/ico/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="assets/ico/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="assets/ico/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="assets/ico/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="assets/ico/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="assets/ico/apple-touch-icon-152x152.png" />
		
	    <!-- start: CSS file-->
		
		<!-- Vendor CSS-->
		<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/vendor/skycons/css/skycons.css" rel="stylesheet" />
		<link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
		
		<!-- Plugins CSS-->		
		<link href="assets/plugins/bootkit/css/bootkit.css" rel="stylesheet" />	
		<link href="assets/plugins/scrollbar/css/mCustomScrollbar.css" rel="stylesheet" />
		<link href="assets/plugins/fullcalendar/css/fullcalendar.css" rel="stylesheet" />
		<link href="assets/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css" rel="stylesheet" />
		<link href="assets/plugins/xcharts/css/xcharts.min.css" rel="stylesheet" />
		<link href="assets/plugins/morris/css/morris.css" rel="stylesheet" />

        <link href="assets/css/smartMenu.css" rel="stylesheet" />
		
		<!-- Theme CSS -->
		<link href="assets/css/jquery.mmenu.css" rel="stylesheet" />
		
		<!-- Page CSS -->		
		<link href="assets/css/style.css" rel="stylesheet" />
		<link href="assets/css/add-ons.min.css" rel="stylesheet" />
		
		<!-- end: CSS file-->	
	    
		
		<!-- Head Libs -->
        <script src="assets/js/jquery-1.7.1.min.js"></script>
        <script src="assets/js/jquery-smartMenu.js"></script>
        <script src="assets/js/mychat.js"></script>

		<![endif]-->



	
	<body>
	
		
		<!-- Start: Content -->
		<div class="container-fluid content">	
			<div class="row">		
				<!-- Main Page -->
				<div class="main ">

                    <div class="smallcard col-lg-3 col-md-4 col-lg-offset-5 col-md-offset-4" id="editGroup">
                        <div class="panel bk-widget bk-border-off">
                            <div class="panel-heading bk-bg-primary text-center bk-padding-top-10 bk-padding-bottom-10">
                                <div class="row">
                                    <div class="col-xs-8 text-left bk-vcenter">
                                        <i class="fa fa-folder-open"></i><strong>    Move to Group...</strong>
                                    </div>
                                    <div class="col-xs-4 bk-vcenter text-right">
                                        <div >
                                            <a href="javascript:;" class="btn-close" id="editGroup-close"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body bk-bg-white">
                                <div class="input-group">
                                    <input type="text" id="moveGroup" name="groupName" class="form-control" />
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary" id="comfirmGroup"><i class="fa fa-check"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="smallcard col-lg-3 col-md-4 col-lg-offset-5 col-md-offset-4" id="renameGroup">
                        <div class="panel bk-widget bk-border-off">
                            <div class="panel-heading bk-bg-primary text-center bk-padding-top-10 bk-padding-bottom-10">
                                <div class="row">
                                    <div class="col-xs-8 text-left bk-vcenter">
                                        <i class="fa fa-pencil"></i><strong>    Rename the group</strong>
                                    </div>
                                    <div class="col-xs-4 bk-vcenter text-right">
                                        <div >
                                            <a href="javascript:;" class="btn-close" id="renameGroup-close"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body bk-bg-white">
                                <div class="input-group">
                                    <input type="text" id="renameGroup_in" name="groupName" class="form-control" />
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary" id="cfm_ren_Group"><i class="fa fa-check"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="smallcard col-lg-3 col-md-4 col-lg-offset-5 col-md-offset-4" id="createGroup">
                        <div class="panel bk-widget bk-border-off">
                            <div class="panel-heading bk-bg-primary text-center bk-padding-top-10 bk-padding-bottom-10">
                                <div class="row">
                                    <div class="col-xs-8 text-left bk-vcenter">
                                        <i class="fa fa-plus"></i><strong>    Create a new group</strong>
                                    </div>
                                    <div class="col-xs-4 bk-vcenter text-right">
                                        <div >
                                            <a href="javascript:;" class="btn-close" id="createGroup-close"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body bk-bg-white">
                                <div class="input-group">
                                    <input type="text" id="createGroup_in" name="groupName" class="form-control" />
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary" id="cfm_create_Group"><i class="fa fa-check"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="smallcard col-lg-3 col-md-4 col-lg-offset-5 col-md-offset-4" id="newFriend">
                        <div class="panel bk-widget bk-border-off">
                            <div class="panel-heading bk-bg-primary text-center bk-padding-top-10 bk-padding-bottom-10">
                                <div class="row">
                                    <div class="col-xs-8 text-left bk-vcenter">
                                        <i class="fa fa-plus"></i><strong>    Add a new friend</strong>
                                    </div>
                                    <div class="col-xs-4 bk-vcenter text-right">
                                        <div >
                                            <a href="javascript:;" class="btn-close" id="newFriend-close"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body bk-bg-white">
                                <div class="input-group">
                                    <input type="text" id="newFriend_in" name="groupName" class="form-control" placeholder="Email of new friend"/>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary" id="newFriend_check"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="datacard  col-lg-offset-6 col-md-offset-6">
                    <div class="panel bk-widget bk-border-off">
                        <div class="panel-heading bk-bg-primary text-center bk-padding-top-10 bk-padding-bottom-10">
                            <div class="row">
                                <div class="col-xs-8 text-left bk-vcenter">
                                    <i class="fa fa-user"></i><strong>    Information Card</strong>
                                </div>
                                <div class="col-xs-4 bk-vcenter text-right">
                                    <div >
                                        <a href="javascript:;" class="btn-close" id="datacard-close"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body text-left bk-bg-white no-padding-bottom">
                            <div class="row">
                                <div class="col-xs-8 bk-vcenter">
                                    <h4 class="bk-margin-off" id="friend_name"></h4>
                                    <small id="friend_username"></small>
                                    <h6 id="friend_state"></h6>
                                </div>
                                <div class="col-xs-4 bk-vcenter text-right">
                                    <div class="bk-avatar">
                                        <img src="assets/img/avatar.jpg" alt="" class="img-circle bk-img-60">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body bk-bg-white">
                            <ul class="infoShow">
                                <li id="friend_gender"></li>
                                <li id="friend_region"></li>
                                <li id="friend_intro"></li>
                            </ul>
                        </div>

                    </div>
                    </div>

                    <div class="datacard_edit  col-lg-offset-6 col-md-offset-6" id="card_edit">
                        <div class="panel bk-widget bk-border-off">
                            <div class="panel-heading bk-bg-primary text-center bk-padding-top-10 bk-padding-bottom-10">
                                <div class="row">
                                    <div class="col-xs-8 text-left bk-vcenter">
                                        <i class="fa fa-user"></i><strong>    Information Card</strong>
                                    </div>
                                    <div class="col-xs-4 bk-vcenter text-right">
                                        <div >
                                            <a href="javascript:;" class="btn-close" id="datacard_edit-close"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body text-left bk-bg-white no-padding-bottom">
                                <div class="row">
                                    <div class="col-xs-8 bk-vcenter">
                                        <h4 class="bk-margin-off" id="my_name"></h4>
                                        <small id="my_username"></small>
                                        <h6><div class="point point-success point-lg"></div>online</h6>
                                    </div>
                                    <div class="col-xs-4 bk-vcenter text-right">
                                        <div class="bk-avatar">
                                            <img src="assets/img/avatar7.jpg" alt="" class="img-circle bk-img-60">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body bk-bg-white text-right no-padding-bottom">
                                <div class="info">
                                    <div class="row">
                                        {!! Form::label('gender','Gender:',['style'=>'width:100px;']) !!}
                                        <select id="gender" >
                                            <option value="0" >Male</option>
                                            <option value="1">Female</option>
                                        </select>
                                    </div>

                                    <div class="row">
                                        {!! Form::label('region','Region:',['style'=>'width:100px;']) !!}
                                        {!! Form::text('region','asdfasg') !!}
                                    </div>
                                    <div class="row">
                                        {!! Form::label('introduction','Introduction:',['style'=>'width:100px;']) !!}
                                        {!! Form::text('introduction','iiiiiiiiiiiiiii') !!}
                                    </div>
                                    {!! Form::submit('Save',['class'=>'btn btn-primary arrow hidden-xs bk-margin-top-15','id'=>'info_edit']) !!}
                                </div>
                            </div>
                        </div>
                    </div>



					<div class="chatroom col-lg-6 col-md-6 col-xs-12 col-lg-offset-3 col-md-offset-2">
							<div class="menu bk-widget bk-border-off bk-noradius">
								<div class="panel-heading bk-bg-primary text-center bk-padding-top-10 bk-padding-bottom-10">
									<div class="row">
										<div class="col-xs-8 text-left bk-vcenter">
											<i class="fa fa-comments-o"></i><strong>    CHAT ROOM</strong><strong id="towards"></strong>
										</div>
										<div class="col-xs-4 bk-vcenter text-right">
											<div class="panel-actions">
												<a href="javascript:;" class="btn-close" id="chatroom-close"><i class="fa fa-times"></i></a>
											</div>
										</div>
									</div>
								</div>
								<hr class="bk-margin-off" />
								<div class="panel-body bk-bg-white bk-padding-off-top bk-padding-off-bottom" >
									<div class="chat-thread" id="chatContent">

									
									</div>
									
								</div>
								<hr class="bk-margin-off" />
								<div class="panel-heading bk-bg-very-light-gray bk-padding-top-15 bk-padding-bottom-15">
									<form role="form" action="#">
										<div class="input-group">
											<input type="text" class="form-control bk-noradius" id="messageInput">
											  <span class="input-group-btn">
												<button class="btn btn-default bk-noradius" type="button" id="send"><i class="fa fa-send-o"></i></button>
											  </span>
										</div>
									</form>
								</div>
							</div>	
						</div>	
						
						
										
						<div class="index col-lg-3 col-md-4 col-xs-12">
							<div class="menu bk-widget bk-border-off bk-noradius">
								<div class="panel-heading bk-bg-primary">	
									<div class="row">						
										<div class="col-xs-3 bk-avatar">
											<img src="assets/img/avatar7.jpg" class="img-circle bk-img-60" alt="" />
										</div>
										<div class="col-xs-5 bk-padding-top-10 bk-padding-bottom-10 bk-vcenter">
											<i class="fa fa-circle text-success"></i> <small>{{$User->name}}</small>
											<p><small>{{ $username }}</small></p>
										</div>
										<div class="col-xs-3 bk-padding-top-15 bk-padding-bottom-10 bk-vcenter">
											<i class="fa fa-user onright"  style="font-size:30px;margin-right: 5px;"></i>
										</div>
                                        <div class="col-xs-1 bk-padding-top-10 bk-padding-bottom-10 bk-vcenter onright">
                                            <i class="fa fa-edit" style="font-size:13px;" id="edit"></i>
                                            <i class="fa fa-sign-out"  style="font-size:13px;" id="logout"  href="/logout_{{$username}}"></i>
                                        </div>
									</div>	
								</div>
								<div class="menu-heading bk-bg-white">
								
									<div class="row">
										<div class="bar col-xs-4 text-center" id="recent">
											<i class="fa fa-clock-o" style="font-size: 24px;"></i>
										</div>
										<div class="bar active col-xs-4 text-center" id="chat">
											<i class="fa fa-comment" style="font-size: 24px;"></i>
										</div>
										<div class="bar col-xs-4 text-center" id="chats">
											<i class="fa fa-comments" style="font-size: 24px;"></i>
										</div>
									</div>
									<div class="divider2"></div>
								</div>
								
							<div class="page-centent">

								<div class="page panel-body bk-bg-white bk-padding-off-top bk-padding-off-bottom" id="page-recent">
									<div class="row friend">
										<div class="col-xs-3 bk-vcenter text-center bk-padding-top-10 bk-padding-bottom-10">
											<a href="#" class="bk-avatar">
												<img src="assets/img/avatar.jpg" alt="" class="img-circle bk-img-60 bk-border-primary bk-border-off">
											</a>
										</div>
										<div class="col-xs-9">
											<h5 class="bk-fg-primary bk-margin-off-bottom"><div class="point point-success point-lg"></div>Michael</h5>
											<h6 class="bk-fg-primary bk-margin-off-bottom">10:18:22</h6>
										</div>
									</div>
									
									<div class="row friend">
										<div class="col-xs-3 bk-vcenter text-center bk-padding-top-10 bk-padding-bottom-10">
											<a href="#" class="bk-avatar">
												<img src="assets/img/avatar.jpg" alt="" class="img-circle bk-img-60 bk-border-primary bk-border-off">
											</a>
										</div>
										<div class="col-xs-9">
											<h5 class="bk-fg-primary bk-margin-off-bottom"><div class="point point-success point-lg"></div>Michael</h5>
											<h6 class="bk-fg-primary bk-margin-off-bottom">10:18:22</h6>
										</div>
									</div>
									
									<div class="row friend">
										<div class="col-xs-3 bk-vcenter text-center bk-padding-top-10 bk-padding-bottom-10">
											<a href="#" class="bk-avatar">
												<img src="assets/img/avatar.jpg" alt="" class="img-circle bk-img-60 bk-border-primary bk-border-off">
											</a>
										</div>
										<div class="col-xs-9">
											<h5 class="bk-fg-primary bk-margin-off-bottom"><div class="point point-success point-lg"></div>Michael</h5>
											<h6 class="bk-fg-primary bk-margin-off-bottom">10:18:22</h6>
										</div>
									</div>
									
									<div class="row friend">
										<div class="col-xs-3 bk-vcenter text-center bk-padding-top-10 bk-padding-bottom-10">
											<a href="#" class="bk-avatar">
												<img src="assets/img/avatar.jpg" alt="" class="img-circle bk-img-60 bk-border-primary bk-border-off">
											</a>
										</div>
										<div class="col-xs-9">
											<h5 class="bk-fg-primary bk-margin-off-bottom"><div class="point point-success point-lg"></div>Michael</h5>
											<h6 class="bk-fg-primary bk-margin-off-bottom">10:18:22</h6>
										</div>
									</div>
									
									<div class="row friend">
										<div class="col-xs-3 bk-vcenter text-center bk-padding-top-10 bk-padding-bottom-10">
											<a href="#" class="bk-avatar">
												<img src="assets/img/avatar.jpg" alt="" class="img-circle bk-img-60 bk-border-primary bk-border-off">
											</a>
										</div>
										<div class="col-xs-9">
											<h5 class="bk-fg-primary bk-margin-off-bottom"><div class="point point-success point-lg"></div>Michael</h5>
											<h6 class="bk-fg-primary bk-margin-off-bottom">10:18:22</h6>
										</div>
									</div>
									
									<div class="row friend">
										<div class="col-xs-3 bk-vcenter text-center bk-padding-top-10 bk-padding-bottom-10">
											<a href="#" class="bk-avatar">
												<img src="assets/img/avatar.jpg" alt="" class="img-circle bk-img-60 bk-border-primary bk-border-off">
											</a>
										</div>
										<div class="col-xs-9">
											<h5 class="bk-fg-primary bk-margin-off-bottom"><div class="point point-success point-lg"></div>Michael</h5>
											<h6 class="bk-fg-primary bk-margin-off-bottom">10:18:22</h6>
										</div>
									</div>
								</div>
								
								<div class="page active panel-body bk-bg-white bk-padding-off-top bk-padding-off-bottom" id="page-chat">
									<div class="row">
										<!-- Sidebar -->
			<div class="sidebar">
					<div class="sidebar-collapse">
						<!-- Sidebar Menu-->
						<div class="sidebar-menu">						
							<nav id="grouplist" class="nav-main">

								<ul class="nav nav-sidebar">
                                    <li class="nav-parent">
                                        <a class="nav-parent-title" id="group_0">
                                            <span>ungrouped</span>
                                        </a>

                                        <ul class="nav nav-children">
                                            <?php  use Illuminate\Support\Facades\DB; ?>
                                            @foreach($friends_d as $friend)
                                                <?php $friend_info = DB::table('users')->where(['email'=>$friend->friend])->first();
                                                $friend_id = $friend_info->id;
                                                $friend_name = $friend_info->name;
                                                ?>
                                                <li>
                                                    <div class="row friend" id="friend_{{ $friend_id }}">
                                                        <div class="col-xs-3 bk-vcenter text-center bk-padding-top-10 bk-padding-bottom-10">
                                                            <a href="#" class="bk-avatar">
                                                                <img src="assets/img/avatar.jpg" alt="" class="img-circle bk-img-60 bk-border-primary bk-border-off">
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-9">
                                                            <h5 class="bk-fg-primary bk-margin-off-bottom">{{ $friend_name }}</h5>
                                                            <h6 class="bk-fg-primary bk-margin-off-bottom">10:18:22</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <?php $i=0; ?>
                                    @foreach($Friends_g as $friends_group)
                                        <?php $groupname = $Groups[$i]->groupname;
                                                $groupid =  $Groups[$i]->groupid;
                                                $i++;
                                        ?>
                                        <li class="nav-parent">
                                            <a class="nav-parent-title" id="group_{{ $groupid }}">
                                                <span>{{ $groupname }}</span>
                                            </a>

                                            <ul class="nav nav-children">
                                            @foreach($friends_group as $friend)
                                                <?php
                                                        $friend_info = DB::table('users')->where(['email'=> $friend->friend])->first();
                                                        $friend_id = $friend_info->id;
                                                        $friend_name = $friend_info->name;
                                                    ?>
                                                    <li>
                                                        <div class="row friend" id="friend_{{ $friend_id }}">
                                                            <div class="col-xs-3 bk-vcenter text-center bk-padding-top-10 bk-padding-bottom-10">
                                                                <a href="#" class="bk-avatar">
                                                                    <img src="assets/img/avatar.jpg" alt="" class="img-circle bk-img-60 bk-border-primary bk-border-off">
                                                                </a>
                                                            </div>
                                                            <div class="col-xs-9">
                                                                <h5 class="bk-fg-primary bk-margin-off-bottom">{{ $friend_name }}</h5>
                                                                <h6 class="bk-fg-primary bk-margin-off-bottom">10:18:22</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                            @endforeach
                                            </ul>
                                        </li>
                                    @endforeach


                                        <li class="nav-add">
                                            <a>
                                                <span>Create a new group</span>
                                            </a>
                                        </li>
									
								</ul>
							</nav>
						</div>
						<!-- End Sidebar Menu-->
					</div>
	</div><!-- End Sidebar -->
    </div></div>


								
								<div class="page panel-body bk-bg-white bk-padding-off-top bk-padding-off-bottom" id="page-chats" >
									<h5 >Remains to be perfected...</h5>
								</div>
						</div>

                                    <div class="menu-footer bk-bg-primary bk-padding-top-5 bk-padding-bottom-5 ">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <a href="#"  id="newFriend_btn"><small><i class="fa fa-plus"></i> Add Friend</small></a>
                                            </div>
                                            <div class="col-xs-6 text-right">
                                                <a href="#"><small><i class="fa fa-group"></i> Create Group Chat</small></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

				<!-- End Main Page -->			
			
			</div>
		</div><!--/container-->
		
		
			
		
		<!-- start: JavaScript-->

		
	</body>
	
</html>