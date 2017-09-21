$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var friend_id = '';
//轮询数据库获得消息并显示
function loadXMLDoc()//ajax发送请求并显示
{
    var xmlhttp;
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }
    else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("chatContent").innerHTML = xmlhttp.responseText;
        }
    }
    console.log('in loadXMLDoc '+friend_id);
    xmlhttp.open("POST", '/messages/{{$username}}/'+friend_id, true);
    xmlhttp.send();
    setTimeout('loadXMLDoc()', 500);//递归调用
}

jQuery(document).ready(function($) {
    //三栏页面切换
    $('#recent').click(function(){
        $('.bar').css("color","rgba(43, 52, 63, 0.2)");
        $('#recent').css("color","rgba(43, 52, 63, 1)");
        $('.page').hide();
        $('#page-recent').show();
    });
    $('#chat').click(function(){
        $('.bar').css("color","rgba(43, 52, 63, 0.2)");
        $('#chat').css("color","rgba(43, 52, 63, 1)");
        $('.page').hide();
        $('#page-chat').show();
    });
    $('#chats').click(function(){
        $('.bar').css("color","rgba(43, 52, 63, 0.2)");
        $('#chats').css("color","rgba(43, 52, 63, 1)");
        $('.page').hide();
        $('#page-chats').show();
    });

    //各个关闭控件
    $('#chatroom-close').click(function(){
        $('.chatroom').fadeOut(200);
    });

    $('#datacard-close').click(function(){
        $('.datacard').fadeOut(200);
    });

    $('#datacard_edit-close').click(function(){
        $('.datacard_edit').fadeOut(200);
    });

    $('#editGroup-close').click(function(){
        $('#editGroup').fadeOut(200);
    });

    $('#renameGroup-close').click(function(){
        $('#renameGroup').fadeOut(200);
    });

    $('#createGroup-close').click(function(){
        $('#createGroup').fadeOut(200);
    });

    $('#newFriend-close').click(function(){
        $('#newFriend').fadeOut(200);
    });



    //弹出对应好友的聊天窗口
    $('.friend').click(function(){
        $('.chatroom').fadeOut(200);
        $('.chatroom').fadeIn(200);
        var friendName = $(this).find('h5').text();
        var friend_id1 = $(this).attr('id');
        friend_id = friend_id1.substring(7);
        console.log(friend_id);

        $('.chatroom #towards').text(' - '+friendName);

        //更新所有该好友发送的消息为已读
        $.get('/updateMessage/'+'{{$username}}/'+friend_id,
            function(data){
                console.log('FLAG '+data);
            }
        );
        //调用信息查询函数
        loadXMLDoc();

        //发送消息
        $('#send').click(function(){
            var content = $('#messageInput').val();
            console.log(content);
            if(content==''){
                alert("Message can not be null!");
            }
            else{
                $.post('/sendMessage',{Username:"{{$username}}",FriendId:friend_id, Text:content},
                    function(data){
                        console.log(data);
                    }
                );
            }
            $('#messageInput').val('');
        })
    });



    //右击好友菜单操作
    $(".friend").bind("mousedown", (function (e) {
        var friend_id1 = $(this).attr('id');
//        console.log(friend_id1);
        friend_id = friend_id1.substring(7);
//        console.log(friend_id);
        if (e.which == 3) {//右击

            var  opertionn = {
                name: "",
                offsetX: 2,
                offsetY: 2,
                textLimit: 10,
                beforeShow: $.noop,
                afterShow: $.noop
            };

            var imageMenuData = [
                [ {
                    text: "Check info",
                    func: function () {
                        $.getJSON('/friendinfo_'+friend_id,function(jsonData){
                            console.log(jsonData);
                            $('#friend_name').text(jsonData.name);
                            $('#friend_username').text(jsonData.email);
                            if(jsonData.online == '1'){
                                document.getElementById('friend_state').innerHTML = '<div class="point point-success point-lg"></div>online';
                            }
                            else document.getElementById('friend_state').innerHTML = '<div class="point point-danger point-lg"></div>offline';

                            var gender;
                            if(jsonData.gender=='0') gender = 'Gender: Male';
                            else gender = 'Gender: Female';
                            $('#friend_gender').text(gender);
                            $('#friend_region').text('Region: '+jsonData.region);
                            $('#friend_intro').text('Introduction: '+jsonData.intro);
                        });
                        $('.datacard').fadeIn(200);
                    }
                },
                    {
                        text: "Edit group",
                        func: function () {
                            $('#editGroup').fadeIn(200);

                            $('#comfirmGroup').click(function(){
                                var toGroupName = $('#moveGroup').val();
                                console.log(toGroupName);
                                $.get('/moveGroup/'+'{{$username}}/'+friend_id+'/'+toGroupName,
                                    function(data){
                                        console.log(data);
                                        if(data=='success'){
                                            alert('Move to "'+toGroupName+'" successfully!' );
                                            location.href="/chat_{{$username}}";
                                        }
                                        else alert('Group "'+toGroupName+'" does not exist, please create first!');
                                    }
                                );
                            });

                        }
                    }],
                [{
                    text: "Delete",
                    func: function () {
                        console.log('/deleteFriend/'+'{{$username}}/'+friend_id);
                        $.get('/deleteFriend/'+'{{$username}}/'+friend_id,
                            function(data){
                                console.log(data);
                                if(data=='success'){
                                    alert("Delete successfully!");
                                    location.href="/chat_{{$username}}";
                                }
                                else alert("Error!");
                            }
                        );
                    }
                }]

            ];
            $(this).smartMenu(imageMenuData, opertionn);
        }
    }));

    //编辑个人资料
    $('#edit').click(function(){
        $.getJSON('/myinfo_{{ $username }}',function(jsonData){
            console.log(jsonData);
            $('#my_name').text(jsonData.name);
            $('#my_username').text(jsonData.email);
            $('#gender').val(jsonData.gender);
            $('#region').val(jsonData.region);
            $('#introduction').val(jsonData.intro);
        });
        $('.datacard_edit').fadeIn(100);
    });


    //确认修改个人资料
    $('#info_edit').click(function(){
        var gender_ = $('#gender').val();
        var region_ = $('#region').val();
        var introduction_ = $('#introduction').val();
        if(region_ == '') alert("'Region' can't be null!");
        if(introduction_=='') alert("'Introduction' can't be null!");
        $.get('/info_edit/'+'{{$username}}/'+gender_+'/'+region_+'/'+introduction_,
            function(data){
                console.log(data);
                if(data=='success') alert("Save successfully!");
                else alert("Error!");
            }
        );
    });

    //分组菜单
    $('.nav-parent-title').click(function(){
        if ($(this) .parent().hasClass('nav-expanded')){
            $(this) .parent().removeClass('nav-expanded');
            $(this).parent().children('.nav-children').slideUp(200);
        }
        else {
            $(this).parent().children('.nav-children').slideDown(200);
            $(this) .parent().addClass('nav-expanded');
        }

    });

    //右击分组菜单操作
    $('.nav-parent-title').bind("mousedown", (function (e) {
        var group_id1 = $(this).attr('id');
//        console.log(group_id1);
        var group_id = group_id1.substring(6);
//        console.log(group_id);
        if (e.which == 3) {//右击

            var  opertionn = {
                name: "",
                offsetX: 2,
                offsetY: 2,
                textLimit: 10,
                beforeShow: $.noop,
                afterShow: $.noop
            };

            var imageMenuData = [
                [{
                    text: "Rename",
                    func: function () {
                        $('#renameGroup').fadeIn(200);

                        $('#cfm_ren_Group').click(function () {
                            var newGroupName = $('#renameGroup_in').val();
                            console.log(newGroupName);
                            if(group_id == '0'){
                                console.log('stop');
                                alert("The default group can not be renamed.");
                            }
                            else{
                                console.log('turn to get');
                                $.get('/renameGroup/' + group_id + '/' + newGroupName,
                                    function (data) {
                                        console.log(data);
                                        if (data == 'success') {
                                            alert('The group have been renamed to "' + newGroupName +'".');
                                            location.href = "/chat_{{$username}}";
                                        }
                                        else alert('error');
                                    }
                                );}
                        });
                    }
                },
                    {
                        text: "Delete",
                        func: function () {
                            if(group_id == '0'){
                                console.log('stop');
                                alert("The default group can not be deleted.");
                            }
                            else{
                                console.log('turn to get');
                                $.get('/deleteGroup/' + group_id,
                                    function (data) {
                                        console.log(data);
                                        if (data == 'success') {
                                            alert('This group have been deleted, and friends under the group are moved to default group.');
                                            location.href = "/chat_{{$username}}";
                                        }
                                        else alert('error');
                                    }
                                );}
                        }
                    }]

            ];
            $(this).smartMenu(imageMenuData, opertionn);
        }
    }));

    //新建分组管理
    $('.nav-add').click(function(){
        $('#createGroup').fadeIn(200);
        $('#cfm_create_Group').click(function () {
            var newGroupName = $('#createGroup_in').val();
            console.log(newGroupName);
            if(newGroupName == ''){
                console.log('stop');
                alert("The group name can not be null.");
            }
            else{
                console.log('turn to get');
                $.get('/createGroup/{{$username}}/'+ newGroupName,
                    function (data) {
                        console.log(data);
                        if (data == 'success') {
                            alert('New group have been created.');
                            location.href = "/chat_{{$username}}";
                        }
                        else alert('error');
                    }
                );}
        });
    });

    //添加好友
    $('#newFriend_btn').click(function(){
        $('#newFriend').fadeIn(200);
        $('#newFriend_check').click(function () {
            var newFriendEmail = $('#newFriend_in').val();
            console.log(newFriendEmail);
            if( newFriendEmail == ''){
                console.log('stop');
                alert("The email of new friend can not be null.");
            }
            else{
                console.log('turn to get');
                $.get('/newFriend/{{$username}}/'+ newFriendEmail,
                    function (data) {
                        console.log(data);
                        if (data == 'success') {
                            alert('New friend is added successfully, it is under the default group.');
                            location.href = "/chat_{{$username}}";
                        }
                        else if(data=='error_null'){
                            alert('This email have not been register.');
                        }
                        else{
                            alert('This email have been added as your friend.');
                        }
                    }
                );}
        });
    });

    //logout
    $('#logout').click(function(){
        window.location = '/logout_{{ $username }}';
    });


});