<?php
include("header.php");
include("../connection.php");
if (!(isset($_SESSION['leder_id'])) || !(isset($_SESSION['username']))) {
    header("Location: ../login.php");
}
$user_id = $_SESSION['leder_id'];
?>
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="#"><i class="icon icon-th-list"></i> <span>View</span></a>
            <a href="view_service_request.php" title="Go to view User" class="tip-bottom">
                <i class="icon-eye-open"></i>View Services Request
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <center>
            <h5>VIEW SERVICE REQUEST PAGE</h5>
        </center>
        <hr>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <form name="formsend" action="#" method="POST" class="form-horizontal">
                <div class="span2">
                    <div>
                        <label>Search</label>
                        <select class="span11" name="view" required style="border-radius: 13px;" id="type">
                            <option value="all">All</option>
                            <option value="responce">Responce</option>
                            <option value="unresponce">UnRespoce</option>
                        </select>
                    </div>
                </div>
                <div class="span2">
                    <div>
                        <label>&nbsp</label>
                        <button type="submit" id="f" name="search" class="btn btn-success"
                            style="border-radius: 13px;float: left;"><strong>Search</strong></button>
                    </div>
                </div>
            </form>
            <br><br>
            <hr>
            <div class="widget-content nopadding">
                <?php
                if (isset($_POST['search'])) {
                    $var = $_POST['view'];
                    if ($var == 'responce') {
                ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>REQUESTED BY</th>
                            <th>REQUEST SERVICE</th>
                            <th>MESSAGE</th>
                            <th>REQUESTED DATE</th>
                            <th>REPLY</th>
                        </tr>
                    </thead>
                    <tbody id="output">
                        <tr>
                            <?php
                                    $result = mysqli_query($con, "SELECT *from serv_request where view='1'");
                                    $un_read = mysqli_num_rows($result);
                                    $no = 1;
                                    if ($un_read > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $e_id = $row["user_id"];
                                            $sql = mysqli_query($con, "SELECT *FROM user where id='$e_id'") or die("error occured" . mysqli_error($con));
                                            $user_info = mysqli_fetch_array($sql);
                                            $re_by = $user_info['fname'] . ' ' . $user_info['mname'];
                                    ?>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $re_by; ?></td>
                            <td><?php echo $row["req_service"]; ?></td>
                            <td><?php echo $row["message"]; ?></td>
                            <td><?php echo $row["req_date"]; ?></td>
                            <td> <?php if ($row["view"] == "1") { ?>
                                <img src="../images/tick.png" alt="Yes" class="img-fluid"></a>
                                <?php
                                                    } else { ?>
                                <img src="../images/remove.png" alt="No" class="img-fluid"></a>
                                <!-- <a href="service_request_reply.php?id=<//?php echo $row['s_id'] ?>" class="btn
                                        btn-primary" style="border-radius:13px"><i class="icon-reply"></i>
                                    Reply</a> -->
                                <?php
                                                    }
                                                ?>
                            </td>
                        </tr>
                        <?php
                                            $no++;
                                        }
                                    } else { ?>
                        <div class="alert alert-danger" id="error" style="display: block;">
                            <center>
                                <strong>Empty Request.</strong>
                            </center>
                        </div>
                        <?php
                                    }
                        ?>
                    </tbody>
                </table>
                <?php
                    } elseif ($var == 'unresponce') {
                    ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>REQUESTED BY</th>
                            <th>REQUEST SERVICE</th>
                            <th>MESSAGE</th>
                            <th>REQUESTED DATE</th>
                            <th>REPLY</th>
                        </tr>
                    </thead>
                    <tbody id="output">
                        <tr>
                            <?php
                                    $result = mysqli_query($con, "SELECT *from serv_request where view='0'");
                                    $un_read = mysqli_num_rows($result);
                                    $no = 1;
                                    if ($un_read > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $e_id = $row["user_id"];
                                            $sql = mysqli_query($con, "SELECT *FROM user where id='$e_id'") or die("error occured" . mysqli_error($con));
                                            $user_info = mysqli_fetch_array($sql);
                                            $re_by = $user_info['fname'] . ' ' . $user_info['mname'];
                                    ?>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $re_by; ?></td>
                            <td><?php echo $row["req_service"]; ?></td>
                            <td><?php echo $row["message"]; ?></td>
                            <td><?php echo $row["req_date"]; ?></td>
                            <td> <?php if ($row["view"] == "1") { ?>
                                <img src="../images/tick.png" alt="Yes" class="img-fluid"></a>
                                <?php
                                                    } else { ?>
                                <img src="../images/remove.png" alt="No" class="img-fluid"></a>
                                <!-- <a href="service_request_reply.php?id=<//?php echo $row['s_id'] ?>" class="btn
                                        btn-primary" style="border-radius:13px"><i class="icon-reply"></i>
                                    Reply</a> -->
                                <?php
                                                    }
                                                ?>
                            </td>
                        </tr>
                        <?php
                                            $no++;
                                        }
                                    } else { ?>
                        <div class="alert alert-danger" id="error" style="display: block;">
                            <center>
                                <strong>Empty Request.</strong>
                            </center>
                        </div>
                        <?php
                                    }
                        ?>
                    </tbody>
                </table>
                <?php
                    } else { ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>REQUESTED BY</th>
                            <th>REQUEST SERVICE</th>
                            <th>MESSAGE</th>
                            <th>REQUESTED DATE</th>
                            <th>REPLY</th>
                        </tr>
                    </thead>
                    <tbody id="output">
                        <tr>
                            <?php
                                    $result = mysqli_query($con, "SELECT *from serv_request");
                                    $un_read = mysqli_num_rows($result);
                                    $no = 1;
                                    if ($un_read > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $e_id = $row["user_id"];
                                            $sql = mysqli_query($con, "SELECT *FROM user where id='$e_id'") or die("error occured" . mysqli_error($con));
                                            $user_info = mysqli_fetch_array($sql);
                                            $re_by = $user_info['fname'] . ' ' . $user_info['mname'];
                                    ?>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $re_by; ?></td>
                            <td><?php echo $row["req_service"]; ?></td>
                            <td><?php echo $row["message"]; ?></td>
                            <td><?php echo $row["req_date"]; ?></td>
                            <td> <?php if ($row["view"] == "1") { ?>
                                <img src="../images/tick.png" alt="Yes" class="img-fluid"></a>
                                <?php
                                                    } else { ?>
                                <img src="../images/remove.png" alt="No" class="img-fluid"></a>
                                <!-- <a href="service_request_reply.php?id=<//?php echo $row['s_id'] ?>" class="btn
                                            btn-primary" style="border-radius:13px"><i class="icon-reply"></i>
                                        Reply</a> -->
                                <?php
                                                    }
                                                ?>
                            </td>
                        </tr>
                        <?php
                                            $no++;
                                        }
                                    } else { ?>
                        <div class="alert alert-danger" id="error" style="display: block;">
                            <center>
                                <strong>Empty Request.</strong>
                            </center>
                        </div>
                        <?php
                                    }
                        ?>
                    </tbody>
                </table>
                <?php
                    }
                } else { ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>REQUESTED BY</th>
                            <th>REQUEST SERVICE</th>
                            <th>MESSAGE</th>
                            <th>REQUESTED DATE</th>
                            <th>REPLY</th>
                        </tr>
                    </thead>
                    <tbody id="output">
                        <tr>
                            <?php
                                $result = mysqli_query($con, "SELECT *from serv_request");
                                $un_read = mysqli_num_rows($result);
                                $no = 1;
                                if ($un_read > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        $e_id = $row["user_id"];
                                        $sql = mysqli_query($con, "SELECT *FROM user where id='$e_id'") or die("error occured" . mysqli_error($con));
                                        $user_info = mysqli_fetch_array($sql);
                                        $re_by = $user_info['fname'] . ' ' . $user_info['mname'];
                                ?>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $re_by; ?></td>
                            <td><?php echo $row["req_service"]; ?></td>
                            <td><?php echo $row["message"]; ?></td>
                            <td><?php echo $row["req_date"]; ?></td>
                            <td> <?php if ($row["view"] == "1") { ?>
                                <img src="../images/tick.png" alt="Yes" class="img-fluid"></a>
                                <?php
                                                } else { ?>
                                <img src="../images/remove.png" alt="No" class="img-fluid"></a>
                                <!-- <a href="service_request_reply.php?id=<//?php echo $row['s_id'] ?>" class="btn
                                        btn-primary" style="border-radius:13px"><i class="icon-reply"></i>
                                    Reply</a> -->
                                <?php
                                                }
                                            ?>
                            </td>
                        </tr>
                        <?php
                                        $no++;
                                    }
                                } else { ?>
                        <div class="alert alert-danger" id="error" style="display: block;">
                            <center>
                                <strong>Empty Request.</strong>
                            </center>
                        </div>
                        <?php
                                }
                    ?>
                    </tbody>
                </table>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
mysqli_close($con);
include("footer.php");
?>