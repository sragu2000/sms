<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('images/app.ico');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP</title>
    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Font Awesome-->
    <script src="https://kit.fontawesome.com/eeb684813e.js" crossorigin="anonymous"></script>

    <!-- SweetAlert For windows -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div class="container">
        <!-- signup start -->
        <br>
        <center>
            <!-- <img src="<?php //echo base_url('images/new-user.png');?>" height="150"> -->
        </center><br>
        <form id="signup" method="post">
            <div class="card border-dark">
                <!-- card header -->
                <div class="card-header  form-control-lg">
                    <strong><center>SignUp</center></strong>
                </div>
                <!-- card body -->
                <div class="card-body">
                    <input type="text" class="form-control-lg form-control rounded-3" required placeholder="First Name" id="fname"> &nbsp;
                    <input type="text" class="form-control-lg form-control rounded-3" required placeholder="Last Name" id="lname"> &nbsp;
                    <select id="grade" class="form-control form-control-lg">
                        <option value="" disabled selected>Select Your Grade</option>
                    </select><p></p>
                    
                    <input type="text" class="form-control-lg form-control rounded-3" required placeholder="Address" id="address"> &nbsp;
                    <input type="email" class="form-control-lg form-control rounded-3" required placeholder="Email" id="email"> &nbsp;
                    <input type="number" class="form-control-lg form-control rounded-3" required placeholder="Phone Number" id="tpno"> &nbsp;
                    <div class="row">
                        <div class="col-md-4"><div class="form-control form-control-lg">Date of Birth</div></div>
                        <div class="col-md-8"><input type="date" class="form-control-lg form-control rounded-3" required placeholder="Date of Birth" id="dob"> &nbsp;</div>
                    </div>
                    <input type="password" class="form-control-lg form-control rounded-3" required placeholder="Password" id="password">&nbsp;
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-control form-control-lg">
                                <input type="checkbox" id="spagree" class="form-check-input" required> &nbsp;
                                I agree <a href="#">Terms and Conditions</a>
                            </div>&nbsp;
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <!--Button Set-->
                        <div class="col-6"><button type="submit"
                                class="btn btn-outline-success btn-lg form-control">SignUp</button></div>
                        <div class="col-6"><button type="reset"
                                class="btn btn-outline-danger btn-lg form-control">Clear</button></div>
                    </div>
                </div>
            </div>
        </form>
        <!-- signup end -->
        <br>
        <a href="<?php echo base_url('login');?>" class="btn form-control btn-lg btn-outline-primary">Loginhere</a>
        <br><br>
    </div>
    <script>
        $(document).ready(()=>{
            fetch("<?php echo base_url('general/getgrades') ?>",{method:'GET',mode: 'no-cors',cache: 'no-cache'})
            .then(response => {
                if (response.status == 200) {return response.json();}
                else {console.log('Backend Error..!');console.log(response.text());}
            })
            .then(data => {
                if (data.length>0) {
                    data.forEach(function(item){
                        var htmlText=`<option value="${item.id}">${item.grade}</option>`;
                        $("#grade").append(htmlText);
                    });
                }else{
                    alert("Grades not available.");
                }
            })
            .catch(() => {console.log("Network connection error");});
        });
        
        $(document).on("submit","#signup",(e)=>{
            e.preventDefault();
            var toServer=new FormData();
            toServer.append('fname',$("#fname").val());
            toServer.append('lname',$("#lname").val());
            toServer.append('address',$("#address").val());
            toServer.append('grade',$("#grade").val());
            toServer.append('tpno',$("#tpno").val());
            toServer.append('email',$("#email").val());
            toServer.append('dob',$("#dob").val());
            toServer.append('password',$("#password").val());
            fetch("<?php echo base_url('signup/signupuser');?>",{
                method:'POST',
                body: toServer,
                mode: 'no-cors',
                cache: 'no-cache'})
            .then(async response => {
                try {
                    const data = await response.json()
                    console.log('response data', data);
                    return data;
                }catch(err) {
                    console.log('Error happened here!');
                    console.error(err);
                }
            })
            .then(data => {
                alert(data.message);
                location.href="<?php echo base_url('login');?>";
            })
            .catch((e) => {
                console.log(e);
                alert(e);
            });
        })
    </script>
</body>

</html>