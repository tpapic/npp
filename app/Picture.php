<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'filename', 'description', 'extension', 'filesize', 'user_id'
    ];

    protected $appends = [
        'full_path', 'full_thumb_path', 'hashtags_string'
    ];

    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullPathAttribute() {
        $path = 'http://localhost:7777/storage/img';
        return $path . '/' . $this->filename; 
    }

    public function getFullThumbPathAttribute() {
        $path = 'http://localhost:7777/storage/img';
        return $path . '/thumb-' . $this->filename; 
    }

    public function getHashtagsStringAttribute() {
        $hashtags = $this->hashtags;
        $formatHastags = '';
        foreach($hashtags as $hash) {
            $formatHastags .= $hash->hashtag_format;
        }

        return $formatHastags;
    }

    public function syncHashtags($hashtags) {
        if(isset($hashtags) && !empty($hashtags)) {
            $hashtags = array_filter(explode('#', $hashtags));
            $hashtagsObj = [];
            foreach($hashtags as $h) {
                $hashtag = Hashtag::where('name', '=', $h)->first();
                if($hashtag) {
                    $hashtagsObj[] = $hashtag->id;
                } else {
                    $hash = Hashtag::create(['name' => $h]);
                    $hashtagsObj[] = $hash->id;
                }
            }
            $this->hashtags()->sync($hashtagsObj);
        }
    }

    public function scopeHashtagsFilter($query, $hashtags) {
        return $query->whereHas('hashtags', function($query) use ($hashtags) {
            $query->where('name', $hashtags);
        });
    }

    public function scopeAuthorFilter($query, $authors) {
        return $query->whereHas('user', function($query) use ($authors) {
            $query->whereIn('id', $authors);
        });
    }

    public function scopeSizeFilter($query, $data) {
        return $query->where('filesize', $data['operator'], $data['filesize']);
    }

    public function scopeUploadDateFilter($query, $data) {
        return $query->whereDate('created_at','>=', $data[0])
                    ->whereDate('created_at','<=', $data[1]);
    }
}
