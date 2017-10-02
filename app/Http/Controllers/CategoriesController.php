<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoriesRequest;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CategoriesController extends Controller
{

    public function index()
    {
        try {

            $results = Categories::all();

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
            $categ = new Categories();

            $categ->name = Input::get('name');
            $categ->url = Input::get('url');
            $categ->optional = Input::get('optional');

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
            $categ = Categories::where('id', $id)->first();
            return view('categories.edit', compact('categ'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(CreateCategoriesRequest $request, $id)
    {
        try {
            $categ = Categories::where('id', $id)->first();

            $categ->name = Input::get('name');
            $categ->url = Input::get('url');
            $categ->optional = Input::get('optional');

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
