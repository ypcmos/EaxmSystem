<?php

class Question {
    public $id;
    public $question;
    public $answers = array();
    public $result;
    
    public function readFromHandle($fp) {
        while (!feof($fp)) {
        	$line = trim(fgets($fp, 1024));
            if (strlen($line) != 0) {   
                if ($this->isJump($line)) {
                    return true;
                }
                if (preg_match("/^\d+/", $line)) {
                    $this->question = $this->resolveQuestion($line);
                } else if (preg_match("/^[A-Z]+/", $line)) {
                    $this->answers[] =  $this->resolveAnswers($line);             
                } else {   
                    $this->result = $this->resolveResult($line);
                    $this->shuffleAnswers();
                    break;                  
                }
            }
    	}
        return false;
    }
    
    public function isJump($line) {
        return false;
    }
    
    public function resolveQuestion($text) {
         $ar = explode('.', $text);
         $len = strlen($ar[0]);
         return substr($text, $len);
    }
    
    public function resolveAnswers($text) {
        return trim(substr($text, 1)); 
    }
    
    public function resolveResult($text) {
        $substr = substr($text, 15, strlen($text) - 21);
        return trim($substr);
    }
    
    public function isEmpty() {
        return  !isset($this->question) || empty($this->question);
    }
    
    public function shuffleAnswers() {
        $len = count($this->answers);
        $sortArray = Questions::createRandomArray($len, $len);
        $basic = ord('A');
        
        $temp = array();
        
        $index = 0;
        foreach ($sortArray as $i) {
            $temp[] = chr($basic + $index++).$this->answers[$i];
        }
        $this->answers = $temp;
        $rlen = strlen($this->result);
        $rt = array();
        for ($i = 0; $i < $rlen; $i++) {
            $nr = array_search(ord($this->result[$i]) - $basic, $sortArray);
            $rt[] = chr($nr + $basic);
        }      
        asort($rt);       
        $this->result = implode('', $rt);
    }
    
    public function write() {
        echo '[question]'.$this->question.'<br/>';
        foreach ($this->answers as $a) {
            echo '[ans]'.$a.'<br/>';
        }
        echo '[res]'.$this->result;
    }
    
    public function writeHtml() {    
        $pic = '';
        $qs = explode('[img:', $this->question);
        if (count($qs) == 2) {
            $this->question = $qs[0];
            $pic = '<img src="'.'data/pic/'.substr($qs[1], 0, strlen($qs[1]) - 1).'"/>';
        }
        echo '<div class="q'.$this->id.'"><p>'.$this->id.$this->question.'</p>'.$pic;
        foreach ($this->answers as $a) {
            echo '<label><input name="ans'.$this->id.'" type="checkbox" value="'.$a[0].'">'.$a.'</input></label>';
        }
        echo '<input name="ans'.$this->id.'" type="hidden" value="'.$this->result.'"></input></div>';
    }
    
}

class Questions {
    public $questions;
    
    public function __construct($path) {
        $fp = fopen($path, 'r');
        
        $index = 1;
        while (!feof($fp)) {
            $q = new Question;
            $q-> readFromHandle($fp);
            $q->id = $index++;
            if (!$q->isEmpty()) {
                $this->questions[] = $q;
            }
        }
        fclose($fp);
    }
 
    public function writeAll() {
        echo '<div class="question">';
        foreach ($this->questions as $q) {
            $q->writeHtml();
        }
        echo '</div>';
    }
    
    public function writeRandom($num) {
        echo '<div class="question">';
        $len = count($this->questions);
        
        if ($num > $len) {
            $num = $len;
        }
        
        $result = self::createRandomArray($num, $len);
        $index = 1;
        foreach ($result as $i) {
            $this->questions[$i]->id = $index++;
            $this->questions[$i]->writeHtml();
        }
        echo '</div>';
    }
    
    public static function createRandomArray($num, $len) {
        $numbers = range (0, $len - 1); 
        shuffle ($numbers);  
        return array_slice($numbers,0, $num); 
    }
}
?>