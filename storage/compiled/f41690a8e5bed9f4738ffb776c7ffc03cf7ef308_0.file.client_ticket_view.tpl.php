<?php
/* Smarty version 3.1.33, created on 2019-02-26 07:49:13
  from '/Users/razib/Documents/valet/suite/apps/bpr/views/client_ticket_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c7535c9b48147_31420482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f41690a8e5bed9f4738ffb776c7ffc03cf7ef308' => 
    array (
      0 => '/Users/razib/Documents/valet/suite/apps/bpr/views/client_ticket_view.tpl',
      1 => 1551185351,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c7535c9b48147_31420482 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13970235485c7535c9b36177_44365908', "style");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12750216185c7535c9b37993_34414689', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12661042685c7535c9b46fc4_40469590', "script");
}
/* {block "style"} */
class Block_13970235485c7535c9b36177_44365908 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_13970235485c7535c9b36177_44365908',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/dropzone/dropzone.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/sn/summernote.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/sn/summernote-bs3.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/modal.css" />
<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_12750216185c7535c9b37993_34414689 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12750216185c7535c9b37993_34414689',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <!-- row -->
    <div class="row">
        <div class="col-md-4">
            <div class="panel">
                <div class="panel-body">
                    <?php if ($_smarty_tpl->tpl_vars['end_user']->value) {?>
                        <h3><?php echo $_smarty_tpl->tpl_vars['end_user']->value->company;?>
</h3>
                        <address>
                            <strong>Contact Name:</strong> <?php echo $_smarty_tpl->tpl_vars['end_user']->value->name;?>
 <br>
                            <strong>Email: </strong> <a href="mailto:#<?php echo $_smarty_tpl->tpl_vars['end_user']->value->email;?>
"><?php echo $_smarty_tpl->tpl_vars['end_user']->value->email;?>
</a><br>
                            <strong>Address: </strong> <br>
                            <?php echo $_smarty_tpl->tpl_vars['end_user']->value->address;?>
<br>
                            <?php echo $_smarty_tpl->tpl_vars['end_user']->value->city;?>
, <?php echo $_smarty_tpl->tpl_vars['end_user']->value->state;?>
 <?php echo $_smarty_tpl->tpl_vars['end_user']->value->zip;?>
<br> <br>
                            <strong>Phone:</strong> <?php echo $_smarty_tpl->tpl_vars['end_user']->value->office_phone;?>
 <?php if ($_smarty_tpl->tpl_vars['end_user']->value->office_phone_extension != '') {?> <strong>Extension: </strong>  <?php echo $_smarty_tpl->tpl_vars['end_user']->value->office_phone_extension;?>
 <?php }?>

                        </address>


                    <?php }?>
                    <div class="hr-line-dashed"></div>
                    <h3>System Info</h3>
                    <strong>Brand: </strong> <?php echo $_smarty_tpl->tpl_vars['ticket']->value->dname;?>
<br>
                    <strong>Model: </strong> <?php echo $_smarty_tpl->tpl_vars['end_user']->value->model;?>

                </div>
            </div>
        </div>
        <div class="col-md-8" id="create_ticket">

            <h3><?php echo $_smarty_tpl->tpl_vars['ticket']->value->subject;?>
</h3>


            <!-- The time line -->
            <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="mmnt">
                    <?php echo strtotime($_smarty_tpl->tpl_vars['ticket']->value->created_at);?>

                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    
                    <?php if ($_smarty_tpl->tpl_vars['user']->value['img'] == 'gravatar') {?>
                        <img src="http://www.gravatar.com/avatar/<?php echo md5(($_smarty_tpl->tpl_vars['user']->value['email']));?>
?s=30" class="img-time-line" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
                    <?php } elseif ($_smarty_tpl->tpl_vars['user']->value['img'] == '') {?>
                        <img class="img-time-line" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/default-user-avatar.png" alt="">
                    <?php } else { ?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['img'];?>
" class="img-time-line" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['account'];?>
">
                    <?php }?>

                    <div class="timeline-item">
                        
                        <h3 class="timeline-header"><a href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['ticket']->value->account;?>
