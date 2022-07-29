<br><br>
<div class="container">
    <div class="form-control form-control-lg bg-dark text-white">Add Grade</div><p></p>
    <div id="message"></div>
    <form id="grade">
        <input type="text" required id="gradeName" class="form-control" placeholder="Grade"><p></p>
        <input type="number" required id="payment" class="form-control" placeholder="Payment"><p></p>
        <input type="text" required id="coordinator" class="form-control" placeholder="Co-ordinator"><p></p>
        <div class="row">
            <div class="col-md-6">
                <input type="Submit" class="btn btn-success form-control" value="Add Grade">
            </div>
            <div class="col-md-6">
                <input type="reset" class="btn btn-warning form-control" value="Reset">
            </div>
        </div>
    </form><br><br>
    <p></p><div class="form-control form-control-lg bg-dark text-white">Manage Grade</div><p></p>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Grade ID</th>
            <th scope="col">Grade</th>
            <th scope="col">Payment</th>
            <th scope="col">Co-ordinator</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody id="details">
          
        </tbody>
    </table>
</div>
<script>
    $(document).on("submit","#grade",(e)=>{
        e.preventDefault();
        var toServer=new FormData();
        toServer.append('gradeName',$("#gradeName").val());
        toServer.append('payment',$("#payment").val());
        toServer.append('coordinator',$("#coordinator").val());
        fetch("<?php echo base_url('grade/addgrade');?>",{
            method:'POST',
            body: toServer,
            mode: 'no-cors',
            cache: 'no-cache'})
        .then(response => {
            if (response.status == 200) {
                return response.json();            
            }
            else {
                alert('Backend Error..!');
                console.log(response.text());
            }
        })
        .then(data => {
            document.getElementById("message").innerHTML="";
            if(data.result==true){
                var htmlText=`<div class="alert alert-success form-control">${data.message}</div>`;
                $("#message").append(htmlText);
                loadGradeDetails();
            }else{
                var htmlText=`<div class="alert alert-danger form-control">${data.message}</div>`;
                $("#message").append(htmlText);
            }
        })
        .catch(() => {
            console.log("Network connection error");
            alert("Reloading"); window.location.reload();
        });
    })
    function loadGradeDetails(){
        document.getElementById("details").innerHTML="";
        fetch("<?php echo base_url('grade/listGradeDetails');?>",{method:'GET',mode: 'no-cors',cache: 'no-cache'})
        .then(response => {
            if (response.status == 200) {return response.json();}
            else {console.log('Backend Error..!');console.log(response.text());}
        })
        .then(data => {
            if (data.length>0) {
                data.forEach(function(item){
                    var htmlText=`
                        <tr>
                            <th scope="row">${item.id}</th>
                            <td>${item.grade}</td>
                            <td>${item.payment}</td>
                            <td>${item.coordinator}</td>
                            <td>
                                <button class="btn btn-warning form-control" onclick="editGrade(${item.id},'${item.grade}',${item.payment},'${item.coordinator}')">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-danger form-control" onclick="deleteGrade(${item.id},'${item.grade}',${item.payment},'${item.coordinator}')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                            
                        </tr>
                    `;
                    $("#details").append(htmlText);
                });
            }else{

            }
        })
        .catch(() => {console.log("Network connection error");});
    }
    loadGradeDetails();
    function editGrade(id,gr,pmnt,coor){
        if(confirm("Do you want to edit this grade:")){
            grade=prompt("Enter New Grade",gr);
            coordinator=prompt("Enter New Coordinator",coor);
            payment=prompt("Enter New Payment",pmnt);
            var editUrl=`<?php echo base_url("grade/editGrade/")?>`+id+"/"+grade+"/"+coordinator+"/"+payment;
            location.href=editUrl;
        }

    }
    function deleteGrade(id){
        if(confirm("Do you want to delete this grade:")){
            var deleteUrl=`<?php echo base_url("grade/deleteGrade/")?>`+id;
            location.href=deleteUrl;
        }

    }
</script>