let checkPriceUser = function (){
    let startPriceUser = document.getElementById("priceStart");
    let endPriceUser = document.getElementById("priceEnd");
    let saveButton = document.getElementById("submit_button");
        if(startPriceUser.value <= endPriceUser.value || endPriceUser.value.length === 0){
            saveButton.setAttribute("type","submit");
            saveButton.click();
        }else{
            startPriceUser.style = "border-color:red;";
            endPriceUser.style = "border-color:red;";
        }
}
let stateButton = false;
let hidden_choyse = function() {
    let chooiseTab = document.getElementById("chouse");
    let contentTab = document.getElementById("content");
    let listRows = document.querySelectorAll("#row");
    if(stateButton == false){
       chooiseTab.style.display="none";
       contentTab.style ="max-width: 100%; width: 100%;";
       listRows.forEach((row)=>{row.setAttribute("style","height:50%;");});
       stateButton=true;
    }else if(stateButton == true){
        listRows.forEach((row)=>{row.setAttribute("style","height:40%;");});
        chooiseTab.style.display="block";
        stateButton=false;
    }
}
