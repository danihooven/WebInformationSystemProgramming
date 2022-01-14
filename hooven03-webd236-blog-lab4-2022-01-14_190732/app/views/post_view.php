%% views/header.html %%

<!-- Post Content -->
<div class="row">
  <div class="col-lg-12">

    <p>Posted on: {{ $post['datestamp'] }}</p>
    <p>Filed under: {{ $post['tags'] }}</p>
    <h2>{{ $post['title'] }}</h2>
    <div>
      <?php echo nl2br( $post['content'] );  ?>
    </div>
    
  </div>
</div>

    
<!-- Buttons : BACK / EDIT / DELETE   -->
<div class="form-group mt-4">
  <div class="btn-toolbar align-middle">

    <button type="button" class="btn btn-secondary mr-1 d-flex justify-content-center align-content-between" 
      onclick="get('@@index@@')">
      <span class="material-icons">arrow_back</span>
      &nbsp;Back
    </button>


    [[if (isLoggedIn() && $post['user_id'] == $_SESSION['user']['user_id']): ]]
    <button type="button" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between" 
      onclick="get('@@post/edit/{{$post['post_id']}}@@')">
      <span class="material-icons">edit</span>
      &nbsp;Edit
    </button>

    <button type="button" class="btn btn-danger mr-1 d-flex justify-content-center align-content-between" 
      onclick="post('@@post/delete/{{$post['post_id']}}@@')">
      <span class="material-icons">delete</span>
      &nbsp;Delete
    </button>
    [[ endif; ]]

   </div>
</div>


<!-- Display Comments -->
[[ if (isset($comments[0])): ]]
[[ foreach ($comments as $comment): ]]
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col text-muted">
        posted {{ time2str( $comment['datestamp'] ) }} by 
        <a href="/post/user/{{ $comment['user_id'] }}">{{ $comment['firstName']}} {{ $comment['lastName']}}</a>
      </div>
      [[ if ($comment['user_id'] == $_SESSION['user']['user_id']): ]]
      <button type="button" class="btn btn-danger d-flex justify-content-center align-content-between float-right"
         onclick="post('@@comment/remove/{{$comment['comment_id']}}/{{$post['post_id']}}@@')">
        <span class="material-icons">delete</span>
        &nbsp;Delete your comment
      </button>
      [[ endif; ]]
    </div>

  </div>
  <div class="card-body">
    {{$comment['text']}}
  </div>

</div>
</br>  
[[ endforeach; ]]
[[endif;]]


<!-- Add Comment Form -->
[[if (isLoggedIn()):]]
<div class="row">
  <div class="col-lg-12">    


    <form action="/comment/new/{{ $post['post_id'] }}" method="POST">
      
      <div class="form-group">
        <label for="text">Add a comment</label>
        <textarea class="form-control" id="text" rows="4" name="comment[text]" placeholder="Enter content"></textarea>
      </div>

      <div class="form-row mt-1 float-left">
        <div class="btn-toolbar align-middle">

          <button type="submit" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between">
            <span class="material-icons">send</span>&nbsp;Submit</button>

        </div>
      </div>

    </form>
  </div>
</div>
[[endif;]]

     
    

    

  
%% views/footer.html %% 