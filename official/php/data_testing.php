<?php

session_start();

$_SESSION["CURR_PROTOCOL"] = 0;

error_reporting(0);
// $question_input = "In what way is conducting a research useful/helpful to the society?";

$question_input = "What effective strategies would be used to teach College Student grammar, punctuation, sentence structure and errors independently online?";
$student_answers = array(
    "Gamification: It can be helpful to focus students' attention and make learning more enjoyable and engaging by creating games around concepts like punctuation, grammar, sentence structure, and error detecting.",
    "Personalized Feedback: Giving pupils individualized feedback can assist them in recognizing their mistakes and taking the appropriate action to fix them. In this context, interactive activities, quizzes, and evaluations with immediate feedback can be beneficial.",
    "Peer Review: Peer review sessions can be useful in inspiring college students to learn proper grammar usage, punctuation, and sentence construction. Giving pupils the chance to peer critique one another's work also motivates them to develop their writing abilities.",
    "Practical assignments: Giving students real-world activities that require them to use the language effectively is one method to encourage them to put the grammar and writing techniques they have learned in online classes to practice. The drafting of essays, articles, and other forms of academic writing that let students use their linguistic abilities are some examples of these assignments.",
    "Interactive videos: Making the learning process more engaging can be accomplished by using interactive movies that cover grammar and sentence construction. They can include tests, interactive activities, and rapid feedback while allowing the learner to move at their own pace.",
    "Clear Learning Objectives: Define your learning goals and what you want to get out of each lesson or course. This way, students know exactly what they're going to get out of it and it helps them stay focused.",
    "Interactive Online Modules: Create engaging online modules or lessons that teach grammar and punctuation rules, sentence structure, and common mistakes in an interactive way. Use different types of media like videos, pictures with information, and activities that students can interact with to make them more interested and involved in their learning.",
    "Practice Exercises: Give students plenty of chances to practice their grammar and punctuation skills with exercises and quizzes. Use quizzes and tests to know how you're doing right away and to see how much you've improved over time.",
    "Gamification: Designing games around topics such as punctuation, grammar, sentence structure, and error spotting can be beneficial in capturing students' attention and making learning more fun and engaging.",
    "Cooking Steak is one of the American's most iconic food identities where the meat is based with melted butter and thyme in hot pan to extract out of the flavour of the food.",
    "The best practical assignment for the child to learn how to cook a good food is through learning clear objectives and practice exercises such cutting some vegetables like onions, spinach, petchay and more to have greater attention to detail, plus interactive online modules to further enhance their cooking skills even more.",
    "Continuous Assessment and Progress Tracking: Create a mechanism to monitor students' progress during the course. Provide opportunities for students to exhibit their understanding of sentence structure and error repair, and regularly evaluate their grammar and punctuation skills."
);
$student_truths = array("TP","TP","TP","TP","TP","TP","TP","TP","TP","TN","TN","TP");

