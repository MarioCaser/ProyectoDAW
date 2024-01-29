{{-- <!-- resources/views/comments/partials/_comment.blade.php -->
<div class="comment" style="border:1px solid lightgrey">
    <p>{{ $comment->user->email }}</p>
    <p>{{ $comment->content }}</p>
    <p>Puntuación: {{ $comment->rating }}</p>

    @auth
        @if (auth()->user()->id === $comment->user_id)
            <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        @endif
    @endauth
</div> --}}


<!-- resources/views/comments/partials/_comment.blade.php -->
<div class="comment bg-black rounded-lg shadow-md p-4 mb-4" style="border:1px solid grey;">
    <p class="font-bold">{{ $comment->user->email }}</p>
    <p>{{ $comment->content }}</p>
    <p class="text-sm">
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $comment->rating)
                <span class="text-yellow-500">★</span>
            @else
                <span class="text-gray-400">★</span>
            @endif
        @endfor
    </p>

    @auth
        @if (auth()->user()->id === $comment->user_id)
            <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
            </form>
        @endif
    @endauth
</div>
