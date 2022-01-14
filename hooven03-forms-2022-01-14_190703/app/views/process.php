%% views/header.html %%

<div class="row">
  <div class="col-lg-12">
    <div class="h3">Confirm Unsubscribe</div>
    <div>
      <p>We will miss you, {{$variables['email']}}. You have been unsubscribed from the following lists:</p>
    </div>
    {{{dumpArray($variables['list'])}}}
  </div>
</div>

          
%% views/footer.html %% 