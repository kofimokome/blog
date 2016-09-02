<?php

namespace kofi\Http\Controllers;

use Illuminate\Http\Request;

use kofi\Http\Requests;
use kofi\Contact;
use kofi\Notification;
use Validator;
use Session;

class ContactController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {
        $con = Contact::orderBy('id', 'desc')->paginate(10);
        return view('contacts.index')->withCon($con);
    }

    public function create(){
        return view('contacts.create');
    }

    public function show($id){
        $con=Contact::find($id);
        return view('contacts.show')->withCon($con);
    }
    public function store(Request $request){
        /*$this->validate($request, array(
            'name' => 'required|min:5',
            'email' => 'required|email',
            'subject' => 'required|min:4',
            'message' => 'required',
            'phone' => 'required|min:9|integer'
        ));*/

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'subject' => 'required|min:4',
            'message' => 'required',
            'phone' => 'required|min:9|integer'
        ]);

        if ($validator->fails()) {
            return redirect('contact')
                ->withErrors($validator)
                ->withInput();
        }

        $con=new Contact;
        $con->name=$request->name;
        $con->email=$request->email;
        $con->number=$request->phone;
        $con->subject=$request->subject;
        $con->message=$request->message;
        $con->save();

        //creating notification
        $not = new Notification;
        $not->user_id=1;
        $not->from=4;
        $not->message="from " . $request->name;
        $not->save();
        session()->put('msg','Thank you for your feedback');
        return view('pages.contact');
    }

    public function destroy($id)
    {
        $not=Contact::find($id);
        $not->delete();

        session()->put('msg','Contact form deleted');
        return redirect()->route('contacts.index');
    }
}
