<?php
/* Smarty version 3.1.33, created on 2019-03-25 18:16:46
  from '/Users/razib/Documents/valet/suite/apps/bpr/views/tickets_admin_create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c99534ec87668_46377142',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ba0e88a4707969dabfebcc4e915037361857b35' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/bpr/views/tickets_admin_create.tpl',
      1 => 1553552202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c99534ec87668_46377142 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5625239555c99534ec7b247_95377970', "content");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3481234625c99534ec85d59_55702369', "script");
}
/* {block "content"} */
class Block_5625239555c99534ec7b247_95377970 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_5625239555c99534ec7b247_95377970',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">



                <div class="panel-body" style="font-size: 14px;">
                    <div>

                        <h3>Create new Ticket</h3>
                        <div class="hr-line-dashed"></div>


                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/tickets/create_post/" id="iform" name="iform">


                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="cid"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Customer'];?>
</label>

                                        <select id="cid" name="cid" class="form-control">
                                            <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Customer'];?>
...</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customers']->value, 'cs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->value) {
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
"
                                                        <?php if ($_smarty_tpl->tpl_vars['p_cid']->value == ($_smarty_tpl->tpl_vars['cs']->value['id'])) {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['cs']->value['account'];?>
 <?php if ($_smarty_tpl->tpl_vars['cs']->value['email'] != '') {?>- <?php echo $_smarty_tpl->tpl_vars['cs']->value['email'];
}?></option>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                        </select>

                                        <a href="javascript:;" id="contact_add" class="btn  btn-inverse btn-sm" style="margin-top: 25px;">Create New Partner</a>

                                    </div>

                                                                                                                                                                                        </div>
                                <div class="col-md-7">

                                    <div style="background: #cadffa; padding-left: 15px; padding-right: 15px; padding-top: 15px; border-radius: 5px;">


                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label>End User</label>
                                                            <select class="form-control" id="end_Customer" name="end_customer" size="1">
                                                                <option value="">Choose one...</option>
                                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['end_users']->value, 'end_user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['end_user']->value) {
?>
                                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['end_user']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['end_user']->value->name;?>
 (<?php echo $_smarty_tpl->tpl_vars['end_user']->value->type;?>
)</option>
                                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="javascript:;" id="end_user_add" class="btn  btn-inverse btn-sm" style="margin-top: 25px;">Create New End User</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Contact Name</label>
                                                    <input class="form-control" id="inputContactPerson" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>End User Address</label>
                                                    <input class="form-control" id="end_user_address" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" id="end_user_email" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input class="form-control" id="end_user_phone" disabled>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>End User State</label>
                                                    <input class="form-control" id="end_user_state" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>End User Zip Code</label>
                                                    <input class="form-control" id="end_user_zip" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Extension</label>
                                                    <input class="form-control" id="end_user_office_phone_extension" disabled>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="department">System make</label>
                                                    <select class="form-control" id="department" name="department" size="1">

                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['deps']->value, 'dep');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dep']->value) {
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['dep']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dep']->value['dname'];?>
</option>
                                                            <?php
}
} else {
?>
                                                            <option value="0"><?php echo $_smarty_tpl->tpl_vars['_L']->value['None'];?>
</option>
                                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="model">Model</label>
                                                    <input class="form-control" name="model" id="end_user_model">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>






                            <div class="row" style="padding-top: 20px;">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="subject"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Subject'];?>
</label>
                                        <input type="text" class="form-control" id="subject" name="subject">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">

                                        <label for="urgency"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Priority'];?>
</label>
                                        <select class="form-control" id="urgency" name="urgency" size="1">
                                            <option value="High"><?php echo $_smarty_tpl->tpl_vars['_L']->value['High'];?>
</option>
                                            <option value="Medium" selected><?php echo $_smarty_tpl->tpl_vars['_L']->value['Medium'];?>
</option>
                                            <option value="Low"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Low'];?>
</option>

                                        </select>

                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="message"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</label>
                                <textarea id="message"  class="form-control sysedit" name="message"></textarea>
                                <div class="help-block"><a data-toggle="modal" href="#modal_add_item"><i class="fa fa-paperclip"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Attach File'];?>
</a> </div>
                            </div>

                            <?php if ($_smarty_tpl->tpl_vars['config']->value['recaptcha'] == '1') {?>
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['config']->value['recaptcha_sitekey'];?>
"></div>
                                </div>
                            <?php }?>

                            <input type="hidden" name="attachments" id="attachments" value="">
                            <button type="submit" id="ib_form_submit" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                        </form>


                    </div>




                </div>

            </div>
        </div>
                                                                    </div>

    <div id="modal_add_item" class="modal fade" tabindex="-1" data-width="600" style="display: none;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Attach File'];?>
</h4>
        </div>
        <div class="modal-body">
            <div class="row">



                <div class="col-md-12">
                    <form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  <?php echo $_smarty_tpl->tpl_vars['_L']->value['Drop File Here'];?>
</h3>
                            <br />
                            <span class="note"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Click to Upload'];?>
</span>
                        </div>

                    </form>


                </div>




            </div>
        </div>
        <div class="modal-footer">

            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>

        </div>
    </div>

<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_3481234625c99534ec85d59_55702369 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_3481234625c99534ec85d59_55702369',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        Dropzone.autoDiscover = false;
        $(function() {

            var _url = $("#_url").val();

            var $ib_form_submit = $("#ib_form_submit");

            var $create_ticket = $("#create_ticket");
            var $ib_box = $("#ib_box");

            var $cid = $("#cid");
            var $endCustomerDiv = $('#endCustomerDiv');

            $.fn.modal.defaults.width = '700px';

            var $modal = $('#ajax-modal');

            $cid.select2({
                    theme: "bootstrap"
                }
            ).on('change',function () {

                // $.get( _url + "bpr/admin/get_end_customers/"+$cid.val(), function( data ) {
                //     $endCustomerDiv.html( data );
                //     $endCustomerDiv.show('slow');
                // });
            });

            $('.sysedit').summernote({
                height: 300,
                placeholder: 'Please enter the complete description of the problem...',
                toolbar: [
                    ['style', ['style']], // no style button
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],

                    ['table', ['table']], // no table button
                    ['view', ['codeview']], // no table button
                    //['help', ['help']] //no help button
                ]
            });


            var upload_resp;

            var $end_Customer = $('#end_Customer');

            function update_address() {

                var cid = $end_Customer.val();
                if (cid != '') {
                    $.post(base_url + 'bpr/admin/json-get-end-customer/', {
                        cid: cid

                    })
                        .done(function (data) {
                            $('#end_user_address').val(data.address);
                            $('#end_user_email').val(data.email);
                            $('#end_user_phone').val(data.phone);
                            $('#end_user_zip').val(data.zip);
                            $('#end_user_state').val(data.state);
                            $('#end_user_office_phone_extension').val(data.office_phone_extension);
                            $('#end_user_model').val(data.model);
                            $('#department').val(data.department_id);
                            $('#inputContactPerson').val(data.name);

                        });
                }

            }

            $end_Customer.on('change',function () {
                update_address();
            });


            var ib_file = new Dropzone("#upload_container",
                {
                    url: _url + "admin/tickets/upload_file/",
                    maxFiles: 10,
                    acceptedFiles: "image/jpeg,image/png,image/gif"
                }
            );


            ib_file.on("sending", function() {

                $ib_form_submit.prop('disabled', true);

            });

            ib_file.on("success", function(file,response) {

                $ib_form_submit.prop('disabled', false);

                upload_resp = response;

                if(upload_resp.success == 'Yes'){

                    toastr.success(upload_resp.msg);
                    // $file_link.val(upload_resp.file);
                    // files.push(upload_resp.file);
                    //
                    // console.log(files);

                    $('#attachments').val(function(i,val) {
                        return val + (!val ? '' : ',') + upload_resp.file;
                    });


                }
                else{
                    toastr.error(upload_resp.msg);
                }


            });

            $('#end_user_add').on('click', function (e) {
                e.preventDefault();
                // create the backdrop and wait for next modal to be triggered
                $('body').modalmanager('loading');

                $modal.load(_url + 'bpr/admin/modal_add_end_user', '', function () {
                    $modal.modal();
                });
            });

            $ib_form_submit.on('click', function(e) {
                e.preventDefault();
                $ib_box.block({ message: block_msg });

                $.post( "<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
bpr/admin/ticket-post", { cid: $cid.val() ,end_customer: $('#end_Customer').val(), model: $('#model').val() ,subject: $("#subject").val(), department: $("#department").val(), urgency: $("#urgency").val(), message: $('.sysedit').code(), attachments: $("#attachments").val()} ).done(function(data) {
                    window.location = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
bpr/admin/ticket-view/' + data.id;
                }).fail(function(data) {
                    toastr.error(data.responseText);
                });



            });


            $modal.on('click', '.btnEndUser', function(e){

                e.preventDefault();

                $modal.modal('loading');

                $.post( "<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
bpr/admin/end-user-post", $('#formEndUser').serialize() ).done(function(data) {

                    $modal.modal('loading');
                    $modal.modal('toggle');

                    $end_Customer.append('<option value="'+data.id+'">'+data.name+' ('+data.type+')</option>');

                    $end_Customer.val(data.id);

                    update_address();



                }).fail(function(data) {
                    $modal.modal('loading');
                    spNotify(data.responseText,'error');
                });

            });


            $('#contact_add').on('click', function (e) {
                e.preventDefault();
                // create the backdrop and wait for next modal to be triggered
                $('body').modalmanager('loading');

                $modal.load(_url + 'bpr/admin/modal_add_partner', '', function () {
                    $modal.modal();
                });
            });




        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
