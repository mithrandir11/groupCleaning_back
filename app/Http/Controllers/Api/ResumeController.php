<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResumeController extends Controller
{
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            // 'name' => 'required|string|max:255',
            // 'family' => 'required|string|max:255',
            // 'cellphone' => 'required|string|regex:/^09[0-9]{9}$/',
            // 'father_name' => 'required|string|max:255',
            // 'national_code' => 'required|string|size:10|unique:resumes,national_code',
            // 'phone' => 'nullable|string|regex:/^0[0-9]{2,3}[0-9]{7,8}$/',
            // 'email' => 'required|email',
            // 'bank_name' => 'required|string|max:255',
            // 'sheba_number' => 'required|string|size:16|unique:resumes,sheba_number',
            // 'address' => 'required|string|max:1000',

            'personal_image' => ['required'],
        ]);
        
        // return response()->json( $request->all() );

        


        
        $path = $request->file('personal_image')->store('personal_photos', 'public');
        $validated['personal_image'] = url('storage/' . str_replace('public/', '', $path));
        // 'personal_photo' => $request->file('personal_photo')->store('personal_photos', 'public'),

        return response()->json( $validated['personal_image']);
       

        try {
            $user = User::where('cellphone', $validated['cellphone'])->first();
            if (!$user) {
                $user = User::create([
                    'name' => $validated['name'],
                    'family' => $validated['family'],
                    'cellphone' => $validated['cellphone'],
                ]);
            }

            if(!$user->resume){
                $resume = Resume::create([
                    'user_id' => $user->id,
                    'father_name' => $validated['father_name'],
                    'national_code' => $validated['national_code'],
                    'phone' => $validated['phone'],
                    'bank_name' => $validated['bank_name'],
                    'sheba_number' => $validated['sheba_number'],
                    'address' => $validated['address'],
                    'personal_image' => $validated['personal_image'],
                ]);
            }else{
                return Response::error('شما قبلا رزومه ثبت کرده اید.');    
            }

            
            return Response::success(null, $resume);
        } catch (\Exception $e) {
            return Response::error($e->getMessage());
        } 
    }
}
