<br><br>
<div class="container">
    <center>
        <div id="qrcode"></div>
        <span>Index Number: <?php echo $indexnum; ?></span>
    </center>
    
	<script type="text/javascript">
		var qrcode = new QRCode(document.getElementById("qrcode"), {width : 200,height : 200});
		qrcode.makeCode("<?php echo $indexnum; ?>");
	</script>
    <hr>
    <a href="<?php echo base_url('home/myaccount');?>" class="btn btn-outline-primary form-control">View My Account</a>
    <br><br>
    <div class="form-control form-control-lg text-white bg-dark">
        Payment History
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Month</th>
            <th scope="col">Received Date</th>
          </tr>
        </thead>
        <tbody id="pvalues"></tbody>
      </table>
</div>
<script>
    $(document).ready(()=>{
        fetch("<?php echo base_url('home/getPaymentHistory');?>",{method:'GET',mode: 'no-cors',cache: 'no-cache'})
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
                            <td>${item.month}</td>
                            <td>${item.receiveddate}</td>
                        </tr> 
                    `;
                    $("#pvalues").append(htmlText);
                });
            }else{
                var htmlText=`
                    <div class='alert alert-danger form-control'>
                        Payment History Not Found..
                    </div>
                `;
                $("#pvalues").append(htmlText);
            }
        })
        .catch(() => {console.log("Network connection error");});
    })
</script>