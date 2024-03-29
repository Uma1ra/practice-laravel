<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user create</title>
</head>
<body>
    <div class="container">
        <h1>ユーザー登録フォーム</h1>
        <hr>

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="lastname">性 <span class="required">*</span></label>
                <input type="text" name="lastname">
            </div>
            <div class="form-group">
                <label for="firstname">名 <span class="required">*</span></label>
                <input type="text" name="firstname">
            </div>
            <div class="form-group">
                <label for="age">年齢 <span class="required">*</span></label>
                <input type="text" name="age">
            </div>
            <div class="form-group">
                <label for="prefecture">都道府県 <span class="required">*</span></label>
                <select name="prefecture">
                    <option value="">--選択してください--</option>
                    @foreach ($prefectures as $prefecture)
                        <option value="{{ $prefecture }}">{{ $prefecture }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="city">市区町村 <span class="required">*</span></label>
                <input type="text" name="city">
            </div>
            <div class="form-group">
                <label for="address">番地以降の住所 <span class="required">*</span></label>
                <input type="text" name="address">
            </div>
            <div class="form-group">
                <label for="phone_number">電話番号 <span class="required">*</span></label>
                <input type="tel" name="phone_number">
            </div>
            <div class="form-group">
                <span>
                    <input type="radio" id="male" name="gender" value="男性">
                    <label for="male">男性</label>
                </span>
                <span>
                    <input type="radio" id="female" name="gender" value="女性">
                    <label for="female">女性</label>
                </span>
                <span>
                    <input type="radio" id="other" name="gender" value="その他">
                    <label for="other">その他</label>
                </span>
            </div>
            <div class="form-group">
                <label for="password">パスワード <span class="required">*</span></label>
                <input type="password" name="password">
            </div>

            @foreach ($hobby_list as $hobby)
                <span class="form-group">
                    <input type="checkbox" id="{{ $hobby }}" name="hobbies[]" value="{{ $hobby }}">
                    <label for="{{ $hobby }}">{{ $hobby }}</label>
                </span>
            @endforeach
            <hr>

            <div class="form-group">
                <label for="file">ファイルをアップロード</label>
                <input type="file" id="file" name="file">
            </div>
        
            
            <div>
                <input type="submit" value="登録">
            </div>
        </form>
    </div>
</body>
</html>