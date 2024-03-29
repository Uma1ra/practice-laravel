<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'hobby_name'];

    public function user() {
        return $this->belogsTo(User::class);
    }

    public static $hobby_list = [
        '読書', '料理', 'ガーデニング', 'スポーツ', '音楽',
        '映画鑑賞', '旅行', '写真撮影', 'ハイキング', '手芸',
        '絵画', 'ダンス', 'ゲーム', '釣り', '登山',
        '料理教室', 'ヨガ', 'アウトドア', 'アニメ鑑賞', '水泳'
    ];
}
