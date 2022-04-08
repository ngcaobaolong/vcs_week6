<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function show(Request $request)
    {
        if ($request->id) $id = $request->id;
        else $id = Auth::id();
        if ($id == Auth::id()) {
            $owner = 1;
        } else {
            $owner = 0;
        }
        $a = "";
        $b = "";
        $c = "";
        if ($owner && !Auth::user()->isAdmin) {
            $a = <<<EOD
        <div class="form-group">
          <label>Old Password</label>
          <input type="password" name="old_password" id="old_password" class="form-control" placeholder="************"
        </div>
        EOD;
            $c = <<<EOD
        <div class="form-group">
          <label>Upload Avatar</label>
          <input type="file" name="avatar" class="btn btn-primary">
        </div>
        <button type="submit" class="btn btn-primary" formmethod="post">Submit Changes</button>
        EOD;
        }
        if ($owner || Auth::user()->isAdmin) {
            $b = <<<EOD
        <div class="form-group">
          <label>New Password</label>
          <input type="password" name="new_password" id="new_pasword" class="form-control" placeholder="************">
        </div>
        EOD;
        }
        $d = "<br>";
        $e = "";
        if ($owner) {
            $messages = DB::table('chats')->join('users', 'users.id', '=', 'chats.id_from')->where('chats.id_to', '=', $id)->get();
            foreach ($messages as $row) {
                $d = $d . "<text>Message from " . $row->username . " : " . $row->message . "</text>\n";
            }
        } else {
            $row = DB::table('chats')->where(['id_from' => Auth::id(), 'id_to' => $id])->first();
            $this_message = "";
            if ($row) $this_message = $row->message;
            $csrf = csrf_token();
            $e = <<<EOD
            <form method="post" role="form" enctype="multipart/form-data">
            <div class="form-group">
              <label>Send a message</label>
              <input type="hidden" name="action" value="message" />
              <input type="hidden" name="_token" value="$csrf">
            </div>
            <textarea type="text" name="message" id="message" class="form-control" placeholder="Type your message in here">$this_message</textarea>
            <button type="submit" class="btn btn-primary" formmethod="post">Send message</button>
          </form>
          EOD;
        };
        $user = DB::table('users')->find($id);
        return view('account', [
            'this_username' => $user->username,
            'this_fullname' => $user->name,
            'this_avatar' => $user->avatar,
            'this_email' => $user->email,
            'this_phone' => $user->phone,
            'is_admin' => Auth::user()->isAdmin,
            'owner' => $owner,
            'first_password' => $a,
            'second_password' => $b,
            'avatar_submit' => $c,
            'messages' => $d,
            'sent_message' => $e,
        ]);
    }
    public function post(Request $request)
    {
        if ($request->action == "alter") {
            if (!$request->id || ($request->id != Auth::id() && !Auth::user()->isAdmin)) {
                die('Not admin or not your profile! ' . Auth::id() . ' ' . $request->id);
            }
            if (!$request->id) {
                $id = Auth::id();
            } else $id = $request->id;
            $user = [];
            $old_user = DB::table('users')->find($request->id);
            if (request('name') && Auth::user()->isAdmin) $user['name'] = request('name');
            if (request('username') && Auth::user()->isAdmin) $user['username']  = request('username');
            if (request('email')) $user['email'] = request('email');
            if (request('phone')) $user['phone'] = request('phone');
            if (request('old_password') && request('new_password') && Hash::check(request('old_password'), $old_user->password)) $user['password'] = Hash::make(request('new_password'));
            if ($request->hasFile('avatar')) {
                $avatar = $request->avatar;
                $rules = ['avatar' => 'image'];
                $img = array('avatar' => $avatar);
                $validator = Validator::make($img, $rules);
                if ($validator->fails()) {
                    return back();
                } else {
                    unlink(public_path() . $old_user->avatar);
                    $user['avatar'] = '/images/' . $avatar->store('', 'public_images');
                }
            }
            DB::table('users')->where('id', $id)->update($user);
            return back();
        }
        if ($request->action == "message") {
            if (!$request->id) {
                return back();
            } else {
                $rules = ['id_from' => Auth::id(), 'id_to' => $request->id];
                DB::table('chats')->updateOrInsert($rules, ['message' => $request->message]);
                return back();
            }
        }
    }
}
