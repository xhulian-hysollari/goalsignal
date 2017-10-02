<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePagesRequest;
use App\Http\Requests\UpdatePagesRequest;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PagesController extends Controller
{

    public function index()
    {
        try {

            $results = Pages::all();

            return view('pages.index', compact('results'));
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('pages.create');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePagesRequest $request)
    {
        try {
            $pages = new Pages();
            $pages->title = Input::get('title');
            $pages->slug = Input::get('slug');
            $pages->body = Input::get('body');


            if (Input::get('on_footer') == 1) {
                $pages->on_footer = true;
            } else {
                $pages->on_footer = false;
            }

            $pages->save();

            return redirect(url('dashboard/pages'))->with('success');

        } catch (\Exception $ex) {
            dd($ex->getMessage());
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        try {

            $result = Pages::where('slug', $slug)->first();

            return view('pages.show', compact('result'));

        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $results = Pages::where('id', $id)->first();

            return view('pages.edit', compact('results'));

        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePagesRequest $request, $id)
    {
        try {

            $pages = Pages::where('id', $id)->first();

            $pages->title = Input::get('title');
            $pages->slug = Input::get('slug');
            $pages->body = Input::get('body');

            if (Input::get('on_footer') == 1) {
                $pages->on_footer = true;
            } else {
                $pages->on_footer = false;
            }

            $pages->save();

            return redirect(url('dashboard/pages'))->with('success');

        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            Pages::where('id', $id)->delete();

            return redirect()->back()->with('success');

        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
