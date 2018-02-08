<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\ImageUploader;
use App\Http\Controllers\Controller;
use App\Categories;
use Illuminate\Support\Facades\Input;


class CategoryController extends Controller
{

    use ImageUploader;

    // Управление категориями
    public function viewCategoryPage()
    {
        $categories = Categories::query()
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.category.categoryView', ['categories' => $categories]);
    }

    // View редактирование категории
    public function viewAdminUpdateCategory($id)
    {
        $category = Categories::find($id);

        return view('admin.category.categoryUpdate', ['category' => $category]);
    }

    // Action сохранить редактироование категории
    public function actionAdminSaveUpdate(Request $request)
    {
        $path = '/category';  // Папка для загрузки картинки
        $data = Input::except(['_method', '_token']);
        $categoryData = Categories::find($data['id']);
        $categoryData->update($data);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = 'categoryImage' . rand(123, 655555) . '.' . $file->getClientOriginalExtension();

            if ($file->move(public_path() . '/uploads' . $path, $name)) {
                $dataImage = ['image' => $name];
                $categoryData = Categories::find($data['id']);
                $categoryData->update($dataImage);
            }
        }
        return \redirect(route('viewCategory'));
    }

    //Action удаление категории
    public function actionCategoryDelete($id)
    {
        $categoryDelete = Categories::find($id);
        $categoryDelete->delete();
        return \redirect(route('viewCategory'));
    }


    public function actionAddCategoryView()
    {
        return view('admin.category.categoryAdd');
    }

    // Добавление новой категории
    public function actionAdminAddCategory(Request $request)
    {
        $path = '/category';  // Папка для загрузки картинки

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = 'categoryImage' . rand(123, 655555) . '.' . $file->getClientOriginalExtension();

            if ($file->move(public_path() . '/uploads' . $path, $name)) {
                $fileName = $name;

                $data = Input::except(['_method', '_token']);
                $categoryName = $data['name'];
                $status = $data['status'];

                $dataCategory = ['name' => $categoryName, 'status' => $status, 'image' => $fileName];

                Categories::create($dataCategory);
            }
        } else {
            $data = Input::except(['_method', '_token']);
            $categoryName = $data['name'];
            $status = $data['status'];

            $dataCategory = ['name' => $categoryName, 'status' => $status];

            Categories::create($dataCategory);
        }

        return \redirect(route('addCategory'));
    }


}
