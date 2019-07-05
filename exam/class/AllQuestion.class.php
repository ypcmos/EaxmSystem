<?php
require_once "Question.class.php";

class SuperQuestion extends Question {
    public $type;
    
    public function readFromHandle($fp, $type) {
        $this->type = $type;
        
        if ($type == 2) {
            $this->answers = array('.正确', '.错误');
        }
        return parent::readFromHandle($fp);     
    }
    
    public function resolveResult($text) {
        $substr = substr($text, 15);
        return trim($substr);
    }
    
    public function isJump($line) {
        if (strcmp('[type end]', $line) == 0) {
        	return true;
        } else {
            return false;
        }
    }
    
    public function writeHtml() {    
        $pic = '';
        $qs = explode('[img:', $this->question);
        if (count($qs) == 2) {
            $this->question = $qs[0];
            $pic = '<img src="'.'data/pic/'.substr($qs[1], 0, strlen($qs[1]) - 1).'"/>';
        }
        $mark = $this->type.'-'.$this->id;
        echo '<div class="q'.$mark.'"><p>'.$this->id.$this->question.'</p>'.$pic;
        if ($this->type == 0 || $this->type == 2) {
            foreach ($this->answers as $a) {
                
                $as = explode('[img:', $a);
                $a2 = $a;
                if (count($as) == 2) {
                    $a2 = $as[0];
                    $pic2 = '<img src="'.'data/pic/'.substr($as[1], 0, strlen($as[1]) - 1).'"/>';
                }
                echo '<label><input name="ans'.$mark.'" type="radio" value="'.$a[0].'">'.$a2.'</input></label>'.$pic2;
            }
            
        } else if ($this->type == 1) {
            foreach ($this->answers as $a) {
                $as = explode('[img:', $a);
                $a2 = $a;
                if (count($as) == 2) {
                    $a2 = $as[0];
                    $pic2 = '<img src="'.'data/pic/'.substr($as[1], 0, strlen($as[1]) - 1).'"/>';
                }
                echo '<label><input name="ans'.$mark.'" type="checkbox" value="'.$a[0].'">'.$a2.'</input></label>'.$pic2;
            }
        }
        echo '<input name="ans'.$mark.'" type="hidden" value="'.$this->result.'"></input></div>';
    }   
}
    

class SuperQuestions extends Questions {
    public $type;
    public function __construct($fp, $type) {
        $index = 1;
        $this->type = $type;
        while (!feof($fp)) {
        
            $q = new SuperQuestion;
            if ($q-> readFromHandle($fp, $type)) {
                break;
            }
            $q->id = $index++;
            if (!$q->isEmpty()) {
                $this->questions[] = $q;
            }
        }
    }
}

class AllQuestion {
    public $questions_cluster;
    
    
    public function __construct($path) {
        $fp = fopen($path, 'r');
            
        $index = 1;
        while (!feof($fp)) {
            $line = trim(fgets($fp, 1024));
            $qs = explode('[type:', $line);
            if (count($qs) == 2) {
                $type = substr(trim($qs[1]), 0, 1);
                $q = new SuperQuestions($fp, $type);
                $this->questions_cluster[] = $q;
                //var_dump( $q);
                
            }  
        }
        fclose($fp);
    }
    
    public function write() {
        $a = array('一', '二', '三', '四', '五');
        $index = 0;
        echo '<div class="question_content">';
        foreach ($this->questions_cluster as $q) {
            echo '<p class="question_type">'.$a[$index++].'.'.self::showQuestionsTitle($q->type).'</p>';
            $q->writeRandom(10000);
        }
        echo '</div>';
    }
    
    public function writeNum($num) {
        $a = array('一', '二', '三', '四', '五');
        $index = 0;
        echo '<div class="question_content">';
        foreach ($this->questions_cluster as $q) {
            echo '<p class="question_type">'.$a[$index++].'.'.self::showQuestionsTitle($q->type).'</p>';
            $q->writeRandom($num);
        }
        echo '</div>';
    }
    
    public static function showQuestionsTitle($type) {
        switch ($type) {
            case 0: 
            $ret = '单选题';
            break;
            case 1:
            $ret = '多选题';
            break;
            case 2:
            $ret = '判断题';
            break;
        }
        return $ret;
            
    }
}