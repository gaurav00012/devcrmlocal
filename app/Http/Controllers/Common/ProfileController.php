<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class ProfileController extends Controller
{
    //
    public function index()
    {
    	return view('common.profile.index');
    }

    public function saveprofile(Request $request)
    {
    	$result['success'] = true;
        $result['exception_message'] = '';
    	try{
    	$this->validate($request, [
       		 'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
   		 ]);
    	$user = Auth::user();
    	if($request->hasFile('user_image')) 
    	{
	        $image = $request->file('user_image');

	        $name = $user->id.'_'.time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = 'user-profile/';
	        $getUser = User::find($user->id);
	        $getUser->profile_picture = $name;
	        $getUser->save();
	        $image->move($destinationPath, $name);
	         //$this->save();

	        return back()->with('success','Image Upload successfully');
   		 }
   		} catch(\Exception $e){
        $result['success'] = false;   
        $result['error'] = $e->getMessage();
        return $result;
       }
    }

    private function fileupload($file,$fileDestination,$taskId,$commentId)
     {
       $result['success'] = true;
        $result['exception_message'] = array();
       
        $user = Auth::user();
            try{
            $destinationPath = $fileDestination;
            if (!file_exists($destinationPath)) {
               mkdir($destinationPath, 0755, true);
            }
            $extension = $file->getClientOriginalExtension();
            $validextensions = array("jpeg","jpg","png","pdf");
    
            $fileName = 'comment_'.str_slug(Carbon::now()->toDayDateTimeString()).'.' . $extension;
              // Uploading file to given path
             $file->move($destinationPath, $fileName); 
             $commentAttachment['task_id'] = $taskId;
             $commentAttachment['task_comment_id'] = $commentId;
             $commentAttachment['attachment_name'] = $fileName;
             $commentAttachment['created_by'] = $user->id;
             MasterTaskCommentAttachment::create($commentAttachment);
            }
            catch (\Exception $e) {
                $result['success'] = false;
                $result['exception_message'] = $e->getMessage();
            }
          return response()->json($result);
    }
}
