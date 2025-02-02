<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Resume;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageResumeController extends Controller
{
    public function index(Request $request){
        $resumes = Resume::with('user')
        ->latest()
        ->paginate(10);

        // dd($resumes);

        return view('management.resumes.index', compact('resumes'));
    }

    public function show(Resume $resume){
        return view('management.resumes.show', compact('resume'));
    }

    public function updateCommission(Request $request, Resume $resume)
    {
        
        $request->validate([
            'commission_rate' => 'required|numeric|min:0|max:100',
        ]);
        // dd($request->all());

        $resume->update([
            'commission_rate' => $request->commission_rate,
        ]);

        return redirect()->route('admin.resumes.show', $resume)->with('success', 'درصد کمیسیون با موفقیت به‌روزرسانی شد.');
    }


    public function approve(Resume $resume)
    {
        DB::beginTransaction();
        try {
            // تایید رزومه
            $resume->update(['status' => 'approved']);
            $workerRole = Role::where('name', 'worker')->first();
            // $resume->user->roles()->attach($workerRole);
            $resume->user->roles()->syncWithoutDetaching([$workerRole->id]);

            // $resume->update(['status' => 'approved']);
            // $workerRole = Role::where('name', 'worker')->first();
            // if (!$resume->user->roles->contains($workerRole)) {
            //     $resume->user->roles()->attach($workerRole);
            // }
            Report::create(['worker_id'=>$resume->user->id]);

            DB::commit();

            return redirect()->route('admin.resumes')->with('success', 'رزومه با موفقیت تایید شد.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'خطا در تایید رزومه.');
        }
    }

    // رد رزومه
    public function reject(Resume $resume)
    {
        DB::beginTransaction();
        try {
            // رد رزومه
            $resume->update(['status' => 'rejected']);

            // اگر کاربر نقش نیروی کار دارد، آن را حذف کنید
            $workerRole = Role::where('name', 'worker')->first();
            if ($resume->user->roles->contains($workerRole)) {
                $resume->user->roles()->detach($workerRole);
            }

            DB::commit();

            return redirect()->route('admin.resumes')->with('success', 'رزومه با موفقیت رد شد و نقش نیروی کار حذف شد.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'خطا در رد رزومه.');
        }
        // $resume->update(['status' => 'rejected']);
        // return redirect()->route('admin.resumes')->with('success', 'رزومه با موفقیت رد شد.');
    }

    // حذف رزومه
    public function destroy(Resume $resume)
    {
        DB::beginTransaction();
        try {
            // اگر کاربر نقش نیروی کار دارد، آن را حذف کنید
            $workerRole = Role::where('name', 'worker')->first();
            if ($resume->user->roles->contains($workerRole)) {
                $resume->user->roles()->detach($workerRole);
            }

            // حذف رزومه
            $resume->delete();

            DB::commit();

            return redirect()->route('admin.resumes')->with('success', 'رزومه با موفقیت حذف شد و نقش نیروی کار حذف شد.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'خطا در حذف رزومه.');
        }
    }
}
