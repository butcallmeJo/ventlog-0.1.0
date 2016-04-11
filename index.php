<?php

include_once 'model/user.php';

$credentials = false;
$guest = false;

function userExists($login, $password, $users) {
  foreach ($users as &$user) {
      if ($user['login'] == $login And $user['password'] == $password) {
        return $user;
      }
  }
  return false;
}

if (isset($_COOKIE["login"])) {
  $credentials = true;
  $guest = false;
} else {
  if (isset($_POST["login"]) And isset($_POST["pwd"])) {
    if (userExists($_POST["login"], $_POST["pwd"], $users) != false) {
      $credentials = true;
      $user = userExists($_POST["login"], $_POST["pwd"], $users);
      $name = $user["full_name"];
      setcookie("login", $user, time()+86400);
    }
  } else {
    $guest = true;
    $name = "there";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>VentLog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="accessibility-BS/plugins/js/bootstrap-accessibility.js"></script>
  <script src="post_a_status.js"></script>
  <script src="toggle.js"></script>
  <script src="reply.js"></script>
  <script src="load_more.js"></script>
  <script src="ajax.js"></script>
  <link rel="stylesheet" href="accessibility-BS/plugins/css/bootstrap-accessibility.css">
  <link rel="stylesheet" href="ventlogBS.css">
</head>

<body>
  <?php include "views/header.php" ?>
  <div class="container-fluid">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <?php if ($credentials Or $guest) { ?>
          <div class="panel panel-info">
            <div class="panel-heading padding-bottom-0">
              <div class="row">
                <p>Hello,
                  <?php echo $name; ?>
                </p>
              </div>
            </div>
            <?php if ($credentials) { ?>
            <div class="panel-body">
              <p>Your rot13'd login is:
                <?php echo str_rot13($name) ?>
              </p>
              <p>The length of your login is:
                <?php echo strlen($name) ?>
              </p>
            </div>
            <?php } ?>
          </div>
          <?php } else { ?>
          <div class="alert alert-danger">
            <p>Invalid credentials! - Please log-in again: <a href="login.php">Login</a></p>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php if ($credentials) { ?>
    <div class="col-xs-12 col-md-3">
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="panel panel-success">
            <div class="panel-heading padding-bottom-0">
              <div class="row">
                <div class="col-xs-3">
                  <img class="thumbnail thumbnail-md" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png"
                    alt="photo">
                </div>
                <div class="col-xs-9">
                  <p>Damian Ali</p>
                </div>
              </div>
            </div>
            <div class="panel-body">sum dolor sit amet, consectetur adipisicing elit. Debitis ratione delectus veniam
              eligendi porro recusandae, placeat necessitatibus optio deserunt ducimus aspernatur
              ullam nobis, vitae natus</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="panel panel-success">
            <div class="panel-heading padding-bottom-0">
              <div class="row">
                <div class="col-xs-3">
                  <img class="thumbnail thumbnail-md" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png"
                    alt="photo">
                </div>
                <div class="col-xs-9">
                  <p>Rudy Rigot</p>
                </div>
              </div>
            </div>
            <div class="panel-body">sum dolor sit amet, consectetur adipisicing elit. Debitis ratione delectus veniam
              eligendi porro recusandae, placeat necessitatibus optio deserunt ducimus aspernatur
              ullam nobis, vitae natus</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-6 panel-group">
      <div class="row">
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"><a data-toggle="collapse" href="#collapse1">Click to Vent</a></h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
              <div class="panel-body">
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label class="control-label col-sm-2">Vent:</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="vent1" placeholder="Let it out!"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> include location</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading padding-bottom-0">
              <div class="row">
                <div class="col-xs-3">
                  <img class="thumbnail thumbnail-sm" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png"
                    alt="photo">
                </div>
                <div class="col-xs-9">
                  <p>Ian Wagener</p>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <p>sum dolor sit amet, consectetur adipisicing elit. Debitis ratione delectus veniam
                eligendi porro recusandae, placeat necessitatibus optio deserunt ducimus aspernatur
                ullam nobis, vitae natus</p>
              <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#reply1">Reply</button>
              <div id="reply1" class="collapse">
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label class="control-label col-sm-2">Vent:</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="vent2" placeholder="Let it out!"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> include location</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading padding-bottom-0">
              <div class="row">
                <div class="col-xs-3">
                  <img class="thumbnail thumbnail-sm" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png"
                    alt="photo">
                </div>
                <div class="col-xs-9">
                  <p>William McCann</p>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <p>sum dolor sit amet, consectetur adipisicing elit. Debitis ratione delectus veniam
                eligendi porro recusandae, placeat necessitatibus optio deserunt ducimus aspernatur
                ullam nobis, vitae natus</p>
              <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#reply2">Reply</button>
              <div id="reply2" class="collapse">
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label class="control-label col-sm-2">Vent:</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="vent3" placeholder="Let it out!"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> include location</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading padding-bottom-0">
              <div class="row">
                <div class="col-xs-3">
                  <img class="thumbnail thumbnail-sm" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png"
                    alt="photo">
                </div>
                <div class="col-xs-9">
                  <p>John Serrano</p>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <p>sum dolor sit amet, consectetur adipisicing elit. Debitis ratione delectus veniam
                eligendi porro recusandae, placeat necessitatibus optio deserunt ducimus aspernatur
                ullam nobis, vitae natus</p>
              <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#reply3">Reply</button>
              <div id="reply3" class="collapse">
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label class="control-label col-sm-2">Vent:</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="vent4" placeholder="Let it out!"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> include location</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div id="extra_statuses">
        <button id="loadMoreBttn" type="button" class="btn btn-default">Load More Vents</button>
      </div>
    </div>
    <div class="col-xs-12 col-md-3">
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="panel panel-success">
            <div class="panel-heading padding-bottom-0">
              <div class="row">
                <div class="col-xs-3">
                  <img class="thumbnail thumbnail-md" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png"
                    alt="photo">
                </div>
                <div class="col-xs-9">
                  <p>Damian Ali</p>
                </div>
              </div>
            </div>
            <div class="panel-body">sum dolor sit amet, consectetur adipisicing elit. Debitis ratione delectus veniam
              eligendi porro recusandae, placeat necessitatibus optio deserunt ducimus aspernatur
              ullam nobis, vitae natus</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-md-12">
          <div class="panel panel-success">
            <div class="panel-heading padding-bottom-0">
              <div class="row">
                <div class="col-xs-3">
                  <img class="thumbnail thumbnail-md" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png"
                    alt="photo">
                </div>
                <div class="col-xs-9">
                  <p>Rudy Rigot</p>
                </div>
              </div>
            </div>
            <div class="panel-body">sum dolor sit amet, consectetur adipisicing elit. Debitis ratione delectus veniam
              eligendi porro recusandae, placeat necessitatibus optio deserunt ducimus aspernatur
              ullam nobis, vitae natus</div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <?php } else { ?>
  <div class="container-fluid">
    <div class="jumbotron">
      <h1 class="padding-side-20">VentLog - Let it out!</h1>
      <p class="padding-side-10">VentLog is the leading website to vent to world. Post under different aliases for any reason
        and see that you're not alone!</p>
    </div>
  </div>
  <?php } ?>

  <?php include 'views/footer.php'; ?>

</body>

</html>
