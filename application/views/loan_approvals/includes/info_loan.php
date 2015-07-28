<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Customer Information</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="contacts">
                    <label>Account Number:</label>
                        <div class="form-group multiple-form-group input-group">
                            <div class="input-group-btn input-group-select">
                                <!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="concept">Phone</span> <span class="caret"></span>
                                </button> -->
                                <!-- <ul class="dropdown-menu" role="menu">
                                    <li><a href="#phone">Phone</a></li>
                                    <li><a href="#fax">Fax</a></li>
                                    <li><a href="#skype">Skype</a></li>
                                    <li><a href="#email">E-mail</a></li>
                                    <li><a href="#www">Web</a></li>
                                </ul> -->
                                <input type="hidden" class="input-group-select-val" name="contacts['type'][]" value="phone">
                            </div>
                            <input type="text" name="contacts['value'][]" class="form-control">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-add">Search</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Principle Owner Information</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-5">CID</div>
                    <div class="col-md-7">000001</div>
                </div>
                <div class="form-group">
                    <div class="col-md-5">Customer Name</div>
                    <div class="col-md-7">Chhingchhing HEM</div>
                </div>
                <div class="form-group">
                    <div class="col-md-5">Date Of Birth</div>
                    <div class="col-md-7">01-05-1980</div>
                </div>
                <div class="form-group">
                    <div class="col-md-5">Gender/Married</div>
                    <div class="col-md-7">Female/Single</div>
                </div>
                <div class="form-group">
                    <div class="col-md-5">Address</div>
                    <div class="col-md-7">17, 604, Toul kork, Phnom Penh</div>
                </div>
            </div>

        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Product Owner Information</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-5">Product Type</div>
                    <div class="col-md-7">100000 Riel - 200000 Riel</div>
                </div>
                <div class="form-group">
                    <div class="col-md-5">Currency</div>
                    <div class="col-md-7">USD</div>
                </div>
                <div class="form-group">
                    <div class="col-md-5">Account Status</div>
                    <div class="col-md-7">Pending</div>
                </div>
            </div>

        </div>
    </div>  
    <div class="col-md-6">
        <!-- <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Panel 1</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">Panel content</div>
        </div> -->
        <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tabLoanSpace" data-toggle="tab">Loan Space</a></li>
                            <li><a href="#tabRepayment" data-toggle="tab">Repayment</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tabLoanSpace">
                            <div class="form-group">
                                <div class="col-md-5">Loan Amount</div>
                                <div class="col-md-7">4000000</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5">Interest Rate</div>
                                <div class="col-md-7">1.8</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5">Penulty Rate</div>
                                <div class="col-md-7">&nbsp;</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5">First Repayment</div>
                                <div class="col-md-7">07-08-2015</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5">Maturity Date</div>
                                <div class="col-md-7">01-08-2015</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5">Number of Installment</div>
                                <div class="col-md-7">1</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5">Repayment Freg</div>
                                <div class="col-md-7">Weekly</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5">Installment Amount</div>
                                <div class="col-md-7">37400</div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabRepayment">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="filters">
                                            <th>#</th>
                                            <th>Pay Date</th>
                                            <th>First Balanch</th>
                                            <th>Principle</th>
                                            <th>Total Payment</th>
                                            <th>Rate</th>
                                            <th>Saved Money</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><label class="pull-right">Total</label></td>
                                            <td>2334555</td>
                                            <td>345656</td>
                                            <td>34540</td>
                                            <td>0.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>   
</div>
<div class="row">
    <div class="form-group pull-right">
        <div class="col-md-12 col-xs-10"> <!-- col-xs-offset-2: for to left-->
            <button type="submit" class="btn btn-danger" disabled="disabled">Disapprove</button>
            <button type="submit" class="btn btn-primary">Approve</button>
            <button type="submit" class="btn btn-default">Exit</button>
        </div>
    </div>
</div>
<div class="row footer">&nbsp;</div>







