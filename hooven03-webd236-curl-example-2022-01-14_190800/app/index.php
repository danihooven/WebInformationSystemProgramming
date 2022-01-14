<?php
  require_once 'include/config.php';
  require_once 'include/util.php';
  require_once 'tests/tests.php';

  include 'include/header.html';

  function my_curl_query($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
  }

  $query = safeParam($_REQUEST, 'query', "");
  $links = [];
  if ($query) {
    $query = preg_replace("/\s+/", '+', $query);
    $result = my_curl_query("https://www.google.com/search?q=$query");
    preg_match_all("/(?<=url\?q=).*?(?=&amp;)/", $result, $arr);
    $arr = $arr[0];
    unset($arr[count($arr)-1]);
    $links = array_values($arr);
  }
?>

<div class="row">
  <div class="col-lg-12">
    <p>
      This will show the links only from the first page of Google for the given terms.
    </p>
  </div>
</div>

<div class="row" >
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <form action="index.php" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col">
                <label for="query">Enter a Google search</label>
                <input type="text" class="form-control" id="query" name="query" placeholder="Search terms" required value="<?php echo(safeParam($_REQUEST, 'query', '')); ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row mt-4 float-right">
              <div class="btn-toolbar align-middle">
                <button type="submit" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between"><span class="material-icons">send</span>&nbsp;Submit</button>
                <button class="btn btn-secondary mr-1 d-flex justify-content-center align-content-between" onclick="get('index.php')"><span class="material-icons">cancel</span>&nbsp;Cancel</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-12">
    <?php if ($links): ?>
      <h3>Top links from Google</h3>
      <ul>
        <?php foreach ($links as $link): ?>
        <li><a href="<?php echo(urldecode($link));?>" target="_blank"><?php echo(urldecode($link));?></a></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
</div>
    
<?php
  include 'include/footer.html';
?>