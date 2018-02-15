<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sliders;
use App\ImageUploader;
use Illuminate\Support\Facades\Input;


class SlideController extends Controller
{
    use ImageUploader;

    public function __construct()
    {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }


    /**
     * Display a listing of the sliders.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewAllSliders()
    {
        $sliders = Sliders::all();

        return view('admin.slide.slideView', compact('sliders'));
    }


    /**
     * Show the form for creating a new slide.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewSliderAddPage()
    {
        return view('admin.slide.slideAdd');
    }


    /**
     * Store a newly created slider in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function actionSaveNewSlide(Request $request)
    {
        //Validating
        $this->validate($request, [
            'images[]' => 'image|mimes:jpg,png',
            'displaing' => 'required|integer',
        ]);

        $path = '/sliders';  // Папка для загрузки слайдов
        $fileName = self::uploader($request, $path);

        $data = Input::except(['_method', '_token']);
        $displaing = $data['displaing'];

        foreach ($fileName as $onefile) {
            $dataImages = ['filename' => $onefile, 'displaing' => $displaing];

            Sliders::create($dataImages);
        }

        return \redirect(route('viewSlideAdd'));
    }


    /**
     * Show the form for editing a slide.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewSlideUpdatePage($id)
    {
        $slide = Sliders::find($id);

        return view('admin.slide.slideUpdate', compact('slide'));
    }


    /**
     * Update a slide in storage.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function actionSlideSaveUpdate()
    {
        $data = $_POST;
        $slideData = Sliders::find($data['id']);
        $slideData->update($data);

        return \redirect(route('viewSliders'));
    }


    /**
     * Remove a slide from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function actionDeleteSlide($id)
    {
        $slideDelete = Sliders::find($id);
        $slideDelete->delete();
        return \redirect(route('viewSliders'));
    }


}