</a></h3>

                        <div class="timeline-body">
                            <?php echo $_smarty_tpl->tpl_vars['ticket']->value->message;?>

                        </div>

                        <?php if (($_smarty_tpl->tpl_vars['ticket']->value->attachments) != '') {?>
                            <div class="timeline-footer">
                                <?php echo Tickets::gen_link_attachments($_smarty_tpl->tpl_vars['ticket']->value->attachments);?>

                            </div>
                        <?php }?>


                    </div>
                </li>

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['replies']->value, 'reply');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['reply']->value) {
?>
                    <li class="time-label">
                  <span class="mmnt">
                    <?php echo strtotime($_smarty_tpl->tpl_vars['reply']->value['created_at']);?>

                  </span>
                    </li>
                    <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                            
                            <h3 class="timeline-header"><a href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['reply']->value['replied_by'];?>
</a></h3>

                            <div class="timeline-body">
                                <?php echo $_smarty_tpl->tpl_vars['reply']->value['message'];?>

                            </div>

                            <?php if (($_smarty_tpl->tpl_vars['reply']->value['attachments']) != '') {?>
                                <div class="timeline-footer">
                                    <?php echo Tickets::gen_link_attachments($_smarty_tpl->tpl_vars['reply']->value['attachments']);?>

                                </div>
                            <?php }?>


                        </div>
                    </li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                <!-- END timeline item -->
                <!-- timeline item -->
                <li class="time-label">
                  <span>
                   <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Reply'];?>

                  </span>
                </li>
                <li>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value['img'] == 'gravatar') {?>
                        <img src="http://www.gravatar.com/avatar/<?php echo md5(($_smarty_tpl->tpl_vars['user']->value['email']));?>
?s=30" class="img-time-line" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['fullname'];?>
">
                    <?php } elseif ($_smarty_tpl->tpl_vars['user']->value['img'] == '') {?>
                        <img class="img-time-line" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/imgs/default-user-avatar.png" alt="">
                    <?php } else { ?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['img'];?>
" class="img-time-line" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['account'];?>
">
                    <?php }?>

                    <div class="timeline-item">



                        <div class="timeline-body">
                            <form id="create_ticket" class="form-horizontal push-10-t push-10" method="post">




                                <div class="form-group">
                                    <div class="col-xs-12">

                                        <textarea id="content"  class="form-control sysedit" name="content"></textarea>
                                        <div class="help-block"><a data-toggle="modal" href="#modal_add_item"><i class="fa fa-paperclip"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Attach File'];?>
</a> </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">

                                        <input type="hidden" name="attachments" id="attachments" value="">
                                        <input type="hidden" name="f_tid" id="f_tid" value="<?php echo $_smarty_tpl->tpl_vars['ticket']->value->id;?>
">

                                        <button class="btn btn-primary" id="ib_form_submit" type="submit"><i class="fa fa-send push-5-r"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                                                                                                                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->

                <!-- END timeline item -->
                <!-- timeline time label -->

                <!-- /.timeline-label -->
                <!-- timeline item -->

                <!-- END timeline item -->
                <!-- timeline item -->

                <!-- END timeline item -->
                <li>
                    <i class="fa fa-life-ring bg-gray"></i>
                </li>
            </ul>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


    <div id="modal_add_item" class="modal fade" tabindex="-1" data-width="600" style="display: none;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Add File</h4>
        </div>
        <div class="modal-body">
            <div class="row">



                <div class="col-md-12">
                    <form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  Drop File Here</h3>
                            <br />
                            <span class="note">Or Click to Upload</span>
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
class Block_12661042685c7535c9b46fc4_40469590 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_12661042685c7535c9b46fc4_40469590',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/modal.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/dropzone/dropzone.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/sn/summernote.min.js"><?php echo '</script'; ?>
>



    <?php echo '<script'; ?>
>
        var files = [];
        Dropzone.autoDiscover = false;
        $(function () {

            $( ".mmnt" ).each(function() {
                //   alert($( this ).html());
                var ut = $( this ).html();
                $( this ).html(moment.unix(ut).fromNow());
            });

            var _url = $("#_url").val();

            var $ib_form_submit = $("#ib_form_submit");

            var $create_ticket = $("#create_ticket");


            $('.sysedit').summernote({
                height: 300,
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


            var ib_file = new Dropzone("#upload_container",
                {
                    url: _url + "client/tickets/upload_file/",
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



            $ib_form_submit.on('click', function(e) {
                e.preventDefault();
                $create_ticket.block({ message: block_msg });
                $.post( _url + "client/tickets/add_reply/", {  message: $('.sysedit').code(), attachments: $("#attachments").val(), f_tid: $("#f_tid").val()} )
                    .done(function( data ) {

                        if(data.success == "Yes"){
                            location.reload();
                        }

                        else {
                            $create_ticket.unblock();
                            toastr.error(data.msg);
                        }

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
