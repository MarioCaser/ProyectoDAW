<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\earn_disponible;
    use App\Models\user_permissions;
    use App\Models\coins;

    class crudMonedasController extends Controller
    {
        public function index()
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $coins = coins::all();
                return view('crud_monedas.index', compact('coins'));
            } else {
                return redirect()->route('comments.index');
            }            
        }

        public function create()
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $coins = coins::all();
                return view('crud_monedas.create', compact('coins'));
            } else {
                return redirect()->route('comments.index');
            }
        }

       
        public function store(Request $request)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $symbol = $request->symbol;

                // Verificar si ya existe un registro con el mismo símbolo
                $existingCoin = coins::where('symbol', $symbol)->first();

                if ($existingCoin) {
                    return redirect()->route('crud_monedas.create')->with('error', 'Ya existe una moneda con el mismo símbolo.');
                }

                $coins = new coins();
                $coins->name = $request->name;
                $coins->symbol = $symbol;
                $coins->logo = $request->logo;
                $coins->type = $request->type;
                $coins->disponible = $request->disponible;
                $coins->descripcion = $request->descripcion;

                if ($coins->save()) {
                    return redirect()->route('crud_monedas.show', $coins);
                } else {
                    return redirect()->route('crud_monedas.create')->with('error', 'Error al crear la moneda, por favor inténtalo de nuevo.');
                }
            } else {
                return redirect()->route('comments.index');
            }
        }



        public function show(coins $coins)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                return view('crud_monedas.show', compact('coins'));
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function edit(coins $coins)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                return view('crud_monedas.edit', compact('coins'));
            } else {
                return redirect()->route('comments.index');
            }
        }



        public function update(Request $request, coins $coins)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $coins->name = $request->name;
                // $coins->symbol = $request->symbol;
                $coins->logo = $request->logo;
                $coins->type = $request->type;
                $coins->disponible = $request->disponible;
                $coins->descripcion = $request->descripcion;
                // Actualiza los campos adicionales aquí

                if ($coins->save()) {
                    return redirect()->route('crud_monedas.show', $coins);
                } else {
                    return redirect()->route('crud_monedas.edit', ['error' => 'Error al modificar el earn_disponible. Por favor, inténtalo nuevamente.']);
                }
            } else {
                return redirect()->route('comments.index');
            }
        }


        public function destroy(coins $coins)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                if ($coins->delete()) {
                    return redirect()->route('crud_monedas.index');
                } else {
                    return redirect()->route('crud_monedas.show', $coins)->with('error', 'Error al eliminar el objeto coins. Por favor, inténtalo nuevamente.');
                }
            } else {
                return redirect()->route('comments.index');
            }
        }

    }