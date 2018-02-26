<html>
<head>
<meta charset="utf-8">
<script>
function show(){
  document.getElementById("tab1").style.display="none";
  document.getElementById("tab2").style.display="";
}
function hide(){
  document.getElementById("tab1").style.display="";
  document.getElementById("tab2").style.display="none";
}
</script>

<style type="text/css">
  body {
    font-style: "黑体";
  }
  .btn1 {
    height: 100%;
    width: 10%;
  }
  .btn2 {
    height: 50%;
    width: 20%;
  }
  .btn3 {
    height: 50%;
    width: 20%;
  }
  #div {
    width: 80%;
    height: 80%;
    background-color: #FFFFFF;
    border:1px solid #F00;
    position: relative;
    filter:alpha(Opacity=80);
    -moz-opacity:0.8;
  }
  .messages{
    width: 60%;
    height: 90%;
  }
</style>
</head>
<?php
  $imgid="";//图片编号
  $phone="";//手机号码
  if(!empty($_GET["imgid"])){
   $imgid=$_GET["imgid"];//图片编号
  }
  if(!empty($_GET["phone"])){
   $phone=$_GET["phone"];//手机号码
  }
  //连接数据库
  $localhost="192.168.10.116";
  $username="developer";
  $password="hlhkh123";
  $datebase="machinevision";
  $table1="person";
  $table2="ryxxgxb";
  $conn=mysql_connect($localhost,$username,$password) or die("数据库服务器连接失败！".mysql_error());
  mysql_select_db($datebase,$conn) or die("数据库连接失败！".mysql_error());
  mysql_query("SET NAMES 'utf8'");
  $mysql_command="select pe.srcface,pe.face,pe.uname,pe.sex,pe.age,pe.email,pe.cardtype,pe.cardid,pe.address,pe.usertype,ry.bq,ry.qs,ry.gx,ry.qsjtzz,ry.qslxdh,ry.gkfzdw,ry.fzr,ry.fzrlxdh 
  from ".$table1." pe 
  left JOIN ".$table2." ry on pe.cardid=ry.sfz
  where pe.imgid=$imgid and pe.phone=$phone";
  $result=mysql_query($mysql_command,$conn) or die("<br>数据表无记录<br>");
  $all=mysql_fetch_row($result);//定义变量接收值


  //定义客户信息变量
  //客户信息表
  $srcface="未填写";//原图
  $face="未填写";//识别图
  $uname="未填写";//姓名
  $sex="未填写";//性别
  $age="未填写";//年龄
  $email="未填写";//邮箱
  $cardtype="未填写";//证件类型
  $cardid="未填写";//证件号码
  $address="未填写";//家庭地址
  $usertype="未填写";//用户类型

  //人员信息关系表
  $bq="未填写";//标签
  $qs="未填写";//亲属
  $gx="未填写";//关系
  $qsjtzz="未填写";//亲属家庭住址
  $qslxdh="未填写";//亲属联系电话
  $gkfzdw="未填写";//管控负责单位
  $fzr="未填写";//负责人
  $fzrlxdh="未填写";//负责人联系电话


  //原图
  if(!empty($all[0])){
    $srcface=$all[0];
  }
  //识别图
  if(!empty($all[1])){
    $face=$all[1];
  }
  //姓名
  if(!empty($all[2])){
    $uname=$all[2];
  } 
  //性别
  switch ($all[3]) {
   case '0':
     $sex="男";
     break;
   case '1':
     $sex="女";
     break;
   default:
     $sex="数据错误，请联系我们";
     break;
  }
  //年龄
  if(!empty($all[4])){
    $age=$all[4];
  }
  //邮箱
  if(!empty($all[5])){
    $email="$all[5]";
  }
  //证件类型
  if(!empty($all[6])){
    switch ($all[6]) {
      case '1':
        $cardtype="身份证";
        break;
      case '2':
        $cardtype="学生证";
        break;
      case '3':
        $cardtype="护照编号";
        break;
      default:
        $cardtype="数据错误，请联系我们";
        break;
    }
  }
  //证件号码
  if(!empty($all[7])){
    $cardid="$all[7]";
  }
  //家庭地址
  if(!empty($all[8])){
    $address="$all[8]";
  }
  //用户类型
  switch ($all[9]) {
    case '0':
      $usertype="普通民众";
      break;
    case '1':
      $usertype="杀人犯";
      break;
    case '2':
      $usertype="上访人员";
      break;
    case '3':
      $usertype="小偷";
      break;
    case '4':
      $usertype="强奸犯";
      break;
    case '5':
      $usertype="领导";
      break;
    case '6':
      $usertype="信访人员";
      break;
    case '7':
      $usertype="精神病肇事者";
      break;
    case '8':
      $usertype="恶意讨（欠）薪人员";
      break;
    default:
      $usertype="数据错误，请联系我们";
      break;
  }
  //标签
  if(!empty($all[10])){
    $bq="$all[10]";
  }
  //亲属
  if(!empty($all[11])){
    $qs="$all[11]";
  }
  //关系
  if(!empty($all[12])){
    $gx="$all[12]";
  }
  //亲属家庭住址
  if(!empty($all[13])){
    $qsjtzz="$all[13]";
  }
  //亲属联系电话
  if(!empty($all[14])){
    $qslxdh="$all[14]";
  }
  //管控负责单位
  if(!empty($all[15])){
    $gkfzdw="$all[15]";
  }
  //负责人
  if(!empty($all[16])){
    $fzr="$all[16]";
  }
  //负责人联系电话
  if(!empty($all[16])){
    $fzrlxdh="$all[16]";
  }
