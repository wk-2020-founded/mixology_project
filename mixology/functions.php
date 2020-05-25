<?php

// click jacking 対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

// XSS対策
function h($s) {
  if(is_array($s)){
    //$sが配列の場合、h()関数をそれぞれの要素について呼び出す
    return array_map('h', $s);
  }else{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
  }
}

// ブラウザ表示用にデータの整形
function f($s) {
  if(is_string($s)) {
      if (strpos($s, '[Delivery]' ) !== false ) {
          return str_replace('[Delivery]', '', $s);
      }
      if (strpos($s, '[Takeout]' ) !== false ) {
          return str_replace('[Takeout]', '', $s);
      }
      if (strpos($s, '[Takeout 量り売り]' ) !== false ) {
          return str_replace('[Takeout 量り売り]', '', $s);
      }
  } 
  if (is_int($s)) {
     return number_format($s);
  }
}

// 入力の空白削除
function removeBlunk ($s) {
  if(is_array($s)){
    //$sが配列の場合、h()関数をそれぞれの要素について呼び出す
    return array_map('removeBlunk', $s);
  }else{
    return preg_replace("/( |　)/", "", $s);
  }
}

// 入力値の検証
function checkInput($s){
  if(is_array($s)){
    return array_map('checkInput', $s);
  } else{
    //NULLバイト攻撃対策
    if(preg_match('/\0/', $s)){  
      die('不正な入力です。');
    }
    //文字エンコードのチェック
    if(!mb_check_encoding($s, 'UTF-8')){ 
      die('不正な入力です。');
    }
    //改行、タブ以外の制御文字のチェック
    if(preg_match('/\A[\r\n\t[:^cntrl:]]*\z/u', $s) === 0){  
      die('不正な入力です。制御文字は使用できません。');
    }
    return $s;
  }
}

// ヘッダーインジェクション対策
function preventHeaderInjection ($h)  {
  return  str_replace(array("\r\n","\r","\n"), '', $h);
}

// CRSF対策
function createToken() {
  if(!isset($_SESSION['token'])){
    $_SESSION['token'] = bin2hex(random_bytes(32)); // php ver7.0~
  }
}

function validateToken() {
  if(!isset($_SESSION['token']) || !isset($_POST['token']) || $_SESSION['token'] !== $_POST['token']){
    throw new Exception('お問い合わせの手順に誤りがあります。');
  }
}

// 入力バリデーション オーダー用
function validateOrder() {

  if(empty(removeBlunk($_POST['name']))) {
    throw new Exception('お名前を入力してください。');
  }
  if(mb_strlen($_POST['name'], 'utf-8') > 20){
    throw new Exception('お名前は20文字以内で入力してください。');
  }
  if(empty(removeBlunk($_POST['email']))) {
    throw new Exception('メールアドレスを入力してください。');
  }
  if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    throw new Exception('メールアドレスの入力形式が正しくありません。');
  }
  if(empty(removeBlunk($_POST['tel']))) {
    throw new Exception('電話番号を入力してください。');
  }
  if(!preg_match("/^[0-9０-９]+$/", $_POST['tel'])){
    throw new Exception('電話番号は空白なしで数字のみの入力をお願い致します。');
  }
  if(mb_strlen($_POST['content'], 'utf-8') > 300) {
    throw new Exception('備考欄は300文字以内で入力してください。');
  }
  if(!isset($_POST['total_amount']) || !isset($_POST['item_name']) || !isset($_POST['price']) || !isset($_POST['pick_num'])) {
    throw new Exception('商品が選択されておりません。');
  }
}

// 入力バリデーション 問い合わせ用
function validatePost() {
  if(empty(removeBlunk($_POST['name']))) {
    throw new Exception('お名前を入力してください。');
  }
  if(mb_strlen($_POST['name'], 'utf-8') > 20){
    throw new Exception('お名前は20文字以内で入力してください。');
  }
  if(empty(removeBlunk($_POST['email']))) {
    throw new Exception('メールアドレスを入力してください。');
  }
  if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    throw new Exception('メールアドレスの入力形式が正しくありません。');
  }
  if(empty(removeBlunk($_POST['detail']))) {
    throw new Exception('お問い合わせ内容を入力してください。');
  }
  if(mb_strlen($_POST['detail'], 'utf-8') > 300) {
    throw new Exception('お問い合わせ内容は300文字以内で入力してください。');
  }
}