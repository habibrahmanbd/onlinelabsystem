<?php
  ini_set('display_errors', 1);

  require_once 'lib/nusoap.php';
  $user = 'myusername';
  $pass = 'myAPIpass';

  $lang = 1; // C++

  $code = $_GET['code'];
  $input = $_GET['input'];


  $run = true;
  $private = false;

  $client = new nusoap_client('http://ideone.com/api/1/service.wsdl', 'wsdl');

  $params = array(
        'user' => $user,
        'pass' => $pass,
        'sourceCode' => $code,
        'language' => $lang,
        'input' => $input,
        'run' => $run,
        'private' => $private
        );

  $result= $client->call('createSubmission', $params);

  if ($result['error'] == 'OK') {
    $params = array(
          'user' => $user,
          'pass' => $pass,
          'link' => $result['link']
        );
    $status = $client->call('getSubmissionStatus', $params);
    //$status = $client->getSubmissionStatus($user, $pass, $result['link']);

    if ($status['error'] == 'OK') {
      while ($status['status'] != 0) {
        sleep(3);
        $status = $client->call('getSubmissionStatus', $params);
       //$status = $client->getSubmissionStatus($user, $pass, $result['link']);
      }
    }

    echo '<br><br>';
    $params = array(
          'user' => $user,
          'pass' => $pass,
          'link' => $result['link'],
          'withSource' => false,
          'withInput' => true,
          'withOutput' => true,
          'withStderr' => false,
          'withCmpinfo' => false 
        );
    $details = $client->call('getSubmissionDetails', $params);
    //$details = $client->getSubmissionDetails($user, $pass, $result['link'], true, true, true, true, true);

    echo '<table border="0">';
    echo '<tr><th>Input</th>  <th>Output</th></tr>';
    echo '<tr>';
    echo "<td><code>".$details['input']."</code></td>";
    echo "<td><code>".$details['output']."</code></td>";
    echo '</tr>';
    echo '</table>';
  } else {
    echo '<h1>ERROR!</h1>';
  }
?>
