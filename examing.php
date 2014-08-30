<?php
require_once("login_checker.php");
$_SESSION["start_time"] = strtotime("now");
$_SESSION["end_time"] = strtotime("+1 minute");

$file = 'exam.csv';
$data = file_get_contents($file);
$data = split("\n", $data);

$src = "";

foreach($data as $key=>$val) {
    if (empty($val)) continue;
    $val = mb_convert_encoding($val, 'UTF-8', 'sjis-win');
    $arr_question = explode("," ,$val);
    $src .= make_radio($key, $arr_question);
}

function make_radio($i, $q) {
    $src = "<tr>";
    $src.= sprintf("<td>%d問:</td>", ++$i);
    $src.= sprintf("<td style='width:30em;'>%s</td>", $q[1]);
    $src.= "<td>";
    $src.= sprintf("<input type='radio' name='qa_%d'>%s&nbsp;", $q[0], $q[2]);
    $src.= sprintf("<input type='radio' name='qa_%d'>%s&nbsp;", $q[0], $q[3]);
    $src.= sprintf("<input type='radio' name='qa_%d'>%s&nbsp;", $q[0], $q[4]);
    $src.= sprintf("<input type='radio' name='qa_%d'>%s&nbsp;", $q[0], $q[5]);
    $src.= "</td>";
    $src.= "</tr>";
    return $src;
}
?>

<script type="text/javascript">
function allcheck() {
    var inputs = document.getElementsByTagName("input");
    for(var i=0; i<inputs.length; i++) {
      inputs[i].checked = true;
    }
}
</script>


<form method="post" action="done.php">
  <table border="1">
  <?php print $src; ?>
  </table>
  <input type="submit" value="終了">
</form>
