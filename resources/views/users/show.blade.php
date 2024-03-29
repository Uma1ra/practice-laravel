<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Show</title>
</head>
<body>
    <div class="container">
        <h1>Users show</h1>
        <table>
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>氏名</th>
                    <td>{{ $user->fullname }}</td>
                </tr>
                <tr>
                    <th>年齢</th>
                    <td>{{ $user->age }}</td>
                </tr>
                <tr>
                    <th>都道府県</th>
                    <td>{{ $user->prefecture }}</td>
                </tr>
                <tr>
                    <th>市区町村</th>
                    <td>{{ $user->city }}</td>
                </tr>
                <tr>
                    <th>番地以降</th>
                    <td>{{ $user->address }}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{ $user->phone_number }}</td>
                </tr>
                <tr>
                    <th>作成日</th>
                    <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
                    <th>更新日</th>
                    <td>{{ $user->updated_at }}</td>
                </tr>
                @unless ($user->gender === null)
                    <tr>
                        <th>性別</th>
                        <td>{{ $user->gender }}</td>
                    </tr>
                @endunless
                @if ($user->has_hobbies())
                    <tr>
                        <th>趣味</th>
                        <td>
                            @foreach ($hobbies as $hobby)
                                {{ $hobby->hobby_name }}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        
                    </tr>
                @endif
            </tbody>
        </table>
        <div>
            <table border="1">
                <tr>
                    <th>names</th>
                    <th>books</th>
                    <th>status</th>
                </tr>
                @foreach ($info_array as $info)
                <tr>
                    <td>{{ $info['name'] }}</td>
                    <td>{{ $info['book'] }}</td>
                    <td>{{ $info['status'] }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <a href="{{ route('users.index') }}">ユーザー一覧へ</a>
    </div>
</body>
</html>