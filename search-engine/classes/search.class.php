<?php
class Search {

    protected $content = "";
    public $feedback = "";
    public $wordCount = "";
    // public constructor function
    public function __construct($url,$keyword, $textarea,$source){
        $this->url = $url;
        $this->keyword = $keyword;
        $this ->textarea =  $textarea;
        $this->source = $source;
    }
    

   public function getcontent(){

       if($this->source && $this->source == "url"){

           if($this->url && $this->url !=null){
               $dom = file_get_contents($this->url);
               $dom = rip_tags($dom);
               $this->content = ($dom);
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