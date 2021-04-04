
<?php

$name='';
$email='';
$username='';
$password='';
$confirmPass='';
$DOB='';
$gender='';
$mStatus='';
$address='';
$city='';
$postalCode='';
$homePhone='';
$mobilePhone='';
$CreditCardNum='';
$CreditDate='';
$monthSalary='';
$webUrl='';
$GPA='';
if($_SERVER["REQUEST_METHOD"]== 'POST')
{

    @$name=$_REQUEST['name'];
    @$email=$_REQUEST['email'];
    @$username=$_REQUEST['username'];
    @$confirmPass=$_REQUEST['confirmPass'];
    @$password=$_REQUEST['password'];
    @$DOB=$_REQUEST['DOB'];
    @$gender=$_REQUEST['gender'];
    @$mStatus=$_REQUEST['mStatus'];
    @$address=$_REQUEST['address'];
    @$city=$_REQUEST['city'];
    @$postalCode=$_REQUEST['postalCode'];
    @$homePhone=$_REQUEST['homePhone'];
    @$mobilePhone=$_REQUEST['mobilePhone'];
    @$CreditCardNum=$_REQUEST['CreditCardNum'];
    @$CreditDate=$_REQUEST['CreditDate'];
    @$monthSalary=$_REQUEST['monthSalary'];
    @$webUrl=$_REQUEST['webUrl'];
    @$GPA=$_REQUEST['GPA'];


    @$isNameValid = preg_match("/^[A-Za-z]{2,}$/i",$name);
    @$isEmailValid = preg_match("/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}/i",$email);
    @$isUserNameValid = preg_match("/^[A-Za-z]{5,}$/i",$username);
    $isPasswordValid = preg_match("/^[\w]{8,}$/i",$password);
    if($password==$confirmPass)
    {
        $isPasswordConfirmed = true;
    }
    else
    {
        $isPasswordConfirmed = false;

    }
    $isDOBValid = preg_match("/^[\d]{2}\.[\d]{2}\.[\d]{4}$/", $DOB);
    $isGenderValid =preg_match("/^(Male|Female)$/",$gender);
    $ismStatusValid= preg_match("/^Single|Married|Divorced|Widowed$/",$mStatus);
    $isAddressValid=!empty($address);
    $isCityValid= !empty($city);
    $isPostalValid= preg_match("/^[0-9]{6}$/",$postalCode);
    $isHomePhoneValid= preg_match("/^[\d]{2} [\d]{7}$/",$homePhone);
    $isMobileValid= preg_match("/^[\d]{2} [\d]{7}$/",$mobilePhone);
    $isCreditCardValid= preg_match("/^[\d]{4} [\d]{4} [\d]{4} [\d]{4}$/",$CreditCardNum);
    $isCreditDateValid= preg_match("/^[\d]{2}\.[\d]{2}\.[\d]{4}$/",$CreditDate);
    $isSalaryValid= preg_match("/^UZS [\d]+\,[\d]+\.[\d]{2}$/",$monthSalary);
    $isURLValid= preg_match("/^http:\/\/[\w]+\.[\w]{2,}$/",$webUrl);

    if($GPA>0 && $GPA<=4.5)
    {
        $isGPAValid=true;
    }

    else
    {
        $isGPAValid=false;
    }



$isValidForm = $isGPAValid && $isURLValid  && $isSalaryValid && $isCreditDateValid  && $isCreditCardValid  && $isMobileValid && $isHomePhoneValid&&
    $isPostalValid && $isCityValid&& $isAddressValid&& $ismStatusValid&& $isGenderValid&& $isDOBValid&& $isPasswordConfirmed&&
    $isPasswordValid&& $isUserNameValid&& $isEmailValid&& $isNameValid;



}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />

	</head>
	
	<body>
    <form action="index.php" method="POST">
        <h1>Registration Form</h1>
        <p>
            This form validates user input and then displays "Thank You" page.
        </p>

        <hr />
        <h2>Please, fill below fields correctly</h2>
        <dl>
            <dt>Name  </dt> <p><?php  if(@$isNameValid==false) { echo "(Please enter at least two characters )"; }?> </p>
            <dd>
                <input type="text" name="name" value="<?=$name?>">
            </dd>

            <dt>Email</dt> <?php  if(@$isEmailValid==false) { echo "(Please enter email in correct format )"; }?>
            <dd><input type="text" name="email" value="<?=$email?>"></dd>

            <dt>Username</dt> <?php  if(@$isUserNameValid==false) { echo "(This field is required. It has to contain at least 5 chars.)"; }?>
            <dd><input type="text" name="username" value="<?=$username?>"></dd>

            <dt>Password </dt> <?php  if(@$isPasswordValid==false) { echo "(This Field is required. It has to contain at least 8 chars. )"; }?>
            <dd><input type="password" name="password" value="<?=$password?>"></dd>

            <dt>Confirm Password </dt>  <?php if(@$isPasswordConfirmed==false) { echo "(This Field is required. It has to be equal to Password Field.)"; }?>
            <dd><input type="password" name="confirmPass" value="<?=$confirmPass?>"> </dd>

            <dt>Date of Birth </dt> <?php  if(@$isDOBValid==false) { echo "(Date should be written in dd.MM.yyyy format. For ex, 07.03.2019)"; }?>
            <dd><input type="text" name="DOB" value="<?=$DOB?>"></dd>

            <dt>Gender </dt> <?php  if(@$isGenderValid==false) { echo "(Only 2 options accepted: Male, Female. )"; }?>
            <dd><input type="text" name="gender" value="<?=$gender?>"></dd>



            <dt>Martial Status </dt> <?php  if(@$ismStatusValid==false) { echo "(Only 4 options accepted: Single, Married, Divorced, Widowed)"; }?>
            <dd><input type="text" name="mStatus" value="<?=$mStatus?>"></dd>

            <dt>Address </dt>  <?php  if(@$isAddressValid==false) { echo "(This is required Field. )"; }?>
            <dd><input type="text" name="address" value="<?=$address?>"></dd>

            <dt>City</dt>  <?php  if(@$isCityValid==false) { echo "(This is required Field.)"; }?>
            <dd><input type="text" name="city" value="<?=$city?>"></dd>

            <dt> Postal Code </dt>   <?php  if(@$isPostalValid==false) { echo "(This is required Field. It should follow 6 digit format. For ex,100011 )"; }?>
            <dd><input type="text" name="postalCode" value="<?=$postalCode?>"></dd>

            <dt>Home Phone  </dt>  <?php  if(@$isHomePhoneValid==false) { echo "(This is required Field. It should follow 9 digit format. For ex, 97 1234567)"; }?>
            <dd><input type="text" name="homePhone" value="<?=$homePhone?>"></dd>

            <dt>Mobile Phone  </dt> <?php  if(@$isMobileValid==false) { echo "(This is required Field. It should follow 9 digit format. For ex, 97 1234567 )"; }?>
            <dd><input type="text" name="mobilePhone" value="<?=$mobilePhone?>"></dd>

            <dt>Credit Card Number </dt> <?php  if(@$isCreditCardValid==false) { echo "(This is required Field. It should follow 16 digit format. For ex, 1234 1234 1234 1234)"; }?>
            <dd><input type="text" name="CreditCardNum" value="<?=$CreditCardNum?>"></dd>

            <dt>Credit Card Expiry Date </dt>  <?php  if(@$isCreditDateValid==false) { echo "(This is required Field. Date should be written in dd.MM.yyyy format. For ex,
07.03.2019 )"; }?>
            <dd><input type="text" name="CreditDate" value="<?=$CreditDate?>"></dd>

            <dt>Monthly Salary </dt> <?php  if(@$isSalaryValid==false) { echo "(This is required Field. It should be written in following format UZS 200,000.00 )"; }?>
            <dd><input type="text" name="monthSalary" value="<?=$monthSalary?>"></dd>

            <dt>Web Site URL  </dt> <?php  if(@$isURLValid==false) { echo "(This is required Field. It should match URL format. For ex, http://github.com )"; }?>
            <dd><input type="text" name="webUrl" value="<?=$webUrl?>"></dd>


            <dt>Overall GPA   <?php  if(@$isGPAValid==false) { echo "(This is required Field. It should be a 
oating point number less than 4.5 )"; }?></dt>
            <dd><input type="text" name="GPA" value="<?=$GPA?>"></dd>






            <!-- Write other fiels similar to Name as specified in lab6.pdf -->
        </dl>

        <div>
            <input type="submit" name="reg" value="Register">
            <?php if($isValidForm)
            { header('Location:thanks.php',TRUE,301); }?>


        </div>


    </form>


	</body>
</html>