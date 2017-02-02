<?php

namespace App\Repositories;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class AppSecurity
{
    use ValidatesRequests;

    public function encryptedPassword($encryptedPassword)
    {
        return md5($encryptedPassword);
    }

    public function uploadFile(Request $request){

        $this->validate($request, [
            'file' => 'required|max:1000|mimes:png,doc,docx,xls,xlsx,ppt,pptx,pdf',
        ],[
            'mimes' => 'Invalid File Format',
            'max' => 'File size must not be greater than 1MB',
        ]);

        if($request->file('file')->isValid()){

            try {
                $path = public_path(). '/uploads/';
                $path = str_replace("\\","/",$path);
                $extension = $request->file('file')->getClientOriginalExtension();
                $new_filename = strtotime(date('Y-m-d H:i:s')).'.' .$extension;
                $request->file('file')->move($path,$new_filename);

            } catch (\Exception $ex) {
                $path = public_path() . '\\uploads\\';
                $extension =  $request->file('file')->getClientOriginalExtension();
                $new_filename = strtotime(date('Y-m-d H:i:s')).'.' .$extension;
                $request->file('file')->move($path,$new_filename);
            }

        }
    }
}