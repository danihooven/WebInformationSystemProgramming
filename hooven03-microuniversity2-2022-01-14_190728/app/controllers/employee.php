<?php
require_once "include/util.php";
require_once "models/employee.php";
// require_once "models/employee.php";

function get_list() {
  // Put your code for get_list here, something like
  // 1. Load and validate parameters or form contents
  // 2. Query or update the database
  // 3. Render a template or redirect
  $employees = findAllEmployees();
  renderTemplate(
    "views/employeelist.php",
    array(
      'title' => 'Employee List',
      'employees' => $employees
    )
  );
}

function get_view($id) {
  // Put your code for get_view here, something like
  // 1. Load and validate parameters or form contents
  // 2. Query or update the database
  // 3. Render a template or redirect
  
  $employee = findEmployeeById($id);
  renderTemplate(
    "views/employeeview.php",
    array(
      'title' => 'Employee View',
      'employee' => $employee
    )
  );
}