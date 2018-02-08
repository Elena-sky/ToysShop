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

    // View Управление слайдерами
    public function viewAllSliders()
    {
        $sliders = Sliders::all();

        return view('admin.slide.slideView', ['sliders' => $sliders]);
    }

    //View Добавление нового слайдера
    public function viewSliderAddPage()
    {

        return view('admin.slide.slideAdd');
    }

    // Action Добавление нового слайдера
    public function actionSaveNewSlide(Request $request)
    {

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

    // View редактирование слайда
    public function viewSlideUpdatePage($id)
    {
        $slide = Sliders::find($id);

        return view('admin.slide.slideUpdate', ['slide' => $slide]);
    }

    // Action сохранить редактироование
    public function actionSlideSaveUpdate()
    {
        $data = $_POST;
        $slideData = Sliders::find($data['id']);
        $slideData->update($data);
        return \redirect(route('viewSliders'));
    }

    // Action удалить слайд
    public function actionDeleteSlide($id)
    {
        $slideDelete = Sliders::find($id);
        $slideDelete->delete();
        return \redirect(route('viewSliders'));
    }


}
