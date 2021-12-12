<?php
include './init.php';
// echo $_POST['hidden'];
$next=$_POST['hidden']+1;
// echo "<form method='POST'>";
$sql2="SELECT COUNT(question_id) as num_questions from questions";
$res=$conn->query($sql2);
$data=$res->fetch_assoc();
$sql="SELECT text FROM choice WHERE is_correct=1";
$resultat=$conn->query($sql);
$i=0;
while($i<=$next-2)
{
  $donne=$resultat->fetch_assoc();
  $i++;  
}
if(!isset($_SESSION['score']))
{
    $_SESSION['score']=0;
}
if($donne['text']==$_POST["question".$_POST['hidden']])
{
    $_SESSION['score']++;
    // echo "Hello";
}
// echo $_SESSION['score'];
// session_destroy();

// echo $donne['text'].'<br>';
// if(isset($_POST['submit']))
// {
    // echo $_POST["question".$_POST['hidden']];
// }
// echo $next;
// echo $data['num_questions'];
if($next>$data['num_questions'])
{
    header("Location:score.php");
    $next=1;
}
else
{
    header("Location:question.php?id=$next");
}

?>