<?php
include("header.php");
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="home.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Home</a></div>
    </div>
    <!--End-breadcrumbs-->
    <!--Action boxes-->
    <div class="container-fluid">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Employee Registration Form</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="formsend" action="#" method="POST" class="form-horizontal"
                            onsubmit='return formValidation()'>
                            <div class="control-group">
                                <label class="control-label"><strong> First Name :</strong></label>
                                <div class="controls">
                                    <input type="text" id="fname" class="span11" placeholder="First name" name="fname"
                                        required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong> Middel Name :</strong></label>
                                <div class="controls">
                                    <input type="text" id="mname" class="span11" placeholder="Middel name" name="mname"
                                        required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Last Name :</strong></label>
                                <div class="controls">
                                    <input type="text" id="lname" class="span11" placeholder="Last name" name="lname"
                                        required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Gender :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="gender" required style="border-radius: 13px;">
                                        <option value="">Select gender...</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Age :</strong></label>
                                <div class="controls">
                                    <input type="number" class="span11" placeholder="Enter age" name="age" required
                                        min="20" max="70" style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Email :</strong></label>
                                <div class="controls">
                                    <input type="email" id="email" class="span11" placeholder="Enter email" name="email"
                                        required style="border-radius: 13px;" />
                                </div>
                                <span class="text-danger"><?php if (isset($email_err)) echo $email_err; ?></span>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Phone number :</strong></label>
                                <div class="controls">
                                    <div class="input-prepend"> <span class="add-on">+251 </span>
                                        <input type="text" id="phone" placeholder="999 999 999" class="span11"
                                            name="phone" required />
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Nationality :</strong></label>
                                <div class="controls">
                                    <input type="text" id="nationality" class="span11" placeholder="Enter nationality"
                                        name="nationality" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong> Subcity :</strong></label>
                                <div class="controls">
                                    <input type="text" id="subcity" class="span11" placeholder="Enter sucity"
                                        name="subcity" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Salary :</strong></label>
                                <div class="controls">
                                    <input type="text" id="salary" class="span11" placeholder="Enter salary"
                                        name="salary" required style="border-radius: 13px;" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Job position :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="position" required style="border-radius: 13px;">
                                        <option value="">Select jop position...</option>
                                        <option value="admin">Admin</option>
                                        <option value="manger">Manager</option>
                                        <option value="storekpeer">Storekpeer</option>
                                        <option value="security"> Security</option>
                                        <option value="clealiness"> Clealiness</option>
                                        <option>Special Services</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Status :</strong></label>
                                <div class="controls">
                                    <select class="span11" name="status" required style="border-radius: 13px;">
                                        <option value="">Select status...</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <center>
                                    <strong>Same thing error,please triy agian.</strong>
                                </center>
                            </div>

                            <div class="form-actions">
                                <center>
                                    <button type="submit" id="f" name="register" class="btn btn-success"
                                        style="border-radius: 13px;"><strong>Send Request</strong></button>
                                </center>
                            </div>
                            <div class="alert alert-success" id="success" style="display:none;">
                                <center>
                                    <strong>Request successfully dliverd.</strong>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>