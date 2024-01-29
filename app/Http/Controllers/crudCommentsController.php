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

    class crudCommentsController extends Controller
    {
        public function index()
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $comments = Comment::all();
                return view('crud_comments.index', compact('comments'));
            } else {
                return redirect()->route('comments.index');
            }

            
        }

        public function create()
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $users = User::pluck('email', 'id'); // Obtener los IDs y correos electrónicos de los usuarios
                return view('crud_comments.create', compact('users'));
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function store(Request $request)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $comment = commentAdmin::create($request->all()); // Utilizar el modelo CommentAdmin para crear el comentario
                return redirect()->route('crud_comments.show', $comment);
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function show(Comment $comment)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                return view('crud_comments.show', compact('comment'));
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function edit(Comment $comment)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                return view('crud_comments.edit', compact('comment'));
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function update(Request $request, Comment $comment)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $comment->update($request->all());
                return redirect()->route('crud_comments.show', $comment);
            } else {
                return redirect()->route('comments.index');
            }
        }

        public function destroy(Comment $comment)
        {
            if (auth()->check() && auth()->user()->id_rol == 2) {
                $comment->delete();
                return redirect()->route('crud_comments.index');
            } else {
                return redirect()->route('comments.index');
            }
        }
    }