// $question_input = "If there is a subject called Science and Technology Studies (STS). What is science, and what is techcnology?";
// $student_answers = array(
//     "Science is the study of the natural word via research and experiment. While technology is the application of science in practice.",
//     "Science is the systematic study of the structure and behavior of the physical and natural worlds through observation and experimentation, whereas technology is the practical application of scientific knowledge.",
//     "Science is the methodical study of the natural world using scientific methods, such as collecting data. And technology is the application of science to the creation of gadgets that can solve issues and perform various tasks. Science is actually applied in technology.",
//     "Science is the deliberate pursuit of new information through experimentation and observation. The process of using scientific knowledge in practical applications for diverse reasons is known as technology.",
//     "Science is a means of understanding about the world and using information to achieve goals. Technology, on the other hand, is the branch of knowledge that deals with engineering or applied sciences.",
//     "- Technology and science are often successfully used interchangeably. But if the aim of technology is to produce goods that address issues and enhance human lives, the aim of science is the quest of knowledge for its own sake. ",
//     "- Scientific knowledge allows us to make new observations about the world. And technology provides students with fast access to knowledge, accelerated learning, and enjoyable opportunities to put what they've learned into practice.",
//     "- Science is any type of information obtained through various methods. While technology is apparatus and equipment that applies scientific knowledge in a specific area for practical objectives, such as improving human lives.",
//     "- Science can be conceived of as both a body of knowledge and a collection of resources. Technology gives students immediate access to a great amount of information and resources.",
//     "Technology is the use of scientific knowledge to achieve practical ends. And Science is the study of the natural world through factual research",
//     "Technology is the result of science and engineering. And science is the sum of human people' systematic activities to manage nature for their own profit.",
//     "- Science is a method of objective observation that explains the fundamental laws of nature. Technology is the result of putting scientific knowledge into practice. - Science is a body of knowledge about the physical, chemical, and biological universes and the events that occur within them. Whereas technology combines ideas and practice to create something useful.",
//     "Technology is like a puppy a cute little puppy. The science behind the cuteness of those baby dogs are puppy eyes. Engineered to make people in awe and calmness or to be deceived to get their practical or impulsive objective like food from the plate you're eating.",
//     "One of the fundamental natures of human psychology in society is that many people often use technology and science for their own means of entertainment or escape like drinking alcohol or taking drugs."
// );
// $student_truths = array("TP","TP","TP","TP","TP","TP","TP","TP","TP","TP","TP","TP","TN","TN");

