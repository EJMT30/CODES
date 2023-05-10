<!doctype html>
<html>

<head>
  <link rel="stylesheet" href="styleupdate.css">
  <link rel="stylesheet" href="navbar.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script>
    function showdata(value) {
      document.getElementById("update").disabled = false;
      http = new XMLHttpRequest();
      http.onreadystatechange = function() {
        if (http.readyState == 4 && http.status == 200) {
          xmlDocument = http.responseXML;
          youtubers = xmlDocument.getElementsByTagName("youtuber");
          for (youtuber of youtubers) {
            link = youtuber.childNodes[1].childNodes[0].nodeValue;
            if (link == value) {
              handle = youtuber.getAttribute("channelHandle");
              name = youtuber.childNodes[3].childNodes[0].nodeValue;
              sub = youtuber.childNodes[5].childNodes[0].nodeValue;
              views = youtuber.childNodes[7].childNodes[0].nodeValue;
              content = youtuber.childNodes[9].childNodes[0].nodeValue;
              date = youtuber.childNodes[11].childNodes[0].nodeValue;
              document.getElementById("handle").value = handle;
              document.getElementById("name").value = name;
              document.getElementById("sub").value = sub;
              document.getElementById("views").value = views;
              document.getElementById("content").value = content;
              document.getElementById("mydate").value = date;

            }
          }
        }
      };
      http.open("GET", "BSIT3EG2G4.xml", true);
      http.send();
    }
  </script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container-fluid ps-5 pe-5 pt-2">
      <img src="assets/Youtube_logoW.png" alt="Logo" class="logo">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white mx-2" href="homesearch.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white mx-2" href="readd.php">List of Youtubers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white mx-2" href="create.php">Create</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white mx-2" href="update.php">Update</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white mx-2" href="delete.php">Delete</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row justify-content-end">
      <div class="col-md-4 mt-5">

        <p class="display-6 text-white mt-5">Update List</p>

        <form method="post" action="updateprocess.php" class="row g-1 text-white">

          <div class="col-md-12">
            <select name="youtubelink" class="hello" onchange="showdata(this.value)">
              <option selected disabled>Select Youtuber Link</option>
              <?php
              $xml = new domdocument("1.0");
              $xml->load("BSIT3EG2G4.xml");
              $youtubers = $xml->getElementsByTagName("youtuber");

              foreach ($youtubers as $youtuber) {
                //gets the links of all youtuber
                $links = $youtuber->getElementsByTagName("youtubeLink")->item(0)->nodeValue;
                //adds links as options inside selector
                echo "<option>" . $links . "</option>";
              }
              ?>
            </select><br>
          </div>

          <div class="input-bx col-md-6 mt-3">
            <input type="text" required="required" name="newHandle" id="handle" />
            <span>Channel Handle</span>
          </div>


          <div class="input-bx col-md-6 mt-3">
            <input type="text" required="required" name="newName" id="name" />
            <span>Update Channel Name</span>
          </div>

          <div class="input-bx col-md-6 mt-3">
            <input type="text" required="required" name="newCount" id="sub" />
            <span>Update Subcriber Count</span>
          </div>

          <div class="input-bx col-md-6 mt-3">
            <input type="text" required="required" name="newView" id="views" />
            <span>Update Most View</span>
          </div>

          <div class="input-bx col-md-12 mt-3">
            <input type="text" required="required" name="newContent" id="content" />
            <span>Update Content Type</span>
          </div>

          <div class="input-bx col-md-12 mt-3">
            <input type="date" required="required" name="newDate" id="mydate" placeholder="none" />
            <span>Update Date</span>
          </div>

          <div class="col-md-12">
            <label class="form-label">Update Picture</label>
            <input type="file" class=" form-control radius-5" name="newPic"><br>
          </div>
          <br /><input type="button" value="Update" id="update" class="hello col-md-6 mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal" disabled>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Update</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-dark">
                  Need to insert the user information that will be deleted*** </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" value="Update">Save changes</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">

            <input type="button" class="hello" value="BACK" onclick="window.location.href='homesearch.php'">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>