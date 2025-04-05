<?php

namespace App\Http\Controllers;

use App\Models\ArticleType;
use Illuminate\Http\Request;

class ArticleTypeController extends Controller
{
    function index()
    {
        $article_types = ArticleType::paginate(10);
        return view('admin.article_type.index', compact('article_types'));
    }
    function store(Request $request)
    {
        $Input = $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Name is required',
            ]
        );
        $msg = 'Added';

        if ($request->update_id) {
            $msg = 'Updated';
        }
        ArticleType::UpdateOrCreate(['id' => $request->update_id], $Input);

        return response()->json([
            'success' => 'Article Type ' . $msg . ' Successfully',
            'redirect' => route('admin.article_type.index'),
        ]);
    }
    function edit(ArticleType $article)
    {
        return response()->json([
            'data' => $article,
        ]);
    }
}