// $question_input = "Explain each concept: Speed, Velocity, Distance and Displacement.";
// $student_answers = array(
//     "Speed refers to an object travel distance over time, while velocity is basically speed with an inclusion of direction or known as a vector. As for the distance and displacement, both are similar, but the core difference is that the distance tells how much ground an object has covered, while displacement shows how far out of place an object is.",
//     "Speed is the amount of space an object covers in a given amount of time, whereas velocity is simply speed plus direction, also referred to as a vector. The difference between distance and displacement is that while both measure how much ground an object has covered, displacement demonstrates how far an object has moved from its original location.",
//     "Speed is the distance an object travels in a unit of time, whereas velocity is speed plus direction, often known as a vector. Although distance and displacement are comparable, they differ primarily in that distance indicates how much ground an object has covered and displacement indicates how far an object has moved from its original location.",
//     "While velocity is essentially speed with the addition of direction or known as a vector, speed refers to an object's journey distance over time. While distance and displacement are comparable concepts, they vary fundamentally in that the former measures how much territory an item has covered while the latter demonstrates how far an object has moved from its original location.",
//     "Speed is the distance traveled by an object over time, whereas velocity is speed with the addition of direction, sometimes known as a vector. Distance and displacement are comparable, but the main distinction is that distance informs how much ground an item has covered, whereas displacement shows how far out of position an object is.",
//     "Speed is the distance an item travels over time, whereas velocity is speed plus direction, often known as a vector. Both distance and displacement are comparable, but the main distinction is that distance indicates how much ground an object has covered, whereas displacement indicates how far out of place an object is.",
//     "Speed is the distance traveled by an object over time, whereas velocity is speed plus direction, also known as a vector. Distance and displacement are similar, but the main difference is that distance indicates how much ground an object has covered, whereas displacement indicates how far out",
//     "Speed refers to how far an object travels in a given time, while velocity describes the speed and direction of an object. The two measures of distance and displacement are similar, but the key difference is that distance shows how much ground an object has covered, while displacement shows how far away an object is from its original location.",
//     "Speed refers to an object travel distance over time, while velocity is basically speed with an inclusion of direction or known as a vector. The distance an object has traveled and the displacement it has caused are both similar, but the core difference is that the distance tells how much ground an object has covered, while displacement shows how far out of place an object is.",
//     "Speed refers to an object travel distance over time, while velocity is basically speed with an inclusion of direction or known as a vector. Compared to distance, displacement provides a more accurate depiction of an object's position. The difference is that distance measures how far an object has traveled, while displacement measures how far an object is from its normal position.",
//     "Speed indicates how far an object travels over a period of time, while velocity measures how quickly an object moves with respect to a specific direction or axis. The two measures can be compared by noting the difference between the object's distance traveled and its displacement.",
//     "Speed refers to the distance an object travels over time, while velocity is a measure of speed with an inclusion of direction or known as a vector. As for the distance and displacement, both are similar, but the core difference is that the distance tells how much ground an object has covered, while displacement shows how far away from its original location an object is.",
//     "Speed refers to an object travel distance over time, while velocity is basically speed with an inclusion of direction or known as a vector. Regarding the distance and displacement, both are similar, but the core difference is that the distance tells how much ground an object has covered, while displacement shows how far out of place an object is.",
//     "Speed refers to how far an object travels in a short period of time, while velocity is how fast an object is moving in a particular direction. As for the distance and displacement, both are similar, but the core difference is that the distance tells how much ground an object has covered, while displacement shows how far away from its original location an object is.",
//     "Speed refers to an object travel distance over time, while velocity is basically speed with an inclusion of direction or known as a vector. The distance and displacement measurements are both similar, but the core difference is that distance measures how much ground an object has covered, while displacement shows how far out of place an object is.",
//     "Speed refers to an object travel distance over period, while velocity is fundamentally speed with an addition of course or known as a heading. As for the distance and dislocation, both are related, but the center difference is that the distance discerns how much ground an object has closed, while displacement shows by virtue of what unusual of place an object is.",
//     "Speed refers to an object travel distance over occasion, while speed is fundamentally speed accompanying an addition of course or famous as a heading. Concerning the distance and dislocation, two together are identical, but the center distinctness is that the distance speaks by means of what much ground an object has hidden, while dislocation shows in what way or manner unusual of place an object is.",
//     "Speed refers to an object travel distance over opportunity, while speed is fundamentally speed accompanying an addition of course or popular as a heading. Concerning the distance and dislocation, two together are analogous, but the center dissimilarity is that the distance speaks by what method much ground an object has marked, while dislocation shows by virtue of what unusual of place an object is.",
//     "Speed refers to an object travel distance over period, while speed is fundamentally speed accompanying an addition of course or famous as a heading. Concerning the distance and dislocation, two together are related, but the center dissimilarity is that the distance understands in what way or manner much ground an object has hidden, while dislocation shows by what method unusual of place an object is.",
//     "Speed refers to an object travel distance over occasion, while speed is fundamentally speed accompanying an addition of management or popular as a heading. Concerning the distance and dislocation, two together are identical, but the gist dissimilarity is that the distance reports by means of what much ground an object has dotted, while dislocation shows in what way or manner unusual of place an object is.",
//     "Speed alludes to an question travel remove over time, whereas speed is essentially speed with an consideration of heading or known as a vector. As for the remove and uprooting, both are comparable, but the center distinction is that the separate tells how much ground an question has secured, whereas uprooting appears how distant out of put an protest is.",
//     "Speed and Distance are scalar quantity in other words it only considers the magnitude, while Velocity and Displacement is a vector quantity which not only considers the magnitude, but also the direction of the object."
// );
// $student_truths = array("TP","TP","TP","TP","TP","TP","TP","TP","TP","TP","TP","TP","TP","TP","TP","TN","TN","TN","TN","TN","TN","TP");

$perfect_grade = 10;
$student_result1 = array();
$student_result2 = array();
$confusion_results1 = array();
$confusion_results2 = array();
$grade_percentage = array();
$grade_thresholds = array();
$thresholds = array(90, 70, 60, 50, 0);
//ML ALL STEPS

include 'ml_step1_process_question.php';
include 'ml_step2_read_references.php';
include 'ml_step3_search_content.php';

//CHECKSTUDENT ANSWERS

