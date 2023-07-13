<?php

function ml_step4_save_references($input_question, $arr_goodlinks, $arr_textcontent, $question_owner_id, $grade, $due){
    
    include 'mysql/db_connection.php';
    // echo "ml4<br>";
    // print_r($arr_textcontent[1]);

    $input_question = str_replace("'", "`", $input_question);
    $input_question = str_replace('"', '`', $input_question);
    
    $hold_str = $arr_textcontent[0];
    for($i = 1; $i < count($arr_textcontent); $i++){
        $hold_str .= '<&,&>'.$arr_textcontent[$i];
    }
    $arr_textcontent = str_replace('  ', ' ', $hold_str);

    // echo $arr_textcontent;

    $hold_str = $arr_goodlinks[0];
    for($i = 1; $i < count($arr_goodlinks); $i++){
        $hold_str .= '<&,&>'.$arr_goodlinks[$i];
    }
    $arr_goodlinks = $hold_str;

    // echo strlen($arr_textcontent);

    if(strlen($arr_textcontent) > 30000){
        try {
            $sql = "INSERT INTO questions (question, collected_links, documents, HPS, question_owner_id, due_date)
            VALUES ('$input_question','$arr_goodlinks', '$arr_textcontent', '$grade','$question_owner_id', '$due')";
            // use exec() because no results are returned
            $conn->exec($sql);
            $conn = null;
            echo "information saved and complete...";
        } catch(PDOException $e) {
            $conn = null;
            echo $sql . "<br>" . $e->getMessage();
        }
    } else {
        echo "Sorry there is no reference that could support your question. Please upload files that will support your questions. But in case if you did, it is better to upload more files that could support it.";
    }
    
    

}

?>