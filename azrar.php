<?php

ob_start(); 
$token = "6174395124:AAG7jbmpdVb2bhhv8oto_KVhiqwGaC9mx-o"; # Token

define("API_KEY", $token);
echo "setWebhook ~> <a href=\"https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."\">https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."</a>";

function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}}

$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$txt = $message->caption;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$new = $message->new_chat_members;
$message_id = $message->message_id;
$type = $message->chat->type;
$name = $message->from->first_name;
if(isset($update->callback_query)){
$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = $up->from->username;
$name = $up->from->first_name;
$message_id = $up->message->message_id;
$data = $up->data;
}
$id = $update->inline_query->from->id; 

$zr = json_decode(file_get_contents("zr.json"),true);
$rr = rand(0,99999999);

$k[inline_keyboard][]=[[text=>"• رجوع •",callback_data=>"cancel"]];
$k1[inline_keyboard][]=[[text=>"• رجوع •",callback_data=>"back1"]];
if($data == "back1"){
	$key=[];
	
    foreach ($zr['id'] as $i){
    $name = $zr['infonam'][$i];
    $biozr = $zr['infodesc'][$i];
    if(preg_match("#http#",$biozr)) {
    	
    $key[inline_keyboard][]=[[text=>"$name",url=>$biozr]];
   } else {
   	
   $key[inline_keyboard][]=[[text=>"$name",callback_data=>"enter:$i" ]];
  } 
  
}
$key[inline_keyboard][]=[[text=>"قناة البوت ~",url=>"t.me/Sero_Bots"]];
	
    bot('editmessagetext',[ 
    'chat_id'=>$chat_id, 
    'message_id'=>$message_id,
    'text'=>"*• اهلا بك*",
    'parse_mode'=>"MARKDOWN",
    'reply_markup'=>json_encode($key)
	]);
	$zr['mode'] = null;
    $zr['namezr'] = null;
$zr = json_encode($zr,true);
file_put_contents("zr.json",$zr);
	}
	
