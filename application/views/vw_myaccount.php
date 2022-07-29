<br><br>
<div class="container">
    <div class="form-control form-control-lg text-white bg-dark">
        Account Details
    </div>
    <table class="table">
        <tbody id="pvalues">
            <tr><th scope="row">Index Number</th><td id="v1"></td></tr> 
            <tr><th scope="row">Grade</th><td id="v2"></td></tr> 
            <tr><th scope="row">First Name</th><td id="v3"></td></tr> 
            <tr><th scope="row">Last Name</th><td id="v4"></td></tr> 
            <tr><th scope="row">Address</th><td id="v5"></td></tr> 
            <tr><th scope="row">Date of Birth</th><td id="v6"></td></tr> 
            <tr><th scope="row">Email</th><td id="v7"></td></tr> 
            <tr><th scope="row">Phone</th><td id="v8"></td></tr> 
        </tbody>
    </table>
</div>
<script>
    $(document).ready(()=>{
        fetch("<?php echo base_url('home/getStudentDetails');?>",{method:'GET',mode: 'no-cors',cache: 'no-cache'})
        .then(response => {
            if (response.status == 200) {return response.json();}
            else {console.log('Backend Error..!');console.log(response.text());}
        })
        .then(data => {
            if (data.length>0) {
                data.forEach(function(item){
                    $("#v1").append(item.indnum);
                    $("#v2").append(item.grade);
                    $("#v3").append(item.fname);
                    $("#v4").append(item.lname);
                    $("#v5").append(item.address);
                    $("#v6").append(item.dob);
                    $("#v7").append(item.mail);
                    $("#v8").append(item.phone);
                });
            }
        })
        .catch(() => {console.log("Network connection error");});
    })
</script>