function checkstudent_step2_text_normalization($student_answer, $documents){

    //normalization1 = clear "non-text-symbols"
    //normalization2 = unicode prevention
    //normalization3 = all letters are lowercased
    //normalization4 = remove stopwords
    //normalization5 = stemming

    $documents = explode('<&,&>', $documents);

    // include 'foreign/list_of_stopwords.php';
    // require 'foreign/porter2-master/demo/process.inc';

    $arr_content = array($student_answer);
    for($i = 0; $i < count($documents); $i++){
        array_push($arr_content, $documents[$i]);
    }

    //NORMALIZATION 1
    for($i = 0; $i < count($arr_content); $i++){
        $output = '';
        for($h = 0; $h < strlen($arr_content[$i]); $h++){
            if(ord($arr_content[$i][$h]) == 32 || ord($arr_content[$i][$h]) == 39){
                $output .= $arr_content[$i][$h];
            } else if (ord($arr_content[$i][$h]) >= 48 && ord($arr_content[$i][$h]) <= 57){
                $output .= $arr_content[$i][$h];
            } else if (ord($arr_content[$i][$h]) >= 65 && ord($arr_content[$i][$h]) <= 90){
                $output .= $arr_content[$i][$h];
            } else if (ord($arr_content[$i][$h]) >= 97 && ord($arr_content[$i][$h]) <= 122){
                $output .= $arr_content[$i][$h];
            } else {
                $output .= ' ';
            }
        }
        $arr_content[$i] = $output;
        //echo $arr_content[$i].'<br><br>';
    }

    //NORMALIZATION 2
    for($i = 0; $i < count($arr_content); $i++){
        $examine = explode(' ',$arr_content[$i]);
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
        $arr_content[$i] = $output;
    }

    //NORMALIZATION 3
    for($i = 0; $i < count($arr_content); $i++){
        $arr_content[$i] = strtolower($arr_content[$i]);
    }

    //NORMALIZATION 4
    $arr_extracted_content = array(); //in case the user wants to see the original content
    for($i = 0; $i < count($arr_content); $i++){
        array_push($arr_extracted_content, remove_stopwords($arr_content[$i]));
    }
    $arr_origin_content = $arr_extracted_content; //to assign and track the origin of the stemmed text

    //NORMALIZATION 5
    for($i = 0; $i < count($arr_extracted_content); $i++){
        $arr_extracted_content[$i] = porterstemmer_process($arr_extracted_content[$i]);
    }

    return [$arr_extracted_content, $arr_origin_content];
}

function cosine_sim($input1, $input2){
    $hold1 = array();
    for($x = 0; $x < count($input1); $x++){
        array_push($hold1, $input1[$x] * $input2[$x]);
    }
    $numerator = 0;
    $deno1 = 0;
    $deno2 = 0;
    for($x = 0; $x < count($hold1); $x++){
        $numerator += $hold1[$x];
        $deno1 += $input1[$x] * $input1[$x];
        $deno2 += $input2[$x] * $input2[$x];
    }
    return $numerator / (sqrt($deno1) * sqrt($deno2));
}

