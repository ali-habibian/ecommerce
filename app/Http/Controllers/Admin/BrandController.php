<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BrandController extends Controller
{
    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        $this->authorizeResource(Brand::class, 'brand');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $brands = QueryBuilder::for(Brand::class)
            ->allowedFilters([AllowedFilter::scope('search', 'whereScout')])
            ->paginate()
            ->appends($request->query());

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        Brand::create($request->validated());

        return response()->json([
            'success' => 'برند با موفقیت ایجاد شد.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $validatedData = $request->validated();

        $brand->update($validatedData);

        return response()->json([
            'success' => 'برند با موفقیت ویرایش شد.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return to_route('admin.brands.index')->with('success', 'برند با موفقیت حذف شد.');
    }
}
