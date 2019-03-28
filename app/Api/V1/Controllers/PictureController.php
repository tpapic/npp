<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Picture;
use App\Helpers\Filters\FilterFactory;
use Auth;
use App\Api\V1\Requests\PictureStoreRequest;
use Symfony\Component\Debug\Exception\ClassNotFoundException;

class PictureController extends AppController
{
    public function index() {
        $user = Auth::user();
        if($user->role_id === 2) {
            $pictures = Picture::with('hashtags')
                                ->where('user_id', $user->id)->paginate(3);
        } else {
            $pictures = Picture::with('hashtags')->paginate(3);
        }

        return ['success' => true, 'data' => $pictures];
    }

    public function allPictures(Request $request) {
        $data = $request->input();
//        dd($data);
        $query = Picture::query();

        if(isset($data['hashtags_filter']) && !empty($data['hashtags_filter'])) {
            $query = $query->hashtagsFilter($data['hashtags_filter']);
        }

        if(isset($data['dates_filter']) && !empty($data['dates_filter'])) {
            $query = $query->uploadDateFilter($data['dates_filter']);
        }

        if(isset($data['authors_filter']) && !empty($data['authors_filter'])) {
            $query = $query->authorFilter($data['authors_filter']);
        }

        if(isset($data['size_filter']) && !empty($data['size_filter'])) {
            $query = $query->sizeFilter($data['size_filter']);
        }

        $pictures = $query->get();

        return ['success' => true, 'data' => $pictures];
    }

    public function add(PictureStoreRequest $request) {
        $path = public_path('storage/img');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $data = $request->input();

        $imgName = time() . '-' .$data['filename'];
        $user = Auth::user();
        
        $orginalImg = $path . '/' . $imgName;
        $thumbImg = $path . '/thumb-' . $imgName;

        $img = Image::make($data['file'])->save($orginalImg);
        Image::make($data['file'])->save($thumbImg);

        $updatePackage = $user->uplaodPicturePackage($img->filesize());

        if($updatePackage['success'] === false) {
            unlink($orginalImg);
            unlink($thumbImg);
            return $updatePackage;
        }

        $dbData = [
            'filename' => $imgName,
            'description' => $data['description'],
            'extension' => \File::extension($orginalImg),
            'filesize' => $img->filesize(),
            'user_id' => $user->id
        ];

        $picture = Picture::create($dbData);

        $picture->syncHashtags($data['hashtags']);

        if(!$picture) {
            return ['success' => false];
        }
        if(isset($data['filters']) && !empty($data['filters'])) {
            try {
                FilterFactory::factory($imgName, $data['filters'], $path);
            }
            catch (\Exception $e) {
                return ['success' => false, 'reason' => $e->getMessage()];
            }
        }

        return ['success' => true, 'picture_name' => $imgName, 'id' => $picture->id];
    }

    public function show($id)
    {
        $picture = Picture::with('hashtags')->findOrFail($id);

        return [
            'success' => true,
            'data' => $picture
        ];
    }

    public function edit(Request $request, $id) {
        $data = $request->input();

        $dbData = [
            'description' => $data['description'],
        ];

        $picture = Picture::findOrFail($id);
        $picture->update($dbData);

        $picture->syncHashtags($data['hashtags']);

        if(!$picture) {
            ['success' => false];
        }

        return ['success' => true];
    }

    public function download(Request $request) {
        $data = $request->input();

        $path = public_path('storage/img');
        $webPath = 'http://localhost:7777/api/download_file';

        $picture = Picture::findOrFail($data['id']);
        
        if(isset($data['filters']) && !empty($data['filters'])) {
           $filter = FilterFactory::factory($picture->filename, $data['filters'], $path, true);

           return ['success' => true, 'path' => $webPath . '/'. $filter->getFilename(), 'picture_name' => $picture->filename];
        }

        return ['success' => true, 'path' => $webPath . '/'. $picture->filename, 'picture_name' => $picture->filename];
    }

    public function downloadFile($file) {
        $path = public_path('storage/img');
        $filePath = $path . '/' . $file;
        return response()->download($filePath);
    }
}
