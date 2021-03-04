<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DateTime;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'title',
        'status',
        'due_date',
        'progress',
        'comment',
        'user_id',
    ];

    /**
     * 進捗状況と数字の対応付け
     *
     * @var array
     */

    const STATUS = [
        1 => ['label' => '未着手', 'class' => 'text-danger'],
        2 => ['label' => '着手中', 'class' => 'text-info'],
        3 => ['label' => '完了', 'class' => ''],
    ];
    /**
     * 状態に応じたクラスを設定する
     *
     * @return string
     */
    public function getStatusClassAttribute(){
        $status = $this->attributes['status'];

        if(!isset(self::STATUS[$status])){
            return '';
        }

        return self::STATUS[$status]['class'];
    }
    /**
     * 状態に応じた文字を設定する
     *
     * @return string
     */
    public function getStatusLabelAttribute(){
        $status = $this->attributes['status'];

        if(!isset(self::STATUS[$status])){
            return '';
        }


        return self::STATUS[$status]['label'];
    }
    /**
     * 現在の時間から換算して課題の残り日数を計算する
     *
     * @return string
     */
    public function getFormattedDueDateAttribute(){
        $today = new DateTime();
        $due_date = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['due_date']);
        $remain = $due_date->diff($today);
        return $remain->format('%a');
    }
    /**
    * timestampをフォームで扱えるようにする
    *
    * @return string
    */
    public function getDateToDatetimeLocalAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['due_date'])->format('Y-m-d\TH:i');
    }
    /**
    * timestampの表示を違和感のないようにする。
    *
    * @return string
    */
    public function getDateToDatetimeAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['due_date']);
    }
}
