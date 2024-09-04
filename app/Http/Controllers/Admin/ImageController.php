<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMediaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMediaRequest $request)
    {
        // Store image in the 'images/products' directory
        $path = $request->file('image')->store('images/products', 'public');

        // Return the stored image path
        return response($path, 200)->header('Content-Type', 'text/plain');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return StreamedResponse
     */
    public function show(Request $request)
    {
        $path = $request->query('path', '');

        if (!Storage::disk('public')->exists($path)) {
            abort(404);
        }

        return Storage::disk('public')->download($path, Str::afterLast($path, '/'), [
            'Content-Disposition' => 'inline',
            'filename' => Str::afterLast($path, '/'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $media = $request->query('media');

        if (Storage::disk('public')->exists($media)) {
            Storage::disk('public')->delete($media);
            return response()->noContent();
        }

        return response()->noContent(404);
    }
}
