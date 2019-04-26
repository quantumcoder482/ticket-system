{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="exampleInputEmail1">{$_L['Unique Invoice URL']}:</label>
                <input type="text" class="form-control" id="invoice_public_url" onClick="this.setSelectionRange(0, this.value.length)" value="{$_url}supplier/purchase_view/{$d['id']}/token_{$d['vtoken']}">
            </div>
        </div>
        <div class="col-lg-12"  id="application_ajaxrender">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Purchase']} - {$d['invoicenum']}{if $d['cn'] neq ''} {$d['cn']} {else} {$d['id']} {/if} </h5>
                    <input type="hidden" name="iid" value="{$d['id']}" id="iid">


                    <div class="btn-group  pull-right" role="group" aria-label="...">



                        <div class="btn-group" role="group">
                            <button type="button" class="btn  btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>  {$_L['Send Email']}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#" id="mail_invoice_created">{$_L['Invoice Created']}</a></li>
                                {*<li><a href="#" id="mail_invoice_reminder">{$_L['Invoice Payment Reminder']}</a></li>*}
                                {*<li><a href="#" id="mail_invoice_overdue">{$_L['Invoice Overdue Notice']}</a></li>*}
                                {*<li><a href="#" id="mail_invoice_confirm">{$_L['Invoice Payment Confirmation']}</a></li>*}
                                {*<li><a href="#" id="mail_invoice_refund">{$_L['Invoice Refund Confirmation']}</a></li>*}
                            </ul>
                        </div>


                        <div class="btn-group" role="group">
                            <button type="button" class="btn  btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>  {$_L['Mark As']}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">



                                {if $d['stage'] neq 'Pending'}
                                    <li><a href="#" id="mark_stage_pending" class="set_status">Pending</a></li>
                                {/if}
                                {if $d['stage'] neq 'Accepted'}
                                    <li><a href="#" id="mark_stage_accepted" class="set_status">Accepted</a></li>
                                {/if}

                                {if $d['stage'] neq 'Declined'}
                                    <li><a href="#" id="mark_stage_declined" class="set_status">Declined</a></li>
                                {/if}

                                {if $d['stage'] neq 'On Hold'}
                                    <li><a href="#" id="mark_stage_on_hold" class="set_status">On Hold</a></li>
                                {/if}

                                {if $d['stage'] neq 'Cancelled'}
                                    <li><a href="#" id="mark_stage_cancelled" class="set_status">Cancelled</a></li>
                                {/if}


                            </ul>
                        </div>


                        {if ($config['purchase_invoice_payment_status']) eq '1'}

                            <div class="btn-group" role="group">
                                <button type="button" class="btn  btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>  {$_L['Mark As']}
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">


                                    {if $d['status'] neq 'Paid'}
                                        <li><a href="#" id="mark_paid">{$_L['Paid']}</a></li>
                                    {/if}
                                    {if $d['status'] neq 'Unpaid'}
                                        <li><a href="#" id="mark_unpaid">{$_L['Unpaid']}</a></li>
                                    {/if}
                                    {if $d['status'] neq 'Partially Paid'}
                                        <li><a href="#" id="mark_partially_paid">{$_L['Partially Paid']}</a></li>
                                    {/if}
                                    {if $d['status'] neq 'Cancelled'}
                                        <li><a href="#" id="mark_cancelled">{$_L['Cancelled']}</a></li>
                                    {/if}


                                </ul>
                            </div>

                        {/if}


                        {if $config['accounting'] eq '1'}
                            <button type="button" class="btn  btn-danger btn-sm" id="add_payment"><i class="fa fa-calculator"></i> {$_L['Make Payment']}</button>
                        {/if}

                        <a href="{$_url}client/purchase_view/{$d['id']}/token_{$d['vtoken']}" target="_blank" class="btn btn-primary  btn-sm"><i class="fa fa-paper-plane-o"></i> {$_L['Preview']}</a>
                        <a href="{$_url}purchases/edit/{$d['id']}" class="btn btn-warning  btn-sm"><i class="fa fa-pencil"></i> {$_L['Edit']}</a>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn  btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-file-pdf-o"></i>
                                {$_L['PDF']}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{$_url}client/purchase_pdf/{$d['id']}/token_{$d['vtoken']}/view/" target="_blank">{$_L['View PDF']}</a></li>
                                <li><a href="{$_url}client/purchase_pdf/{$d['id']}/token_{$d['vtoken']}/dl/">{$_L['Download PDF']}</a></li>
                            </ul>
                        </div>

                        <a data-toggle="modal" href="#modal_add_item" class="btn btn-sm btn-green"><i class="fa fa-paperclip"></i> </a>
                        <a href="{$_url}purchases/clone/{$d['id']}/" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="{$_L['Clone']}"><i class="fa fa-files-o"></i> </a>
                        <a href="{$_url}supplier/purchase_print/{$d['id']}/token_{$d['vtoken']}" target="_blank" class="btn btn-inverse  btn-sm"><i class="fa fa-print"></i> {$_L['Print']}</a>


                    </div>

                </div>
                <div class="ibox-content">

                    {if $d['stage'] eq 'Lost'}
                        <div id="ribbon-alert-container">
                            <a href="javascript:void(0)" id="ribbon">{$_L['Lost']}</a>
                        </div>
                    {elseif $d['stage'] eq 'Accepted'}
                        <div id="ribbon-container">
                            <a href="javascript:void(0)" id="ribbon">{$_L['Accepted']}</a>

                        </div>
                    {elseif $d['stage'] eq 'Delivered'}
                        <div id="ribbon-container">
                            <a href="javascript:void(0)" id="ribbon">{$_L['Delivered']}</a>
                        </div>
                    {elseif $d['stage'] eq 'Draft'}
                        <div id="ribbon-container">
                            <a href="javascript:void(0)" id="ribbon">{$_L['Draft']}</a>
                        </div>
                    {elseif $d['stage'] eq 'Dead'}
                        <div id="ribbon-alert-container">
                            <a href="javascript:void(0)" id="ribbon">{$_L['Dead']}</a>
                        </div>
                    {elseif $d['stage'] eq 'On Hold'}
                        <div id="ribbon-alert-container">
                            <a href="javascript:void(0)" id="ribbon">{$_L['On Hold']}</a>
                        </div>

                    {else}
                        <div id="ribbon-container">

                            <a href="javascript:void(0)" id="ribbon">{$d['stage']}</a>
                        </div>
                    {/if}

                    <div class="invoice">
                        <header class="clearfix">
                            <div class="row">
                                <div class="col-sm-6 mt-md">
                                    <h2 class="h2 mt-none mb-sm text-dark text-bold">{$_L['Purchase']}</h2>
                                    <h4 class="h4 m-none text-dark text-bold">#{$d['invoicenum']}{if $d['cn'] neq ''} {$d['cn']} {else} {$d['id']} {/if}</h4>

                                    {if ($config['purchase_invoice_payment_status']) eq '1'}

                                        {if $d['status'] eq 'Unpaid'}
                                            <h3 class="alert alert-danger">{$_L['Unpaid']}</h3>
                                        {elseif $d['status'] eq 'Paid'}
                                            <h3 class="alert alert-success">{$_L['Paid']}</h3>
                                        {elseif $d['status'] eq 'Partially Paid'}
                                            <h3 class="alert alert-info">{$_L['Partially Paid']}</h3>
                                        {else}
                                            <h3 class="alert alert-info">{$d['status']}</h3>
                                        {/if}

                                    {/if}



                                    {if $config['invoice_receipt_number'] eq '1' && $d['receipt_number'] neq ''}
                                        <h4>{$_L['Receipt Number']}: {$d['receipt_number']}</h4>
                                        <hr>
                                    {/if}

                                </div>
                                <div class="col-sm-6 text-right" style="margin-top: 45px;">

                                    <div class="ib">
                                        <img src="{$app_url}storage/system/{$config['logo_default']}" alt="Logo" style="margin-bottom: 15px;">
                                    </div>

                                    <address class="ib mr-xlg">
                                        <strong>{$config['CompanyName']}</strong>
                                        <br>
                                        {$config['caddress']}
                                    </address>

                                </div>
                            </div>
                        </header>
                        <div class="bill-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="bill-to">
                                        <p class="h5 mb-xs text-dark text-semibold"><strong>{$_L['Supplier']}:</strong></p>
                                        <address>
                                            {if $a['company'] neq ''}
                                                {$a['company']}

                                                <br>

                                                {if $company && $config['show_business_number'] eq '1' }

                                                    {if $company->business_number neq ''}
                                                        {$config['label_business_number']}: {$company->business_number}
                                                        <br>
                                                    {/if}
                                                {/if}

                                                {$_L['ATTN']}: {$d['account']}
                                                <br>
                                            {else}
                                                {$d['account']}
                                                <br>
                                            {/if}

                                            {$a['address']} <br>
                                            {$a['city']} <br>
                                            {$a['state']} - {$a['zip']} <br>
                                            {$a['country']}
                                            <br>
                                            <strong>{$_L['Phone']}:</strong> {$a['phone']}
                                            {if $config['fax_field'] neq '0' && $a['fax'] neq ''}
                                                <br>
                                                <strong>{$_L['Fax']}:</strong> {$a['fax']}
                                            {/if}
                                            <br>
                                            <strong>{$_L['Email']}:</strong> {$a['email']}
                                            {foreach $cf as $cfs}
                                                <br>
                                                <strong>{$cfs['fieldname']}: </strong> {get_custom_field_value($cfs['id'],$a['id'])}
                                            {/foreach}

                                            {$x_html}
                                        </address>





                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bill-data text-right">
                                        <p class="mb-none">
                                            <span class="text-dark">{$_L['Issued at']}:</span>
                                            <span class="value">{date( $config['df'], strtotime($d['date']))}</span>
                                        </p>
                                        {*<p class="mb-none">*}
                                            {*<span class="text-dark">{$_L['Due Date']}:</span>*}
                                            {*<span class="value">{date( $config['df'], strtotime($d['duedate']))}</span>*}
                                        {*</p>*}
                                        <h2> {$_L['Invoice Total']}: <span class="amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$config['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$d['total']}</span> </h2>
                                        {if ($d['credit']) neq '0.00'}
                                            <h2> {$_L['Total Paid']}:  <span class="amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$config['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$d['credit']}</span> </h2>
                                            {*<h2> {$_L['Amount Due']}: {$config['currency_code']} {number_format($i_due,2,$config['dec_point'],$config['thousands_sep'])} </h2>*}
                                            <h2> {$_L['Amount Due']}: <span class="amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$config['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$i_due}</span> </h2>
                                        {/if}
                                    </div>
                                </div>
                            </div>

                            {if $d['subject'] neq ''}
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr>

                                        <strong>{$d['subject']}</strong>

                                        <hr>

                                    </div>
                                </div>
                            {/if}

                        </div>

                        <div class="table-responsive">
                            <table class="table invoice-items">
                                <thead>
                                <tr class="h4 text-dark">
                                    <th id="cell-id" class="text-semibold">#</th>
                                    <th id="cell-item" class="text-semibold">{$_L['Item']}</th>

                                    <th id="cell-price" class="text-center text-semibold">{$_L['Price']}</th>
                                    {*<th id="cell-qty" class="text-center text-semibold">{$_L['Quantity']}</th>*}
                                    <th id="cell-qty" class="text-center text-semibold">{if $d['show_quantity_as'] eq '' || $d['show_quantity_as'] eq '1'}{$_L['Qty']}{else}{$d['show_quantity_as']}{/if}</th>
                                    <th id="cell-total" class="text-center text-semibold">{$_L['Total']}</th>
                                </tr>
                                </thead>
                                <tbody>

                                {foreach $items as $item}
                                    <tr>
                                        <td>{$item['itemcode']}</td>
                                        <td class="text-semibold text-dark">{$item['description']}</td>

                                        <td class="text-center amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$config['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$item['amount']}</td>
                                        <td class="text-center">{$item['qty']}</td>
                                        <td class="text-center amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$config['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$item['total']}</td>
                                    </tr>
                                {/foreach}

                                </tbody>
                            </table>
                        </div>

                        <div class="invoice-summary">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-8">
                                    <table class="table h5 text-dark">
                                        <tbody>
                                        <tr class="b-top-none">
                                            <td colspan="2">{$_L['Subtotal']}</td>
                                            <td class="text-left amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$config['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$d['subtotal']}</td>
                                        </tr>
                                        {if ($d['discount']) neq '0.00'}
                                            <tr>
                                                <td colspan="2">{$_L['Discount']}</td>
                                                <td class="text-left amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$config['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$d['discount']}</td>
                                            </tr>
                                        {/if}
                                        <tr>
                                            <td colspan="2">{$_L['TAX']}</td>
                                            <td class="text-left amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$config['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$d['tax']}</td>
                                        </tr>
                                        {if ($d['credit']) neq '0.00'}
                                            <tr>
                                                <td colspan="2">{$_L['Total']}</td>
                                                <td class="text-left amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$config['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$d['total']}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">{$_L['Total Paid']}</td>
                                                <td class="text-left amount">{$d['credit']}</td>
                                            </tr>
                                            <tr class="h4">
                                                <td colspan="2">{$_L['Amount Due']}</td>
                                                {*<td class="text-left">{$config['currency_code']} {number_format($i_due,2,$config['dec_point'],$config['thousands_sep'])}</td>*}
                                                <td class="text-left amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$config['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$i_due}</td>
                                            </tr>
                                        {else}
                                            <tr class="h4">
                                                <td colspan="2">{$_L['Grand Total']}</td>
                                                <td class="text-left amount" data-a-sign="{if $d['currency_symbol'] eq ''} {$config['currency_code']} {else} {$d['currency_symbol']}{/if} ">{$d['total']}</td>
                                            </tr>
                                        {/if}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {if ($trs_c neq '')}
                        <h3>{$_L['Related Transactions']}</h3>
                        <table class="table table-bordered sys_table">
                            <th>{$_L['Date']}</th>
                            <th>{$_L['Account']}</th>


                            <th class="text-right">{$_L['Amount']}</th>

                            <th>{$_L['Description']}</th>




                            {foreach $trs as $tr}
                                <tr class="{if $tr['cr'] eq '0.00'}warning {else}info{/if}">
                                    <td>{date( $config['df'], strtotime($tr['date']))}</td>
                                    <td>{$tr['account']}</td>


                                    <td class="text-right amount" data-a-sign="{if $tr['currency_symbol'] eq ''} {$config['currency_code']} {else} {$tr['currency_symbol']}{/if} ">{$tr['amount']}</td>
                                    <td>{$tr['description']}</td>




                                </tr>
                            {/foreach}



                        </table>
                    {/if}

                    {if $inv_files_c neq ''}

                        <table class="table table-bordered table-hover sys_table">
                            <thead>
                            <tr>
                                <th class="text-right" data-sort-ignore="true" width="20px;">{$_L['Type']}</th>

                                <th>{$_L['File']}</th>

                                <th class="text-right" data-sort-ignore="true" width="170px;">{$_L['Download']}</th>
                            </tr>
                            </thead>
                            <tbody>

                            {foreach $inv_files as $ds}

                                <tr>

                                    <td>
                                        {if $ds['file_mime_type'] eq 'jpg' || $ds['file_mime_type'] eq 'png' || $ds['file_mime_type'] eq 'gif'}
                                            <i class="fa fa-file-image-o"></i>
                                        {elseif $ds['file_mime_type'] eq 'pdf'}
                                            <i class="fa fa-file-pdf-o"></i>
                                        {elseif $ds['file_mime_type'] eq 'zip'}
                                            <i class="fa fa-file-archive-o"></i>
                                        {else}
                                            <i class="fa fa-file"></i>
                                        {/if}
                                    </td>


                                    <td>

                                        {$ds['title']}

                                        {if $ds['file_mime_type'] eq 'jpg' || $ds['file_mime_type'] eq 'png' || $ds['file_mime_type'] eq 'gif'}

                                            <hr>

                                            <img src="{$app_url}storage/docs/{$ds['file_path']}" class="img-responsive" alt="{$ds['title']}">

                                        {/if}

                                    </td>

                                    <td class="text-right">

                                        <a href="{$_url}client/dl/{$ds['id']}_{$ds['file_dl_token']}/" class="md-btn md-btn-primary"><i class="fa fa-download"></i> {$_L['Download']}</a>

                                    </td>


                                </tr>

                            {/foreach}

                            </tbody>



                        </table>

                    {/if}

                    {if ($d['notes']) neq ''}
                        <div class="well m-t">
                            {$d['notes']}
                        </div>
                    {/if}

                    {if ($emls_c neq '')}
                        <hr>
                        <h3>{$_L['Related Emails']}</h3>
                        <table class="table table-bordered sys_table">
                            <th width="20%">{$_L['Date']}</th>
                            <th>{$_L['Subject']}</th>







                            {foreach $emls as $eml}
                                <tr>
                                    <td>{date( $config['df'], strtotime($eml['date']))}</td>
                                    <td>{$eml['subject']}</td>
                                </tr>
                            {/foreach}



                        </table>
                    {/if}


                    {if count($access_logs) neq 0}
                        <hr>
                        <h3>{$_L['Customer']} : {$_L['Access Log']}</h3>
                        <table class="table table-bordered sys_table">
                            <th>{$_L['Time']}</th>
                            <th>{$_L['IP']}</th>
                            <th>{$_L['Country']}</th>
                            <th>{$_L['City']}</th>
                            <th>{$_L['Browser']}</th>

                            {foreach $access_logs as $log}
                                <tr>
                                    <td>{date( $config['df']|cat:' H:i:s', strtotime($log['viewed_at']))}</td>
                                    <td>{$log['ip']}</td>
                                    <td>{$log['country']}</td>
                                    <td>{$log['city']}</td>
                                    <td>{$log['browser']}</td>
                                </tr>
                            {/foreach}



                        </table>
                    {/if}



                </div>


            </div>
        </div>
    </div>

    <div id="modal_add_item" class="modal fade" tabindex="-1" data-width="760" style="display: none;">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">{$_L['New Document']}</h4>
        </div>
        <div class="modal-body">
            <div class="row">

                <div class="col-md-12">

                    <form>
                        <div class="form-group">
                            <label for="doc_title">{$_L['Title']}</label>
                            <input type="text" class="form-control" id="doc_title" name="doc_title">

                        </div>



                    </form>

                    <form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  {$_L['Drop File Here']}</h3>
                            <br />
                            <span class="note">{$_L['Click to Upload']}</span>
                        </div>

                    </form>
                    <hr>
                    <h4>{$_L['Server Config']}:</h4>
                    <p>{$_L['Upload Maximum Size']}: {$upload_max_size}</p>
                    <p>{$_L['POST Maximum Size']}: {$post_max_size}</p>

                </div>






            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="file_link" id="file_link" value="">
            <button type="button" data-dismiss="modal" class="btn btn-danger">{$_L['Close']}</button>
            <button type="button" id="btn_add_file" class="btn btn-primary">{$_L['Submit']}</button>
        </div>

    </div>

    <input type="hidden" id="_lan_msg_confirm" value="{$_L['are_you_sure']}">
    <input type="hidden" id="admin_email" value="{$user->username}">


{/block}

{block name="script"}
    <script>


        Dropzone.autoDiscover = false;
        $(document).ready(function () {

            $.fn.modal.defaults.width = '700px';

            var _url = $("#_url").val();

            var $modal = $('#ajax-modal');


            var sysrender = $('#application_ajaxrender');



            var iid = $("#iid").val();
            sysrender.on('click', '#add_payment', function(e){
                e.preventDefault();


                $('body').modalmanager('loading');

                $modal.load( _url + 'purchases/add-payment/' + iid, '', function(){
                    $modal.modal();
                    $('.amount').autoNumeric('init');
                    $(".datepicker").datepicker();
                    $("#account").select2({
                        theme: "bootstrap"
                    });
                    $("#cats").select2({
                        theme: "bootstrap"
                    });
                    $("#pmethod").select2({
                        theme: "bootstrap"
                    });




                });

            });


            sysrender.on('click', '#mail_invoice_created', function(e){
                e.preventDefault();
                var iid = $("#iid").val();

                $('body').modalmanager('loading');

                $modal.load( _url + 'purchases/mail_invoice_/' + iid + '/created', '', function(){
                    $modal.modal();
                    $('.sysedit').summernote({

                    });
                });


            });

            sysrender.on('click', '#mail_invoice_reminder', function(e){
                e.preventDefault();
                var iid = $("#iid").val();

                $('body').modalmanager('loading');

                $modal.load( _url + 'purchases/mail_invoice_/' + iid + '/reminder', '', function(){
                    $modal.modal();
                    $('.sysedit').summernote({

                    });
                });

            });

            sysrender.on('click', '#mail_invoice_overdue', function(e){
                e.preventDefault();
                var iid = $("#iid").val();

                $('body').modalmanager('loading');


                $modal.load( _url + 'purchases/mail_invoice_/' + iid + '/overdue', '', function(){
                    $modal.modal();
                    $('.sysedit').summernote({

                    });
                });


            });

            sysrender.on('click', '#mail_invoice_confirm', function(e){
                e.preventDefault();
                var iid = $("#iid").val();

                $('body').modalmanager('loading');

                $modal.load( _url + 'purchases/mail_invoice_/' + iid + '/confirm', '', function(){
                    $modal.modal();
                    $('.sysedit').summernote({

                    });
                });

            });

            sysrender.on('click', '#mail_invoice_refund', function(e){
                e.preventDefault();
                var iid = $("#iid").val();

                $('body').modalmanager('loading');
                $modal.load( _url + 'purchases/mail_invoice_/' + iid + '/refund', '', function(){
                    $modal.modal();
                    $('.sysedit').summernote({

                    });
                });
            });





            $modal.on('click', '#send', function(){
                $modal.modal('loading');

                var attach_pdf = 'No';

                if($("#attach_pdf").prop('checked') == true){
                    attach_pdf = 'Yes';
                }



                var _url = $("#_url").val();
                $.post(_url + 'invoices/send_email', {


                    message: $('.sysedit').code(),
                    subject: $('#subject').val(),

                    toname: $('#toname').val(),
                    i_cid: $('#i_cid').val(),
                    i_iid: $('#i_iid').val(),
                    toemail: $('#toemail').val(),
                    ccemail: $('#ccemail').val(),
                    bccemail: $('#bccemail').val(),
                    attach_pdf: attach_pdf

                }).done(function (data) {
                    var _url = $("#_url").val();
                    $modal
                        .modal('loading')
                        .find('.modal-body')
                        .prepend(data);
                });

            });

            $modal.on('click', '#save_payment', function(){
                $modal.modal('loading');

                var _url = $("#_url").val();
                $.post(_url + 'purchases/add-payment-post', $("#form_add_payment").serialize())

                    .done(function (data) {

                        var _url = $("#_url").val();
                        if ($.isNumeric(data)) {
                            location.reload();
                        }
                        else {
                            $modal
                                .modal('loading')
                                .find('.modal-body')
                                .prepend(data);
                        }
                    });

            });


            $(".set_status").click(function (e) {
                e.preventDefault();

                var curr_stage_id = this.id;

                bootbox.confirm($("#_lan_msg_confirm").val(), function(result) {
                    if(result){
                        var iid = $("#iid").val();
                        $.post(  _url + "purchases/set_stage/"+ curr_stage_id, { iid: iid })
                            .done(function( data ) {
                                location.reload();
                               // console.log(data);
                            });
                    }
                });

            });

            $("#mark_paid").click(function (e) {
                e.preventDefault();


                bootbox.confirm($("#_lan_msg_confirm").val(), function(result) {
                    if(result){
                        var iid = $("#iid").val();
                        $.post(  _url + "purchases/markpaid", { iid: iid })
                            .done(function( data ) {
                                location.reload();
                            });
                    }
                });

            });


            $("#mark_unpaid").click(function (e) {
                e.preventDefault();


                bootbox.confirm($("#_lan_msg_confirm").val(), function(result) {
                    if(result){
                        var iid = $("#iid").val();
                        $.post(  _url + "purchases/markunpaid", { iid: iid })
                            .done(function( data ) {
                                location.reload();
                            });
                    }
                });

            });

            $("#mark_cancelled").click(function (e) {
                e.preventDefault();
                bootbox.confirm($("#_lan_msg_confirm").val(), function(result) {
                    if(result){
                        var iid = $("#iid").val();
                        $.post(  _url + "purchases/markcancelled", { iid: iid })
                            .done(function( data ) {
                                location.reload();
                            });
                    }
                });

            });

            $("#mark_partially_paid").click(function (e) {
                e.preventDefault();
                bootbox.confirm($("#_lan_msg_confirm").val(), function(result) {
                    if(result){
                        var iid = $("#iid").val();
                        $.post(  _url + "purchases/markpartiallypaid", { iid: iid })
                            .done(function( data ) {
                                location.reload();
                            });
                    }
                });

            });



            $modal.on('click', '#send_bcc_to_admin', function(e){

                e.preventDefault();


                $("#bccemail").val($("#admin_email").val());

            });

            $modal.on('hidden.bs.modal', function () {
                location.reload();
            });



            // attach file






            $('[data-toggle="tooltip"]').tooltip();

            var $btn_add_file = $("#btn_add_file");

            var $file_link = $("#file_link");

            var upload_resp;




            var ib_file = new Dropzone("#upload_container",
                {
                    url: _url + "documents/upload/",
                    maxFiles: 1
                }
            );


            ib_file.on("sending", function() {

                $btn_add_file.prop('disabled', true);

            });

            ib_file.on("success", function(file,response) {

                $btn_add_file.prop('disabled', false);

                upload_resp = response;

                if(upload_resp.success == 'Yes'){

                    toastr.success(upload_resp.msg);
                    $file_link.val(upload_resp.file);


                }
                else{
                    toastr.error(upload_resp.msg);
                }


            });




            var $doc_title = $("#doc_title");


            $btn_add_file.on('click', function(e) {
                e.preventDefault();


                $.post( _url + "documents/post/", { title: $doc_title.val(), file_link: $file_link.val(), rid: iid, rtype: 'invoice' })
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            location.reload();

                        }

                        else {
                            toastr.error(data);
                        }




                    });


            });



        });



    </script>
{/block}