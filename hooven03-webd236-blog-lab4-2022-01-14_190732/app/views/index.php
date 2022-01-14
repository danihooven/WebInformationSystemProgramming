%% views/header.html %%

<div class="row">
  <div class="col-lg-12">    


<!-- Sub Headers -->
[[if ($subHead == 'user'):]]

  <div class="card">
    <div class="card-header">
      <div class="row">          
        <div class="col">
            <h5 class="card-title"><strong>
              {{ $posts[0]['firstName']}} {{$posts[0]['lastName']}} - 
              <a href="mailto:{{ $posts[0]['email'] }}">{{ $posts[0]['email'] }}</a>
            </strong></h5>
        </div>
      </div>        
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-auto">
          <img src="{{ $posts[0]['picture'] }}" class="img-fluid align-middle" alt="profile picture">
        </div>
        <div class="col">
          <p class="card-text">{{ $posts[0]['bio'] }}</p>
      </div>
    </div>
  </div>
  </div>
  </br>

  [[elseif ($subHead == 'recent'):]]
   <h2>Recent posts</h2>

  [[elseif ($subHead == 'tag'):]]
   <h2>Posts tagged '{{$posts[0]['tags']}}'.</h2>

[[endif;]]
  

<!--   Display Posts -->
[[ foreach ($posts as $post): ]]
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col">
          <h5 class="card-title"><strong><a href="/post/view/{{ $post['post_id'] }}">{{ $post['title'] }}</strong></a></h5>
      </div>
      <div class="col text-right">
        {{ time2str( $post['datestamp'] ) }} by 
        <a href="/post/user/{{ $post['user_id'] }}">{{ $post['firstName']}} {{ $post['lastName']}}</a>
      </div>      
    </div>

  </div>
  <div class="card-body">
    {{substr( $post['content'], 0, 500 )}}
    <a href="/post/view/{{ $post['post_id'] }}">see more...</a>
  </div>


  [[if ($post['tags']):]]
  <div class="card-footer">
    <small>Filed under:
      [[foreach (split_tags($post['tags']) as $key => $value):]]
      <a href="/post/tag/{{$value}}">{{$value}}</a>
      [[ endforeach; ]]
    </small>
  </div>
  [[endif;]]

</div>

</br>    
[[ endforeach; ]]
    

<!-- Add Button -->
[[if (isLoggedIn()): ]]
  <button type="button" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between" onclick="get('@@post/add@@')">
[[ else: ]]
  <button type="button" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between" onclick="get('@@user/login@@')">
[[ endif; ]]
  <span class="material-icons">add_circle_outline</span>&nbsp;Add a post
  </button>
    
  </div>
</div>
  
%% views/footer.html %% 