<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DateTime;

class Task extends Model
{
    protected $fillable = [
        'title',
        'status',
        'due_date',
        'comment',
        'user_id'
    ];
    //情報表示の整理
    const STATUS = [
        1 => ['label' => '未着手', 'class' => 'text-danger'],
        2 => ['label' => '着手中', 'class' => 'text-info'],
        3 => ['label' => '完了', 'class' => ''],
    ];

    public function getStatusClassAttribute(){
        $status = $this->attributes['status'];

        if(!isset(self::STATUS[$status])){
            return '';
        }

        return self::STATUS[$status]['class'];
    }
    
    public function getStatusLabelAttribute(){
        $status = $this->attributes['status'];

        if(!isset(self::STATUS[$status])){
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    public function getFormattedDueDateAttribute(){
        $today = new DateTime();
        $due_date = Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['due_date']);
        $remain = $due_date->diff($today);
        return $remain->format('%a');
    }
    //データベースの日付の型をdatetime-local型に直す。
    public function getDateToDatetimeLocalAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['due_date'])->format('Y-m-d\TH:i');
    }
    
    public function getDateToDatetimeAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['due_date']);
    }
}
