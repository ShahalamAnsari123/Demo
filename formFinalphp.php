<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>

@import url(https://fonts.googleapis.com/css?family=Oswald:300,400,700);
@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic);

    body {
  margin: 0;
  width: 100vw;
  height: 100vh;
  background: #ecf0f3;
  display: flex;
  align-items: center;
  text-align: center;
  justify-content: center;
  place-items: center;
  overflow: hidden;
  font-family:'Oswald', sans-serif;
}
.container {
  position: relative;
  width: 350px;
  height: 525px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #232324, -14px -14px 20px white;
  word-spacing: 5px;
  color: rgb(17 24 39);
  font-size: x-large;
}

    </style>
</head>
<body>
    
<?php
$ch = curl_init();
$str1=$_POST["str1"];
$str2=$_POST["str2"];
$str="I am currently a ".$str1.". How can i become a ".$str2."?";
curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$postdata=array("model"=> "text-davinci-001",
  "prompt"=> $str,
  "temperature"=> 1,
  "max_tokens"=> 1000,
  "top_p"=> 1,
  "frequency_penalty"=> 0,
  "presence_penalty"=> 0);
$postdata=json_encode($postdata);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization:Bearer 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'; //Replace API_KEY_OF_SHAHALAM with your apikey shahalam
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$result=json_decode($result,true);
$result= $result['choices'][0]['text'];
 ?>
 <div class="container" > <?php echo $result; ?> </div>
 </body>
</html>