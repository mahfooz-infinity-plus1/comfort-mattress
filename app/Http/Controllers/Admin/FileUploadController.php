<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FileUploadController extends Controller
{
    public function index()
    {
        $files = Storage::disk('public')->allFiles();
        return view('backend..admin.files.index', compact('files'));
    }

    public function save(Request $request)
    {
        $mimes = $request->type == 'files' ? 'doc,docx,pdf' : 'jpg,jpeg,png';
        $validator = Validator::make(
            $request->all(),
            [
                'type' => [
                    'required',
                    Rule::in([
                        'images',
                        'files'
                    ])
                ],
                'folder' => [
                    'required',
                    Rule::in([
                        'products',
                        'multi-products',
                        'sliders',
                        'categories'
                    ])
                ],
                'file'   => 'required|mimes:'.$mimes.'|max:1024',
            ],
            [
                'file.max'       => 'Please Choose file of Maximum 1MB Size..',
                'file.required'  => 'Please Choose Atleast One file',
            ]
        );

        if ($validator->fails()) {
            connectify('error', 'Add File', $validator->errors()->first());
            return redirect(route('admin.files.all'))->withInput();
        }
        if ($request->hasFile('file')) {
            $request['fil'] = uniqid() . '.' . pathinfo($request->file->getClientOriginalName(), PATHINFO_EXTENSION);
            $request->file->storeAs('public/' . $request->type . '/' . $request->folder, $request->fil);
        }

        connectify('success', 'Success', 'File has been added successfully !');
        return back();
    }
}
