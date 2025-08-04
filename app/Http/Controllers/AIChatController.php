<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;
use Illuminate\Support\Facades\Auth;

class AIChatController extends Controller
{
    protected $ai;

    public function __construct(OpenAIService $ai)
    {
        $this->ai = $ai;
    }

    public function chat(Request $request)
    {
        $messages = $request->input('messages');
        $result = $this->ai->chat($messages);
        return response()->json($result);
    }
}