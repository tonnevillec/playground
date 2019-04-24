<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Attachments extends Model
{
    protected $guarded = [];

    public $appends = ['url'];

    public function attachable ()
    {
        return $this->morphTo();
    }

    public function uploadFile (UploadedFile $file)
    {
        $file = $file->storePublicly('uploads', ['disk' => 'public']);
        $this->name = basename($file);

        return $this;
    }

    public function getUrlAttribute ()
    {
        return Storage::disk('public')->url('/uploads/' . $this->name);
    }
}
