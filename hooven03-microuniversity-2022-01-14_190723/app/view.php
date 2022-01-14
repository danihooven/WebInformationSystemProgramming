<?php
  include_once 'include/config.php';
  include_once 'include/util.php';
  include_once 'include/db.php';
  include_once 'include/Logger.php';

  include 'include/header.html';

  $emp_num = safeParam($_REQUEST, "emp_num", "");
  if (!$emp_num) {
    die("no employee number given");
  }

  $employee = findEmployeeById($emp_num);

  $fields = array (
    "EMP_NUM" => "ID number",
    "EMP_LNAME" => "Last name",
    "EMP_FNAME" => "First name",
    "EMP_INITIAL" => "Middle initial",
    "EMP_DOB" => "Birth date",
    "EMP_HIREDATE" => "Hire date",
    "EMP_JOBCODE" => "Job code"
  );

?>
<div class="row">
  <div class="col-lg-12">
    <form>

<?php foreach($fields as $field => $description): ?>
      <div class="form-group">
        <label for="<?php echo "{$field}"; ?>">
          <?php echo "{$description}"; ?>
        </label>
        <input type="text" min="1" 
               id="<?php echo "{$field}"; ?>" 
               name="<?php echo "{$field}"; ?>" 
               class="form-control" 
               value="<?php echo $employee[$field]; ?>" disabled />
      </div>
<?php endforeach; ?>
  
    </form>
    <button class="btn btn-primary d-flex justify-content-center align-content-between mr-1" onclick="get('/index.php')"><span class="material-icons">arrow_back</span>&nbsp;Back</button>

        </div>
      </div>
<?php
  include 'include/footer.html';
?>