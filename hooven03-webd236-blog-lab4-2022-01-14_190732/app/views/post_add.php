%% views/header.html %%

<div class="row">
  <div class="col-lg-12">
    
<!--  Check for Errors -->
[[ if (isset($postErrors)): ]]
  <div class="alert alert-danger mb-0" role="alert">
  Please fix the following errors:
    <ul>
    [[ foreach ($postErrors as $key => $error): ]]
      <li>{{$error}}</li>
    [[ endforeach; ]]
    </ul>
  </div>
[[ endif; ]]



<!--  Blog Post Form -->
<form action="/post/{{$action}}/{{value($post['post_id'])}}" method="POST">

  <div>
  </div>

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="post[title]" placeholder="Enter title" value="{{value($post['title'])}}">
  </div>

  <div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" id="content" rows="10" name="post[content]" placeholder="Enter content">[[if (isset($postErrors) OR $action == 'edit'):]]{{value($post['content'])}}[[endif;]]</textarea>
  </div>

  <div class="form-group">
    <label for="tags">Tags</label>
    <input class="form-control" id="tags" name="post[tags]" placeholder="Enter tags" value="{{value($post['tags'])}}">
  </div>

  <div class="form-row mt-4 float-left">
    <div class="btn-toolbar align-middle">

      <button type="submit" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between">
        <span class="material-icons">send</span>&nbsp;Submit</button>

      <button class="btn btn-secondary mr-1 d-flex justify-content-center align-content-between" onclick="get('@@index@@')">
        <span class="material-icons">cancel</span>&nbsp;Cancel</button>

    </div>
  </div>

</form>
    

    
  </div>
</div>
  
%% views/footer.html %% 
