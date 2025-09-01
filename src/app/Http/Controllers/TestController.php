<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Symfony\Component\HttpFoundation\StreamedResponse;

class TestController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        
        return view('contact', compact('categories'));
    }

    public function admin()
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();
        $csvData = Contact::all();
        
        return view('admin',compact('contacts', 'categories','csvDate'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->all();$category = Category::find($request->category_id);
          
        return view('confirm', compact('contacts', 'category'));
    }

    public function store(ContactRequest $request)
    {
        if ($request->has('back')) {
            return redirect('/')->withInput();
        }

        $request['tell'] = $request->tel_1 . $request->tel_2 . $request->tel_3;
        Contact::create(
            $request->only([
               'first_name',
                'last_name',
                'gender',
                'email',
                'tell',
                'address',
                'building',
                'category_id',
                'detail'
            ])
        );

        return view('thanks');
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
