<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContentBlock;

class ContentController extends Controller
{
    public function index()
    {
        $blocks = ContentBlock::orderBy('key')->get();

        return view('admin.content.index', compact('blocks'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'blocks' => ['array'],
            'blocks.*.value' => ['nullable', 'string'],
        ]);

        foreach ($data['blocks'] ?? [] as $id => $payload) {
            $block = ContentBlock::find($id);
            if (! $block) {
                continue;
            }
            $block->value = $payload['value'] ?? '';
            $block->save();
        }

        return redirect()->route('admin.content.index')->with('success', 'Content updated.');
    }
}