if($text == "/start"){
$key=[];
    foreach ($zr['id'] as $i){
    $name = $zr['infonam'][$i];
    $biozr = $zr['infodesc'][$i];
    if(preg_match("#http#",$biozr)) {
    	
    $key[inline_keyboard][]=[[text=>"$name",url=>$biozr]];
   } else {
   	
   $key[inline_keyboard][]=[[text=>"$name",callback_data=>"enter:$i" ]];
  } 
  
    
}
$key[inline_keyboard][]=[[text=>"قناة البوت ~",url=>"t.me/Sero_Bots"]];
bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
- اهلا بك
",
        'parse_mode' => "MARKDOWN",
        'disable_web_page_preview' => "true",
        'disable_notification' => false,
        'reply_markup'=>json_encode($key)
    ]);
    
    }
    
    
    
    if($data == "cancel" ){
    $key=[];
    foreach ($zr['id'] as $i){
    
     
        $biozr = $zr['infodesc'][$i];
    $name = $zr['infonam'][$i];
    if(preg_match("#http#",$biozr)) {
    	
    $key[inline_keyboard][]=[[text=>"$name",url=>$biozr], [text=>"🗑️",callback_data=>"del:$i" ]] ;
   } else {
   	
   $key[inline_keyboard][]=[[text=>"$name",callback_data=>"edit:$i" ]];
  } 
}

$key[inline_keyboard][]=[[text=>"+",callback_data=>"add"]];
bot('editmessagetext',[ 
    'chat_id'=>$chat_id, 
    'message_id'=>$message_id,
        'text' => "*• مرحبا بك في قسم الازرار الشفافة ✨*

- يمكنك اضافه ازرار شفافة او حذفها ( لا يمكنك حذف الازرار الاساسية ولاكن يمكنك تعديلها من قسم تعديل الازرار )",
        'parse_mode' => "MARKDOWN",
        'disable_web_page_preview' => "true",
        'disable_notification' => false,
        'reply_markup'=>json_encode($key)
    ]);
    }
    
    if($text == "admin" ){
    $key=[];
    foreach ($zr['id'] as $i){
    
     
        $biozr = $zr['infodesc'][$i];
    $name = $zr['infonam'][$i];
    if(preg_match("#http#",$biozr)) {
    	
    $key[inline_keyboard][]=[[text=>"$name",url=>$biozr], [text=>"🗑️",callback_data=>"del:$i" ]] ;
   } else {
   	
   $key[inline_keyboard][]=[[text=>"$name",callback_data=>"edit:$i" ]];
  } 
}

$key[inline_keyboard][]=[[text=>"+",callback_data=>"add"]];
bot('sendMessage',[ 
    'chat_id'=>$chat_id, 
    'message_id'=>$message_id,
        'text' => "*• مرحبا بك في قسم الازرار الشفافة ✨*

- يمكنك اضافه ازرار شفافة او حذفها ( لا يمكنك حذف الازرار الاساسية ولاكن يمكنك تعديلها من قسم تعديل الازرار )",
        'parse_mode' => "MARKDOWN",
        'disable_web_page_preview' => "true",
        'disable_notification' => false,
        'reply_markup'=>json_encode($key)
    ]);
    }
    

    
    if($data == "add"){
    bot('editmessagetext',[ 
    'chat_id'=>$chat_id, 
    'message_id'=>$message_id,
    'text'=>"• ارسل اسم الزر الراد اضافته",
    'parse_mode'=>"MARKDOWN",
    'reply_markup'=>json_encode($k)
	]);
	$zr['mode'] = "add";
    
$zr = json_encode($zr,true);
file_put_contents("zr.json",$zr);
	}
	
	if($text and $zr['mode'] == "add"){
	bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "*
        • ارسل الان المحتوى المراد اضافته الى الزر 
*
- يمكنك ارسل كليشة نصية (يمكنك استخدام الماركداون)
- يمكنك ارسل رابط مباشر يبدء (https://....) لكي يصبح الزر يحتوي على رابط


        ",
        'parse_mode' => "MARKDOWN",
        'disable_web_page_preview' => "true",
        'disable_notification' => false,
        'reply_markup'=>json_encode($k)
    ]);
    $zr['mode'] = "add2";
    $zr['namezr'] = $text;
$zr = json_encode($zr,true);
file_put_contents("zr.json",$zr);
    }
    
    
    if($text and $zr['mode'] == "add2"){
    	
	bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "*
• تم حفظ الزر (محتوى نصي)

- مسار الزر : home
*
        ",
        'parse_mode' => "MARKDOWN",
        'disable_web_page_preview' => "true",
        'disable_notification' => false,
        'reply_markup'=>json_encode($k)
    ]);
    $zr['id'][] = $rr; 
    $zr['infonam'][$rr] = $zr['namezr'];
    $zr['infodesc'][$rr] = $text;
    $zr['infosect'][$rr] = "edit";
    
    $zr['mode'] = null;
    $zr['namezr'] = null;
    
