<?php



if(isset($_POST['search']) ) {



    if(isset($_POST['source'])){

        $source = $_POST['source'];

    }else{

        $source = null;

    }



    if(isset($_POST['url'])){

        $url = $_POST['url'];

    }else{

        $url=null;

    }



    if(isset($_POST['keyWord'])){

        $keyword = trim(strtolower($_POST['keyWord']));

    }else{

        $keyword=null;

    }



    if(isset($_POST['text_area'])){

        $textarea = strtolower($_POST['text_area']);

    }else{

        $textarea =null;

    }



    $search = new Search($url,$keyword,$textarea,$source);

    $feedback_text = $search->countWords()->text;

    $feedback_class = $search->countWords()->class;

}