function checkstudent_step3_learn_context($arr_documents){

    $arr_extracted_original = array(); //pairing stemmed and non-stemmed by words
    $arr_cleansed_e_o = array(); //cleaning empty and useless elements
    $arr_counted_terms = array(); //counting term frequency
    $arr_terms_per_doc = array(); //terms with document origins
    for($i = 0; $i < count($arr_documents[1]); $i++){
        array_push($arr_extracted_original, array(explode(' ',$arr_documents[0][$i]), explode(' ',$arr_documents[1][$i])));
    }
    // print_r($arr_extracted_original);
    for($i = 0; $i < count($arr_extracted_original); $i++){
        $hold_arr = array();
        for($h = 0; $h < count($arr_extracted_original[$i][0]); $h++){
            if(strlen($arr_extracted_original[$i][1][$h]) > 1){
                array_push($arr_cleansed_e_o, array($arr_extracted_original[$i][0][$h], $arr_extracted_original[$i][1][$h]));
                array_push($arr_counted_terms, $arr_extracted_original[$i][0][$h]);
                array_push($hold_arr, $arr_extracted_original[$i][0][$h]);
                //echo $arr_extracted_original[$i][0][$h].' == '.$arr_extracted_original[$i][1][$h].'<br><br>';
            }
        }
        array_push($arr_terms_per_doc, $hold_arr);
    }
    $arr_points_countedterms = array_values(array_count_values($arr_counted_terms)); // checking overall occurences of words
    $arr_counted_terms = array_values(array_unique($arr_counted_terms)); // horizontal values
    $arr_terms = array();
    for($i = 0; $i < count($arr_cleansed_e_o); $i++){
        array_push($arr_terms, $arr_cleansed_e_o[$i][0]);
    }
    // print_r($arr_term_id);
    $arr_term_freq_doc = array(); // inputting horizontal values with respect to its vertical values
    // print_r($arr_counted_terms);
    $arr_total_words_per_doc = array(); // total words per doc
    for($i = 0; $i < count($arr_terms_per_doc); $i++){
        $hold_arr = array_count_values($arr_terms_per_doc[$i]);
        $hold_arr_tfd = array_fill(0, count($arr_counted_terms), 0);
        for($h = 0; $h < count($arr_counted_terms); $h++){
            $hold_arr_tfd[$h] = $hold_arr[$arr_counted_terms[$h]];
        }
        array_push($arr_term_freq_doc, $hold_arr_tfd);
    }
    for($i = 0; $i < count($arr_term_freq_doc); $i++){
        $hold_num_words = 0;
        for($h = 0; $h < count($arr_term_freq_doc[$i]); $h++){
            $hold_num_words += $arr_term_freq_doc[$i][$h];
        }
        array_push($arr_total_words_per_doc, $hold_num_words);
    }

    // TERM FREQUENCY
    
    $arr_term_frequency = array();
    $inverse_doc_frequency = array();
    $arr_occurence_words_doc = array_fill(0, count($arr_counted_terms), 0);
    for($i = 0; $i < count($arr_total_words_per_doc); $i++){
        $hold_arr = array();
        for($h = 0; $h < count($arr_term_freq_doc[$i]); $h++){
            array_push($hold_arr, round($arr_term_freq_doc[$i][$h] / $arr_total_words_per_doc[$i], 5));
        }
        array_push($arr_term_frequency, $hold_arr);
    }
    // echo count($arr_counted_terms);
    
    // INVERSE DOCUMENT FREQUENCY

    for($i = 0; $i < count($arr_counted_terms); $i++){
        for($h = 0; $h < count($arr_term_frequency); $h++){
            if($arr_term_frequency[$h][$i] > 0){
                $arr_occurence_words_doc[$i]++;
            }
        }
    }
    // print_r($arr_occurence_words_doc);
    for($i = 0; $i < count($arr_occurence_words_doc); $i++){
        array_push($inverse_doc_frequency, round(log10(count($arr_term_frequency) / $arr_occurence_words_doc[$i]), 5));
    }
    // print_r($inverse_doc_frequency);
    // echo '<br><br>';
    // print_r(count($arr_term_frequency[0]));
    $arr_tf_idf = array();
    for($i = 0; $i < count($arr_term_frequency); $i++){
        $hold_arr = array();
        for($h = 0; $h < count($arr_term_frequency[$i]); $h++){
            array_push($hold_arr, round($arr_term_frequency[$i][$h] * $inverse_doc_frequency[$h], 5));
        }
        array_push($arr_tf_idf, $hold_arr);
    }
    // print_r($arr_tf_idf);
    $arr_traced_terms = array();
    for($i = 0; $i < count($inverse_doc_frequency); $i++){
        array_push($arr_traced_terms, $arr_cleansed_e_o[array_search($arr_counted_terms[$i], $arr_terms)][1]);
    }
    // print_r($arr_traced_terms);

    $custom_traced_terms = array();

    for($i = 0; $i < count($arr_traced_terms); $i++){
        $custom_traced_terms[$arr_traced_terms[$i]] = $inverse_doc_frequency[$i];
    }
    natsort($custom_traced_terms);

    // print_r($custom_traced_terms);
    // echo "<br><br>";
    $ranked_numbers = array();
    $ranked_words = array();
    $str_topwords = "";

    foreach($custom_traced_terms as $key => $element){
        array_push($ranked_numbers, $element);
        array_push($ranked_words, $key);
    }
    // print_r($ranked_numbers);
    // print_r($ranked_words);

    for($i = 0; $i < 60; $i++){
        $str_topwords .= ",".$ranked_words[$i];
    }

    // echo "TESTEE: ".cosine_sim($arr_tf_idf[0], $arr_tf_idf[1]).'<br>';

    $best_score = 0;
    for($i = 1; $i < count($arr_tf_idf); $i++){
        // echo cosine_sim($arr_tf_idf[0], $arr_tf_idf[0]).'<br>';
        if($best_score < cosine_sim($arr_tf_idf[0], $arr_tf_idf[$i])){
            $best_score = cosine_sim($arr_tf_idf[0], $arr_tf_idf[$i]);
        }
    }
    $best_score = round($best_score * 1000, 2);

    // if($best_score > 70){
    //     $best_score = 'Accurate '.$best_score.'%';
    // } else if ($best_score >= 50){
    //     $best_score = 'Correct '.$best_score.'%';
    // } else {
    //     $best_score = 'Inaccurate '.$best_score.'%';
    // }

    if($best_score > 100){
        return "100".$str_topwords;
    } else{
        return $best_score.$str_topwords;
    }

    // return $best_score.$str_topwords;
}