<!-- <div class="container">
    <div class="page-header">
        <h1>Panels with nav tabs.<span class="pull-right label label-default">:)</span></h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab">Default 1</a></li>
                            <li><a href="#tab2default" data-toggle="tab">Default 2</a></li>
                            <li><a href="#tab3default" data-toggle="tab">Default 3</a></li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
                                    <li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
                                </ul>
                            </li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">Default 1</div>
                        <div class="tab-pane fade" id="tab2default">Default 2</div>
                        <div class="tab-pane fade" id="tab3default">Default 3</div>
                        <div class="tab-pane fade" id="tab4default">Default 4</div>
                        <div class="tab-pane fade" id="tab5default">Default 5</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1primary" data-toggle="tab">Primary 1</a></li>
                            <li><a href="#tab2primary" data-toggle="tab">Primary 2</a></li>
                            <li><a href="#tab3primary" data-toggle="tab">Primary 3</a></li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#tab4primary" data-toggle="tab">Primary 4</a></li>
                                    <li><a href="#tab5primary" data-toggle="tab">Primary 5</a></li>
                                </ul>
                            </li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">Primary 1</div>
                        <div class="tab-pane fade" id="tab2primary">Primary 2</div>
                        <div class="tab-pane fade" id="tab3primary">Primary 3</div>
                        <div class="tab-pane fade" id="tab4primary">Primary 4</div>
                        <div class="tab-pane fade" id="tab5primary">Primary 5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel with-nav-tabs panel-success">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1success" data-toggle="tab">Success 1</a></li>
                            <li><a href="#tab2success" data-toggle="tab">Success 2</a></li>
                            <li><a href="#tab3success" data-toggle="tab">Success 3</a></li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#tab4success" data-toggle="tab">Success 4</a></li>
                                    <li><a href="#tab5success" data-toggle="tab">Success 5</a></li>
                                </ul>
                            </li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1success">Success 1</div>
                        <div class="tab-pane fade" id="tab2success">Success 2</div>
                        <div class="tab-pane fade" id="tab3success">Success 3</div>
                        <div class="tab-pane fade" id="tab4success">Success 4</div>
                        <div class="tab-pane fade" id="tab5success">Success 5</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel with-nav-tabs panel-info">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1info" data-toggle="tab">Info 1</a></li>
                            <li><a href="#tab2info" data-toggle="tab">Info 2</a></li>
                            <li><a href="#tab3info" data-toggle="tab">Info 3</a></li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#tab4info" data-toggle="tab">Info 4</a></li>
                                    <li><a href="#tab5info" data-toggle="tab">Info 5</a></li>
                                </ul>
                            </li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1info">Info 1</div>
                        <div class="tab-pane fade" id="tab2info">Info 2</div>
                        <div class="tab-pane fade" id="tab3info">Info 3</div>
                        <div class="tab-pane fade" id="tab4info">Info 4</div>
                        <div class="tab-pane fade" id="tab5info">Info 5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel with-nav-tabs panel-warning">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1warning" data-toggle="tab">Warning 1</a></li>
                            <li><a href="#tab2warning" data-toggle="tab">Warning 2</a></li>
                            <li><a href="#tab3warning" data-toggle="tab">Warning 3</a></li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#tab4warning" data-toggle="tab">Warning 4</a></li>
                                    <li><a href="#tab5warning" data-toggle="tab">Warning 5</a></li>
                                </ul>
                            </li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1warning">Warning 1</div>
                        <div class="tab-pane fade" id="tab2warning">Warning 2</div>
                        <div class="tab-pane fade" id="tab3warning">Warning 3</div>
                        <div class="tab-pane fade" id="tab4warning">Warning 4</div>
                        <div class="tab-pane fade" id="tab5warning">Warning 5</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel with-nav-tabs panel-danger">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1danger" data-toggle="tab">Danger 1</a></li>
                            <li><a href="#tab2danger" data-toggle="tab">Danger 2</a></li>
                            <li><a href="#tab3danger" data-toggle="tab">Danger 3</a></li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#tab4danger" data-toggle="tab">Danger 4</a></li>
                                    <li><a href="#tab5danger" data-toggle="tab">Danger 5</a></li>
                                </ul>
                            </li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1danger">Danger 1</div>
                        <div class="tab-pane fade" id="tab2danger">Danger 2</div>
                        <div class="tab-pane fade" id="tab3danger">Danger 3</div>
                        <div class="tab-pane fade" id="tab4danger">Danger 4</div>
                        <div class="tab-pane fade" id="tab5danger">Danger 5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br/> -->
