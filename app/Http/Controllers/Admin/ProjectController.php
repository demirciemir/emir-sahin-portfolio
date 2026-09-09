<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $clients = \App\Models\Client::orderBy('name', 'asc')->get();
        $query = Project::with('client');

        if ($request->filled('client_id')) {
            $query->where('client_id', $request->client_id);
        }

        if ($request->filled('video_length')) {
            $query->where('video_length', $request->video_length);
        }

        $projects = $query->orderBy('order', 'asc')->latest()->get();
        
        return view('admin.projects.index', compact('projects', 'clients'));
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:projects,id',
        ]);

        foreach ($request->order as $index => $id) {
            Project::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }

    public function create()
    {
        $clients = \App\Models\Client::orderBy('name', 'asc')->get();
        return view('admin.projects.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'title' => 'required|string|max:255',
            'type' => 'required|in:video,image',
            'youtube_url' => 'nullable|url|required_if:type,video',
            'video_length' => 'nullable|in:short,long|required_if:type,video',
            'thumbnail_image' => 'nullable|image|max:10240|required_if:type,video',
            'image_path' => 'nullable|image|max:10240|required_if:type,image',
        ]);

        $data = $request->except(['thumbnail_image', 'image_path']);
        $data['slug'] = $request->filled('slug') ? \Illuminate\Support\Str::slug($request->slug) : \Illuminate\Support\Str::slug($request->title);

        if ($request->type == 'video' && $request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $filename = time() . '_thumb_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/projects'), $filename);
            $data['thumbnail_image'] = 'assets/img/projects/' . $filename;
        }

        if ($request->type == 'image' && $request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $filename = time() . '_img_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/projects'), $filename);
            $data['image_path'] = 'assets/img/projects/' . $filename;
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Proje başarıyla eklendi.');
    }

    public function edit(Project $project)
    {
        $clients = \App\Models\Client::orderBy('name', 'asc')->get();
        return view('admin.projects.edit', compact('project', 'clients'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'title' => 'required|string|max:255',
            'type' => 'required|in:video,image',
            'youtube_url' => 'nullable|url|required_if:type,video',
            'video_length' => 'nullable|in:short,long|required_if:type,video',
            'thumbnail_image' => 'nullable|image|max:10240',
            'image_path' => 'nullable|image|max:10240',
        ]);

        $data = $request->except(['thumbnail_image', 'image_path']);
        $data['slug'] = $request->filled('slug') ? \Illuminate\Support\Str::slug($request->slug) : \Illuminate\Support\Str::slug($request->title);

        if ($request->type == 'video') {
            $data['image_path'] = null;
            if ($request->hasFile('thumbnail_image')) {
                if ($project->thumbnail_image && File::exists(public_path($project->thumbnail_image))) {
                    File::delete(public_path($project->thumbnail_image));
                }
                $file = $request->file('thumbnail_image');
                $filename = time() . '_thumb_' . $file->getClientOriginalName();
                $file->move(public_path('assets/img/projects'), $filename);
                $data['thumbnail_image'] = 'assets/img/projects/' . $filename;
            }
        } elseif ($request->type == 'image') {
            $data['youtube_url'] = null;
            $data['thumbnail_image'] = null;
            if ($request->hasFile('image_path')) {
                if ($project->image_path && File::exists(public_path($project->image_path))) {
                    File::delete(public_path($project->image_path));
                }
                $file = $request->file('image_path');
                $filename = time() . '_img_' . $file->getClientOriginalName();
                $file->move(public_path('assets/img/projects'), $filename);
                $data['image_path'] = 'assets/img/projects/' . $filename;
            }
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Proje başarıyla güncellendi.');
    }

    public function destroy(Project $project)
    {
        if ($project->thumbnail_image && File::exists(public_path($project->thumbnail_image))) {
            File::delete(public_path($project->thumbnail_image));
        }
        if ($project->image_path && File::exists(public_path($project->image_path))) {
            File::delete(public_path($project->image_path));
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Proje başarıyla silindi.');
    }
}
