<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait ImageTrait
{
    public function setImageAttribute($value,$attribute=null)
    {
        $attribute_name = $attribute ? $attribute : "image";
        $disk = "public_uploads";
        $destination_path = 'uploads';

        if (starts_with($value, 'data:image')) {

            // 0. Get image extension
            preg_match("/^data:image\/(.*);base64/i", $value, $match);
            $extension = @$match[1];
            if(empty($extension)){
                $extension = "jpg";
            }
            // 1. Make the image
            $image = \Image::make($value);

            if (!is_null($image)) {
                // 2. Generate a filename.
                if(!empty($this->name)){
                    $filename = Str::slug($this->name,'-');
                }
                elseif(!empty($this->title)){
                    $filename = Str::slug($this->title,'-');
                }
                else{
                    $filename = Str::slug($this->id,'-');
                }
                $filename .= '-'.md5($value.time()).'.'.$extension;

                try {
                    // 3. Store the image on disk.
                    $info = \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

                    // 4. Save the path to the database
                    $this->attributes[$attribute_name] = $destination_path.'/'.$filename;
                } catch (\InvalidArgumentException $argumentException) {
                    // 3. failed to save file
                    \Alert::error($argumentException->getMessage())->flash();
                    // 4. set as null when fail to save the image to disk
                    $this->attributes[$attribute_name] = null;
                }
            }
        } else {
            /**
             * @Backpack\CRUD\CrudTrait
             */
            $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
        }
    }


    public function uploadImage($value,$attribute_name,$disk,$destination_path,$filename)
    {

        if (starts_with($value, 'data:image')) {

            preg_match("/^data:image\/(.*);base64/i", $value, $match);
            $extension = @$match[1];
            if(empty($extension)){
                $extension = "jpg";
            }

            $image = \Image::make($value);
            if (!is_null($image)) {

                $filename .= '-'.substr(md5($value.time()), 28, -1).'.'.$extension;

                try {

                    $info = \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

                    $this->attributes[$attribute_name] = $destination_path.'/'.$filename;
                } catch (\InvalidArgumentException $argumentException) {

                    \Alert::error($argumentException->getMessage())->flash();

                    $this->attributes[$attribute_name] = null;
                }
            }
        } else {
            $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
        }
    }
}