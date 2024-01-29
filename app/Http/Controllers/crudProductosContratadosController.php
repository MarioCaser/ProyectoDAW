<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Auth;
    // use Illuminate\Support\Facades\Mail;
    use App\Models\mensaje;

    use App\Models\Comment;
    use Illuminate\Http\Request;
    use App\Models\CommentAdmin;
    use App\Models\earn_disponible;
    use App\Models\earn_contratados;
    use App\Models\user_permissions;
    use App\Models\coins;

    class crudProductosContratadosController extends Controller
    {
        public function index()
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $earn_contratados = earn_contratados::all();
                return view('crud_productos_contratados.index', compact('earn_contratados'));
            } else {
                return redirect()->route('comments.index');
            }            
        }

        public function create()
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $users = User::all();
                $coins = coins::all();
                return view('crud_productos_contratados.create', compact('userPermissions','users'));
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function store(Request $request)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $earn_contratados = new earn_contratados();
                $earn_contratados->user_id = $request->user_id;
                $earn_contratados->id_producto_earn = $request->id_producto_earn;

                if ($earn_contratados->save()) {
                    return redirect()->route('crud_productos_contratados.show', $earn_contratados);
                } else {
                    return redirect()->route('crud_productos_contratados.create', ['error' => 'Error al crear el usuario. Por favor, inténtalo nuevamente.']);
                }
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function show(earn_contratados $earn_contratados)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                return view('crud_productos_contratados.show', compact('earn_contratados'));
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function edit(earn_contratados $earn_contratados)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $users = User::all();
                $earn_disponible = earn_disponible::all();
                return view('crud_productos_contratados.edit', compact('users','earn_disponible','earn_contratados'));
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function update(Request $request, earn_contratados $earn_contratados)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $earn_contratados->user_id = $request->user_id;
                $earn_contratados->id_producto_earn = $request->id_producto_earn;
                $earn_contratados->cantidad = $request->cantidad;
                $earn_contratados->fecha_fin = $request->fecha_fin;


                if ($earn_contratados->save()) {
                    return redirect()->route('crud_productos_contratados.show', $earn_contratados);
                } else {
                    return redirect()->route('crud_productos_contratados.edit', ['error' => 'Error al modificar el producto contratado. Por favor, inténtalo nuevamente.']);
                }
            } else {
                return redirect()->route('comments.index');
            }            
        }


        public function destroy(earn_contratados $earn_contratados)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $earn_contratados->delete();
                return redirect()->route('crud_productos_contratados.index');
            } else {
                return redirect()->route('comments.index');
            }
        }
    }