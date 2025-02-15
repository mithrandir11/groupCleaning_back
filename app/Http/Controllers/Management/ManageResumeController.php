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
        $search = $request->input('search');
        $resumes = Resume::with('user')
            ->when($search, function ($query, $search) {
                return $query->search($search);
            })
            ->latest()
            ->paginate(10);

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

        $resume->update([
            'commission_rate' => $request->commission_rate,
        ]);

        return redirect()->route('admin.resumes.show', $resume)->with('success', 'درصد کمیسیون با موفقیت به‌روزرسانی شد.');
    }


    public function approve(Resume $resume){
        DB::beginTransaction();
        try {
            $resume->update(['status' => 'approved']);
            $workerRole = Role::where('name', 'worker')->first();
            $resume->user->roles()->syncWithoutDetaching([$workerRole->id]);
            Report::firstOrCreate(['worker_id'=>$resume->user->id]);
            DB::commit();
            log_activity('پذیرش رزومه', "رزومه کاربر با کد ". $resume->user->id." مورد قبول واقع شد.");
            return redirect()->route('admin.resumes')->with('success', 'رزومه با موفقیت تایید شد.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'خطا در تایید رزومه.');
        }
    }

    
    public function reject(Resume $resume){
        DB::beginTransaction();
        try {
            $resume->update(['status' => 'rejected']);
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
    }


    public function destroy(Resume $resume)
    {
        DB::beginTransaction();
        try {
            $workerRole = Role::where('name', 'worker')->first();
            if ($resume->user->roles->contains($workerRole)) {
                $resume->user->roles()->detach($workerRole);
            }
            $resume->delete();
            DB::commit();
            return redirect()->route('admin.resumes')->with('success', 'رزومه با موفقیت حذف شد و نقش نیروی کار حذف شد.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'خطا در حذف رزومه.');
        }
    }
}
