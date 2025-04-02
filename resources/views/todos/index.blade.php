<!-- resources/views/todos/index.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Todo一覧</title>
</head>
<body>
    <h1>Todo一覧</h1>

    <ul>
        @forelse ($todos as $todo)
            <li>
                {{ $todo->title }} - 
                {{ $todo->done ? '✅ 完了' : '⏳ 未完了' }}
            </li>
        @empty
            <li>データがありません</li>
        @endforelse
    </ul>
</body>
</html>
