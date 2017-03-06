<?php
class Search {

    protected $content = "";
    public $feedback = "";
    public $wordCount = "";
    // public constructor function
    public function __construct($url,$keyword, $textarea,$source){
        $this->url = $url;
        $this->keyword = strtolower($keyword);
        $this ->textarea =  strtolower($textarea);
        $this->source = $source;
    }
    

   public function getcontent(){

       if($this->source && $this->source == "url"){

           if($this->url && $this->url !=null){
               $ch = curl_init();
               $timeout = 5;
               curl_setopt($ch, CURLOPT_URL, $this->url);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
               curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
               $data = curl_exec($ch);
               curl_close($ch);
               $this->content = $data;
           }
       }else if($this->source && $this->source == "textarea"){

           if($this->textarea && $this->textarea !=null){
               $this->content = $this->textarea;
           }
       }

       return $this->content;

   }

    public function countWords(){
        $this->feedback = new stdClass();
        $words =  array_count_values(str_word_count(Search::getcontent(), 1) );
        $words = array_change_key_case($words,CASE_LOWER);
        $this->words = $words;
        if($words){

            if(array_key_exists($this->keyword,$words)){
                $wordNum = $words[$this->keyword];
                $this->feedback->text = $this->keyword.' was found '.$wordNum.' time(s)!';
                $this->feedback->class = 'alert alert-success';
            }else{
                    $this->feedback->text = 'No words found!';
                    $this->feedback->class = 'alert alert-danger';
            }

        }else{
            $this->feedback->text = 'Sorry, We could not read the content of the page';
            $this->feedback->class = 'alert alert-warning';
        }

        return $this->feedback;
    }
}
