<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('upload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $req
     * @return RedirectResponse
     */
    public function store(Request $req): RedirectResponse
    {
        $file = $req->file('file');

        // Start-STORAGE Default Disk 'upload'
        // This will save the file to /storage/uploads/* as defined in config/filesystems.php
        // Can be accessed with url: APP_URL/uploads/filename

        // Automatically generate a unique ID for filename...
        // // $path = Storage::putFile('', $file);

        // Manually specify a filename...
        $filename = $file->getClientOriginalName();
        $path = Storage::putFileAs('', $file, $filename);
        // End-STORAGE

        // Start-STORAGE Disk 'document'
        // This will save the file to /storage/documents/* as defined in config/filesystems.php
        // Can be accessed with url: APP_URL/documents/filename

        // Manually specify a filename...
        // // $filename = $file->getClientOriginalName();
        // // $path = Storage::disk('document')
        // //    ->putFileAs('', $file, $filename);
        // End-STORAGE

        $upload = new Upload;
        $upload->file = $path;
        $status = $upload->save();

        // if successfully saved to database return with the filename
        if ($status) {
            return response()->redirectToRoute('upload.index')->with([
                'filename'=> $path
            ]);
        }

        return response()->redirectToRoute('upload.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Upload $upload
     * @return \Illuminate\Http\Response
     */
    public function show(Upload $upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Upload $upload
     * @return \Illuminate\Http\Response
     */
    public function edit(Upload $upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Upload $upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upload $upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Upload $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upload $upload)
    {
        //
    }
}