//##############################################

$start_step1 = microtime(true);
$output_step1 = ml_step1_process_question($question_input); // output = array(question, keywords, stemmed_keywords)
$end_step1 = microtime(true) - $start_step1;
// echo "ML1: ".$end_step1."<br><br>";
$start_step2 = microtime(true);
$output_step2 = ml_step2_read_references($output_step1); // output = array(file_contents, origin, stemmed_content)
$end_step2 = microtime(true) - $start_step2;
// echo "ML2: ".$end_step2."<br><br>";
$start_step3 = microtime(true);
$output_step3 = ml_step3_search_content($output_step1, $output_step2); // output = array()
$end_step3 = microtime(true) - $start_step3;
// echo "ML3: ".$end_step3."<br><br>";

// print_r($output_step3[1]);
// echo "<br><br>";

$db_mode_content = $output_step3[1][0];

for($i = 1; $i < count($output_step3[1]); $i++){
    $db_mode_content .= "<&,&>".$output_step3[1][$i];
}

echo "<strong>QUESTION:</strong> ".$question_input."<br><br><br>";

for($i = 0; $i < count($student_answers); $i++){
    $student_answer = $student_answers[$i];
    $student_answer = str_replace("'", "`", $student_answer);
    $student_answer = str_replace('"', "``", $student_answer);

    $start_step1 = microtime(true);
    // $step1 = checkstudent_step1_fetch_information($question_id); // print_r($step1); echo "<br><br>";
    //$step1 = Array(question_id, question, collected_links, documents, time_of_issue, question_owner_id)
    $end_step1 = microtime(true) - $start_step1;
    echo "<strong>ANSWER-".($i + 1)." :</strong> ".$student_answers[$i]."<br>";

    $start_step2 = microtime(true);
    $step2 = checkstudent_step2_text_normalization($student_answer, $db_mode_content); // print_r($step2);
    $end_step2 = microtime(true) - $start_step2;
    //$step2 = Array(array of extracted content, array origin content);
    // echo "CS2: ".$end_step2."<br>";

    $start_step3 = microtime(true);
    $step3 = checkstudent_step3_learn_context($step2); //print_r($step3);
    $end_step3 = microtime(true) - $start_step3;
    // echo "CS3: ".$end_step3."<br>";

    echo "<strong># WORDS</strong>: ".count(explode(" ",$student_answer))."<br>";

    $step3_score = "";
    for($h = 0; $h < strlen($step3) && $step3[$h] != ","; $h++){
        $step3_score .= $step3[$h];
    }
    echo "<strong>ACCURACY:</strong> ".$step3_score."%<br>";

    array_push($grade_percentage, $perfect_grade * ($step3_score / 100));

    for($h = 0; $h < count($thresholds); $h++){
        if($step3_score >= $thresholds[$h]){
            if($h == 0){
                array_push($grade_thresholds, $perfect_grade);
            } else if($h > 0){
                array_push($grade_thresholds, $perfect_grade * ($thresholds[$h - 1] / 100));
            }
            $h = count($thresholds);
        }
    }

    $arr_step3 = explode(",", $step3);

    // print_r($arr_step3); echo "<br><br>";

    $grade_content = $arr_step3[0];
    $score = count($arr_step3) - 1;
    $hps = 0;
    $viability = 0;
    $examine = "";
    for($h = 1; $h < count($arr_step3) && str_contains(strtolower($student_answers[$i]), $arr_step3[$h]) != 1; $h++){
        $score--;
    }
    for($h = 1; $h < count($arr_step3); $h++){
        if(str_contains(strtolower($student_answers[$i]), $arr_step3[$h]) == 1){
            $examine .= $arr_step3[$h]." ";
            $viability += count($arr_step3) - $h;
        }
        $hps += count($arr_step3) - $h;
    }
    if(($viability/$hps)*100 > 28){
        echo "<strong>VALIDITY:</strong> VALID<br>";
    } else {
        echo "<strong>VALIDITY:</strong> INVALID<br>";
    }

    // echo "<strong>VALIDITY:</strong>".$viability." | ".$hps."<br>";

    if($step3_score > 49 && $viability > $hps * 0.28){
        echo "<strong>REMARK:</strong> The machine thinks that this essay answered the question greatly.";
        array_push($student_result1, "TP");
    }else if($step3_score > 49 && $viability < $hps * 0.28){
        echo "<strong>REMARK:</strong> The machine thinks that this essay did not answer the question accordingly.";
        array_push($student_result1, "TN");
    }else if($step3_score < 50 && $viability > $hps * 0.28){
        echo "<strong>REMARK:</strong> The machine is not confident enough if this essay is correct or incorrect.";
        array_push($student_result1, "TN");
    }else{
        echo "<strong>REMARK:</strong> The machine thinks that this essay answered the question poorly.";
        array_push($student_result1, "TN");
    }
    echo "<br><br><br>";
    if($step3_score > 49){
        array_push($student_result2, "TP");
    } else{
        array_push($student_result2, "TN");
    }
}

