<?php
//public $con;
//ini_set("display_errors", "On");
//error_reporting(E_ALL | E_STRICT);
//error_reporting(E_ALL ^ E_DEPRECATED);
// $con =new mysqli("127.0.0.1","root","Hulj@123456","hospital");
// //mysqli_select_db ( $con, 'hospital' );
// mysqli_query($con,'set names utf8');
// error_reporting(E_ALL ^ E_NOTICE ^E_WARNING);

// function query($sql){
// $con = $GLOBALS['con'];
// $data = $con->query($sql);
// $rows=mysqli_num_rows($data);
// for($i=0; $i < $rows; $i++){
// 		$value_array[]=$data->fetch_array(MYSQLI_ASSOC);
// 	}
//     //$row = $result->fetch_array();
//    return $value_array;
// }

$con = mysqli_connect("127.0.0.1","root","Hulj@123456","hospital");
mysqli_query($con,"set names utf8") ;
error_reporting(E_ALL ^ E_NOTICE ^E_WARNING);

function query($sql){
	$con = $GLOBALS['con'];
	$data = mysqli_query($con,$sql);
	$rows=mysqli_num_rows($data);
	for($i=0; $i < $rows; $i++){
		$value_array[]=mysqli_fetch_array($data,MYSQLI_ASSOC);
	}
	return $value_array;

}




$village_arr = [
	1=>'凌桥一居',
	2=>'凌桥二居',
	3=>'凌桥三居',
	4=>'凌桥四居',
	5=>'凌桥五居',
	6=>'凌桥六居',
	7=>'凌桥村',
	8=>'仓房村',
	9=>'西新村',
	10=>'三岔港村',
	11=>'北新村',
	12=>'龙叶村',
	13=>'新益村',
	14=>'其他',
];
$degree_arr = [
	1=>'小学',
	2=>'初中',
	3=>'高中',
	4=>'中专(中技)',
	5=>'大学专科',
	6=>'大学本科',
	7=>'研究生',
];
$marriage_arr = [
	1=>'已婚',
	2=>'未婚',
	3=>'离婚',
];
$sporttimes_arr = [
	1=>'每天',
	2=>'每周',
	3=>'偶尔',
	4=>'不锻炼',
];
$sportways_arr = [
	1=>'散布',
	2=>'跑步',
	3=>'球类运动',
	4=>'小区健身器材运动',
];
$diet_arr = [
	1=>'清淡',
	2=>'多糖',
	3=>'辛辣',
	4=>'多盐',
	5=>'多油',
	6=>'油炸',
	7=>'腌制',
];
$smoke_arr = [
	1=>'从不吸烟',
	2=>'目前吸烟',
	3=>'已戒烟',
];
$drink_arr = [
	1=>'从不饮酒',
	2=>'饮酒',
];
$drink_type_arr = [
	1=>'黄酒',
	2=>'红酒',
	3=>'白酒',
	4=>'啤酒',
	5=>'其他',
];
$drink_frequent_arr = [
	1=>'天',
	2=>'周',
	3=>'月',
];

$health_arr = [
	1=>'优良',
	2=>'良好',
	3=>'一般',
	4=>'较差',
	5=>'极差',
];
$skin_arr = [
	1=>'正常',
	2=>'潮红',
	3=>'苍白',
	4=>'发绀',
	5=>'黄染',
	6=>'色素沉着',
];
$lymph_arr = [
	1=>'未触及',
	2=>'颈部淋巴结肿大',
	3=>'锁骨上淋巴结肿大',
];
$lung_voice_arr = [
	1=>'正常',
	2=>'异常',
];
$rhythm_arr = [
	1=>'齐',
	2=>'不齐',
];
$_arr = [
	1=>'有',
	2=>'无',
];
$mouth_arr = [
	1=>'正常',
	2=>'缺齿',
	3=>'龋齿',
];
$luoyin_arr = [
	1=>'无',
	2=>'干啰音',
	3=>'湿啰音',
];
$hearing_arr = [
	1=>'正常',
	2=>'减退',
];
$health_education_arr = [
	1=>'中医养生指导',
	2=>'健康饮酒',
	3=>'均衡营养膳食',
	4=>'适当锻炼',
	5=>'保持良好心态',
	6=>'减轻体重',
	7=>'建议疫苗接种',
	8=>'预防骨质疏松',
	9=>'预防老年人跌倒',
];
$health_advice_arr = [
	1=>'建议转诊',
	2=>'定期随访',
	3=>'异常化验结果，建议定期复查',
	4=>'纳入眼病规范化管理',
	5=>'纳入慢性病患者健康管理',
];


