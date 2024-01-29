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
    use App\Models\user_permissions;

    class crudUsersController extends Controller
    {
        public function index()
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $users = User::all();
                return view('crud_users.index', compact('users'));
            } else {
                return redirect()->route('comments.index');
            }

            
        }

        public function create()
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $userPermissions = user_permissions::pluck('id_rol');
                return view('crud_users.create', compact('userPermissions'));
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function store(Request $request)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {






                $request->validate([
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:6',
                ]);
        
                $user = new User();
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->id_rol = $request->rol;
        
                if ($user->save()) {
                    return redirect()->route('crud_users.show', $user);
                } else {
                    return redirect()->route('crud_users.create', ['error' => 'Error al crear el usuario. Por favor, inténtalo nuevamente.']);
                }                
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function show(User $user)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                return view('crud_users.show', compact('user'));
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function edit(User $user)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $userPermissions = user_permissions::pluck('id_rol');
                return view('crud_users.edit', compact('userPermissions','user'));
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function update(Request $request, User $user)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $data = $request->all();
                $data['password'] = Hash::make($request->password);
            
                if ($user->update($data)) {
                    return redirect()->route('crud_users.show', $user);
                } else {
                    return redirect()->route('crud_users.edit', ['error' => 'Error al modificar el usuario. Por favor, inténtalo nuevamente.']);
                }
            } else {
                return redirect()->route('comments.index');
            }            
        }


        public function destroy(User $user)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $user->delete();
                return redirect()->route('crud_users.index');
            } else {
                return redirect()->route('comments.index');
            }
        }
    }