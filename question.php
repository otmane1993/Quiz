<?php include './views/includes/header.php'; ?>
<main>
    <?php
    include './init.php';
    $sql="SELECT question_id,Text from questions";
    $result=$conn->query($sql);
    $numb=$_GET['id'];
    $i=1;
    while($i<=$numb)
    {
    $row=$result->fetch_assoc();
    $i++;
    }
    // $numb=$row['question_id'];
    // echo $numb;
    $sql2="SELECT COUNT(question_id) as num_questions from questions";
    $res=$conn->query($sql2);
    $data=$res->fetch_assoc();
    // var_dump($data);
    echo '<h4>'.$row['Text'].'</h4>'.'<br>';
    echo 'Question '.$row['question_id'].' sur '.$data['num_questions'].'<br>';
    $sql3="SELECT text from choice WHERE question_id=".$row['question_id'];
    $resultat=$conn->query($sql3);
    echo "<form method='POST' action='process.php'>";
    while($row2=$resultat->fetch_assoc()) 
    {
        // var_dump($row);
        echo "<input type='radio' name='question".$row['question_id']."' value='".$row2['text']."'>".$row2['text']."<br>";
    }
    echo "<input type='submit' name='submit' value='submit'>";
    echo "<input type='hidden' name='hidden' value=$numb>";
    echo "</form>";
    // if(isset($_POST['submit']))
    // {
    //     echo $_POST["question".$row['question_id']];
    // }
    // if(isset($_POST['submit']))
    // {
    //     $numb++;
    //     header("Location:question.php?id=$numb");
    // }
    ?>
</main>
<?php include './views/includes/footer.php'; ?>