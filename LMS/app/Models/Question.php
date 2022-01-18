<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $fillable = ['course_id','type','question','point'];

    public $resultat = [];

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function answers(){
        return $this->hasMany(Answer::class,'question_id');
    }

    public function iscorrect($answer_question)
    {
        $nbr = 0;
        $nbr_true = 0;
        $nbr_false = 0;
       
        foreach ($this->answers as $answer) {
            if( $answer->is_correct == true ){
                $nbr ++;
            }   
        }
        foreach ($answer_question as $key => $answer) {
            if( $answer->iscorrect() == true ){
                $nbr_true ++;
                $this->resultat [$this->question][] =array($answer->answer,'vrai');
            }else{
                $nbr_false ++;
                $this->resultat [$this->question][] =array($answer->answer,'faux');
            }
        }
        if($nbr_true == $nbr && $nbr_false == 0 ){
            return $this->point;
        }
        else{            
            return 0;
        }

    }
    public function resultats(){
        return $this->resultat;
    }
  
}
