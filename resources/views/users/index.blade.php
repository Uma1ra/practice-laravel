<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Index</title>
</head>
<body>
    <div class="container">
        <h1>Users</h1>
        <hr>

        <a href="{{ route('user.create') }}">登録はこちら</a>
            
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>氏名</th>
                    <th>作成日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td><a href="{{ route('user.show', ['id'=>$user->id]) }}">詳細</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>