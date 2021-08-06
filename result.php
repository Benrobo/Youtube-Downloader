<?php 

if(isset($_POST['url'])){

  function getYouTubeIdFromURL($url){
    $match = preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url);

    if($match){
      $yquery = parse_url($url);

      if(isset($yquery["query"])){

        return str_replace("v=", "", $yquery["query"]);
        die;
      }
      else if (isset($yquery['path'])){
        return str_replace("/", "", $yquery["path"]);
        die;
      }
    }
    else{
      $err = "Url given is invalid";
      header("location: index.php?err=".$err);
      die();
    }
  }


  $yurl = $_POST['url'];

  #Youtube Video Id
  $ytid = getYouTubeIdFromURL($yurl);


  if($ytid){
    // $SERVER =    $_SERVER['HTTP_HOST'];
    $dom = "https://yougotube.org/data/@api/json/";
     
    $mp4 =file_get_contents("$dom/videos/$ytid");
    $mp4 = json_decode($mp4,true);
    $mp4_thumb = $mp4["vidThumb"];
    $mp4_title = $mp4["vidTitle"];
    $duration = $mp4["duration"];
    $mp4 = $mp4['vidInfo'];
    #Get mp4 video
    $videos =file_get_contents("$dom/mergedstreams/$ytid");
    $videos = json_decode($videos,true);
    $video = $videos['vidInfo'];
    
    # get mp3 audio
    $mp3 =file_get_contents("$dom/mp3/$ytid");
    $mp3 = json_decode($mp3,true);
    $mp3 = $mp3['vidInfo'];

    

    // print_r($mp3);
  }

}
else{
  header("location: index.php");
  die;
}
?>
<?php require_once("./inc/head.php") ?>

  
  <!-- Youtube Video Downloader Modal -->
  <div class="downloader-modal">
      <div class="main-cont">
          <div class="video-preview">
              <img src="<?php echo $mp4_thumb; ?>" alt="" class="video-thumb img-fluid">
              <br>
              <div class="video-info mt-2">
                  <p>Title: <span class="title"><b><?php echo $mp4_title ?></b></span></p>
                  <buton onclick="window.history.back();" class="btn btn-warning">
                    Back
                  </button>
              </div>
          </div>
          <div class="tab-cont">
              <div class="tab-btn">
                  <button class="btn tab-button audio-btn active" data-content="audio">
                      <span class="icon">
                          <ion-icon name="cloud-download-outline"></ion-icon>
                      </span>
                      <p>Audio</p>
                  </button>
                  <button class="btn video-btn tab-button" data-content="video">
                      <span class="icon">
                          <ion-icon name="cloud-download-outline"></ion-icon>
                      </span>
                      <p>Video</p>
                  </button>
              </div>
              <br>

              <div class="video-options ">
                  <div class="audio-cont active">
                    <select class="audio-op">
                        <?php for ($i=0; $i < count($mp3); $i++) {?>
                          <option value="<?php echo $mp3[$i]["dloadUrl"] ?>"><?php echo $mp3[$i]["bitrate"] ?>kb <?php echo $mp3[$i]["mp3size"] ?></option>
                        <?php }?>
                      </select>
                      <br>
                      <button class="select-btn btn audio-download-btn">Download</button>
                  </div>
                  <div class="video-cont">
                    <select class="video-op">
                        <?php for ($i=0; $i < count($mp4); $i++) {?>
                          <option value="<?php echo $mp4[$i]["dloadUrl"] ?>"><?php echo $mp4[$i]["quality"] ?>kb <?php echo $mp4[$i]["rSize"] ?></option>
                        <?php }?>
                      </select>
                      <br>
                      <button class="select-btn btn video-download-btn">Download</button>
                  </div>
              </div>
          </div>
      </div>
  </div>


  <script>
    let audiobtn = document.querySelector(".audio-download-btn");
    let videobtn = document.querySelector(".video-download-btn");
    let auselect = document.querySelector(".audio-op");
    let vdselect = document.querySelector(".video-op");

    audiobtn.onclick = (e)=>{
      e.preventDefault();

      let val = auselect.value;

      window.location = `https:${val}`;
    }
    videobtn.onclick = (e)=>{
      e.preventDefault();

      let val = vdselect.value;

      window.location = `${val}`;
    }
  </script>

<?php require_once("./inc/footer.php") ?>