?>
<body>
  <table border="1" align="center" width="100%" height="100%" cellpadding="0" cellspacing="0" id="tab1" display="">
    <tr height="5%" align="right">
      <td colspan="2">
        <button class="btn1" onclick="show()">编辑</button>
      </td>
    </tr>
    <tr height="25%">
      <td width="128" align="center">
        <?php echo $srcface; ?>
        <img src="<?php echo $srcface; ?><?php echo $srcface; ?>" height="128" width="128"/>
      </td>
      <td width="128" align="center">
        <?php echo "<img src=\"$face\" height=\"128\" width=\"128\" alt=\"识别图\" />"; ?>
      </td>
    </tr>
    <tr height="5%">
      <td align="center">原图</td>
      <td align="center">识别结果</td>
    </tr>
    <tr height="5%">
      <td colspan="2" valign="midlle" align="center">用户信息</td>
    </tr>
    <tr height="60%" >
      <td colspan="2" valign="top">
        <table height=100% width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr align="center">
            <td width="20%">姓名:</td><td><?php echo $uname ?></td>
          </tr>
          <tr align="center">
            <td>性别:</td><td><?php echo $sex ?></td>
          </tr>
          <tr align="center">
            <td>手机号码:</td><td><?php echo $phone ?></td>
          </tr>
          <tr align="center">
            <td>年龄:</td><td><?php echo $age ?></td>
          </tr align="center">
          <tr align="center">
            <td>邮箱:</td><td><?php echo $email ?></td>
          </tr>
          <tr align="center">
            <td>证件类型:</td><td><?php echo $cardtype ?></td>
          </tr>
          <tr align="center">
            <td>证件号码:</td><td><?php echo $cardid ?></td>
          </tr>
          <tr align="center">
            <td>家庭地址:</td><td><?php echo $address ?></td>
          </tr>
          <tr align="center">
            <td>用户类型:</td><td><?php echo $usertype ?></td>
          </tr>
          <tr align="center">
            <td>标签:</td><td><?php echo $bq ?></td>
          </tr>
          <tr align="center">
            <td>亲属:</td><td><?php echo $qs ?></td>
          </tr>
          <tr align="center">
            <td>关系:</td><td><?php echo $gx ?></td>
          </tr>
          <tr align="center">
            <td>亲属家庭住址:</td><td><?php echo $qsjtzz ?></td>
          </tr>
          <tr align="center">
            <td>亲属联系电话:</td><td><?php echo $qslxdh ?></td>
          </tr>
          <tr align="center">
            <td>管控负责单位:</td><td><?php echo $gkfzdw ?></td>
          </tr>
          <tr align="center">
            <td>负责人:</td><td><?php echo $fzr ?></td>
          </tr>
          <tr align="center">
            <td>负责人联系电话:</td><td><?php echo $fzrlxdh ?></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <form action="bianji.php" method="get" enctype="multipart/form-data">
  <table height=100% width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="tab2" style="display: none;">
      <tr>
        <td align="center" valign="midlle">
          <!-- <?php echo $srcface; ?> -->
          <img height="128" width="128" src="$srcface">
          <input type="text" name="srcface" value="<?php echo $srcface; ?>" alt="新增图" style="display: none;">
        </td>
      </tr>
      <tr>
      <td colspan="2" align="center">用户信息</td>
      </tr>
      <tr height="70%" >
      <td colspan="0" valign="top">
        <table height=100% width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
          <tr align="center">
            <td width="30%">姓名:</td>
            <td align="left"><input type="text" name="uname" class="messages"></td>
          </tr>
          <tr align="center">
            <td>性别:</td>
            <td align="left">
              <input type="radio" name="sex" value="0">男
              <input type="radio" name="sex" value="1">女
            </td>
          </tr>
          <tr align="center">
            <td valign="midlle">手机号码:</td>
            <td align="left" valign="midlle"><input type="text" name="phone" class="messages"></td>
          </tr>
          <tr align="center">
            <td>年龄:</td>
            <td align="left"><input type="text" name="age" class="messages"></td>
          </tr>
          <tr align="center">
            <td>邮箱:</td>
            <td align="left"><input type="text" name="email" class="messages"></td>
          </tr>
          <tr align="center">
            <td>证件类型:</td>
            <td align="left">
            <select name="cardtype">
              <option value="1">身份证</option>
              <option value="2">学生证</option>
              <option value="3">护照编号</option>
            </select>
          </tr>
          <tr align="center">
            <td>证件号码:</td>
            <td align="left"><input type="text" name="cardid" class="messages"></td>
          </tr>
          <tr align="center">
            <td>家庭地址:</td>
            <td align="left"><input type="text" name="address" class="messages"></td>
          </tr>
          <tr align="center">
            <td>用户类型:</td>
            <td align="left">
              <select name="usertype">
                <option value="0">普通民众</option>
                <option value="1">杀人犯</option>
                <option value="2">上访人员</option>
                <option value="3">小偷</option>
                <option value="4">强奸犯</option>
                <option value="5">领导</option>
                <option value="6">信访人员</option>
                <option value="7">精神病肇事者</option>
                <option value="8">恶意讨（欠）薪人员</option>
              </select>
            </td>
          </tr>
          <tr align="center">
            <td>标签:</td>
            <td align="left"><input type="text" name="bq" class="messages"></td>
          </tr>
          <tr align="center">
            <td>亲属:</td>
            <td align="left"><input type="text" name="qs" class="messages"></td>
          </tr>
          <tr align="center">
            <td>关系:</td>
            <td align="left"><input type="text" name="gx" class="messages"></td>
          </tr>
          <tr align="center">
            <td>亲属家庭住址:</td>
            <td align="left"><input type="text" name="qsjtzz" class="messages"></td>
          </tr>
          <tr align="center">
            <td>亲属联系电话:</td>
            <td align="left"><input type="text" name="qslxdh" class="messages"></td>
          </tr>
          <tr align="center">
            <td>管控负责单位:</td>
            <td align="left"><input type="text" name="gkfzdw" class="messages"></td>
          </tr>
          <tr align="center">
            <td>负责人:</td>
            <td align="left"><input type="text" name="fzr" class="messages"></td>
          </tr>
          <tr align="center">
            <td>负责人联系电话:</td>
            <td align="left"><input type="text" name="fzrlxdh" class="messages"></td>
          </tr>
        </table>
      </td>
    </tr>
      <tr align="center">
        <td>
        <input type="submit" name="submit" class="btn2" value="完成">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="reset" class="btn3" value="取消" onclick="hide()">
        </td>
      </tr>
    </table>
  </form>
</body>
</html>