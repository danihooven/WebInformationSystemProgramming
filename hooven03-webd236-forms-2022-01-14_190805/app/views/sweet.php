%% views/header.html %%
  
<div class="row">
  <div class="col-lg-12">
  
    <div class="card mt-4">
      <div class="card-header">
        <div class="h3">{{$title}}</div>
        <div><small>A really cool example form.</small></div>
      </div>
[[ if (isset($errors)): ]]
      <div class="alert alert-danger mb-0" role="alert">
        Please fix the following errors
        <ul>
[[ foreach ($errors as $key => $error): ]]
          <li>{{$error}}</li>
[[ endforeach; ]]
        </ul>
      </div>
[[ endif; ]]
      <div class="card-body">
        <form action="@@sweet/simple@@" method="post">
          <div class="form-row">
            <div class="col">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" id="firstName" name="data[firstName]" placeholder="Enter first name" required value="{{value($data['firstName'])}}">
            </div>
            <div class="col">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" name="data[lastName]" placeholder="Enter last name" required value="{{value($data['lastName'])}}">
            </div>
          </div>
          <div class="form-row mt-4 float-right">
            <div class="btn-toolbar align-middle">
              <button type="submit" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between"><span class="material-icons">send</span>&nbsp;Submit</button>
              <button class="btn btn-secondary mr-1 d-flex justify-content-center align-content-between" onclick="get('@@index@@')"><span class="material-icons">cancel</span>&nbsp;Cancel</button>
            </div>
          </div>
        </div>
      </div>
                
    </div>
  </div>
</div>

%% views/footer.html %%