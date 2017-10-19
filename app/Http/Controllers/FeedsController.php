<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFeedRequest;
use App\Http\Requests\UpdateFeedRequest;
use App\Models\Categories;
use App\Models\Feeds;

use App\Images;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class FeedsController extends Controller
{

    public function index(){

    try  {

        $locale = LaravelLocalization::getCurrentLocaleName();

        $allNews = Feeds::where('locale', $locale)->latest()->paginate(20);

        $latest = Feeds::where('locale', $locale)->latest()->first();

        $newstricker = Feeds::where('locale', $locale)->latest()->take('10')->get();

        $results = Feeds::where('locale', $locale)->latest()->paginate(10);

        $topCategory = Categories::take(3)->get();

        $slideshows = Feeds::where('locale', $locale)->where('is_featured', 1)->latest()->take(3)->get();

        $topNews = Feeds::where('locale', $locale)->orderBy('view_count','desc')->first();



        return view('feeds.index', compact('results', 'topNews', 'slideshows', 'latest', 'topCategory', 'newstricker', 'allNews'));

    } catch (\Exception $e) {

        return redirect()->back()->with('error', $e->getMessage());
    }
    }

    public function all() {
        try {

            $locale = LaravelLocalization::getCurrentLocaleName();

            $allNews = Feeds::where('locale', $locale)->latest()->paginate(20);
            return view('partials.allNews', compact('allNews'));

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

    }


    public function create()
    {

        try  {
            $resulted = Categories::all();

            return view('feeds.create', compact('resulted'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function store(CreateFeedRequest $request)
    {

        try {

            $feeds = new Feeds();
            $feeds->user_id = Auth::id();
            $feeds->title = Input::get('title');
            $feeds->body = Input::get('body');
            $feeds->locale = Input::get('locale');
            $feeds->view_count = 0;
            $plucked = Input::get('category_id');
            $feeds->category_id = $plucked;

            if (Input::get('is_featured') == 1) {
                $feeds->is_featured = true;
            } else {
                $feeds->is_featured = false;
            }

            $feeds->save();


            if(Input::hasFile('image_path')) {
                foreach (Input::file('image_path') as $image){

                    $file = $image->store('images');
                    $images = new Images();
                    $images->path = $file;
                    $images->feed_id = $feeds->id;
                    $images->save();

                }
            }


            return redirect(url('/'))->with('success');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $locale = LaravelLocalization::getCurrentLocaleName();

            $results = Feeds::where('locale', $locale)->where('id', $id)->first();


            //for passing the category name in the post
            $category = Categories::where('id', $results->category_id)->first();

//            dd($category);

            $resulted = Feeds::where('locale', $locale)->where('category_id', $results->category_id)->latest()->take(5)->get();

            $categorized = Feeds::where('locale', $locale)->where('category_id', $results->category_id)->latest()->simplePaginate(20);

            $feedKey = "feeeed_".$id;


            if (!Session::has($feedKey)) {
                Feeds::where('id', $id)->increment('view_count');
                Session::put($feedKey, 1);
            }


            return view('feeds.show', compact('results', 'resulted', 'categorized', 'category'));
        } catch (\Exception $e) {
            dd($e ->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function showByCategory($url)
    {
        try {
            $locale = LaravelLocalization::getCurrentLocaleName();

            $categ = Categories::where('url', $url)->first();

            $categorized = Feeds::where('locale', $locale)->where('category_id', $categ->id)->latest()->simplePaginate(10);


            return view('feeds.showByCategory', compact('categ', 'categorized')); //add 'categorized'

        } catch (\Exception $e) {
            dd($e ->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
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
            $results = Feeds::where('id', $id)->first();

            $resulted = Categories::where('id', '!=', $results->category_id)->get();

            $ownCateg = Categories::where('id', $results->category_id)->first();

            return view('feeds.edit', compact('results', 'resulted', 'ownCateg'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeedRequest $request, $id)
    {

        try {

            $feed = Feeds::where('id', $id)->first();
            $feed->title = Input::get('title');
            $feed->body = Input::get('body');
            $feed->locale = Input::get('locale');

            $feed->category_id = Input::get('category_id');

            if (Input::get('is_featured') == 1) {
                $feed->is_featured = true;
            } else {
                $feed->is_featured = false;
            }
            $feed->save();



            if(Input::hasFile('image_path')) {
                foreach (Input::file('image_path') as $image){

                    $file = $image->store('images');
                    $images = new Images();
                    $images->path = $file;
                    $images->feed_id = $feed->id;
                    $images->save();

                }
            }

            return redirect(url('feeds/show', $feed->id))->with('success');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());

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
            Feeds::where('id', $id)->delete();
            return redirect(url('/'))->with('success');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
