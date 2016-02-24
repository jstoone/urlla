<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Url;
use App\Http\Requests;
use App\Http\Requests\UrlRequest;
use App\Http\Controllers\Controller;

class UrlsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => [
                'redirect', 'create', 'store'
            ]
        ]);
    }
    /**
     * Display a listing of the url.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new url.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('url.create');
    }

    /**
     * Store a newly created url in storage.
     * 
     * @param UrlRequest $request 
     * @return \Illuminate\Http\Response

     */
    public function store(UrlRequest $request)
    {
        $destination = $request->destination;

        if($request->utm) {
            $hasGetParameters = str_contains($destination, '?');
            $startTag = ($hasGetParameters) ? "&" : "?";

            $utmParameters = "utm_source=" . $request->utm_source;
            $utmParameters .= "&utm_medium=" . $request->utm_medium;
            $utmParameters .= "&utm_campaign=" . $request->utm_campaign;

            $destination .= $startTag . $utmParameters;
        }

        $url = auth()->user()->urls()->create([
            'destination' => $destination,
        ]);

        $shortcode = \ShortCode\Reversible::convert($url->id);
        $url->update([
            'shortcode' => $shortcode,
        ]);

        flash()->success("Short url: " . url($shortcode));
        return redirect('/');
    }

    /**
     * Display the specified url.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display the specified url.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function redirect(Request $request, Url $url)
    {
        $url->clicks()->create([]);

        return redirect($url->destination);
    }

    /**
     * Show the form for editing the specified url.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified url in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Redirect the specified url from storage.
     *
     * @param  App\Url $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(Url $url)
    {
    }
}
