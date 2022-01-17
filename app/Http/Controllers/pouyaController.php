<?php

namespace App\Http\Controllers;

use DataTables;
use Auth;
use File;
use DB;
use Illuminate\Http\Request;
use App\Models\Pouya;
use App\Models\Experience;
use App\Models\Universities;
use App\Models\Publication;
use App\Models\User;
use App\Models\Skill;
use App\Models\HomeSetting;
use App\Models\Refree;
use App\Models\Media;
use App\Models\Description;
use App\Models\Media_text;
use App\Models\Project;
use App\Models\link;
use App\Models\SubProject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class pouyaController extends Controller
{

    // CV page
    public function indexCv()
    {
        $vars['experiences'] = Experience::all();      
        $vars['publications'] = Publication::all();      
        $vars['skills'] = Skill::all();   
        $vars['refrees'] = Refree::all();   

        return view('cv', $vars);
    }

    // login
    public function indexLogin()
    {
        return view('login.login');
    }

    
    // // Getting Email from User
    // public function storeEmail()
    // {
    //     $data = request()->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'message' => 'required'
    //     ]);
    //     // Send An Email
    //     Mail::to('aba7bb255e-dd51c1@inbox.mailtrap.io')->send(new ContactFormMail($data));
    //     return back()->with('success', 'You have successfully sumbitted data'); 
    // }

}