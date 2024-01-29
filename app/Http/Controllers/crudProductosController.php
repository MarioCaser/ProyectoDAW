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
    use App\Models\user_permissions;
    use App\Models\coins;

    class crudProductosController extends Controller
    {
        public function index()
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $earn_disponibles = earn_disponible::all();
                return view('crud_productos.index', compact('earn_disponibles'));
            } else {
                return redirect()->route('comments.index');
            }            
        }

        public function create()
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $userPermissions = user_permissions::pluck('id_rol');
                $coins = coins::all();
                return view('crud_productos.create', compact('userPermissions','coins'));
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function store(Request $request)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $earn_disponible = new earn_disponible();
                $earn_disponible->currency = $request->currency;
                $earn_disponible->APR = $request->APR;
                $earn_disponible->minimo_usuario = $request->minimo_usuario;
                $earn_disponible->maximo_usuario = $request->maximo_usuario;
                $earn_disponible->cantidad_disponible = $request->cantidad_disponible;
                $earn_disponible->duracion = $request->duracion;
                $earn_disponible->disponible = $request->disponible;
                
                if ($earn_disponible->save()) {
                    return redirect()->route('crud_productos.show', $earn_disponible);
                } else {
                    return redirect()->route('crud_productos.create', ['error' => 'Error al crear el usuario. Por favor, inténtalo nuevamente.']);
                }                
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function show(earn_disponible $earn_disponible)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                return view('crud_productos.show', compact('earn_disponible'));
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function edit(earn_disponible $earn_disponible)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $coins = coins::all();
                return view('crud_productos.edit', compact('earn_disponible','coins'));
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function update(Request $request, earn_disponible $earn_disponible)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $earn_disponible->currency = $request->currency;
                $earn_disponible->APR = $request->APR;
                $earn_disponible->minimo_usuario = $request->minimo_usuario;
                $earn_disponible->maximo_usuario = $request->maximo_usuario;
                $earn_disponible->cantidad_disponible = $request->cantidad_disponible;
                $earn_disponible->duracion = $request->duracion;
                $earn_disponible->disponible = $request->disponible;
                // Actualiza los campos adicionales aquí

                if ($earn_disponible->save()) {
                    return redirect()->route('crud_productos.show', $earn_disponible);
                } else {
                    return redirect()->route('crud_productos.edit', ['error' => 'Error al modificar el earn_disponible. Por favor, inténtalo nuevamente.']);
                }
            } else {
                return redirect()->route('comments.index');
            }            
        }


        public function destroy(earn_disponible $earn_disponible)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $earn_disponible->disponible = false;
                $earn_disponible->save();
                return redirect()->route('crud_productos.index');
            } else {
                return redirect()->route('comments.index');
            }
        }
    }