<?php

namespace App\Http\Controllers;

use App\Events\GetMessage;
use App\Http\Requests\RequestPostMessage;
use App\Http\Requests\RequestRegisterMessage;
use App\Models\Message;
use App\Models\MessageReply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Illuminate\Support\Facades\URL;
use Jorenvh\Share\ShareFacade as Share;

class MessageController extends Controller
{
    public function register(RequestRegisterMessage $request)
    {
        try {
            $validated = $request->validated();

            $user = User::whereName($validated['nama'])->first();
            if (!$user) {
                $user = User::create([
                    'name' => $validated['nama'],
                    'slug' => Str::random(7),
                    'created_at' => date(now()),
                ]);
            }
            Auth::login($user, true);
            return redirect()->route('message.home', ['slug' => $user->slug]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function home(Request $request, $slug)
    {
        try {
            $user = User::whereSlug($slug)->first();
            if (is_null($user)) {
                return redirect('/');
            }
            $messages = Message::whereForUserId($user->id)->orderBy('id', 'desc')->with('replies')->get();
            // GetMessage::dispatch($messages);
            event(new GetMessage($messages, $user->slug));

            // shares
            $currentURL = URL::current();
            $facebook = 'https://www.facebook.com/sharer/sharer.php?u='.$currentURL;
            $tweeter = 'https://twitter.com/intent/tweet?text=Bagikan%20pesan%20rahasia%20ke%20'.$user->name.'%20tanpa%20diketahui%0A' . $currentURL;
            $wa = 'https://wa.me/?text=' . 'Bagikan%20pesan%20rahasia%20ke%20'.$user->name.'%20tanpa%20diketahui%0A' . $currentURL;
            return Inertia::render('Home', [
                'user' => $user,
                'message' => $messages,
                'share' => [
                    'facebook' => $facebook,
                    'tweeter' => $tweeter,
                    'url' => $currentURL,
                    'wa' => $wa,
                ],
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function postMessage(RequestPostMessage $request, $slug)
    {
        try {
            //code...
            $validated = $request->validated();
            $user = User::whereSlug($slug)->first();
            if (is_null($user)) {
                return back();
            }
            Message::create([
                'for_user_id' => $user->id,
                'body' => $validated['body'],
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ]);
            $messages = Message::whereForUserId($user->id)->orderBy('id', 'desc')->with('replies')->get();
            event(new GetMessage($messages, $user->slug));
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function postReplyMessage(RequestPostMessage $request, $slug, $messageID)
    {
        try {
            $validated = $request->validated();
            $user = User::whereSlug($slug)->first();
            if (is_null($user)) {
                return back();
            }
            MessageReply::create([
                'message_id' => $messageID,
                'body_reply' => $validated['body'],
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ]);
            $messages = Message::whereForUserId($user->id)->orderBy('id', 'desc')->with('replies')->get();
            event(new GetMessage($messages, $user->slug));
            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
