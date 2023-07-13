<?php

function ml_step2_read_references(){

    include 'foreign/Doc2Txt.php';
    include 'foreign/pdf_reader/vendor/autoload.php';
    
    if($_SESSION["CURR_PROTOCOL"] == 1){
        $user_dir = '../user_files/'.$_SESSION['teacher_account'].'/';
    } else {
        $user_dir = '../user_files/TESTER/';
    }
    
    // $user_dir = '../user_files/newdir@email.com';

    $arr_files = array_values(scandir($user_dir));
    
    unset($arr_files[0]);
    unset($arr_files[1]);
    $arr_files = array_values($arr_files);
    $arr_filetypes = array();
    $arr_filecontents = array();

    for($i = 0; $i < count($arr_files); $i++){
        $output = '';
        for($h = strlen($arr_files[$i]) - 1; $h > -1 && $arr_files[$i][$h] != '.'; $h--){
            $output = $arr_files[$i][$h].$output;
        }
        array_push($arr_filetypes, $output);
    }

    for($i = 0; $i < count($arr_filetypes); $i++){
        if ($arr_filetypes[$i] == 'txt') {
            array_push($arr_filecontents, file_get_contents($user_dir.$arr_files[$i]));
        } else if ($arr_filetypes[$i] == 'pdf') {
            $parser = new \Smalot\PdfParser\Parser(); 
            $file = $user_dir.$arr_files[$i];  
            $pdf = $parser->parseFile($file); 
            $textContent = $pdf->getText();
            array_push($arr_filecontents, $textContent);
        } else {
            $docObj = new Doc2Txt($user_dir.$arr_files[$i]);
            $txt = $docObj->convertToText();
            array_push($arr_filecontents, $txt);
        }
    }

    // print_r($arr_filecontents);

    //NORMALIZATION 1
    for($i = 0; $i < count($arr_filecontents); $i++){
        $output = '';
        for($h = 0; $h < strlen($arr_filecontents[$i]); $h++){
            if (ord($arr_filecontents[$i][$h]) >= 48 && ord($arr_filecontents[$i][$h]) <= 57){
                $output .= $arr_filecontents[$i][$h];
            } else if (ord($arr_filecontents[$i][$h]) >= 65 && ord($arr_filecontents[$i][$h]) <= 90){
                $output .= $arr_filecontents[$i][$h];
            } else if (ord($arr_filecontents[$i][$h]) >= 97 && ord($arr_filecontents[$i][$h]) <= 122){
                $output .= $arr_filecontents[$i][$h];
            } else {
                $output .= ' ';
            }
        }
        $arr_filecontents[$i] = $output;
        //echo $arr_filecontents[$i].'<br><br>';
    }

    //NORMALIZATION 2
    for($i = 0; $i < count($arr_filecontents); $i++){
        $examine = explode(' ',$arr_filecontents[$i]);
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
        $arr_filecontents[$i] = $output;
    }

    //NORMALIZATION 3
    for($i = 0; $i < count($arr_filecontents); $i++){
        $arr_filecontents[$i] = strtolower($arr_filecontents[$i]);
    }

    //NORMALIZATION 4
    $arr_extracted_content = array(); //in case the user wants to see the original content
    for($i = 0; $i < count($arr_filecontents); $i++){
        array_push($arr_extracted_content, remove_stopwords($arr_filecontents[$i]));
    }
    $arr_origin_content = $arr_extracted_content; //to assign and track the origin of the stemmed text

    //NORMALIZATION 5
    for($i = 0; $i < count($arr_extracted_content); $i++){
        $arr_extracted_content[$i] = porterstemmer_process($arr_extracted_content[$i]);
    }

    $final_filecontents = array();
    $final_origin_content = array();
    $final_extracted_content = array();

    for($i = 0; $i < count($arr_filecontents); $i++){
        if($arr_filecontents[$i] != " " && $arr_filecontents[$i] != "" && $arr_filecontents[$i] != null){
            array_push($final_filecontents, $arr_filecontents[$i]);
            array_push($final_origin_content, $arr_origin_content[$i]);
            array_push($final_extracted_content, $arr_extracted_content[$i]);
        }
    }

    $arr_output = array($final_filecontents, $final_origin_content, $final_extracted_content, $arr_files);

    // print_r($arr_output);

    return $arr_output;
}

?>