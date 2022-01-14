%% views/header.html %%

<div class="row">
  <div class="col-lg-12">
    <h1>{{$title}}</h1>
    <ul>
      [[ foreach ($employees as $employee): ]]
      <li>
        <a href="/employee/view/{{ $employee['EMP_NUM'] }}">
          {{ $employee['EMP_FNAME'] }} {{ $employee['EMP_LNAME'] }}
        </a>
      </li>
      [[ endforeach; ]]
    </ul>
  </div>
</div>
          
%% views/footer.html %% 