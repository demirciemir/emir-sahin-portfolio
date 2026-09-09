<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('order', 'asc')->latest()->get();
        return view('admin.clients.index', compact('clients'));
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:clients,id',
        ]);

        foreach ($request->order as $index => $id) {
            Client::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
        ]);

        $data = $request->except('logo_image');
        $data['slug'] = $request->filled('slug') ? \Illuminate\Support\Str::slug($request->slug) : \Illuminate\Support\Str::slug($request->name);

        if ($request->hasFile('logo_image')) {
            $file = $request->file('logo_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/clients'), $filename);
            $data['logo_image'] = 'assets/img/clients/' . $filename;
        }

        Client::create($data);

        return redirect()->route('admin.clients.index')->with('success', 'Marka başarıyla eklendi.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
        ]);

        $data = $request->except('logo_image');
        $data['slug'] = $request->filled('slug') ? \Illuminate\Support\Str::slug($request->slug) : \Illuminate\Support\Str::slug($request->name);

        if ($request->hasFile('logo_image')) {
            // Mevcut dosyayı sil
            if ($client->logo_image && File::exists(public_path($client->logo_image))) {
                File::delete(public_path($client->logo_image));
            }

            $file = $request->file('logo_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/clients'), $filename);
            $data['logo_image'] = 'assets/img/clients/' . $filename;
        }

        $client->update($data);

        return redirect()->route('admin.clients.index')->with('success', 'Marka başarıyla güncellendi.');
    }

    public function destroy(Client $client)
    {
        if ($client->logo_image && File::exists(public_path($client->logo_image))) {
            File::delete(public_path($client->logo_image));
        }
        
        $client->delete();
        
        return redirect()->route('admin.clients.index')->with('success', 'Marka başarıyla silindi.');
    }
}
