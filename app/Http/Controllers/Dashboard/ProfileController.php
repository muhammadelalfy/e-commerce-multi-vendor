<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;

class ProfileController extends Controller
{
    public function edit(){
        $user = auth()->user();

        $countries = Countries::getNames();
        $locales = Languages::getNames();
//        dd($countries);
        return view('dashboard.profile.edit' , compact(['user' , 'countries' , 'locales']));
    }

    public function update(Request $request){
//        dd(\request());

         $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthday' => 'required|date|before:today',
            'gender' => 'required|in:male,female',
            'country' => 'required|string|size:2',
        ]);
//         dd($request->all());

        $user = auth()->user();

        $user->profile->fill($request->all())->save();//save do update if row found and create if not found //fill store in model not in db
//        dd(12);

//        $user->profile()->updateOrCreate($request->all());
        return redirect()->back()->with(['success' => 'profile updated successfully'])->withInput();
    }
}
