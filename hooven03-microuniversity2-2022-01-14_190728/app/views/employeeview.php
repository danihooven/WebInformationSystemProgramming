%% views/header.html %%


[[$fields = array (
    "EMP_NUM" => "ID number",
    "EMP_LNAME" => "Last name",
    "EMP_FNAME" => "First name",
    "EMP_INITIAL" => "Middle initial",
    "EMP_DOB" => "Birth date",
    "EMP_HIREDATE" => "Hire date",
    "EMP_JOBCODE" => "Job code"
  );]]


<div class="row">
  <div class="col-lg-12">
    <h1>{{$title}}</h1>
      <form>
        [[foreach($fields as $field => $description):]]
        <div class="form-group">
          <label for="{{$field}}">
            {{$description}}
          </label>
          <input type="text" min="1" 
               id="{{$field}}" 
               name="{{$field}}"
               class="form-control" 
               value="{{$employee[$field]}}" disabled 
          />
        </div>
        [[ endforeach;]]
  
    </form>
    <button class="btn btn-primary d-flex justify-content-center align-content-between mr-1" onclick="get('@@employee/list@@)"><span class="material-icons">arrow_back</span>&nbsp;Back</button>
  </div>
</div>
          
%% views/footer.html %% 