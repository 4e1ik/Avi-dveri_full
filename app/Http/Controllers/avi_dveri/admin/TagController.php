<?php

namespace App\Http\Controllers\avi_dveri\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::query()
            ->withCount('products')
            ->orderBy('name')
            ->get();

        return view('avi-dveri.admin.tags.index', compact('tags'));
    }

    public function create(): View
    {
        return view('avi-dveri.admin.tags.create');
    }

    public function store(StoreTagRequest $request): RedirectResponse
    {
        Tag::query()->create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin_tags')->with('success', 'Тег создан');
    }

    public function edit(Tag $tag): View
    {
        return view('avi-dveri.admin.tags.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, Tag $tag): RedirectResponse
    {
        $tag->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin_tags')->with('success', 'Тег обновлён');
    }

    public function toggleVisibility(Tag $tag): RedirectResponse
    {
        $tag->update(['is_visible' => !$tag->is_visible]);

        return redirect()->route('admin_tags')->with(
            'success',
            $tag->is_visible ? 'Тег включён' : 'Тег выключен'
        );
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()->route('admin_tags')->with('success', 'Тег удалён');
    }
}
