<?php

function ml_step3_search_content($question_input, $arr_filecontent){
    // print_r($question_input);
    // echo "<br><br>";
    // print_r($arr_filecontent);
    // echo "<br><br>";
    // echo strlen($arr_filecontent[0])."/".strlen($arr_filecontent[1]);

    $stemmed_question = explode(" ",$question_input[2]);
    $stemmed_content = $arr_filecontent[0];
    $arr_question_scores = array();
    // print_r($stemmed_content);
    // echo count($stemmed_content);
    // echo "<br><br>";
    // echo $arr_filecontent[2];
    // echo "<br><br>";

    for($i = 0; $i < count($stemmed_content); $i++){
        $question_score = 0;
        for($h = 0; $h < count($stemmed_question); $h++){
            if(str_contains($stemmed_content[$i], $stemmed_question[$h]) && strlen($stemmed_question[$h]) > 2){
                $question_score++;
            }
        }
        array_push($arr_question_scores, $question_score);
    }

    // print_r($arr_question_scores);

    // getting the highest score
    $highest_score = $arr_question_scores[0];
    for($i = 0; $i < count($arr_question_scores); $i++){
        if($arr_question_scores[$i] > $highest_score){
            $highest_score = $arr_question_scores[$i];
        }
    }

    $arr_parameters = array();

    // print_r($highest_score);

    for($i = 0; $i < count($arr_question_scores); $i++){
        if($arr_question_scores[$i] > $highest_score * 0.48){
            array_push($arr_parameters, "PASS");
        } else {
            array_push($arr_parameters, "REJECT");
        }
    }

    // print_r($arr_parameters);

    $viable_references = array();
    $viable_contents = array();

    for($i = 0; $i < count($arr_parameters); $i++){
        if($arr_parameters[$i] == "PASS"){
            array_push($viable_references, $arr_filecontent[3][$i]);
            array_push($viable_contents, $arr_filecontent[1][$i]);
        }
    }

    $arr_arr_wordindex = array();
    $arr_wordedcontent = array();
    $arr_chosencontext = array();
    $arr_questioninput = explode(' ', $question_input[1]);
    $arr_word_id = array();
    $arr_word_origin = array();

    for($i = 0; $i < count($arr_questioninput); $i++){
        array_push($arr_word_id, '<&word'.$i.'&>');
        array_push($arr_word_origin, $arr_questioninput[$i]);
    }

    for($i = 0; $i < count($viable_references); $i++){
        $arr_hold = $viable_contents[$i];
        for($h = 0; $h < count($arr_questioninput); $h++){
            if(strlen($arr_questioninput[$h]) > 2){
                $arr_hold = str_replace($arr_questioninput[$h], '<&word'.$h.'&>', $arr_hold);
            }
        }
        array_push($arr_wordedcontent, $arr_hold);
    }

    for($i = 0; $i < count($arr_wordedcontent); $i++){
        $reference = "";
        $count = 0;
        for($h = 0; $h < strlen($arr_wordedcontent[$i]); $h++){

            if(strlen($arr_wordedcontent[$i]) > $h + 200){
                if($arr_wordedcontent[$i][$h + 200] == "<"){
                    $count = 25;
                    for($g = 0; $arr_wordedcontent[$i][$h - $g] != " " && $g > 0; $g++){
                        $reference = $arr_wordedcontent[$i][$h - $g].$reference;
                    }
                    $reference .= $arr_wordedcontent[$i][$h];
                    
                    $h++;
                }
            }

            if($arr_wordedcontent[$i][$h] == "<"){
                $count = 25;
                $reference .= $arr_wordedcontent[$i][$h];
            } else if ($arr_wordedcontent[$i][$h] == " "){
                $count--;
                $reference .= $arr_wordedcontent[$i][$h];
            } else if ($count > 0){
                $reference .= $arr_wordedcontent[$i][$h];
            }
        }
        array_push($arr_chosencontext, $reference);
    }

    for($i = 0; $i < count($arr_chosencontext); $i++){
        for($h = 0; $h < count($arr_word_id); $h++){
            $arr_chosencontext[$i] = str_replace($arr_word_id[$h], $arr_word_origin[$h], $arr_chosencontext[$i]);
        }
    }
    
    // print_r ($arr_questioninput);
    // echo "<br><br>";
    // print_r($arr_chosencontext);

    // print_r($arr_word_id);
    // echo "<br><br>";

    // print_r($arr_arr_wordindex);
    // echo "<br><br>";
    // print_r($arr_wordedcontent);

    

    // print_r($viable_references);
    // echo "<br><br>";
    // print_r($viable_contents);

    return array($viable_references, $arr_chosencontext);
}

?>