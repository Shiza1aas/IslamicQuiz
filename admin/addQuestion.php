<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Question</title>
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="well">

      <?php 
          if (isset($_GET['successfulSubmission']))
          {
            if ( $_GET['successfulSubmission'])
            {
              echo '<div class="alert alert-success" role="alert">Last Question was submitted successfully.</div>';
            }
          }
       ?>

      <div class="panel panel-info">
      <div class="panel-heading">Add A Question</div>
      <div class="panel-body">
        <form class="form-horizontal" action="inserQuestion.php" method="post" id="question">
          <!-- question -->
          <div class="form-group">
            <label for="Question" class="col-sm-2 control-label">Question</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name = "Question" id="Question" placeholder="Question">
            </div>
          </div>
          <!-- options -->
          <div class="form-group">
            <label for="Option_a" class="col-sm-2 control-label">Option A</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Option_a" id="Option_a" placeholder="Option A">
            </div>
          </div>
          <div class="form-group">
            <label for="Option_b" class="col-sm-2 control-label">Option B</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Option_b" id="Option_b" placeholder="Option B">
            </div>
          </div>
          <div class="form-group">
            <label for="Option_C" class="col-sm-2 control-label">Option C</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Option_c" id="Option_c" placeholder="Option C">
            </div>
          </div>
          
          <div class="form-group">
            <label for="Option_d" class="col-sm-2 control-label">Option D</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="Option_d" id="Option_d" placeholder="Option D">
            </div>
          </div>
          <!-- Correct Option -->
          <div class="form-group">
            <label for="correct_option" class="col-sm-2 control-label">Correct Option</label>
            <div class="col-sm-10">
              <div class="radio">
               <label>
                  <input type="radio" name="correct_option" id="option1" 
                     value="a" checked> A
               </label>
              </div>
              <div class="radio">
               <label>
                  <input type="radio" name="correct_option" id="option2" 
                     value="b"> B
               </label>
              </div>
              <div class="radio">
               <label>
                  <input type="radio" name="correct_option" id="option3" 
                     value="c"> C
               </label>
              </div>
              <div class="radio">
               <label>
                  <input type="radio" name="correct_option" id="option4" 
                     value="d"> D
               </label>
              </div>
            </div>
          </div>
          <!-- submit button -->
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="submit" id="submitButton" class="btn btn-success">Add Question</button>
            </div>
          </div>
        </form>
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
        },
    });
});


    </script>
  </body>
</html>