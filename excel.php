<?php
/**
 *
 * @copyright 2007-2012 Xiaoqiang.
 * @author Xiaoqiang.Wu <jamblues@gmail.com>
 * @version 1.01
 */
include(dirname(__FILE__).'/config.php') ;

//error_reporting(E_ALL ^ E_NOTICE ^E_WARNING);
 
date_default_timezone_set('Asia/ShangHai');

/**
 * Create array from excel
 * @param mixed $path       ·��
 * @param boolean $sheet    �ڼ���sheet
 * @param boolean $echo     ������м���
 * @return array
 */

function excel_get_array($path,$sheet = 0,$echo = false){
    include(dirname(__FILE__).'/PHPExcel.php') ;
    if (!$path) {
        echo iconv("GB2312","UTF-8",'<script>alert("�ļ�����");location.href="./index.php";</script>');
        exit;
    }

    if(array_values($path)[0]['error']==1){
        echo iconv("GB2312","UTF-8",'<script>alert("�ļ�����,����php����");location.href="./index.php";</script>');
    }elseif(array_values($path)[0]['error']==2){
        echo iconv("GB2312","UTF-8",'<script>alert("�ļ�����,�������ô�С");location.href="./index.php";</script>');
    }elseif(array_values($path)[0]['error']==3){
        echo iconv("GB2312","UTF-8",'<script>alert("�ļ�ֻ�в��ֱ��ϴ�");location.href="./index.php";</script>');
    }elseif(array_values($path)[0]['error']==4){
        echo '<script>alert("û���ļ����ϴ�");location.href="./index.php";</script>';
        //echo '<script>alert("û���ļ����ϴ�");location.href="./index.php";</script>';
    }

    if ($path == $_FILES){
		if (array_values($path)[0]['tmp_name'])
			$path = array_values($path)[0]['tmp_name'];
		else
			exit('�ļ�����');
	}
    $PHPReader = new PHPExcel_Reader_Excel2007(); // Reader�ܹؼ���������excel�ļ�
    if (!$PHPReader->canRead($path)) { // ��������Reader����ȥ���ļ���07������05��05���оͱ���
        $PHPReader = new PHPExcel_Reader_Excel5();
        if (!$PHPReader->canRead($path)) {
            echo $errorMessage = iconv("GB2312","UTF-8",'<script>alert("���ܶ�ȡ�ļ����ļ���ʽ����");location.href="./index.php";</script>');
            exit;
        }
    }
    $PHPExcel = $PHPReader->load($path);
    $currentSheet = $PHPExcel->getSheet($sheet); // �õ��ڼ���sheet������������
    if ($echo){
        $allSheet = $PHPExcel->getSheetCount(); // sheet��
        $allColumn = $currentSheet->getHighestColumn();//ȡ�õ�ǰ�����������к�,�磬E
        $allRow = $currentSheet->getHighestRow();//ȡ�õ�ǰ������һ���ж�����
        echo "sheet����$allSheet, �������ǣ�$allRow, �������ǣ�$allColumn";
    }

    $dataArr = $currentSheet->toArray(null, true, true, true);
    return $dataArr;
}
//var_dump($_POST);

// Check prerequisites

//var_dump($_FILES);die;
$arr = excel_get_array($_FILES,0,0);
array_shift($arr);
//var_dump($arr);die;

if(empty($arr))
	echo '<script>alert("excel���ݱ�û������");location.href="./index.php";</script>';

$insert = "INSERT INTO `sheet_report` (`dian_no`, `project_no`, `result`, `project_unit`, `card_num`, `reference_value`, `upper_limit`, `lower_limit`, `mark`, `real_name`, `statdate`, `examiner`, `auditor` )VALUES ";

foreach ($arr as $key=>$val){

    $str ='(';
    foreach ($val as $k => $v){
        $str .= "'".addslashes(trim($v))."',";
    }
    $str = substr($str,0,-1);
    $insert .= $str.'),';
}
$insert = substr($insert,0,-1);
$con = $GLOBALS['con'];
$res = $con->query($insert);
if ($res==1){
	$con->query("insert into report (`no`) select distinct dian_no as `no` from sheet_report where dian_no not in (select distinct `no` from report)");
	echo iconv("GB2312","UTF-8",'<script>alert("����ɹ�");location.href="./index.php";</script>');
	
}
    
else
    echo iconv("GB2312","UTF-8",'<script>alert("����ģ�����");location.href="./index.php";</script>');
//header('Location: ./index.php');
/*if ($res==1){
    ?>
    <script>
       alert('����ɹ�');
    </script>

<?php  header('Location: ./index.php');
    }else{ ?>
    <script>
        alert('����ģ�����');
    </script>

<?php }?>*/
