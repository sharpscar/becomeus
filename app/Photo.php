<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Image;

class Photo extends Model
{
    //
    protected $table = 'product_photos';

    protected $fillable = ['path','name','thumbnail_path'];

    protected $baseDir = 'photos';

    public function product()
    {
      return $this->belongsTo('App\Product');
    }

    public static function named($name)
    {
      return (new static)->saveAs($name);
      // return (new static)   $photo = new static;
    }

    public function saveAs($name)
    {
      $this->name = sprintf("%s-%s", time(), $name);
      $this->path = sprintf("%s/%s", $this->baseDir, $this->name);
      $this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir.'/thumbnail', $this->name);

      return $this;
    }

    public function move(UploadedFile $file)
    {
      $file->move($this->baseDir, $this->name);

      $this->makeThumbnail();
      return $this;

    }

    public function makeThumbnail()
    {
      /** 목적 크기는   width: 50px  height:50px
      * 너비나 높이 둘중 큰것을 목적크기로 나누고 그 몫을
      *  작은것도 같은 비율로 나눠서 리사이징 해야됨
      **/
      Image::make($this->path)
        // ->fit(50,35.9)
        ->resize(50,null, function($constraint){
          $constraint->aspectRatio();
        })
        ->save($this->thumbnail_path);

    }
}
