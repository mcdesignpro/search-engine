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
              //get content of the webpage
              $dom = file_get_contents($this->url);
              //strip html tags from content
              $dom = rip_tags($dom);
              $this->content = $dom;
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
        //count istance of a word and return array with word as key and count as value
        $words =  array_count_values(str_word_count(Search::getcontent(), 1) );
        //change array key to lowercase
        $words = array_change_key_case($words,CASE_LOWER);
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
