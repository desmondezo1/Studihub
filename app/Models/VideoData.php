<?php

namespace Studihub\Models;

use Illuminate\Database\Eloquent\Model;

class VideoData extends Model
{
    protected $table = "video_datas";

    protected $fillable = ['views','topic_id',
        'completed','replayed','embed_url',
        'mime_type','path','thumbnai','size'];

    protected $guarded = ['id'];


    public function topics(){
        return $this->belongsTo("Studihub\Models\Topic");
    }
}
