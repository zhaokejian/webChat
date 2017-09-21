<?php

namespace App\Http\Controllers;


use App\Users;
use App\Groupadmin;
use App\Message;
use App\Relation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class ChatController extends Controller
{
    private $id = '';

    public function getLogin()
    {
        return view('mychat/page-login');
    }

    public function getRegister()
    {

        return view('mychat/page-register');
    }

    public function chat($username)
    {
        return view('mychat/main');
    }

    public function chat_user($username)
    {
        $User = DB:: table('users')->where(['email'=>$username])->first();
        if($User->online == 0) return view('mychat/page-login');

        $Groups = DB::table('groupadmin')->where(['user'=>$username])->get();//username所拥有的group信息(id+name)

        $Friends_g = array();
        $i=0;
        foreach($Groups as $group){
            $Friends_g[$i] = DB::table('relation')->where(['user'=> $username, 'groupid'=> $group->groupid])->get();//每个group下的relation记录集
            $i++;
        }
        $friends_d =  DB::table('relation')->where(['user'=> $username, 'groupid'=> 0])->get();//默认分组下的relation记录集

        //dd($User,$Groups,$Friends_g,$friends_d);
        return view('mychat/main',compact('username','User','Groups','Friends_g','friends_d'));
    }

    public function postLogin(Requests\Login $request)
    {
        $result = DB:: table('users')->where('email',$request->username)->get();

        if(is_null($result)){
            echo '<script language="JavaScript">alert("Wrong username!");location.href="/login"</script>';
        }
        else{
            $result = DB:: table('users')->where(['email'=>$request->username, 'password'=>$request->password])->first();
            if(is_null($result)){
                echo '<script language="JavaScript">alert("Wrong password!");location.href="/login"</script>';
            }
            else {
                $is_online=$result->online;
                if($is_online == 1)
                    echo '<script language="JavaScript">alert("This account is online!");location.href="/login"</script>';
                else{
                    DB::table('users')->where('email',$request->username)->update(['online'=>1]);
                    return redirect('/chat_'.$request->username);
                }
            }
        }

    }

    public function postRegister(Requests\RegisterUser $request)
    {
        $user = new Users;

        $user->name = $request->nickname;
        $user->password = $request->password;
        $user->email = $request->username;

        $user->save();
        echo '<script language="JavaScript">alert("Register successfully! Redirect to login.");location.href="/login"</script>';

    }

    public function logout($username)
    {
        DB::table('users')->where('email',$username)->update(['online'=>0]);
        return redirect('/login');
    }

    public function infoShow_my($username)
    {
        $result = DB::table('users')->where('email',$username)->first();

        $id = $result->id;
        $name = $result->name;
        $photo = $result->photo;
        $email = $result->email;
        $gender = $result->gender;
        $intro = $result->intro;
        $region = $result->region;
        $online = $result->online;

            header('Content-type:text/json');
            $json='{"id": "'."$id" .'", "name":"' ."$name"
                .'", "photo":"' ."$photo".'", "email":"' ."$email"
                .'", "gender":"' ."$gender".'", "intro":"' ."$intro"
                .'", "region":"' ."$region".'", "online":"' ."$online".'"}';
            echo($json);

    }

    public function infoEdit($username,$gender, $region, $introduction){
        DB::table('users')->where('email',$username)->update(['gender'=>$gender,'region'=>"$region",'intro'=>"$introduction"]);

        echo('success');
    }

    public function infoShow_friend($friend_id)
    {
        $result = DB::table('users')->where('id',$friend_id)->first();

        $id = $result->id;
        $name = $result->name;
        $photo = $result->photo;
        $email = $result->email;
        $gender = $result->gender;
        $intro = $result->intro;
        $region = $result->region;
        $online = $result->online;

        header('Content-type:text/json');
        $json='{"id": "'."$id" .'", "name":"' ."$name"
            .'", "photo":"' ."$photo".'", "email":"' ."$email"
            .'", "gender":"' ."$gender".'", "intro":"' ."$intro"
            .'", "region":"' ."$region".'", "online":"' ."$online".'"}';
        echo($json);
    }

    public function deleteFriend($username, $friend_id)
    {
        $friend = DB::table('users')->where('id',$friend_id)->first();
        $friend_email = $friend->email;

        DB::table('relation')->where(['user'=>$username, 'friend'=>$friend_email])->delete();
        DB::table('relation')->where(['user'=>$friend_email, 'friend'=>$username])->delete();
        echo('success');

    }

    public function newFriend($username, $newFriendEmail)
    {
        $friend = DB::table('users')->where('email',$newFriendEmail)->first();
        if(is_null($friend)){
            echo('error_null');//用户未注册
        }
        else{
            $result = DB::table('relation')->where(['user'=>$username, 'friend'=>$newFriendEmail])->first();
            if(is_null($result)){
                DB::table('relation')->insert(
                    array('user' => $username, 'friend' => $newFriendEmail, 'groupid'=>'0')
                );
                DB::table('relation')->insert(
                    array('user' => $newFriendEmail, 'friend' => $username, 'groupid'=>'0')
                );
                echo('success');
            }
            else{
                echo('error_have');//该用户已被添加为好友
            }

        }
    }

    public function moveGroup($username, $friend_id, $toGroupName)
    {
        $friend = DB::table('users')->where('id',$friend_id)->first();
        $friend_email = $friend->email;

        $group = DB::table('groupadmin')->where(['user'=>$username, 'groupname'=>$toGroupName])->first();
        if(is_null($group)){
            echo('error');
        }
        else{
            $groupid = $group->groupid;
            DB::table('relation')->where(['user'=>$username, 'friend'=>$friend_email])->update(['groupid'=> $groupid]);
            echo('success');
        }

    }

    public function renameGroup($group_id, $newGroupName)
    {
        DB::table('groupadmin')->where(['groupid'=>$group_id])->update(['groupname'=>"$newGroupName"]);
        echo('success');

    }

    public function deleteGroup($group_id)
    {
        DB::table('groupadmin')->where('groupid',$group_id)->delete();
        //移动删除分组下的好友到默认分组
        DB::table('relation')->where('groupid',$group_id)->update(['groupid'=>'0']);
        echo('success');
    }

    public function createGroup($username, $newGroupName)
    {
        DB::table('groupadmin')->insert(
            array('user' => $username, 'groupname' => $newGroupName)
        );
        echo('success');
    }

    public function sendMessage(Request $request)
    {
        $friend_id = $request->FriendId;
        $username = $request->Username;
        $content = $request->Text;

        $friend = DB::table('users')->where('id',$friend_id)->first();
        $friend_email = $friend->email;

//        ini_set('date.timezone','Asia/Shanghai');
        $time = date('Y-m-d H:i:s');

        DB::table('message')->insert(
            array('sender' => $username, 'receiver' => $friend_email,'text'=>"$content",'time'=>$time)
        );
        echo('success');
    }

    public function getMessage($username,$friendId)
    {
        $friend = DB::table('users')->where('id',$friendId)->first();
        $friend_email = $friend->email;
        $friend_name = $friend->name;

        $myself = DB::table('users')->where('email',$username)->first();
        $myself_name = $myself ->name;

        $Messages = DB::table('message')->where(['sender'=>$username, 'receiver'=>$friend_email])->orWhere(['sender'=>$friend_email, 'receiver'=>$username])->orderBy('time')->get();

        foreach($Messages as $message){
            if($message->sender == $username){//自己发的消息
               echo "<div class=\"row\">";
                    echo"    <div class=\"chat-my\">";
                    echo"        <div class=\"col-xs-10\">";
                        echo"<div class=\"time onright\">{$message->time}</div>";
                        echo"<div class=\"mesg\">{$message->text}</div></div>";
                    echo"<div class=\"col-xs-2\">";
                echo"       <img class=\"onleft\" src=\"assets/img/avatar7.jpg\"/>";
                            echo"<a href=\"#\">{$myself_name}</a></div>
						</div>
					</div>";

            }
            else{//收到的消息
                echo"<div class=\"row\">";
                 echo"       <div class=\"chat-other\">";
                echo"<div class=\"col-xs-2\">";
                echo"                <img class=\"onrignt\" src=\"assets/img/avatar.jpg\"/>";
                echo"<a href=\"#\">{$friend_name}</a></div>";

                echo"<div class=\"col-xs-10\">";
                echo "<div class=\"time onleft\">{$message->time}</div>";
                echo"<div class=\"mesg\">{$message->text}</div></div></div></div>";
            }
        }
    }

    public function updateMessage($username,$friendId)
    {
        $friend = DB::table('users')->where('id',$friendId)->first();
        $friend_email = $friend->email;

        DB::table('message')->where(['sender'=>$username, 'receiver'=>$friend_email])->update(['isread'=>'1']);
        echo('success');
    }
}
