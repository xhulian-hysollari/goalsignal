<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoriesRequest;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoriesController extends Controller
{

    public function index()
    {
        try {

            $locale = LaravelLocalization::getCurrentLocaleName();

            $results = Categories::where('locale', $locale)->get();

            return view('categories.index', compact('results'));
        } catch (\Exception $ex) {

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function create()
    {
        try {
            return view('categories.create');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(CreateCategoriesRequest $request)
    {

        try {
            $locale = LaravelLocalization::getCurrentLocaleName();

            $categ = new Categories();

            $categ->name = Input::get('name');
            $categ->url = Input::get('url');
            $categ->optional = Input::get('optional');

            $categ->locale = $locale;

            if (Input::get('on_header') == 1) {
                $categ->on_header = true;
            } else {
                $categ->on_header = false;
            }

            $categ->save();


            return redirect(url('dashboard/categories'))->with('success');

        } catch (\Exception $e) {


            return redirect()->back()->with('error', $e->getMessage());

        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try {
            $locale = LaravelLocalization::getCurrentLocaleName();

            $categ = Categories::where('locale', $locale)->where('id', $id)->first();
            return view('categories.edit', compact('categ'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(CreateCategoriesRequest $request, $id)
    {
        try {
            $locale = LaravelLocalization::getCurrentLocaleName();

            $categ = Categories::where('id', $id)->first();

            $categ->name = Input::get('name');
            $categ->url = Input::get('url');
            $categ->optional = Input::get('optional');

            $categ->locale = $locale;

            if (Input::get('on_header') == 1) {
                $categ->on_header = true;
            } else {
                $categ->on_header = false;
            }

            $categ->save();
            return redirect(url('dashboard/categories'))->with('success');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {

    try {
        Categories::where('id', $id)->delete();

        return redirect()->back()->with('success');
    } catch (\Exception $ex) {
        return redirect()->back()->with('error', $ex->getMessage());
    }
}
}
