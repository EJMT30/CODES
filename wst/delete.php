<!DOCTYPE html>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="styledelete.css">
  <link rel="stylesheet" href="navbar.css">
  <title>DELETE</title>
  <script>
    function deleteConfirm() {
      var choice = confirm("Do you really want to delete this record?");
      if (choice == false)
        return false;
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

  <div class="container mt-5">
    <div class="row justify-content-end">
      <div class="col-md-4 mt-5">

        <p class="display-6 text-white mt-5">Delete List</p>

        <form method="post" onsubmit="return deleteConfirm()" action="deleteProcess.php" class="row g-1 text-white">
          YouTube Link:<br>
          <select name="links" required class="desdel"> <!--bawal hindi sagutan kasi may required-->
            <option value="" disabled selected>Select YouTube Channel</option> <!--value="" para null vaalue, disabled para di pwede ma select selected para default choice-->
            <?php
            //open class
            $xml = new domdocument("1.0");
            $xml->load("BSIT3EG2G4.xml"); // open xml file
            $youtubers = $xml->getElementsByTagName("youtuber"); //saves array

            foreach ($youtubers as $youtuber) {
              $link = $youtuber->getElementsByTagName("youtubeLink")->item(0)->nodeValue; // gets all links
              echo "<option>" . $link . "</option>"; //put links as option inside selctor
            }
            ?>
          </select>
          <br><br>
          <div class="col-md-6">
            <!-- <input type="submit" value="Delete" class="desdel"> -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-light rounded-pill desdel" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Delete
            </button>
          </div>
          <div class="col-md-6">
            <input type="button" class="desdel" value="BACK" onclick="window.location.href='homesearch.php'">
          </div>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Do you really want to delete this record?</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-dark">
                  Need to insert the user information that will be deleted***
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" value="Delete">Save changes</button>
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>
    </form>
  </div>
  </div>
  </div>



  <!-- Js Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>