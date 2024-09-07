<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryController extends Controller
{
    /**
     * Constructor for the class.
     *
     * This function is called when an instance of the class is created.
     * It authorizes the resource for the current user.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = QueryBuilder::for(Category::class)
            ->allowedFilters([AllowedFilter::scope('search', 'whereScout')])
            ->with('parent')
            ->paginate(10)
            ->appends($request->query());

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created category in storage.
     *
     * @param StoreCategoryRequest $request The request containing category data
     * @return JsonResponse A JSON response indicating the result of the operation
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage/images/categories'), $imageName);
        $imagePath = 'images/categories/' . $imageName;

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'parent_id' => $request->parent_id
        ]);

        return response()->json([
            'success', 'دسته بندی با موفقیت ایجاد شد.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::all();

        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if (is_null($request->image)) {
            $imagePath = $category->image;
        } else {
            // delete previous image stored in 'storage/' . $category->image
            if (file_exists(public_path('storage/' . $category->image))) {
                File::delete(public_path('storage/' . $category->image));
            }
            // store new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/images/categories'), $imageName);
            $imagePath = 'images/categories/' . $imageName;
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'parent_id' => $request->parent_id
        ]);

        return response()->json([
            'success' => 'دسته بندی با موفقیت ویرایش شد.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (file_exists(public_path('storage/' . $category->image))) {
            File::delete(public_path('storage/' . $category->image));
        }

        $category->delete();

        return to_route('admin.categories.index')->with('success', 'دسته بندی با موفقیت حذف شد.');
    }
}
