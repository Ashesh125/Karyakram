<?php include "userDashboardNav.php";?>
<div class="col-7 my-3 d-flex flex-column main-body">

    <h2 >Add</h2>
    <form method="POST" action="https://karyakram0.000webhostapp.com/user/insertEvent.php"  enctype="multipart/form-data">
    <div class="d-flex flex-wrap">
        <div class="col-5 m-2 p-2">
            <input class="form-control"  type="hidden" id="user_id" name="user_id" value="<?=$_SESSION['user_id']?>" required> 
            
            <label  class="form-label text-dark" for="name">Event Name</label>
            <input class="form-control"  type="text" id="name" name="name" required> 
        </div>
        <div class="col-5 m-2 p-2">
            <label class="form-label text-dark" for="start">Start Date</label>
            <input class="form-control" type="date" id="start" name="start" required> 
        </div>
        <div class="col-5 m-2 p-2">
            <label class="form-label text-dark" for="end">End Date</label>
            <input class="form-control" type="date" id="end" name="end" required> 
        </div>
        <div class="col-5 m-2 p-2">
            <label class="form-label text-dark" for="deadline">Deadline</label>
            <input class="form-control" type="date" id="deadline" name="deadline" required>  
        </div>
        <div class="col-5 m-2 p-2">
            <label class="form-label text-dark" for="location">Location</label>
            <input class="form-control" type="text" id="location" name="location" required> 
        </div>
        <div class="col-5 m-2 p-2">
            <label class="form-label text-dark" for="price">Price</label>
            <input class="form-control" type="number" id="price" name="price" required> 
        </div>
        <div class="col-5 m-2 p-2">
            <label class="form-label text-dark" for="organizer">Organizer</label>
            <input class="form-control" type="text" id="organizer" name="organizer" required> 
        </div>
        
        <div class="col-5 m-2 p-2">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category" name="category" required>
            </select>
        </div>
        
        <div class="col-10 d-flex flex-wrap" id="tags">

            <div class="col-12 fw-bold">Tags</div>


        </div>
        <div class="col-10 m-2 p-2">
            <label class="form-label text-dark" for="details">Details</label>
            <input class="form-control" type="text" id="details" name="details"> 
        </div>
        <div class="col-10 m-2 p-2">
            <input class="form-control" type="file" id="file" name="file"> 
        </div>
        
        <button class="btn btn-primary col-3" id="btn-s">Submit</button>
    </div>
       </form>
</div>
<div></div>


<script>


    $(document).ready(function () {
        $('#addevent').addClass("active");
        
        $.ajax({
            type: "GET",
            url: "https://karyakram0.000webhostapp.com/backend/API/api.php?en=extra&op=getAllCategories",
            data: "datas",
            success: function (response) {
                var json_obj = $.parseJSON(response);
                
                appendSelect(json_obj.message,"#category");
                appendCheckbox(json_obj.message);
                
            },
            dataType: "html"
        });
    }
    );

function appendCheckbox(data) {
    let mainContainer;
    let checkBox;
        mainContainer = document.getElementById("tags");
        checkBox = "";
    
        let size = data.length;
        for (let j = 0; j < size; j++) {
            console.log(data.name);
            var container = document.createElement('div');
            container.setAttribute('class', 'form-check col-2');
            var chk = document.createElement('input'); // CREATE CHECK BOX.
            chk.setAttribute('type', 'checkbox'); // SPECIFY THE TYPE OF ELEMENT.
            chk.setAttribute('id', checkBox + data[j].name); // SET UNIQUE ID.
            chk.setAttribute('name', checkBox +data[j].name);
            chk.setAttribute('class', "form-check-input");
            var lbl = document.createElement('label'); // CREATE LABEL.
            lbl.setAttribute('for', checkBox + j);
            lbl.setAttribute('class', "form-check-label");
            // CREATE A TEXT NODE AND APPEND IT TO THE LABEL.
            lbl.appendChild(document.createTextNode(data[j].name));
            // APPEND THE NEWLY CREATED CHECKBOX AND LABEL TO THE <p> ELEMENT.
            container.appendChild(chk);
            container.appendChild(lbl);
//                var div = document.createElement("div");
//                div.innerHTML =  ;

            mainContainer.appendChild(container);
        }

    

    return;
}

function appendSelect(data, id) {
        let size = data.length;
        for (let j = 0; j < size; j++) {

            let optionText = data[j].name;
            let optionValue = data[j].id;

            $(id).append('<option value=\"' + optionValue + '\">' + optionText + '</option>');
        }

    
    return;
}
</script>
<style>
    .row-holder,.row-header{
        border:2px solid black;
        background-color: white;
    }
    
    .row-holder:hover{
        cursor:pointer;
    }
</style>
</body>
</html>