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
    public static function uploader(Request $request)
    {

        if ($request->isMethod('post')) {

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = 'goodImage' . rand(123, 655555) . '.' . $file->getClientOriginalExtension();
                if ($file->move(public_path() . '/uploads', $name)) {
                    return $name;
                }

            }
        }

        return false;

    }
}