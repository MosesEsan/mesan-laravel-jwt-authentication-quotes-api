<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Quote;

class QuoteController extends Controller
{
    /**
     * Retrieve alll quotes.
     */
    public function index(Request $request)
    {
        $quotes = Quote::orderBy('created_at', 'desc')->get();

        return response()->json([ 'success' => true, 'data' => ['quotes' => $quotes]]);
    }

    /**
     * Create a new quote.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $post = $user->quotes()->create($post);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }
}
