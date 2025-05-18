<?php
$file = 'answers.txt';

$question = $_POST['question'] ?? null;
$answer = $_POST['answer'] ?? null;
$ip = $_SERVER['REMOTE_ADDR'] ?? null;
$email = $_POST['email'] ?? null;

$question_number = explode('-', $question)[1] ?? 'null';

if (!file_exists($file)) {
  file_put_contents($file, '');
}

$lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$updated = false;

$session_found = false;
if(count($lines) > 0) {
  foreach ($lines as &$line) {
    if (strpos($line, $ip . ' ; ') === 0) {
      $session_found = true;

      if ($question_number === '1') {
        $timestamp = date('Y-m-d H:i:s');
        $line = $ip . ' ; ' . $timestamp . ' ; ' . $answer;
      } else {
        if($answer !== null) {
          $line .= ' ; ' . $answer;
        } elseif($email !== null) {
          $line .= ' ; ' . $email;
        }
      }

      $updated = true;
      break;
    }
  }
}

if (!$updated && $question_number === '1') {
  $timestamp = date('Y-m-d H:i:s');
  $found = false;

  foreach ($lines as &$line) {
    if (strpos($line, $ip . ' ;') === 0) {
      $line = $ip . ' ; ' . $timestamp . ' ; ' . $answer;
      $found = true;
      break;
    }
  }

  if (!$found) {
    $lines[] = $ip . ' ; ' . $timestamp . ' ; ' . $answer;
  }

  $updated = true;
}

file_put_contents($file, implode(PHP_EOL, $lines));