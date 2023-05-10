<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="stylecreate.css">
    <link rel="stylesheet" href="navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create</title>
    <script>
    function date(){
        const date = new Date();

        getdate = date.getDate();
        month= date.getMonth()+1;
        year = date.getFullYear();

        var newdate = getdate.toString();
        var newmonth = month.toString();
        if(newdate.length=1){
            newdate = "0"+newdate;
        }
        if(newmonth.length=1){
            newmonth = "0"+newmonth;
        }

        fulldate = (year+"-"+newmonth+"-"+newdate);

        document.getElementById("mydate").value = fulldate;
        
        
    }
    function check(handle){

        if (handle.length == 0) {
            document.getElementById("handle_response").innerHTML ="<span style='color:red'>no value to check</span>";
            document.getElementById("btnsubmit").disabled = true;
        } 

        else {
            http = new XMLHttpRequest();
            http.onreadystatechange = function() 
            {
                if (http.readyState == 4 && http.status == 200) {
                xmlDocument = http.responseXML;
                youtubers = xmlDocument.getElementsByTagName("youtuber");
                test="";
                for(youtuber of youtubers){
                    chandle = youtuber.getAttribute("channelHandle");
                    if(handle==chandle){
                        test=chandle;
                        document.getElementById("handle_response").innerHTML ="<span style='color:red'>"+handle+" is not available</span>";
                        document.getElementById("btnsubmit").disabled = true;
                        break;
                    }
                    else{
                        document.getElementById("handle_response").innerHTML ="<span style='color:green'>"+handle+" is available</span>";
                        document.getElementById("btnsubmit").disabled = false;
                        break;
                    }
                }
                                //revise this part for now its working 
            }
            else
            {
                document.getElementById("handle_response").innerHTML = "Loading...";
                document.getElementById("btnsubmit").disabled = true;
            }
        };
        http.open("GET", "BSIT3EG2G4.xml", true);
        http.send();
        }
    }
        </script>
</head>

<body onload="date()">

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
            <div class="row">
              <div class="col-md-4">
                <p class="display-6 text-white mt-5">Create / Add List</p>
                <div id="handle_response" class="ms-5"></div>
                <form method="post" action="createprocess.php" class="row g-1 text-white">
                  
                    <div class="input-bx col-md-6 mt-3">
                        <input type="text" required="required"  name="channelHandle" onkeyup="check(this.value)"/>
                        <span>Channel Handle</span>
                    </div>
                    
                    <div class="input-bx col-md-6 mt-3">
                      <input type="text" required="required" name="channelName">
                      <span>Channel Name</span>
                    </div>
                    <div class="input-bx col-12 mt-3">
                      <input type="text" required="required" name="channelLink" >
                      <span>Channel Link</span>
                    </div>
                    <div class="input-bx col-md-6 mt-3">
                        
                        <input type="text" name="mostViews" required="required">
                        <span>Most Views</span>
                      </div>

                      <div class="input-bx col-md-6 mt-3">
                          
                        <input type="text" name="subCount" required="required">
                        <span>Subcribers Count</span>
                      </div>

                    <div class="input-bx col-md-12 mt-3">
                      
                      <input type="date" name="date" id="mydate" placeholder="none" required="required">
                      <span>Date of creation</span>
                    </div>

                    <div class="input-bx col-md-12 mt-3">
                      <input type="text" name="genre" required="required">
                      <span>Genre</span>
                    </div>
                    <div class="col-md-12 ">
                      <label class="form-label">Picture</label>
                      <input type="file" class="form-control mb-3" name="ytpic" required="required">
                    </div>
                    <div class="col-md-6">
                        <input disabled type="submit" class="hello" value="SAVE" id="btnsubmit">
                    </div>
                    <div class="col-md-6">
                    <input type="button" class="hello" value="BACK" onclick="window.location.href='homesearch.php'">
                    </div>
                    
                  </form>
                  
                  
                  
              </div>
              </div>
            </div>
          </div>
        
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>