<?php

namespace Furbook\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Furbook\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        //dd($categories);
        $response = array(
            'categories' => []
        );
        foreach ($categories as $category){
            $item = array(
                'id' => (int) $category->id,
                'name' => $category->name
            );
            //$response['categories'][] = $item;
            array_push($response['categories'], $item);
        }
        return response($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|max:255'
            ],
            [
                'required' => 'Cột :attribute là bắt buộc.',
                'max' => 'Cột :attribute không được vượt quá :size kí tự.',
            ]
        );

        // Check validation
        if ($validator->fails()) {
            return response(['message' => $validator->errors()], 400);
        }
        $category = Category::create($request->all());
        $response = array(
            'category' => array(
                'id' => (int)$category->id,
                'name' => $category->name,
            )
        );
        return response($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
