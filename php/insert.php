<?php
require_once '../configuration/mysql.php'; 
$name=NULL;
$phone_no=NULL;
$address=NULL;
$service_type=NULL;
$src_loc=NULL;
$dest_loc=NULL;
$start_date1=NULL;
$end_date1=NULL;
$preference=NULL;
$msg_id=NULL;
$request_tm=NULL;
$flag=NULL;
$flag=$_POST['flag'];
$request_tm=date('Y-m-d');
if($flag=='1')
{
$name=$_POST['cstname'];
$phone_no=$_POST['cstno'];
$address1=" ";
$address2=" ";
$address=$address1 . $address2;

$service_type=" ";
$src_loc=$_POST['cfrom'];
$dest_loc=$_POST['cto'];
$start_date1=$_POST['cdate'];
$end_date1=" ";
$preference=$_POST['cpreference'];
$contact_us_data= " Name:" . $name . " Mobno:" . $phone_no . " Require vehicle from:" . $src_loc . " to:" . $dest_loc . " on date:" . $start_date1 . " preference:" . $preference;
}
else if($flag=='2')
{
$name=$_POST['name'];
$phone_no=$_POST['phone_no'];
$address1=" ";
$address2=" "; 
$address=$address1 . $address2;

$service_type=$_POST['service_type'];
$src_loc=$_POST['src_loc'];
$dest_loc=$_POST['dest_loc'];
$start_date1=$_POST['start_date1'];
$end_date1=" ";
$preference=" ";
$contact_us_data= " Name:" . $name . " Mobno:" . $phone_no . " Require vehicle from:" . $src_loc . " to:" . $dest_loc . " on date:" . $start_date1 . " service:" . $service_type;

}
else if($flag=='3')
{
$name=$_POST['name'];
$phone_no=$_POST['phone_no'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$address=$address1 . $address2;

$service_type=$_POST['service_type'];
$src_loc=$_POST['src_loc'];
$dest_loc=$_POST['dest_loc'];
$start_date1=$_POST['start_date1'];
$end_date1=$_POST['end_date1'];
$preference=$_POST['preference'];
$contact_us_data= " Name:" . $name . " Mobno:" . $phone_no . " address:" . $address . " Require vehicle from:" . $src_loc . " to:" . $dest_loc . " on date:" . $start_date1 . " service:" . $service_type . " preference:" . $preference;

}

function PostRequest($url, $referer, $_data) {
// convert variables array to string:
$data = array();
while(list($n,$v) = each($_data)){
$data[] = "$n=$v";
}
$data = implode('&', $data);
// format --> test1=a&test2=b etc.
// parse the given URL
$url = parse_url($url);
if ($url['scheme'] != 'http') {
die('Only HTTP request are supported !');
}
// extract host and path:
$host = $url['host'];
$path = $url['path'];
// open a socket connection on port 80
$fp = fsockopen($host, 80);
// send the request headers:
fputs($fp, "POST $path HTTP/1.1\r\n");
fputs($fp, "Host: $host\r\n");
fputs($fp, "Referer: $referer\r\n");
fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
fputs($fp, "Content-length: ". strlen($data) ."\r\n");
fputs($fp, "Connection: close\r\n\r\n");
fputs($fp, $data);
$result = '';
while(!feof($fp)) {
// receive the results of the request
$result .= fgets($fp, 128);
}
// close the socket connection:
fclose($fp);
// split the result header from the content
$result = explode("\r\n\r\n", $result, 2);
$header = isset($result[0]) ? $result[0] : '';
$content = isset($result[1]) ? $result[1] : '';
// return as array:
return array($header, $content);
}
$data = array(
'user' => "amistartechnology",
'password' => "809759",
'msisdn' => "919764818204",		//first number
'sid' => "websms",
'msg' => $contact_us_data,
'fl' =>"0",
);
list($header, $content) = PostRequest(
"http://www.smslane.com//vendorsms/pushsms.aspx", // the url to post to
"http://www.punecabservices.in/php/insert.php", // its your url
$data
);

$msg_id=$content;



$query="INSERT INTO contact(full_name,contact_no,address,service_type,travel_from,travel_to,date_from,date_to,preference,msg_id,request_time)values('$name',$phone_no,'$address','$service_type','$src_loc','$dest_loc','$start_date1','$end_date1','$preference','$msg_id','$request_tm')";
if(!mysql_query($query))
{
  die('Error: ' . mysql_error());
}
//echo "1 record inserted in crate table!";

header("Location: ../index.php");
mysql_close($con);

?>