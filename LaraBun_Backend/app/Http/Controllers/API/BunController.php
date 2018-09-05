<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bun;
use Validator;
use App\Http\Resources\BunsResource;

class BunController extends Controller
{
    /**
     * Protect update and delete methods, only for authenticated users.
     *
     * @return Unauthorized
     */
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *     path="/api/buns",
     *     tags={"Buns"},
     *     summary="List Buns",
     *     @SWG\Response(
     *          response=200,
     *          description="Success: List all Buns",
     *          @SWG\Schema(ref="#/definitions/Bun")
     *      ),
     *     @SWG\Response(
     *          response="404",
     *          description="Not Found"
     *   )
     * ),
     */
    public function index()
    {
        $listBuns = Bun::all();
        return $listBuns;

        // Using Paginate method
        // return BunsResource::collection(Bun::all());
        // Using Paginate method
        // return BunsResource::collection(Bun::with('ratings')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @SWG\Post(
     *     path="/api/buns",
     *     tags={"Buns"},
     *     summary="Create Bun",
     *     @SWG\Parameter(
     * 			name="body",
     * 			in="body",
     * 			required=true,
     * 			@SWG\Schema(ref="#/definitions/Bun"),
     * 			description="Json format",
     * 		),
     *     @SWG\Response(
     *          response=201,
     *          description="Success: A Newly Created Bun",
     *          @SWG\Schema(ref="#/definitions/Bun")
     *      ),
     *     @SWG\Response(
     *          response="422",
     *          description="Missing mandatory field"
     *     ),
     *     @SWG\Response(
     *          response="404",
     *          description="Not Found"
     *   )
     * ),
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',
            'picture' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Creating a record in a different way
        $createBun = Bun::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'desc' => $request->desc,
            'picture' => $request->picture,
        ]);

        return new BunsResource($createBun);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *     path="/api/buns/{id}",
     *     tags={"Buns"},
     *     summary="Get Bun by Id",
     *     @SWG\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          type="integer",
     *          description="Display the specified bun by id.",
     * 		),
     *     @SWG\Response(
     *          response=200,
     *          description="Success: Return the Bun",
     *          @SWG\Schema(ref="#/definitions/Bun")
     *      ),
     *     @SWG\Response(
     *          response="404",
     *          description="Not Found"
     *   )
     * ),
     */
    public function show(Bun $bun)
    {
        return new BunsResource($bun);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @SWG\Put(
     *     path="/api/buns/{id}",
     *     tags={"Buns"},
     *     summary="Update Bun",
     *     @SWG\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          type="integer",
     *          description="Update the specified bun by id.",
     * 		),
     *     @SWG\Parameter(
     * 			name="body",
     * 			in="body",
     * 			required=true,
     * 			@SWG\Schema(ref="#/definitions/Bun"),
     * 			description="Json format",
     * 		),
     *     @SWG\Response(
     *          response=200,
     *          description="Success: Return the Bun updated",
     *          @SWG\Schema(ref="#/definitions/Bun")
     *      ),
     *     @SWG\Response(
     *          response="422",
     *          description="Missing mandatory field"
     *     ),
     *     @SWG\Response(
     *          response="404",
     *          description="Not Found"
     *   )
     * ),
     */
    public function update(Request $request, Bun $bun)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'desc' => 'required',
            'picture'=> 'required',
        ]);
        if ($validator->fails()) {

            //this is for backend-rendered html form:
            //use value="{{ old('title') }}" in the form input elements...
            //return redirect()->back()->withInput()->withErrors($validator);

            return response()->json($validator->errors(), 422);
        }

        // check if currently authenticated user is the bun owner
        if ($request->user()->id !== $bun->user_id) {
            return response()->json(['error' => 'You can only edit your own bun.'], 403);
        }

        $bun->update($request->only(['name', 'desc', 'picture']));

        return new BunsResource($bun);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     *     @SWG\Delete(
     *     path="/api/buns/{id}",
     *     tags={"Buns"},
     *     summary="Delete bun",
     *     description="Delete the specified bun by id",
     *     @SWG\Parameter(
     *         description="Bun id to delete",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer",
     *         format="int64"
     *     ),
     *     @SWG\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     *     @SWG\Response(
     *         response=204,
     *         description="Success: successful deleted"
     *     ),
     * )
     */
    public function destroy($id)
    {
        $deleteBunById = Bun::find($id)->delete();
        return response()->json([], 204);
    }
}
