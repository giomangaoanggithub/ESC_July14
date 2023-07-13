<?php

session_start();

// this program runs all other programs to check the student's work

include 'checkstudent_step1_fetch_information.php';
include 'checkstudent_step2_text_normalization.php';
include 'checkstudent_step3_learn_context.php';

// include 'foreign/list_of_stopwords.php';
// require 'foreign/porter2-master/demo/process.inc';

error_reporting(0);
// $student_answer = 'Conducting research is essential in addressing the current problems that our society is facing. Research allows us to gather and analyze data to identify the root causes of various issues, such as poverty, corruption, and inequality. Through research, we can develop evidence-based solutions that can be used to address these issues and improve the lives of people in our communities. Research also generates new knowledge and information about specific topics. This new knowledge can be used to improve existing technologies and practices and create new innovations that can benefit society. Conducting research also helps to enhance our skills and knowledge. Researchers need to acquire new skills and techniques to design and conduct studies, collect and analyze data, and communicate their findings effectively, and with these skills, this can really help society. ';
$student_answer = 'With Spain`s defeat in the Spanish-American War, Spanish rule came to an end in 1898. The Philippines were later annexed by the US as a territory. Emilio Aguinaldo`s revolution was put down by American soldiers. The Insular Government was founded by the United States to control the Philippines. The Philippine Assembly was chosen in 1907 through a popular vote. In the Jones Act, the United States pledged independence. [20] The Philippine Commonwealth was founded in 1935 as a temporary measure lasting 10 years before complete independence. However, Japan invaded the Philippines in 1942 as part of World War II. In 1945, the American military defeated the Japanese. The independent Philippine Republic was created in 1946 by the Treaty of Manila.';
$question_id = '41';
// $student_answer = $_POST["answer"];
// $question_id = $_POST["question_id"];
// $student_id = $_SESSION["student_user_id"];

$student_answer = str_replace("'", "`", $student_answer);
$student_answer = str_replace('"', "``", $student_answer);

$start_step1 = microtime(true);
$step1 = checkstudent_step1_fetch_information($question_id); // print_r($step1); echo "<br><br>";
//$step1 = Array(question_id, question, collected_links, documents, time_of_issue, question_owner_id)
$end_step1 = microtime(true) - $start_step1;

$start_step2 = microtime(true);
$step2 = checkstudent_step2_text_normalization($student_answer, $step1['documents']); // print_r($step2);
$end_step2 = microtime(true) - $start_step2;
//$step2 = Array(array of extracted content, array origin content);

$start_step3 = microtime(true);
$step3 = checkstudent_step3_learn_context($step2); //print_r($step3);
$end_step3 = microtime(true) - $start_step3;

echo $step3;
?>