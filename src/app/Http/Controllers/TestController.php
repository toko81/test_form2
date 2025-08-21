<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function admin()
    {
        return view('admin');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->validated();
          
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only([
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'category_id',
        'detail'
        ]);
        
        if (!isset($contact['building'])) {
        $contact['building'] = null;
        }

        Contact::create($contact);

        return view('thanks');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        return redirect('/login');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        return redirect('/admin');
    }
}
