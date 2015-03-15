<?php 
    session_start();
    require_once('../connectvars.php');
    $dbc = connectToDatabase();
    if ( isset($_GET['start']))
    {
      $start = $_GET['start'];
    }
    else
    {
      $start = 0;
    }

    // $dbc->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $query = $dbc->prepare("select * from question");
    $query->setFetchMode(PDO::FETCH_ASSOC);
    if ( $query->execute(array($start)))
    {
      $row = $query->fetchAll();

      $number_of_rows = count($row);
    }
    else
    {
      echo "Unable to fetch";
    }
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Question</title>
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="well">
       <?php 
          if (isset($_GET['successfulSubmission']))
          {
            if ( $_GET['successfulSubmission'])
            {
              echo '<div class="alert alert-success" role="alert">Last Question was updated successfully.</div>';
            }
          }
       ?>
      <div class="panel panel-info">
      <div class="panel-heading">Update Question</div>
      <div class="panel-body">
      
      <?php  
        for ($i=$start; $i < $start + 1; $i++) 
        { 
      ?>
      <div class="well">
        <form class="form-horizontal" action="insertUpdateQuestion.php" method="post" id="question">
          <!-- question -->
          <div class="form-group">
            <label for="Question" class="col-sm-2 control-label"><?php echo $i + 1 ?> . Question</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name = "Question" value="<?php echo $row[$i]['question'] ?>" id="Question" placeholder="">
            </div>
          </div>
          <!-- options -->
          <div class="form-group">
            <label for="Option_a" class="col-sm-2 control-label">Option A</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control" name="Option_a" value="<?php echo $row[$i]['option_a'] ?>" id="Option_a" placeholder="Option A">
            </div>
          </div>
          <div class="form-group">
            <label for="Option_b" class="col-sm-2 control-label">Option B</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Option_b" value="<?php echo $row[$i]['option_b'] ?>" id="Option_b" placeholder="Option B">
            </div>
          </div>
          <div class="form-group">
            <label for="Option_C" class="col-sm-2 control-label">Option C</label>
           <div class="col-sm-10">
              <input type="text" class="form-control" name="Option_c" value="<?php echo $row[$i]['option_c'] ?>" id="Option_c" placeholder="Option C">
            </div>
          </div>
          
          <div class="form-group">
            <label for="Option_d" class="col-sm-2 control-label">Option D</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Option_d" value="<?php echo $row[$i]['option_d'] ?>" id="Option_d" placeholder="Option D">
            </div>
          </div>
          <!-- Correct Option -->
          <div class="form-group">
            <label for="correct_option" class="col-sm-2 control-label">Correct Option</label>
            <div class="col-sm-10">
              <div class="radio">
               <label>
                  <input type="radio" name="correct_option" id="option1" 
                     value="a" <?php if($row[$i]['answer'] == 0) echo "checked";?>> A
               </label>
              </div>
              <div class="radio">
               <label>
                  <input type="radio" name="correct_option" id="option2" 
                     value="b" <?php if($row[$i]['answer'] == 1) echo "checked";?>> B
               </label>
              </div>
              <div class="radio">
               <label>
                  <input type="radio" name="correct_option" id="option3" 
                     value="c" <?php if($row[$i]['answer'] == 2) echo "checked";?>> C
               </label>
              </div>
              <div class="radio">
               <label>
                  <input type="radio" name="correct_option" id="option4" 
                     value="d" <?php if($row[$i]['answer'] == 3) echo "checked";?>> D
               </label>
              </div>
            </div>
          </div>
          <!-- level of the question -->
          <div class="form-group">
            <label for="level" class="col-sm-2 control-label">Level </label>
            <div class="col-sm-10"> 
              <input type="number" class="form-control" value="<?php echo $row[$i]['level_of_question'] ?>" name="level_of_question" id="level" placeholder="level">
            </div>
          </div>
          <!-- Adding permission to the question -->
          <div class="form-group">
            <label for="permission" class="col-sm-2 control-label">Permission</label>
            <div class="col-sm-10">
              <div class="radio">
               <label>
                  <input type="radio" name="permission" id="option1" 
                     value="1" <?php if($row[$i]['permission'] == 1) echo "checked";?>> Permitted
               </label>
              </div>
              <div class="radio">
               <label>
                  <input type="radio" name="permission" id="option2" 
                     value="0" <?php if($row[$i]['permission'] == 0) echo "checked";?>> Not Permitted
               </label>
              </div>
            </div>
          </div>
          <!-- Quiz_id  -->
          <div class="form-group">
            <label for="quiz_id" class="col-sm-2 control-label">Quiz Name</label>
            <div class="col-sm-10">
              <select class="form-control" name="quiz_id">
              <?php 
                $selectQuiz = $dbc->prepare("select * from quiz");
                $selectQuiz->setFetchMode(PDO::FETCH_ASSOC);
                if ( $selectQuiz->execute())
                {
                  $row_quiz = $selectQuiz->fetchAll();
                  $number_of_quiz = count($row_quiz);

                  for ($j=0; $j < $number_of_quiz; $j++)
                   { 
                    
              ?>
                      <option values="<?php echo $row_quiz[$j]['quiz_id'];?>"><?php echo $row_quiz[$j]['quiz_id'];echo '. '.$row_quiz[$j]['quiz_name']; ?></option>     
              <?php 
                  }
                }
                else
                {
                  echo "Unable to fetch";
                }

              ?>
              </select>
            </div>
          </div>
          <!-- time limit -->
          <div class="form-group">
            <label for="time_limit" class="col-sm-2 control-label">Time Limit</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name = "time_limit" value="<?php echo $row[$i]['time_limit'] ?>" id="time_limit" placeholder="">
            </div>
          </div>
          <!-- Hidden Question id -->
          <input type="hidden" class="form-control" name = "question_id" value="<?php echo $row[$i]['question_id'] ?>" id="question_id" placeholder="">

          <!-- submit button -->
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="submit" id="submitButton" class="btn btn-success">Add Question</button>
            </div>
          </div>
        </form>
      </div>
      <?php 
        }
      ?>
      <!-- pagination here -->
    <div class="text-center">
      <nav>
        <ul class="pagination">
          <?php 
              if ($start != 0 )
              {
                ?>
                <li>
                  <a href="updateQuestion.php?start=<?php echo '0'; ?>" aria-label="Start">
                    <span aria-hidden="true">Start</span>
                  </a>
                </li>
                <?php
              }
           ?>
          <?php
              if ( !($start  >= $number_of_rows - 1 ))
              {
                ?>
                <li><a href="updateQuestion.php?start=<?php echo $start + 1; ?>"><?php echo $start + 2; ?></a></li>
                <?php
              }
          ?>
          <?php
              if ( !($start  >= $number_of_rows - 2 ))
              {
                ?>
                <li><a href="updateQuestion.php?start=<?php echo $start + 2; ?>"><?php echo $start + 3; ?></a></li>
                <?php
              }
          ?>
          <?php
              if ( !($start  >= $number_of_rows - 3 ))
              {
                ?>
                <li><a href="updateQuestion.php?start=<?php echo $start + 3; ?>"><?php echo $start + 4; ?></a></li>
                <?php
              }
          ?>
          <?php
              if ( !($start  >= $number_of_rows - 4 ))
              {
                ?>
                <li><a href="updateQuestion.php?start=<?php echo $start + 4; ?>"><?php echo $start + 5; ?></a></li>
                <?php
              }
          ?>
          <?php
              if ( !($start  >= $number_of_rows - 5 ))
              {
                ?>
                <li><a href="updateQuestion.php?start=<?php echo $start + 5; ?>"><?php echo $start + 6; ?></a></li>
                <?php
              }
          ?>
          <li>
            <a href="updateQuestion.php?start=<?php echo $number_of_rows - 1; ?>" aria-label="End">
              <span aria-hidden="true">End</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
      </div>
    </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {

    $('#question').validate({ // initialize the plugin
        rules: {
            question: {
                required: true,
                minlength: 10  
            },
            Option_a: {
                required: true,
                
            },
        Option_b: {
                required: true,
               
            },
        Option_c: {
                required: true,
               
            },
        Option_d: {
                required: true,    
            },
        level: {
            required: true;
            minlength: 10,
            maxlength: 20
        }
        },
    });
});
    </script>
  </body>
</html>