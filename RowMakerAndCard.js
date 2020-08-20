let createRow=function(numberElements){

    let mainContentTab = document.getElementsByTagName("main")[0].lastElementChild;

    if(window.screen.width<1000){
        for(let i = 0;i<numberElements;i++){
            // Create Elements
            let divRow = document.createElement("div");
            divRow.setAttribute("id","row");
            mainContentTab.append(divRow);            
        }
    }else{
        for(let i=0;i<Math.ceil(numberElements/4);i++){
            // Create Elements
            let divRow = document.createElement("div");
            divRow.setAttribute("id","row");
            mainContentTab.append(divRow);
        }
    }
}

let createCard = function(id,img_link,name_car,price_car){
    // Create Elements
    let form = document.createElement("form");
    let id_input = document.createElement("input");
    let submit_input = document.createElement("input");
    let div_describe = document.createElement("div");
    let describe_input_name = document.createElement("input");
    let describe_input_price = document.createElement("input");
    // Set Attributs
    form.setAttribute("name","card");
    form.setAttribute("method","POST");
    form.setAttribute("action","car-describe/index.php");
    id_input.setAttribute("name","id");
    id_input.setAttribute("type","text");
    id_input.setAttribute("value",id);
    id_input.setAttribute("style","display: none;");
    submit_input.setAttribute("type","submit");
    submit_input.setAttribute("name","images-car");
    submit_input.setAttribute("style",`background-image:url(${img_link})`);
    submit_input.setAttribute("value"," ");
    div_describe.setAttribute("name","discribe-car");
    describe_input_name.setAttribute("value",name_car);
    describe_input_price.setAttribute("value",price_car);
    // Add elements togheter
    form.append(id_input);
    form.append(submit_input);
    form.append(div_describe);
    div_describe.append(describe_input_name);
    div_describe.append(describe_input_price);
    // Add to empty 
    let mainContentTab = document.getElementsByTagName("main")[0].lastElementChild;    
    if(window.screen.width<1200){
        for(let i=mainContentTab.children.length-1;i>=0;i--){
            if(mainContentTab.children[i].children.length == 0){
                mainContentTab.children[i].append(form);
            }
        }
    }else{
        let mainContentTab = document.getElementsByTagName("main")[0].lastElementChild;
        for(let i=mainContentTab.children.length-1;i >= 0; i--){
            if(mainContentTab.children[i].children.length<4){
                mainContentTab.children[i].append(form);
            }
        }
    }
}