$xcg=[
	'1085-14431'=>'白细胞计数',
	'1085-14432'=>'红细胞计数',
	'1085-14433'=>'血红蛋白',
	'1085-14434'=>'红细胞压积',
	'1085-14435'=>'平均红细胞体积',
	'1085-14436'=>'平均红细胞血红蛋白含量',
	'1085-14437'=>'平均红细胞血红蛋白浓度',
	'1085-14438'=>'淋巴细胞百分比',
	'1085-14439'=>'单核细胞百分比',
	'1085-14440'=>'中性粒细胞百分比',
	'1085-14441'=>'嗜酸性粒细胞百分比',
	'1085-14442'=>'嗜碱性粒细胞百分比',
	'1085-14443'=>'淋巴细胞绝对数',
	'1085-14444'=>'单核细胞绝对数',
	'1085-14445'=>'中性粒细胞绝对数',
	'1085-14446'=>'嗜酸性粒细胞绝对值',
	'1085-14447'=>'嗜碱性粒细胞绝对值',
	'1085-14448'=>'血小板计数',
	'1085-14449'=>'血小板分布宽度',
	'1085-14450'=>'血小板平均体积',
	'1085-14451'=>'大血小板比率',
	'1085-14452'=>'红细胞分布宽度-变异系数',
	'1085-14453'=>'红细胞分布宽度-标准差',
];
$ncg=[
	'928-10481'=>'比重',
	'928-10482'=>'尿液酸碱度',
	'928-10483'=>'白细胞',
	'928-10484'=>'亚硝酸盐',
	'928-10485'=>'蛋白质',
	'928-10486'=>'尿糖',
	'928-10487'=>'尿酮体',
	'928-10488'=>'尿胆原',
	'928-10489'=>'胆红素',
	'928-10490'=>'红细胞',
	'928-10491'=>'颜色',
];
$sh=[
	'150-9446'=>'血清总蛋白',
	'154-9437'=>'血清丙氨酸氨基转移酶',
	'183-9465'=>'尿素',
	'184-9698'=>'血清肌酐',
	'185-9699'=>'血清尿酸',
	'196-9415'=>'空腹血糖',
	'727-9768'=>'血清天门冬氨酸氨基转移酶',
	'952-11322'=>'AST/ALT',
];
$db=[
	'768-9475'=>'红细胞',
	'768-9476'=>'脓球',
	'768-9539'=>'白细胞',
	'768-9540'=>'外观',
	'768-9541'=>'潜血实验',
	'768-9633'=>'虫卵',
	'3000118-22539'=>'隐血试验',
];



$pri_arr = [
	'768-9475'=>'ERY',
	'768-9476'=>'',
	'768-9539'=>'LEU',
	'768-9540'=>'',
	'768-9541'=>'OB',
	'768-9633'=>'',
	'3000118-22539'=>'OB',

	'928-10481'=>'SG',
	'928-10482'=>'PH',
	'928-10483'=>'LEU',
	'928-10484'=>'NIT',
	'928-10485'=>'PRO',
	'928-10486'=>'GLU',
	'928-10487'=>'KET',
	'928-10488'=>'UBG',
	'928-10489'=>'BIL',
	'928-10490'=>'ERY',
	'928-10491'=>'Color',

	'150-9446'=>'TP',
	'154-9437'=>'ALT',
	'183-9465'=>'UREA',
	'184-9698'=>'CREA',
	'185-9699'=>'UA',
	'196-9415'=>'GLU(0h)',
	'727-9768'=>'AST',
	'952-11322'=>'',

	'1085-14431'=>'WBC',
	'1085-14432'=>'RBC',
	'1085-14433'=>'Hb',
	'1085-14434'=>'HCT',
	'1085-14435'=>'MCV',
	'1085-14436'=>'MCH',
	'1085-14437'=>'MCHC',
	'1085-14438'=>'L',
	'1085-14439'=>'M',
	'1085-14440'=>'N',
	'1085-14441'=>'EO%',
	'1085-14442'=>'BA%',
	'1085-14443'=>'L#',
	'1085-14444'=>'M#',
	'1085-14445'=>'N#',
	'1085-14446'=>'EO#',
	'1085-14447'=>'BA#',
	'1085-14448'=>'PLT',
	'1085-14449'=>'PDW',
	'1085-14450'=>'MPV',
	'1085-14451'=>'P-LCR',
	'1085-14452'=>'RDW-CV',
	'1085-14453'=>'RDW-SD',

];