$zr = json_encode($zr,true);
file_put_contents("zr.json",$zr);
    }
    
    $u = explode(":",$data);
	if(explode(":",$data)[0] == "del"){
    if($zr['infonam'][explode(":",$data)[1]]){
    $namezr = $zr['infonam'][explode(":",$data)[1]];
    bot('editmessagetext',[ 
    'chat_id'=>$chat_id, 
    'message_id'=>$message_id,
    'text'=>"
• اسم الزر : *$namezr*

- تم مسح الزر
",
    'parse_mode'=>"MARKDOWN",
    'reply_markup'=>json_encode($k)
	]);
	$zr['infonam'][$u[1]] = null;
    $zr['infodesc'][$u[1]] = null;
$zr = json_encode($zr,true);
file_put_contents("zr.json",$zr);
	}
	}
	
	if(explode(":",$data)[0] == "edit"){
    if($zr['infonam'][explode(":",$data)[1]]){
    	$id = explode(":",$data)[1];
    
    $namezr = $zr['infonam'][explode(":",$data)[1]];
    
    
    $biozr = $zr['infodesc'][explode(":",$data)[1]];
    
    if($zr['infosect'][explode(":",$data)[1]] == "edit"){
    	$sect = "تعديل رساله";
    }
    
    if($zr['infosect'][explode(":",$data)[1]] == "send"){
    	$sect = "تعديل رساله";
    }
    
    if($zr['infosect'][explode(":",$data)[1]] == "hmsa"){
    	$sect = "همسة";
    }
    
    if(preg_match("#http#",$biozr)) {
    	$tp = "رابط ( $biozr) " ;
   } else {
   	$tp = "محتوى نصي" ;
  } 
    $h[inline_keyboard][]=[[text=>"• طريقه عرض الرساله : $sect •",callback_data=>"sect:$id"]];
    	$h[inline_keyboard][]=[[text=>"• مسح الزر •",callback_data=>"del:$id"]];
    $h[inline_keyboard][]=[[text=>"• رجوع •",callback_data=>"cancel"]];
    bot('editmessagetext',[ 
    'chat_id'=>$chat_id, 
    'message_id'=>$message_id,
    'text'=>"
• اسم الزر : *$namezr*

- مسار الزر : home

- نوع الزر : $tp


`$biozr`

",
    'parse_mode'=>"MARKDOWN",
    'reply_markup'=>json_encode($h)
	]);
	
	}
	}
	
	if(explode(":",$data)[0] == "sect"){
    if($zr['infonam'][explode(":",$data)[1]]){
    	
    if($zr['infosect'][explode(":",$data)[1]] == "edit"){
    	$sect = "تعديل رساله";
    }
    
    if($zr['infosect'][explode(":",$data)[1]] == "send"){
    	$sect = "تعديل رساله";
    }
    
    if($zr['infosect'][explode(":",$data)[1]] == "hmsa"){
    	$sect = "همسة";
    }
    	$id = explode(":",$data)[1];
    $h[inline_keyboard][]=[[text=>"• تعديل رسالة •",callback_data=>"editss:$id"]];
    	$h[inline_keyboard][]=[[text=>"• رساله جديده •",callback_data=>"sendss:$id"]];
    $h[inline_keyboard][]=[[text=>"• همسة •",callback_data=>"hmsass:$id"]];
    $h[inline_keyboard][]=[[text=>"• رجوع •",callback_data=>"cancel"]];
    $namezr = $zr['infonam'][explode(":",$data)[1]];
    
    $biozr = $zr['infodesc'][explode(":",$data)[1]];
    bot('editmessagetext',[ 
    'chat_id'=>$chat_id, 
    'message_id'=>$message_id,
    'text'=>"
• اسم الزر : *$namezr*

- مسار الزر : home

- طريقه عرض الزر : $sect

اختر من الازرار لتغيي نوع العرض

",
    'parse_mode'=>"MARKDOWN",
    'reply_markup'=>json_encode($h)
	]);
	
	}
	}
	
	
	
	if(explode(":",$data)[0] == "editss"){
		
    	$id = explode(":",$data)[1];
    $h[inline_keyboard][]=[[text=>"• تعديل رسالة •",callback_data=>"editss:$id"]];
    	$h[inline_keyboard][]=[[text=>"• رساله جديده •",callback_data=>"sendss:$id"]];
    $h[inline_keyboard][]=[[text=>"• همسة •",callback_data=>"hmsass:$id"]];
    $h[inline_keyboard][]=[[text=>"• رجوع •",callback_data=>"cancel"]];
    $namezr = $zr['infonam'][explode(":",$data)[1]];
    
    $biozr = $zr['infodesc'][explode(":",$data)[1]];
    bot('editmessagetext',[ 
    'chat_id'=>$chat_id, 
    'message_id'=>$message_id,
    'text'=>"
• اسم الزر : *$namezr*

- مسار الزر : home

- طريقه عرض الزر : تعديل رساله

اختر من الازرار لتغيي نوع العرض

",
    'parse_mode'=>"MARKDOWN",
    'reply_markup'=>json_encode($h)
	]);
	$zr['infosect'][$id] = "edit";
	$zr = json_encode($zr,true);
file_put_contents("zr.json",$zr);
	}
	
	if(explode(":",$data)[0] == "sendss"){
		
    	$id = explode(":",$data)[1];
    $h[inline_keyboard][]=[[text=>"• تعديل رسالة •",callback_data=>"editss:$id"]];
    	$h[inline_keyboard][]=[[text=>"• رساله جديده •",callback_data=>"sendss:$id"]];
    $h[inline_keyboard][]=[[text=>"• همسة •",callback_data=>"hmsass:$id"]];
    $h[inline_keyboard][]=[[text=>"• رجوع •",callback_data=>"cancel"]];
    $namezr = $zr['infonam'][explode(":",$data)[1]];
    
    $biozr = $zr['infodesc'][explode(":",$data)[1]];
    bot('editmessagetext',[ 
    'chat_id'=>$chat_id, 
    'message_id'=>$message_id,
    'text'=>"
• اسم الزر : *$namezr*

- مسار الزر : home

- طريقه عرض الزر : رساله جديده

اختر من الازرار لتغيي نوع العرض

",
    'parse_mode'=>"MARKDOWN",
    'reply_markup'=>json_encode($h)
	]);
	$zr['infosect'][$id] = "send";
	$zr = json_encode($zr,true);
file_put_contents("zr.json",$zr);
	}
	
	if(explode(":",$data)[0] == "hmsass"){
		
    	$id = explode(":",$data)[1];
    $h[inline_keyboard][]=[[text=>"• تعديل رسالة •",callback_data=>"editss:$id"]];
    	$h[inline_keyboard][]=[[text=>"• رساله جديده •",callback_data=>"sendss:$id"]];
    $h[inline_keyboard][]=[[text=>"• همسة •",callback_data=>"hmsass:$id"]];
    $h[inline_keyboard][]=[[text=>"• رجوع •",callback_data=>"cancel"]];
    $namezr = $zr['infonam'][explode(":",$data)[1]];
    
    $biozr = $zr['infodesc'][explode(":",$data)[1]];
    bot('editmessagetext',[ 
    'chat_id'=>$chat_id, 
    'message_id'=>$message_id,
    'text'=>"
• اسم الزر : *$namezr*

- مسار الزر : home

- طريقه عرض الزر : همسة

اختر من الازرار لتغيي نوع العرض

",
    'parse_mode'=>"MARKDOWN",
    'reply_markup'=>json_encode($h)
	]);
	$zr['infosect'][$id] = "hmsa";
	$zr = json_encode($zr,true);
file_put_contents("zr.json",$zr);
	}
    
    
    
    if(explode(":",$data)[0] == "enter"){
    if($zr['infonam'][explode(":",$data)[1]]){
    
    if($zr['infosect'][explode(":",$data)[1]] == "edit"){
    	$fic = "editmessagetext";
    
    
    }
    
    if($zr['infosect'][explode(":",$data)[1]] == "send"){
    	$fic = "sendMessage";
    
    }
    
    if($zr['infosect'][explode(":",$data)[1]] == "hmsa"){
    	$fic = "answerCallbackQuery";
    
    }
    
    
    
    
    
    
    bot($fic,[ 
    'chat_id'=>$chat_id, 
    'message_id'=>$message_id,
    'text'=>$zr['infodesc'][explode(":",$data)[1]],
    'parse_mode'=>"MARKDOWN",
    'callback_query_id'=>$update->callback_query->id,
    'reply_markup'=>json_encode($k1),
    'show_alert'=>true,
	]);
	}
	}
	




