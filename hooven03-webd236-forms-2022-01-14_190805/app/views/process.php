%% views/header.html %%

<div class="row">
  <div class="col-lg-12">
    {{{dumpArray($variables)}}}
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-12">
    <div class="form-group">
      <div class="btn-toolbar align-middle">
        <button class="btn btn-secondary mr-1 d-flex justify-content-center align-content-between" onclick="return get('@@index@@')"><span class="material-icons">arrow_back</span>&nbsp;Back</button>
      </div>
    </div>
  </div>
</div>

%% views/footer.html %% 