<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Category;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }
}
