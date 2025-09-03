<?php

namespace App\Http\Controllers\MailingList;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helpers\Setting;
use App\Mail\MailingList\UnsubscribedMail;
use App\Mail\MailingList\WelcomeMail;

use App\Models\{Group, Subscriber};


class SubscriberFrontController extends Controller
{
    public function subscribe(Request $request)
    {
        $requestData = $request->all();
        $requestData['code'] = Subscriber::generate_unique_code();

        $subscriber = Subscriber::create($requestData);

        // if (!empty($subscriber)) {
        //     \Mail::to($request->email)->send(new WelcomeMail(Setting::info(), $subscriber));
        //     return response()->json(['success' => true, 'message' => 'Thank you for subscribing.']);
        // } else {
        //     return response()->json(['failed' => true, 'message' => 'Failed to subscribe. Please try again later.']);
        // }

        return back()->with('success', 'Thank you for subscribing.');

    }

    public function unsubscribe(Request $request, Subscriber $subscriber, $code)
    {
        if ($subscriber->code == $code) {

            \Mail::to($subscriber->email)->send(new UnsubscribedMail(Setting::info()));

            $subscriber->delete();

            return view('components.unsubscribed');

//            return "You’ve been successfully removed from our mailing list. <script>window.setTimeout(function(){window.location.href = '".url('/')."'}, 3000);";
        }

        abort(404);

    }   
}

