<?php $this->load->view('user/header'); ?>
<!--Include header section-->
<div class="wrapper-page">

    <div class="page-title">
        <h1><i class="icon-list"></i>View Results</h1>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_wrapper">
                        <div class="table_banner clearfix">
                            <h5 class="table_banner_title">Results List</h5>
                        </div>
                        <div class="table_body text-left">
                            <table id="example" class="table table-condensed responsive table_custom" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>SR No</th>
                                        <th>Market Name</th>
                                        <th>Game</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Bid</th>
                                        <th>Bid Amount</th>
                                        <th>Lucky No</th>
                                        <th>Status</th>
                                        <th>Winning Amount</th>
                                        <th>Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr = 1;
                                    foreach ($requestlist as $value) : ?>
                                        <tr>
                                            <td><?php echo $sr ?></td>
                                            <td><?php $id = $value->market_id;
                                                $mrkt_name = $this->Admin_model->getmarketValue($id);
                                                if (!empty($mrkt_name)) {
                                                    echo $mrkt_name->market_name;
                                                } else {
                                                    print("-");
                                                } ?></td>
                                            <td><?php echo $value->game;
                                                echo "($value->type)"; ?></td>
                                            <td><?php $id = $value->market_id;
                                                $marketValue = $this->Admin_model->getmarketValue($id);
                                                if ($value->type == 'OPEN') {
                                                    echo $marketValue->result_open_start_time;
                                                } else {
                                                    echo $marketValue->result_close_start_time;
                                                }
                                                ?></td>
                                            <td><?php $id = $value->market_id;
                                                $marketValue = $this->Admin_model->getmarketValue($id);
                                                if ($value->type == 'OPEN') {
                                                    echo $marketValue->result_open_end_time;
                                                } else {
                                                    echo $marketValue->result_close_end_time;
                                                }
                                                ?></td>
                                            <td><?php echo $value->digit ?></td>
                                            <td><?php echo $value->amount ?></td>

                                            <td><?php $id = $value->market_id;
                                                $udate = $value->date;
                                                $date = date('Y-m-d', strtotime($udate));
                                                $user_name = $this->Admin_model->getluckyValue($id, $date);
                                                if (!empty($user_name)) {
                                                    if ($value->type == 'OPEN') {
                                                        echo $user_name->open;
                                                    } else {
                                                        echo $user_name->close;
                                                    }
                                                } else {
                                                    echo "coming soon";
                                                }   ?>
                                            </td>

                                            <td><?php $id = $value->market_id;
                                                $udate = $value->date;
                                                $date = date('Y-m-d', strtotime($udate));
                                                $user_name = $this->Admin_model->getluckyValue($id, $date);
                                                if (!empty($user_name)) {
                                                    if ($value->type == 'OPEN') {
                                                        if ($user_name->open == $value->digit) {
                                                            echo "<a class='btn btn-success'>WIN<a/>";
                                                        } elseif ($value->type = "") {
                                                            echo "<a class='btn btn-warning'>Coming Soon<a/>";
                                                        } else {
                                                            echo "<a class='btn btn-danger'>Loose<a/>";
                                                        }
                                                    } else {
                                                        if ($user_name->close == $value->digit) {
                                                            echo "<a class='btn btn-success'>WIN<a/>";
                                                        } elseif ($value->type = "") {
                                                            echo "<a class='btn btn-warning'>Coming Soon<a/>";
                                                        } else {
                                                            echo "<a class='btn btn-danger'>Loose<a/>";
                                                        }
                                                    }
                                                } else {
                                                    echo "<a class='btn btn-warning'>Coming Soon<a/>";
                                                }   ?></td>

                                            <td><?php $id = $value->market_id;
                                                $udate = $value->date;
                                                $date = date('Y-m-d', strtotime($udate));
                                                $user_name = $this->Admin_model->getluckyValue($id, $date);
                                                if (!empty($user_name)) {
                                                    if ($value->type == 'OPEN') {
                                                        if ($user_name->open == $value->digit) {
                                                            $total = $value->amount * 9;
                                                            echo $total;
                                                        } elseif ($value->type = "") {
                                                            echo "Coming Soon";
                                                        } else {
                                                            echo "0";
                                                        }
                                                    } else {
                                                        if ($user_name->close == $value->digit) {
                                                            $total = $value->amount * 9;
                                                            echo $total;
                                                        } elseif ($value->type = "") {
                                                            echo "Coming Soon";
                                                        } else {
                                                            echo "0";
                                                        }
                                                    }
                                                } else {
                                                    echo "Coming Soon";
                                                }   ?></td>
                                            <td><?php echo $value->date; ?></td>

                                        </tr>
                                    <?PHP $sr++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('user/footer'); ?>