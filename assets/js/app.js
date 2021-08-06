/**
 * 
 API URL: https://yougotube.org/data/@api/json/mp3/<YOUTUBE_VIDEO_ID>
*/


addEventListener("load", ()=>{
    tabFunc()
})




// Tabs functionality
function tabFunc(){
    let tabbtn = document.querySelectorAll(".tab-button");
    let audiobtn = document.querySelector(".audio-btn")
    let videobtn = document.querySelector(".video-btn")
    let audioOption = document.querySelector(".audio-cont")
    let videoOption = document.querySelector(".video-cont")
    let videoOptionsContainer = document.querySelector(".video-options")
    
    // videoOptionsContainer.innerHTML = ""

    tabbtn.forEach((tab)=>{
        tab.onclick = (e)=>{
            let content = e.target.dataset.content
           
            console.log(e.target)
            if(content == "audio"){
                audioOption.style.display = "flex"
                videoOption.style.display = "none"
                if(!audiobtn.classList.contains("active")){
                    audiobtn.classList.add("active")
                    videobtn.classList.remove("active")
                }
            }
            else{
                videoOption.style.display = "flex"
                videoOption.classList.add("active")
                audioOption.style.display = "none"
                videobtn.classList.add("active")
                audiobtn.classList.remove("active")
            }
        }
    })
}
