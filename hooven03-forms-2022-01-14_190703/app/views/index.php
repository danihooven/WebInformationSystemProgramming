%% views/header.html %%

<div class="row">
<div class="col-lg-12">
<div class="card">
  
  <!-- Form Header -->
  <div class="card-header">
    <div class="h3">We're sorry to see you go!</div>
    <div><small>Please fill out the form below so that we can tailor our communcation to meet your needs</small></div>
  </div>

  <!-- Validation -->
  [[ if (isset($accountErrors)): ]]
    <div class="alert alert-danger mb-0" role="alert">
    Please fix the following errors
      <ul>
      [[ foreach ($accountErrors as $key => $error): ]]
        <li>{{$error}}</li>
      [[ endforeach; ]]
      </ul>
    </div>
  [[ endif; ]]

  <!-- Form Body -->
  <div class="card-body">
  <form action="@@process/contact@@" method="post">
    
    <!-- Text : EMAIL-->
    <div class="form-row">
      <div class="col">
        <label for="email">My email address</label>
        <input type="email" class="form-control" id="email" name="form[email]" placeholder="My email address" required
               value = " {{value($form['email'])}}">
      </div>
    </div>

    
    <!-- Checkbox : LIST -->
    <div class="form-row mt-4">
      <div class="col">
        <label for="list">I no longer wish to receive the following</label>
        <div class="border p-2 rounded" id="list">
          
          <!-- Announcements -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="form[list][]" id="announcements" New product announcements
                   value="New product announcements" {{checked( $form['list'], 'New product announcements')}}>
            <label class="form-check-label" for="announcements">New product announcements</label>
          </div>

          <!-- Updates -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="form[list][]" id="updates" 
                   value="Product updates" {{checked($form['list'], 'Product updates')}}>
            <label class="form-check-label" for="updates">Product updates</label>
          </div>

          <!-- Newsletter -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="form[list][]" id="newsletter" 
                   value="Monthly newsletter" {{checked($form['list'], 'Monthly newsletter')}}>
            <label class="form-check-label" for="newsletter">Monthly newsletter</label>
          </div>
          
          <!-- Events -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="form[list][]" id="events" 
                   value="Events" {{checked($form['list'], 'Events')}}>
            <label class="form-check-label" for="events">Events</label>
          </div>

          <!-- Offers -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="form[list][]" id="offers" 
                   value="Partner offers" {{checked($form['list'], 'Partner offers')}}>
            <label class="form-check-label" for="offers">Partner offers</label>
          </div>

        </div>
      </div>
    </div>


  
    <!-- Radio Buttons : REASON  -->
    <div class="form-row mt-4">
      <div class="col">
        <label for="reason">I'm unsubscribing because</label>
        <div class="border p-2 rounded" id="reason">
          
          <!-- Relevant -->
          <div class="form-check">
            <input class="form-check-input" type="radio" name="form[reason]" id="relevant" 
                   value="relevant" {{checked($form['reason'], 'relevant')}}>
            <label class="form-check-label" for="relevant">Your emails are not relevant to me.</label>
          </div>
          
          <!-- Frequent -->
          <div class="form-check">
            <input class="form-check-input" type="radio" name="form[reason]" id="frequent" 
                   value="frequent" {{checked($form['reason'], 'frequent')}}>
            <label class="form-check-label" for="frequent">Your emails are too frequent.</label>
          </div>
          
          <!-- Remember -->
          <div class="form-check">
            <input class="form-check-input" type="radio" name="form[reason]" id="remember" 
                   value="remember" {{checked($form['reason'], 'remember')}}>
            <label class="form-check-label" for="remember">I don't remember signing up for this list.</label>
          </div>
          
          <!-- Other -->
          <div class="form-check">
            <input class="form-check-input" type="radio" name="form[reason]" id="other" 
                   value="other" {{checked($form['reason'], 'other')}}>
            <label class="form-check-label" for="other">Other</label>
          </div>
          
        </div>
      </div>
    </div>

    
    <!-- Button : SUBMIT / CANCEL   -->
    <div class="form-row mt-4 float-right">
      <div class="btn-toolbar align-middle">

        <button type="submit" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between">
          <span class="material-icons">send</span>&nbsp;Submit</button>

        <button class="btn btn-secondary mr-1 d-flex justify-content-center align-content-between" onclick="get('@@index@@')">
          <span class="material-icons">cancel</span>&nbsp;Cancel</button>

      </div>
    </div>
  
    
  </div> <!-- End Form Body -->
  
</div>
</div>
</div>

%% views/footer.html %% 