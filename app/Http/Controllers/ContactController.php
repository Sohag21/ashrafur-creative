<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = Message::latest()->paginate(10);
        return view('pages.back.contact.index', compact('data'));
    }

    // Delete $message
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->back()
            ->with('error', 'Message deleted successfully');
    }
}
