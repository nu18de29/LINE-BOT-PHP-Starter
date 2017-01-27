<?php
 
   function pubMqtt($topic,$msg){
       
      //put("https://api.netpie.io/topic/binahead/$topic?retain",$msg);
	  //curl -X POST -d '{"topic":"/f14decf9-b20d-11e6-8d27-847beb0c5a27/light","value":"0"}' "http://122.155.202.140:1880/api/mqtt/message" -u apiuser:apiuser
	  post("http://122.155.202.140:1880/api/mqtt/message", {'topic':'/f14decf9-b20d-11e6-8d27-847beb0c5a27/$topic','value':'$msg'});
 
  }
  function getMqttfromlineMsg($lineMsg){
 
    $pos = strpos($lineMsg, ":");
    if($pos){
      $splitMsg = explode(":", $lineMsg);
      $topic = $splitMsg[0];
      $msg = $splitMsg[1];
      pubMqtt($topic,$msg);
    }else{
      $topic = "raw";
      $msg = $lineMsg;
      pubMqtt($topic,$msg);
    }
  }
 
  function put($url,$tmsg)
{
      
    $ch = curl_init($url);
 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
     
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $tmsg);
 
    curl_setopt($ch, CURLOPT_USERPWD, "apiuser:apiuser");
     
    $response = curl_exec($ch);
     
    curl_close ($ch);
     
    return $response;
}
 
?>