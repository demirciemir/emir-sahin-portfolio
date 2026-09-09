<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $platforms = SocialMedia::orderBy('order')->get();
        return view('admin.social_media.index', compact('platforms'));
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:social_media,id',
        ]);

        foreach ($request->order as $index => $id) {
            SocialMedia::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }

    public function create()
    {
        return view('admin.social_media.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon_class' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
        ]);

        $order = SocialMedia::max('order') + 1;

        SocialMedia::create([
            'name' => $request->name,
            'icon_class' => $request->icon_class,
            'url' => $request->url,
            'is_active' => $request->has('is_active'),
            'order' => $order,
        ]);

        return redirect()->route('admin.social-media.index')->with('success', 'Sosyal medya hesabı başarıyla eklendi.');
    }

    public function edit(SocialMedia $socialMedia)
    {
        return view('admin.social_media.edit', compact('socialMedia'));
    }

    public function update(Request $request, SocialMedia $socialMedia)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon_class' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
        ]);

        $socialMedia->update([
            'name' => $request->name,
            'icon_class' => $request->icon_class,
            'url' => $request->url,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.social-media.index')->with('success', 'Sosyal medya hesabı güncellendi.');
    }

    public function destroy(SocialMedia $socialMedia)
    {
        $socialMedia->delete();
        return redirect()->route('admin.social-media.index')->with('success', 'Sosyal medya hesabı silindi.');
    }

    public function toggleActive(SocialMedia $socialMedia)
    {
        $socialMedia->update(['is_active' => !$socialMedia->is_active]);
        return redirect()->back()->with('success', 'Durum güncellendi.');
    }
}
