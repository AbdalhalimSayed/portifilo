<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use App\Models\ProfileVisit;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index()
    {

        $user = User::find(1);;
        if ($user->profile) {
            $profile = $user->profile;
            $ip = request()->ip();

            $hasVisitedToday = ProfileVisit::where('profile_id', $profile->id)
                ->where('ip_address', $ip)
                ->whereDate('created_at', now()->today())
                ->exists();

            if (!$hasVisitedToday) {
                ProfileVisit::create([
                    'profile_id' => $profile->id,
                    'ip_address' => $ip,
                    'user_agent' => request()->userAgent(),
                ]);
                $profile->increment('views');
            }
        }

        return view("index", ["user" => $user]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "email" => "required|email|unique:testimonials,email",
            "message" => "required|string",
            "evaulation" => "required|string|in:1,2,3,4,5",
        ]);

        if ($validator->fails()) {
            return redirect()
                ->to(url()->previous() . '#contact')
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::find(1);

        $testimonial = Testimonial::create([
            "message" => $request->message,
            "user_id" => $user->id,
            "name" => $request->name,
            "email" => $request->email,
            "evaulation" => $request->evaulation,
        ]);

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new FeedbackMail($testimonial));

        return redirect()->to(url()->previous() . '#contact')->with('success', 'Message sent!');
    }
}
