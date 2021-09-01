<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Type;
use App\Plate;
use App\Restaurant;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $newRestaurant = Restaurant::find('user_id');
        dd($newRestaurant); */
        return view('admin.plates.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $types = Type::all();
        /* dd($restaurants); */
        return view('admin.plates.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        /* dd(request()->all()); */

        $request->validate([
            'name'=> 'required|min:2|max:80',
            'description'=> 'nullable|min:5',
            'price'=> 'required',
            'img' => 'nullable|mimes:jpg,jpeg,png,bmp,svg|max:5000',
        ],
        [
            'required'=> 'Questo campo è obbligatorio',
            'name.max'=> 'Massimo :max caratteri concessi',
            'min'=> 'Minimo :min caratteri richiesti',
            'mimes' => 'I formati supportati sono: jpg,jpeg,png,bmp,svg',
            'img.max' => 'Il file inserito eccede le misure massime consentite(5000kb )',
        ]);

        $newPlate = new Plate();
        $newPlate->slug = Str::slug($data['name'], '-');

        if(array_key_exists('img', $data )){
            $data['img'] = Storage::put('img', $data['img']);
        }

        if(!array_key_exists('veg', $data)) {
            $data['veg'] = 0;
        } else {
            $data['veg'] = 1;
        }

        if(array_key_exists('availability', $data)){
            $data['availability'] = Storage::put('availability', $data['availability']);
        }

        
        $newPlate->fill($data);
        $id_ristorante = Auth::user()->restaurant->id;
        $newPlate->restaurant_id = $id_ristorante;
        
        //$newPlate->restaurant_id = Auth::restaurant()->id;
        //$newPlate->user_id = Auth::user()->id;

        $newPlate->save();

        if(array_key_exists('type', $data )){
            $newPlate->types()->attach($data["type"]);
        }

        return redirect()->route('admin.plates.index', $newPlate->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
