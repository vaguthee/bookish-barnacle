<?php

namespace App\Helpers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageManager
{

    public function __construct()
    {
        $this->image = new Image;
    }

    public function upload(Request $request, $reference)
    {
        if($request->hasFile('image')) {
            //get filename with extension
            $fileNameWithExtension = $request->file('image')->getClientOriginalName();
            //get filename without extension
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();
            $folder = config('filesystems.disks.s3.folder');
            //filename to store
            $fileNameToStore = $folder .'/'. $fileName.'_'.time().'.'.$extension;
            //Upload File to s3
            // $r = Storage::disk('s3')->put($fileNameToStore, fopen($request->file('image'), 'r+'), 'public');
            $isUploaded = Storage::cloud()->put($fileNameToStore, fopen($request->file('image'), 'r+'), 'public');

            if ($isUploaded) {
                $image = $this->image->create([
                    "reference" => $reference,
                    "key" => $fileNameToStore,
                    "url" => Storage::cloud()->url($fileNameToStore),
                    "profile_id" => $request->user()->acting_profile_id,
                ]);

                return $image;
            }
        }
    }
}
