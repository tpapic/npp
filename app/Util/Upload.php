<?php

namespace App\Util;

use Image;
use App\Media;
use App\Configuration;

class Upload {

    public static $mediaFolder = 'media';

    public static $imageMimeTypes = [
        'image/bmp', 'image/jpg', 'image/jpeg', 'image/gif', 'image/png'
    ];

    public static $wordMimeTypes = [
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    ];

    public static $excelMimeTypes = [
        'application/vnd.ms-excel','application/vnd.ms-office'
    ];

    public static function normalize($path) {
        return strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $path));
    }

    public static function random($length = 5) {
        // @codingStandardsIgnoreStart
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // @codingStandardsIgnoreEnd
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function convertBase64ToFile($string, $file) {
        $ifp = fopen($file, 'wb');
        $data = explode(',', $string);
        $success = (isset($data[1])) ? fwrite($ifp, base64_decode($data[1])) : fwrite($ifp, base64_decode($data[0]));
        fclose($ifp);
        return $success;
    }

    /*
     * 'file'* => base64 representation of file
     * 'filename'* => current file name, it will be changed on server
     * 'title' => title of file
     * 'description' => description of file
     * 'alt' => alternative of file
     */
    public static function upload($data = []) {
        $result = ['success' => false];
        /* check if empty */
        if(empty($data)) {
            $result['reason'] = 'no_data';
            return $result;
        }

        /* check if file is provided */
        if(!isset($data['file']) || strlen($data['file']) === 0) {
            $result['reason'] = 'no_file';
            return $result;
        }

        /* check if filename is provided */
        if(!isset($data['filename']) || strlen($data['filename']) === 0) {
            $result['reason'] = 'no_filename';
            return $result;
        }

        /* /public/media/ */
        $path = public_path() . DIRECTORY_SEPARATOR . Upload::$mediaFolder . DIRECTORY_SEPARATOR;

        /* check if directory exist, create if not, "true" means recursive */
        $created = true;
        if(!is_dir($path)) { $created = mkdir($path, 0755, true); }

        /* probably no permissions */
        if(!$created) {
            $result['reason'] = 'no_directory_permission';
            return $result;
        }

        /* get extension */
        $extension = explode('.', $data['filename']);
        $extension = end($extension);

        /* normalize filename:
           remove extension, normalize, bring back extension
        */
        $filenameNormalized = self::normalize(rtrim($data['filename'], $extension))
            . '.' . $extension;

        /* generate server name */
        $serverName = self::random(10) . '_' . $filenameNormalized;

        /* generate file with full path */
        $filePath = $path . $serverName;

        /* try saving the file */
        if(!self::convertBase64ToFile($data['file'], $filePath)) {
            $result['reason'] = 'no_file_permission';
            return $result;
        }

        /* detect mime type */
        $mime = mime_content_type($filePath);

        $width = 0;
        $height = 0;


        if(in_array($mime, self::$imageMimeTypes)) {
            /* create thumbnail */
            Upload::createThumbnail(['filename' => $serverName]);

            /* detect width & height */
            list($width, $height) = getimagesize($filePath);
        }

        /* get filesize */
        $filesize = filesize($filePath);

        /* create media object */
        $media = [
            'filename'          => $serverName,
            'original_filename' => $data['filename'],
            'mime_type'         => $mime,
            'filesize'          => $filesize,
        ];


        /* add title, if provided */
        if(isset($data['title']) && strlen($data['title']) > 0) {
            $media['title'] = $data['title'];
        }

        /* add alt, if provided */
        if(isset($data['alt']) && strlen($data['alt']) > 0) {
            $media['alt'] = $data['alt'];
        }

        /* add description, if provided */
        if(isset($data['description']) && strlen($data['description']) > 0) {
            $media['description'] = $data['description'];
        }

        /* add caption, if provided */
        if(isset($data['caption']) && strlen($data['caption']) > 0) {
            $media['caption'] = $data['caption'];
        }

        $media = Media::create($media);

        if($media->save()) {
            return [
                'success' => true,
                'media_id' => $media->id,
                'filename' => $serverName
            ];
        }

        return ['success' => false, 'reason' => 'media_save_not_successful'];
    }

    public static function createThumbnail($data) {
        $result = ['success' => false];
        if(!$data['filename']) { // somePicture.jpg
            $result['reason'] = 'no_image_name';
            return $result;
        }

        $media = Upload::$mediaFolder . DIRECTORY_SEPARATOR;

        $img = Image::make($media . $data['filename']);
        $configurations = Configuration::getMediaSettings();

        /* default */
        $width = 100;
        $height = 100;

        foreach($configurations as $conf) {
            if($conf->key === 'media_thumbnail_width') { $width = $conf->value; }
            if($conf->key === 'media_thumbnail_height') { $height = $conf->value; }
        }
        $img->fit($width, $height);
        $img->save($media . 'thumb-' . $data['filename']);
    }

}
