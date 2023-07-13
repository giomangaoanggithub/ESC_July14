<?php

// this program runs all other programs in relation to the question creation to run the whole operation.

session_start();

include 'dummy_data/test_step1_fetch_information.php';
include 'dummy_data/test_step4_learn_context.php';

include 'ml_step1_process_question.php';
include 'ml_step2_read_references.php';
include 'ml_step3_search_content.php';
include 'ml_step4_save_references.php';

// error_reporting(0);

// $user_input = 'In what way is conducting a research useful/helpful to the society?';
// $user_id = '69';
// $user_grade = '69';
// $due_date = current_timestamp();

$user_id = $_SESSION["teacher_user_id"];
$user_input = $_POST["question"];
$user_grade = $_POST["hps"];
$due_date = $_POST["due"];
$_SESSION["CURR_PROTOCOL"] = 1;

$start_step1 = microtime(true);
$output_step1 = ml_step1_process_question($user_input); // output = array(question, keywords, stemmed_keywords)
$end_step1 = microtime(true) - $start_step1;
$start_step2 = microtime(true);
$output_step2 = ml_step2_read_references($output_step1); // output = array(file_contents, origin, stemmed_content)
$end_step2 = microtime(true) - $start_step2;
$start_step3 = microtime(true);
$output_step3 = ml_step3_search_content($output_step1, $output_step2); // output = array()
$end_step3 = microtime(true) - $start_step3;
$start_step4 = microtime(true);
$output_step4 = ml_step4_save_references($user_input, $output_step3[0], $output_step3[1], $user_id, $user_grade, $due_date); // output = array()
$end_step4 = microtime(true) - $start_step4;
?>