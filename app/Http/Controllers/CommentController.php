<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Item;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Item $item)
    {
        $validated = $request->validate([
            'content' => 'required|string'
        ]);

        $comment = new Comment($validated);
        $comment->user_id = auth()->id();
        $comment->item_id = $item->id;
        $comment->save();

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
    }

    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);
        
        $validated = $request->validate([
            'content' => 'required|string'
        ]);

        $comment->update($validated);

        return redirect()->route('items.show', $comment->item_id)
            ->with('success', 'Commentaire mis à jour avec succès.');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        
        $comment->delete();
        return redirect()->back()
            ->with('success', 'Commentaire supprimé avec succès.');
    }
}
