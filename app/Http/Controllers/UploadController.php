<?php

namespace App\Http\Controllers;
use App\Models\Upload;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    public function upload(Request $request){
        $validator = Validator::make($request->all(), [
            'file' => 'file|mimes:pdf,docx,mp4|max:102400',
            'name' => 'required',
            'description' => 'required',
        ], [
            'file.mimes' => 'File must be a PDF, DOCX, or MP4',
            'file.max' => 'File size must not exceed 100 MB',
            'name.required' => 'Name is required',
            'description.required' => 'Description is required',
        ]);
        if($validator->fails()){
            $message = $validator->messages()->all()[0];
            flash()->addError($message);
            return back()->withInput();
        }else{
            
            $filepath = null;
            $link = null;
            
            if($request->file('file')){
                $filepath = $request->file('file')->store('public');
            }
            if($request->link){
                $link = $request->link;
            }
            
            $file_form = [
                'name' => $request->name,
                'description' => $request->description,
                'cooperative_id' => null,
                'link' => $link,
                'file_path' => $filepath
            ];
            Upload::create($file_form);

            $notification = [
                'title' => 'File/Link Successfully Uploaded',
                'message' => $request->name . ' has been Successfully Uploaded',
            ];
            Notification::create($notification);

            flash()->addSuccess('File/Link Successfully Upload');
            return redirect('/cooperative');
        }
    }
}
