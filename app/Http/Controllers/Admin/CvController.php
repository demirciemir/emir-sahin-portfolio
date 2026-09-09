<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CvController extends Controller
{
    public function index()
    {
        $cvs = Cv::latest()->get();
        return view('admin.cv.index', compact('cvs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cv_file' => 'required|mimes:pdf|max:10240', // max 10MB PDF
        ]);

        if ($request->hasFile('cv_file')) {
            // Deactivate all existing CVs
            Cv::where('is_active', true)->update(['is_active' => false]);

            $file = $request->file('cv_file');
            $filename = time() . '_cv_' . $file->getClientOriginalName();
            $file->move(public_path('assets/cv'), $filename);
            
            Cv::create([
                'file_path' => 'assets/cv/' . $filename,
                'is_active' => true
            ]);

            return redirect()->route('admin.cv.index')->with('success', 'Yeni özgeçmiş başarıyla yüklendi ve aktif edildi.');
        }

        return redirect()->back()->withErrors('Dosya yüklenirken bir sorun oluştu.');
    }

    public function destroy(Cv $cv)
    {
        if ($cv->file_path && File::exists(public_path($cv->file_path))) {
            File::delete(public_path($cv->file_path));
        }
        $cv->delete();

        // If we deleted the active CV and there are others, make the newest one active
        if ($cv->is_active) {
            $latestCv = Cv::latest()->first();
            if ($latestCv) {
                $latestCv->update(['is_active' => true]);
            }
        }

        return redirect()->route('admin.cv.index')->with('success', 'Özgeçmiş başarıyla silindi.');
    }

    public function makeActive(Cv $cv)
    {
        Cv::where('is_active', true)->update(['is_active' => false]);
        $cv->update(['is_active' => true]);

        return redirect()->route('admin.cv.index')->with('success', 'Seçilen özgeçmiş aktif edildi.');
    }
}
