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
    </div>  
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Panel 1</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
            </div>
            <div class="panel-body">Panel content</div>
        </div>
    </div>   
</div>


<div class="row">
    <form role="form">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="inputCustomerName">Customer Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="inputCustomerName" id="inputCustomerName" placeholder="Customer Name" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAccountNumber">Account Number Loan</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputAccountNumber" name="inputAccountNumber" placeholder="Account Number Loan" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAmountLoan">Amount Money Loan</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputAmountLoan" name="inputAmountLoan" placeholder="Amount Money Loan" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputRateDaily">Rate Daily</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputRateDaily" name="inputRateDaily" placeholder="Rate Daily" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputDurationLoan">Duration Loan</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputDurationLoan" name="inputDurationLoan" placeholder="Duration Loan" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputDateFirstPay">Date First Pay</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputDateFirstPay" name="inputDateFirstPay" placeholder="Date First Pay" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <div class="input-group">
                    <textarea name="address" id="address" class="form-control" rows="5" placeholder="Address" readonly required></textarea>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>

        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="inputAccountNumberServe">Account Number Serve</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="inputAccountNumberServe" id="inputAccountNumberServe" placeholder="Account Number Serve" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
            <div class="form-group">
                <label for="inputRatePaidTotal">Rate Paid Total</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputRatePaidTotal" name="inputRatePaidTotal" placeholder="Rate Paid Total" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputRatePaidTotalPriciple">Rate Paid Total + Priciple</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputRatePaidTotalPriciple" name="inputRatePaidTotalPriciple" placeholder="Rate Paid Total + Priciple" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAmountSavedTotal">Amount Saved Total</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="inputAmountSavedTotal" name="inputAmountSavedTotal" placeholder="Amount Saved Total" readonly required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                <div class="col-md-6">Signature of Creator</div>
                <div class="col-md-6">Finger Print of Customer</div>
                </div>
            </div>
            <!-- <div class="form-group">
                <label for="InputMessage">Enter Message</label>
                <div class="input-group">
                    <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" readonly required></textarea>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div> -->
            <!-- <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right"> -->
        </div>
    </form>
    <!-- <div class="clearfix"></div>
    <div class="col-lg-5 col-md-push-1">
        <div class="col-md-12">
            <div class="alert alert-success">
                <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
            </div>
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
            </div>
        </div>
    </div> -->
</div>






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
