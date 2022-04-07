<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        if ($owner || Auth::user()->isAdmin) {
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
        if ($owner && !Auth::user()->isAdmin) {
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
            $e = <<<EOD
            <form method="post" role="form" enctype="multipart/form-data">
            <div class="form-group">
              <label>Send a message</label>
              <input type="hidden" name="action" value="message" />
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
            'is_admin' => $user->isAdmin,
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
    }
}
