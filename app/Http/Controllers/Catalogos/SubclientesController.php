<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Requests\SubclientesRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subclientes;
use App\Models\Usuario;
use App\Models\Cliente;
use Log;
use Auth;

class SubclientesController extends Controller
{
    /**
     * Despliega una lista de subclientes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orderBy = $request->input('sortBy', 'nombre');
        $order = $request->input('order', 'asc');
        $queryBuilder = Subclientes::orderBy($orderBy, $order)->limit(30);

        if ($query = $request->get('query', false)) {
            $queryBuilder->where(function ($q) use ($query) {
                $q->where('nombre', 'like', '%' . $query . '%')
                    ->orWhere('celular', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->orWhere('calle', 'like', '%' . $query . '%')
                    ->orWhere('numero_exterior', 'like', '%' . $query . '%')
                    ->orWhere('cp', 'like', '%' . $query . '%');
            });
        }
        
        if ($perPage = $request->input('perPage', false)) {
            $subclientes = $queryBuilder->paginate($perPage);
        } else {
            $subclientes = ['data' => $queryBuilder->get()];
        }
        
        return response()->json($subclientes, 200);
    }

    /**
     * Almacena un nuevo subcliente en el storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubclientesRequest $request)
    {
        Log::info("\n\nSubclientes store");

        $cliente = Cliente::find(Auth::user()->cliente_id);

        $data = $request->only([
            'nombre',
            'celular',
            'email',
            'fecha_nacimiento',
            'calle',
            'numero_exterior',
            'cp',
        ]);

        $data['telefono'] = '';
        $data['cliente_id'] = Auth::user()->cliente_id;
        $data['cliente_codigo'] = $cliente->codigo;
        $data['codigo_subcliente'] = 0;
        $fecha = explode('/', $data['fecha_nacimiento']);
        $data['fecha_nacimiento'] = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];

        $data['domicilio'] = 'Calle ' . $data['calle'] . ' #' . $data['numero_exterior'] . ', C.P. ' . $data['cp'];
        
        $subcliente = Subclientes::create($data);
        $subcliente->codigo_subcliente = $subcliente->id;
        $subcliente->update();

        Log::info($data);

        return response()->json($subcliente, 200);
    }

    /**
     * Despliega el subcliente especificado.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subclientes = Subclientes::findOrFail($id);
        return response()->json($subclientes, 200);
    }

    public function subclientesXcliente()
    {
        $cliente = Auth::user();
        $subclientes = Subclientes::where('cliente_id', $cliente->cliente_id)
                ->orderBy('nombre')
                ->get();
        return ['data' => $subclientes];
    }

    /**
     * Actualiza el subcliente especificado.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subclientes = Subclientes::findOrFail($id);

        $data = $request->only([
            'cliente_id',
            'nombre',
            'celular',
            'email',
            'fecha_nacimiento',
            'calle',
            'numero_exterior',
            'cp',
        ]);

        $subclientes->cliente_id = $data['cliente_id'];
        $subclientes->nombre = $data['nombre'];
        $subclientes->celular = $data['celular'];
        $subclientes->email = $data['email'];

        $fecha = explode('/', $data['fecha_nacimiento']);
        $subclientes->fecha_nacimiento = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];

        $subclientes->calle = $data['calle'];
        $subclientes->numero_exterior = $data['numero_exterior'];
        $subclientes->cp = $data['cp'];
        $subclientes->domicilio = 'Calle ' . $data['calle'] . ' #' . $data['numero_exterior'] . ', C.P. ' . $data['cp'];
        $subclientes->update();

        return response()->json($subclientes, 200);
    }

    /**
     * Remueve el subcliente especificado en el storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subclientes = Subclientes::findOrFail($id);
        $subclientes->delete();
        return response()->json(['result' => true], 200);
    }
}