// print_r($student_truths); echo "<br>"; print_r($student_result); echo"<br><br>";

$final_result1 = 0;
$final_result2 = 0;

for($i = 0; $i < count($student_truths); $i++){
    if($student_truths[$i] == $student_result1[$i]){
        $final_result1++;
    }
    if($student_truths[$i] == $student_result2[$i]){
        $final_result2++;
    }
    if($student_truths[$i] == "TP" && $student_result1[$i] == "TP"){
        array_push($confusion_results1, "TRUE POSITIVES");
    } else if($student_truths[$i] == "TP" && $student_result1[$i] == "TN"){
        array_push($confusion_results1, "FALSE NEGATIVES");
    } else if($student_truths[$i] == "TN" && $student_result1[$i] == "TP"){
        array_push($confusion_results1, "FALSE POSITIVES");
    } else {
        array_push($confusion_results1, "TRUE NEGATIVES");
    }
    if($student_truths[$i] == "TP" && $student_result2[$i] == "TP"){
        array_push($confusion_results2, "TRUE POSITIVES");
    } else if($student_truths[$i] == "TP" && $student_result2[$i] == "TN"){
        array_push($confusion_results2, "FALSE NEGATIVES");
    } else if($student_truths[$i] == "TN" && $student_result2[$i] == "TP"){
        array_push($confusion_results2, "FALSE POSITIVES");
    } else {
        array_push($confusion_results2, "TRUE NEGATIVES");
    }
}

echo "with validity: ".$final_result1." / ".count($student_truths)." ";print_r(array_count_values($confusion_results1));echo "<br><br>";
echo "without validity: ".$final_result2." / ".count($student_truths)." ";print_r(array_count_values($confusion_results2));echo "<br><br><br>";

echo "GRADE BY LITERAL PERCENTAGE:<br><br>";
for($i = 0; $i < count($grade_percentage); $i++){
    echo "ANSWER-".($i + 1).": ".$grade_percentage[$i]."<br>";
}
echo "<br><br>GRADE BY THRESHOLDS:<br><br>";
for($i = 0; $i < count($grade_thresholds); $i++){
    echo "ANSWER-".($i + 1).": ".$grade_thresholds[$i]."<br>";
}

?>