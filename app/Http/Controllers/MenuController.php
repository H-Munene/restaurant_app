<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Http\Requests\StoremenuRequest;
use App\Http\Requests\UpdatemenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $menu = menu::all();

        return $menu;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoremenuRequest $request)
    {
        /*
        syntax:
            $menu->column_name = $request->parameter_name;
        */

        $menu = new Menu; //create new Menu instance
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->description = $request->description;
        $menu->category_id = $request->category_id;
        $menu->offers = $request->offers;
        $menu->allergens = $request->allergens;

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'price' => 'required|integer',
        //     'description' => 'required|string|max:255',
        //     'category_id' => 'required|exists:categories,id',
        //     'offers' => 'required|integer',
        //     'allergens' => 'required|string|max:255',
        // ]);

        $menu = menu::firstOrNew(
            ['name' => $request->name],
            ['price' => $request->price],
            ['description' => $request->description],
            ['category_id' => $request->category_id],
            ['offers' => $request->offers],
            ['allergens' => $request->allergens],
        );
        // $menu = menu::create([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'description' => $request->description,
        //     'category_id' => $request->category_id,
        //     'offers' => $request->offers,
        //     'allergens' => $request->allergens,
        // ]);
        $menu->save();
        return $menu;
    }

    /**
     * Display the specified resource.
     */
    public function show(menu $menu)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemenuRequest $request, menu $menu)
    {
        //go to db and find record with this id
        $menu = Menu::find($request->id);

        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->description = $request->description;
        $menu->category_id = $request->category_id;
        $menu->offers = $request->offers;
        $menu->allergens = $request->allergens;

        $menu->save();

        return $menu;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(menu $menu)
    {
        //
    }
}
