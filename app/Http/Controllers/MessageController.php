<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageCreateRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(MessageCreateRequest $request)
    {
        $validated = $request->validated();
        Message::query()
            ->create($validated);
        return redirect()->route('home');
    }
}
