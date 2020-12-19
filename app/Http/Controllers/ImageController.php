<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function upload(Request $request)
    {
        $this->validate($request, [ "image" => "required|image|max:6000" ]);
        return $this->storeImageOnS3($request);
        // return $request->all();
    }

    
    public function index(Request $request)
    {

        $images = $this->getImages($request->q);

        return view('index-image', ['images' => $images, 'q' => $request->q]);
    }

    protected function getImages($q = null)
    {
        $user = request()->user();

        $images = ($q) ? $this->image->where('reference', 'LIKE', "%$q%") : $this->image;

        if (!$this->isAsAdmin()) {
            $images = $images->where('profile_id', $user->acting_profile_id);
        }

        return $images->orderBy('updated_at', 'desc')->get();
    }

    public function create()
    {
        return view('create-image');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "reference" => "required|max:255",
            "image" => "required|image|max:6000"
        ]);

        if($request->hasFile('image')) {
            $this->storeImageOnS3($request);
        }

        return redirect()->route('pics.index');
    }

    protected function storeImageOnS3(Request $request)
    {
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
                "reference" => $request->reference ?? '',
                "key" => $fileNameToStore,
                "url" => Storage::cloud()->url($fileNameToStore),
                "profile_id" => $request->user()->acting_profile_id,
            ]);

            \Log::info($image->id);

            return $image;
        }

        return null;
    }
}
