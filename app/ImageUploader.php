<?php
/**
 * Created by PhpStorm.
 * User: MacBook
 * Date: 20.11.17
 * Time: 23:03
 */

namespace App;


use Illuminate\Http\Request;

trait ImageUploader
{
    public static function uploader(Request $request, $path = '')
    {
        if ($request->isMethod('post')) {

            if ($request->hasFile('images')) {
                $files = $request->file('images');
                $result = [];
                foreach ($files as $file) {
                    $name = 'goodImage' . rand(123, 655555) . '.' . $file->getClientOriginalExtension();
                    if ($file->move(public_path() . '/uploads' . $path, $name)) {
                        //return $name;
                        $result[] = $name;
                    }
                }
                return $result;
            }
        }

        return false;

    }

}