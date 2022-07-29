<br><br>
<div class="container">
    <form id="payment">
        <input type="number" placeholder="Index Number" id="indexnumber" required class="form-control"><p></p>
        <select id="month" class="form-control" required>
            <option value='' selected disabled>--Select Month--</option>
            <option value='1'>Janaury</option>
            <option value='2'>February</option>
            <option value='3'>March</option>
            <option value='4'>April</option>
            <option value='5'>May</option>
            <option value='6'>June</option>
            <option value='7'>July</option>
            <option value='8'>August</option>
            <option value='9'>September</option>
            <option value='10'>October</option>
            <option value='11'>November</option>
            <option value='12'>December</option>
        </select><p></p>
        <input type="text" disabled id="amount" class="form-control"><p></p>
        <input type="submit" value="Pay" class="btn btn-success form-control">
    </form>
</div>

<script>
    $(document).on("submit","#payment",(e)=>{
        e.preventDefault();
            var toServer=new FormData();
            toServer.append('indexnumber',$("#indexnumber").val());
            toServer.append('month',$("#month").val());
            fetch("<?php echo base_url('payment/payCash');?>",{
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
                alert(data.message);
            })
            .catch((e) => {
                console.log(e);
            });
    })

    $(document).on("change","#indexnumber",()=>{
        var indexnum=$("#indexnumber").val();
        var url="<?php echo base_url('payment/getGradeValue/')?>"+indexnum;
        fetch(url,{method:'GET',mode: 'no-cors',cache: 'no-cache'})
        .then(response => {
            if (response.status == 200) {return response.json();}
            else {console.log('Backend Error..!');console.log(response.text());}
        })
        .then(data => {
            if(data.cash=="null"){
                $("#amount").val("User not found");
            }else{  
                var text=`${data.grade} & Payment: ${data.cash}`;
                console.log(text);
                $("#amount").val("");
                $("#amount").val(text);
            }
            
        })
        .catch((e) => {console.log(e);});
    })
</script>