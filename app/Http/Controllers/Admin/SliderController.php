<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function destroy(Slider $slider, $sliderId)
    {
        $slider = Slider::find($sliderId);

        if ($slider->count() > 0) {
            $path = $slider->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $slider->delete();

            return redirect('admin/sliders')->with('message', 'Slider image deleted successfully');
        }
        return redirect('admin/sliders')->with('message', 'Nothing found to delete');
    }

    public function edit(Slider $slider)
    {

        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(SliderFormRequest $request, Slider $slider)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {

            $path = $slider->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/sliders/', $filename);
            $validatedData['image']  = 'uploads/sliders/' . $filename;
        } else {
            $validatedData['image']  =  $slider->image;
        }

        $validatedData['status']  = $request->status == true ? '1' : '0';

        $slider = Slider::where('id', $slider->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);
        return redirect('admin/sliders')->with('message', 'slider updated successfully');
    }

    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/sliders/', $filename);
            $validatedData['image']  = 'uploads/sliders/' . $filename;
        }

        $validatedData['status']  = $request->status == true ? '1' : '0';

        $slider = Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);

        return redirect('admin/sliders')->with('message', 'slider added successfully');
    }
}
