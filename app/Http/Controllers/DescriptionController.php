<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\DataTables\DescriptionDataTable;
use App\Providers\SuccessMessages;
use App\Models\Description;
use App\Models\Project;
use App\Models\Experience;

class DescriptionController extends Controller
{
    // Description Table
    public function list(Request $request) {
        // DataTable
        $dataTable = new DescriptionDataTable();

        $vars['descriptionTable'] = $dataTable->html();

        // Projects
        $projects = Project::select('name', 'id')->get();
        // Experiences
        $experiences = Experience::select('title','id')->get();

        return view('descriptionList', $vars, compact('projects','experiences'));
    }

    // DataTable
    public function descriptionTable(DescriptionDataTable $dataTable) {
        return $dataTable->render('descriptionList');
    }
    
    // Store Description
    public function store(Request $request,SuccessMessages $message)
    {
        $validation = Validator::make($request->all(), [
            'experienceBox' => 'required_without:projectBox',
            'size' => 'required_without:experienceBox'
        ]);

        $error_array = array();
        $success_output = '';
        
        // Validation
        if($validation->fails()) {
            foreach($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        }
        else {
            // Insert
            if($request->get('button_action') == "insert") {
                $this->addDescription($request);
                $success_output = $message->getInsert();
            }
            // Update
            else if($request->get('button_action') == "update") {
                $this->addDescription($request);
                $success_output = $message->getUpdate();
            }
        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );

        return json_encode($output);
    }

    // Add Or Update Description
    public function addDescription($request) {
        // Edit
        $description = Description::find($request->get('id'));
        if(!$description) {
            // Insert
            $description = new Description();
        }
        $description->desc = $request->get('desc');
        $description->project_id = $this->subSet($request->get('projectBox'));
        $description->experience_id = $this->subSet($request->get('experienceBox'));
        $description->size = $request->get('size');

        $description->save();
    }

    // SubSet
    public function subSet($request) {
        switch($request) {
            case '':
                return null;
                break;
            default:
                return $request;
        }
    }

    // Delete Each Description
    public function delete(Request $request, $id) {
        $description = Description::find($id);
        if($description) {
            $description->delete();
        }
        else {
            return response()->json([], 404);
        }
        return response()->json([], 200);
    }    
}
