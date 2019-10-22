<?php
namespace App\Http\Controllers;
use App\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class RolController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rols = Rol::all();
        return $this->showAll($rols, 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:4|max:15',
            'description' => 'required'
        ];
        $fields = $request->all();
        $validator = Validator::make($fields, $rules);
        if( ! $validator->fails() )
        {
            $rol = Rol::create($fields);
            return $this->showOne($rol, 201);
        }
        else
        {
            return $validator->errors();
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
        $rol = Rol::find($id);
        return $this->showOne($rol, 200);
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
        $rules = [
            'name' => 'required|min:4|max:15',
            'description' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ( ! $validator->fails() )
        {
            $rol = Rol::findOrFail($id);
            if ($request->has('name'))
            {
                $rol->name = $request->name;
            }
            if($request->has('description'))
            {
                $rol->description = $request->description;
            }
            if(!$rol->isDirty())
            {
                return response()->json(
                    [
                        'error' => 'Se debe especificar al menos un valor diferente para actualizar',
                        'code' => 422], 422);
            }
            $rol->save();
            return $this->showOne($rol);
        }
        else
        {
            return $validator->errors();
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
        $rol = Rol::findOrFail($id);
        $rol->delete();
        return $this->showOne($rol, 200);
    }
}