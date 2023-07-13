<?php

function ml_step1_process_question($question){

    //normalization1 = clear "non-text-symbols"
    //normalization2 = unicode prevention
    //normalization3 = all letters are lowercased
    //normalization4 = remove stopwords
    //normalization5 = stemming

    include 'foreign/list_of_stopwords.php';
    require 'foreign/porter2-master/demo/process.inc';

    $question = array($question);

    //NORMALIZATION 1
    for($i = 0; $i < count($question); $i++){
        $output = '';
        for($h = 0; $h < strlen($question[$i]); $h++){
            if (ord($question[$i][$h]) >= 48 && ord($question[$i][$h]) <= 57){
                $output .= $question[$i][$h];
            } else if (ord($question[$i][$h]) >= 65 && ord($question[$i][$h]) <= 90){
                $output .= $question[$i][$h];
            } else if (ord($question[$i][$h]) >= 97 && ord($question[$i][$h]) <= 122){
                $output .= $question[$i][$h];
            } else {
                $output .= ' ';
            }
        }
        $question[$i] = $output;
        //echo $question[$i].'<br><br>';
    }

    //NORMALIZATION 2
    for($i = 0; $i < count($question); $i++){
        $examine = explode(' ',$question[$i]);
        // print_r($examine);
        $output = '';
        for($h = 0; $h < count($examine); $h++){
            if($examine[$h] == intval($examine[$h])){
                if($examine[$h] >= 8192 && $examine[$h] <= 8303){
                    $output .= '';
                } else {
                    $output .= $examine[$h].' '; 
                }
            } else {
                $output .= $examine[$h].' ';
            }
        }
        $question[$i] = $output;
    }

    //NORMALIZATION 3
    for($i = 0; $i < count($question); $i++){
        $question[$i] = strtolower($question[$i]);
    }

    //NORMALIZATION 4
    $arr_extracted_content = array(); //in case the user wants to see the original content
    for($i = 0; $i < count($question); $i++){
        array_push($arr_extracted_content, remove_stopwords($question[$i]));
    }
    $arr_origin_content = $arr_extracted_content; //to assign and track the origin of the stemmed text

    //NORMALIZATION 5
    for($i = 0; $i < count($arr_extracted_content); $i++){
        $arr_extracted_content[$i] = porterstemmer_process($arr_extracted_content[$i]);
    }

    $arr_output = array($question[0], $arr_origin_content[0], $arr_extracted_content[0]);

    // print_r($question);
    // echo "<br>";
    // print_r($arr_origin_content);
    // echo "<br>";
    // print_r($arr_extracted_content);

    // print_r($arr_output);

    return $arr_output;
}

?>