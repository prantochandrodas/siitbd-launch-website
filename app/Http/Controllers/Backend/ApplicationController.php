<?php



namespace App\Http\Controllers\Backend;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $data = Application::first();
        return view('application.index', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'company_name' => 'Required|string|max:200',
            'company_email' => 'nullable|email',
            'address' => 'nullable|string',
            'about_company' => 'nullable|string',
            'phone' => 'nullable',
            'logo' => 'nullable|image|file|max:2048',
            'fav_icon' => 'nullable|image|file|max:2048',

        ]);
        $data = Application::findOrFail($id);
        //    chairman image  
        if ($request->hasFile('fav_icon')) {
            $oldImagePath = public_path('image/' . $data->fav_icon);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('fav_icon');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_'  . uniqid() . '.' . $extension;
            $path = 'image/';
            $file->move(public_path($path), $filename);
            $data->fav_icon = $filename;
        }
        if ($request->hasFile('logo')) {
            $oldImagePath = public_path('image/' . $data->logo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . uniqid() . '.' . $extension;
            $path = 'image/';
            $file->move(public_path($path), $filename);
            $data->logo = $filename;
        }


        $data->company_name = $request->company_name;
        $data->company_email = $request->company_email;
        $data->address = $request->address;
        $data->about_company = $request->about_company;
        $data->phone = $request->phone;
        $data->copy_right_text = $request->copy_right_text;

        $data->save();
        Alert::success('Success', 'Data deleted Successful!');
        return redirect()->route('applications.index');
    }
}
