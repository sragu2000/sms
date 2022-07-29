<br><br>
<div class="container">
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
    </form>
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
</script>