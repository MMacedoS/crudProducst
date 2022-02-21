<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
  
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index',['tags' => $tags]);
    }

    public function create()
    {
        $tags = Tag::all();
        return view('tags.create',['tags' => $tags]);
    }

    public function tagJson()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }

    public function add(Request $request)
    {
        $tag = new Tag;
        $tag->name = $request->name;

        $tag->save();
        return back()->withStatus(__('tag criada com sucesso.'));
    }

    public function editById($id)
    {
        $tags = Tag::all();
        $tag = Tag::FindOrFail($id);
        return view('tags.create',['tag' => $tag,'tags' => $tags]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
              
        Tag::findOrFail($request->id)->update($data);
        return back()->withStatus(__('tag atualizada com sucesso.'));
    }

    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();

        return back()->withStatus(__('Tag deletado com sucesso!'));
    }
}
