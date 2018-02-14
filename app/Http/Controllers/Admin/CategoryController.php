<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\ImageUploader;
use App\Http\Controllers\Controller;
use App\Categories;
use Illuminate\Support\Facades\Input;

use App\Post;
use Auth;
use Session;



class CategoryController extends Controller
{

    use ImageUploader;

    public function __construct()
    {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }


    /**
     * Display a listing of the category.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewCategoryPage()
    {
        $categories = Categories::query()
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.category.categoryView', compact('categories'));
    }


    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function actionAddCategoryView()
    {
        return view('admin.category.categoryAdd');
    }


    /**
     * Store a newly created category in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function actionAdminAddCategory(Request $request)
    {
        //Validate
        $this->validate($request, [
            'name' => 'required',
        ]);

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


    /**
     * Show the form for editing the specified category
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewAdminUpdateCategory($id)
    {
        $category = Categories::find($id);

        return view('admin.category.categoryUpdate', compact('category'));
    }


    /**
     * Update the specified category in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function actionAdminSaveUpdate(Request $request)
    {
        //Validate
        $this->validate($request, [
            'name' => 'required',
        ]);

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


    /**
     * Remove the specified category from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function actionCategoryDelete($id)
    {
        $categoryDelete = Categories::find($id);
        $categoryDelete->delete();
        return \redirect(route('viewCategory'));
    }

}
