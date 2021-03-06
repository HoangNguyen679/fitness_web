<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Registration;

class RegistrationController extends Controller
{
    public function list()
    {
        $userID = Auth::user()->id;
        $date = date('Y-m-d H:i:s');
        $registration = Registration::where('user_id', '=', $userID)->get();
        return view('mypage.registration', ['registration' => $registration], ['userID' => $userID], ['date' => $date]);
    }

    public function registration(Request $request)
    {
        $userID = Auth::user()->id;
        $data = $request->checkbox;
        $date = date('Y-m-d H:i:s');
        $cart = array();
        $cart_deleted = array();
        foreach ($data as $key) {
            $registration = Registration::where('course_id', '=', $key)->first();
            if ($registration != NULL) {
                array_push($cart_deleted, $registration);


            } else {
                $registration1 = new registration;
                $registration1->user_id = $userID;
                $registration1->course_id = $key;
                $registration1->time = $date;
                array_push($cart, $registration1);
                $registration1->save();

            }
        }

        return view('reg', ['cart' => $cart, 'cart_deleted' => $cart_deleted]);

    }
}
