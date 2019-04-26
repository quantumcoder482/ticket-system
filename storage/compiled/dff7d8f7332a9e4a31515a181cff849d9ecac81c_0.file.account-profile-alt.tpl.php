<?php
/* Smarty version 3.1.33, created on 2019-04-18 01:13:11
  from '/home/pscope/public_html/ui/theme/default/account-profile-alt.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb807673e9f72_18195613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dff7d8f7332a9e4a31515a181cff849d9ecac81c' => 
    array (
      0 => '/home/pscope/public_html/ui/theme/default/account-profile-alt.tpl',
      1 => 1553599355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb807673e9f72_18195613 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7648062035cb807673be641_34202320', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17589675805cb807673de3f8_44621519', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_7648062035cb807673be641_34202320 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7648062035cb807673be641_34202320',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-12 m-t-md">
            <div class="alert alert-danger" id="emsg">
                <span id="emsgbody"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 ib_profile_width">

            <div class="panel panel-default" id="ibox_panel">

                <div class="panel-body">
                    <div class="thumb-info mb-md">
                        <?php if ($_smarty_tpl->tpl_vars['d']->value['img'] == 'gravatar') {?>
                            <img src="http://www.gravatar.com/avatar/<?php echo md5(($_smarty_tpl->tpl_vars['d']->value['email']));?>
?s=400" class="img-thumbnail img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['d']->value['fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['lname'];?>
">
                        <?php } elseif ($_smarty_tpl->tpl_vars['d']->value['img'] == '') {?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/system/profile-icon.png" class="img-thumbnail img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['d']->value['fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['d']->value['lname'];?>
">
                        <?php } else { ?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;
echo $_smarty_tpl->tpl_vars['d']->value['img'];?>
" class="img-thumbnail img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['d']->value['account'];?>
">
                        <?php }?>
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner"><?php echo $_smarty_tpl->tpl_vars['d']->value['account'];?>
</span>

                        </div>
                    </div>





                    <?php if ($_smarty_tpl->tpl_vars['d']->value['email'] != '') {?>
                        <h5 class="text-muted"><?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
</h5>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['d']->value['phone'] != '') {?>
                        <h5 class="text-muted"><?php echo $_smarty_tpl->tpl_vars['d']->value['phone'];?>
</h5>
                    <?php }?>







                </div>

                <div class="panel-body list-group border-bottom m-t-n-lg">
                    <a href="#" id="summary" class="list-group-item active"><span class="fa fa-bar-chart-o"></span> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Summary'];?>
 </a>
                    <a href="#" id="activity" class="list-group-item"><span class="fa fa-tasks"></span> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Activity'];?>
</a>

                    <?php if ($_smarty_tpl->tpl_vars['is_supplier']->value && has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'suppliers') && ($_smarty_tpl->tpl_vars['config']->value['purchase'])) {?>

                        <a href="#" id="purchases" class="list-group-item"><span class="fa fa-cubes"></span> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Purchase Orders'];?>
<span class="label label-info pull-right"><?php echo $_smarty_tpl->tpl_vars['po_count']->value;?>
</span></a>

                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['config']->value['invoicing'] == '1') {?>
                        <a href="#" id="invoices" class="list-group-item"><span class="fa fa-credit-card"></span> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoices'];?>
<span class="label label-info pull-right"><?php echo $_smarty_tpl->tpl_vars['inv_count']->value;?>
</span></a>
                    <?php }?>



                    <?php if ($_smarty_tpl->tpl_vars['config']->value['quotes'] == '1') {?>
                        <a href="#" id="quotes" class="list-group-item"><span class="fa fa-file-text-o"></span> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Quotes'];?>
<span class="label label-info pull-right"><?php echo $_smarty_tpl->tpl_vars['quote_count']->value;?>
</span></a>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['config']->value['orders'] == '1') {?>
                        <a href="#" id="orders" class="list-group-item"><span class="fa fa-server"></span> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Orders'];?>
</a>
                    <?php }?>


                    <?php if ($_smarty_tpl->tpl_vars['config']->value['documents'] == '1') {?>
                        <a href="#" id="files" class="list-group-item"><span class="fa fa-file-o"></span> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Files'];?>
</a>
                    <?php }?>


                    <?php if ($_smarty_tpl->tpl_vars['config']->value['accounting'] == '1') {?>
                        <a href="#" id="transactions" class="list-group-item"><span class="fa fa-th-list"></span> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Transactions'];?>
</a>
                    <?php }?>

                    <a href="#" id="email" class="list-group-item"><span class="fa fa-envelope-o"></span> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</a>
                    <a href="#" id="log" class="list-group-item"><span class="fa fa-sliders"></span> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Log'];?>
</a>

                    <?php if (($_smarty_tpl->tpl_vars['config']->value['password_manager']) && has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'password_manager')) {?>
                        <a href="#" id="client-password-manager" class="list-group-item"><span class="fa fa-clipboard"></span> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Password Manager'];?>
</a>
                    <?php }?>
                    <a href="#" id="credit_card_info" class="list-group-item"><i class="icon-credit-card-1"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Credit Card Information'];?>
</a>
                    <a href="#" id="edit" class="list-group-item"><span class="fa fa-pencil"></span> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>
                    <a href="#" id="more" class="list-group-item"><span class="fa fa-bars"></span> <?php echo $_smarty_tpl->tpl_vars['_L']->value['More'];?>
</a>
                </div>

                <div class="panel-body">



                    <h5 class="text-muted"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Contact Notes'];?>
</h5>

                    <textarea class="form-control" id="notes" rows="6"><?php echo $_smarty_tpl->tpl_vars['d']->value['notes'];?>
</textarea>
                    <input type="hidden" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
                    <button type="button" id="note_update" class="btn btn-primary btn-block mt-sm"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>




                </div>

            </div>

        </div>

        <div class="col-md-9">

            <!-- START TIMELINE -->
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['d']->value['account'];?>
 <?php if ($_smarty_tpl->tpl_vars['d']->value['code'] != '') {?>[<?php echo $_smarty_tpl->tpl_vars['d']->value['code'];?>
]<?php }?></h5>
                </div>

                <div class="ibox-content" id="ibox_form">
                                                            <div id="application_ajaxrender" style="min-height: 200px;">

                    </div>

                </div>
            </div>
            <!-- END TIMELINE -->

        </div>

    </div>
    <input type="hidden" id="_lan_are_you_sure" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['are_you_sure'];?>
">
    <input type="hidden" id="_active_tab" value="<?php echo $_smarty_tpl->tpl_vars['tab']->value;?>
">
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_17589675805cb807673de3f8_44621519 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_17589675805cb807673de3f8_44621519',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/clipboard.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $(document).ready(function () {

            //var pbar = $('#progressbar');
            //pbar.hide();
            //
            //pbar.progressbar({
            //    warningMarker: 100,
            //    dangerMarker: 100,
            //    maximum: 100,
            //    step: 15
            //});

            var $modal = $('#ajax-modal');

            var tab = $("#_active_tab").val();

            var cid = $('#cid').val();
            var _url = $("#_url").val();

            var $ibox_form = $('#ibox_form');

            function updateDiv(action,_url,cid,cb){
                //var pbar = $('#progressbar');
                $('#ibox_form').block({ message: block_msg });
                var body = $("html, body");
                body.animate({ scrollTop:0 }, '1000', 'swing');
                //pbar.show();



                if (window.history.replaceState) {
                    window.history.replaceState( {} , '',  _url + 'contacts/view/'+ cid +'/' + action + '/' );
                }


                $('.list-group a.active').removeClass('active');
                $("#"+action).addClass("active");



                //var timer = setInterval(function () {
                //    pbar.progressbar('stepIt');
                //
                //}, 250);

                $.post(_url +  "contacts/" +action + '/', {
                    cid: cid

                })
                    .done(function (data) {

                        //clearInterval(timer);
                        $("#application_ajaxrender").html(data);
                        $('#ibox_form').unblock();



                        cb();


                        $( ".mmnt" ).each(function() {
                            //   alert($( this ).html());
                            var ut = $( this ).html();
                            $( this ).html(moment.unix(ut).fromNow());
                        });

                        $('.amount').autoNumeric('init');

                    });

            }


            $("#emsg").hide();

            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                var lan_msg = $("#_lan_are_you_sure").val();
                bootbox.confirm(lan_msg, function(result) {
                    if(result){
                        var _url = $("#_url").val();
                        window.location.href = _url + "delete/user/" + id + '/';
                    }
                });
            });







            $("#note_update").click(function (e) {
                e.preventDefault();
                $('#ibox_panel').block({ message: null });
                var _url = $("#_url").val();
                $.post(_url + 'contacts/edit-notes/', {
                    cid: $('#cid').val(),

                    notes: $('#notes').val()

                })
                    .done(function () {
                        //bootbox.alert("Notes Saved", function() {
                        //    $("#note_update").html("Save");
                        //});
                        $('#ibox_panel').unblock();

                    });



            });




            // From version 4.1

            var cb  =  function cb(){



                switch(tab) {
                    case "edit":


                        $("#country").select2({
                            theme: "bootstrap"
                        });


                        $('#tags').select2({
                            tags: true,
                            tokenSeparators: [','],
                            theme: "bootstrap"
                        });

                        $('#company_id').select2({
                            theme: "bootstrap"
                        });



                        break;

                    case "more":


                        var croppicHeaderOptions = {

                            uploadUrl: _url + 'sys_imgcrop/save/',
                            cropData:{
                                "email":1,
                                "rnd":"rnd"
                            },
                            cropUrl:  _url + 'sys_imgcrop/crop/',
                            outputUrlId:'picture',
                            customUploadButtonId:'cropContainerHeaderButton',
                            modal:false,
                            loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
                            onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
                            onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
                            onImgDrag: function(){ console.log('onImgDrag') },
                            onImgZoom: function(){ console.log('onImgZoom') },
                            onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
                            onAfterImgCrop:function(){ console.log('onAfterImgCrop') }
                        };
                        var croppic = new Croppic('croppic', croppicHeaderOptions);



                        break;

                    case 'activity':

                        // $('#msg').redactor(
                        //     {
                        //         minHeight: 200 // pixels
                        //     }
                        // );

                        ib_editor('#msg',300,false);



                        break;


                    case 'email':

                        // $('#content').redactor(
                        //     {
                        //         minHeight: 300 // pixels
                        //     }
                        // );

                        ib_editor('#content',400,false);

                        break;

                    case 'files':

                        $("#c_file").select2({
                            theme: "bootstrap"
                        });

                        break;

                    case 'client-password-manager':

                        var clipboard = new Clipboard('.copy_to_clipboard', {
                            text: function(trigger) {
                                return trigger.getAttribute('aria-label');
                            }
                        });

                        clipboard.on('success', function(e) {
                            toastr.success('Text Copied!');
                            e.clearSelection();
                        });

                        break;



                    default:

                    //cb = function cb (){
                    //    //  return;
                    //};

                }




            };





            //



            updateDiv(tab,_url,cid,cb);
            $("#summary").click(function (e) {
                e.preventDefault();

                tab = 'summary';

                updateDiv(tab,_url,cid,cb);
            });


            $("#orders").click(function (e) {
                e.preventDefault();

                tab = 'orders';

                updateDiv(tab,_url,cid,cb);
            });


            $("#files").click(function (e) {
                e.preventDefault();

                tab = 'files';

                updateDiv(tab,_url,cid,cb);
            });



            $("#invoices").click(function (e) {
                e.preventDefault();

                tab = 'invoices';
                updateDiv(tab,_url,cid,cb);
            });

            $("#purchases").click(function (e) {
                e.preventDefault();

                tab = 'purchases';
                updateDiv(tab,_url,cid,cb);
            });

            $("#credit_card_info").click(function (e) {
                e.preventDefault();

                tab = 'credit_card_info';
                updateDiv(tab,_url,cid,cb);
            });


            $("#quotes").click(function (e) {
                e.preventDefault();

                tab = 'quotes';
                updateDiv(tab,_url,cid,cb);
            });

            $("#transactions").click(function (e) {
                e.preventDefault();

                tab = 'transactions';
                updateDiv(tab,_url,cid,cb);
            });

            <?php if (($_smarty_tpl->tpl_vars['config']->value['password_manager']) && has_access($_smarty_tpl->tpl_vars['user']->value->roleid,'password_manager')) {?>
            $("#client-password-manager").click(function (e) {
                e.preventDefault();

                tab = 'client-password-manager';
                updateDiv(tab,_url,cid,cb);
            });
            <?php }?>


            $("#email").click(function (e) {
                e.preventDefault();

                tab = 'email';
                updateDiv(tab,_url,cid,cb);


            });

            $("#edit").click(function (e) {
                e.preventDefault();

                tab = 'edit';
                updateDiv(tab,_url,cid,cb);
            });

            $("#log").click(function (e) {
                e.preventDefault();

                tab = 'log';
                updateDiv(tab,_url,cid,cb);
            });

            $("#more").click(function (e) {
                e.preventDefault();



                tab = 'more';

                updateDiv(tab,_url,cid,cb);
            });


            $("#activity").click(function (e) {
                e.preventDefault();
                $('.list-group a.active').removeClass('active');
                $(this).addClass("active");
                tab = 'activity';

                updateDiv('activity',_url,cid,cb);
            });

            var sysrender = $('#application_ajaxrender');
            sysrender.on('click', '#acf-post', function(e){
                e.preventDefault();
                $('#ibox_form').block({ message: null });
                var _url = $("#_url").val();
                $.post(_url + 'contacts/add-activity-post/', {

                    cid: $('#cid').val(),
                    //  msg: $('#msg').val(),
                    msg: tinyMCE.activeEditor.getContent(),
                    icon: $('#activity-type').val()

                })
                    .done(function (data) {

                        var sbutton = $("#acf-post");
                        var _url = $("#_url").val();
                        if ($.isNumeric(data)) {

                            window.location = _url + 'contacts/view/' + data + '/activity/';
                        }
                        else {
                            $('#ibox_form').unblock();

                            $("#emsgbody").html(data);
                            $("#emsg").show("slow");
                        }
                    });
            });




            sysrender.on('click', '#submit', function(e){
                e.preventDefault();
                $ibox_form.block({ message: null });
                var _url = $("#_url").val();
                $.post(_url + 'contacts/edit-post/', $( "#rform" ).serialize())
                    .done(function (data) {

                        var sbutton = $("#submit");
                        var _url = $("#_url").val();

                        if ($.isNumeric(data)) {

                            window.location = _url + 'contacts/view/' + data + '/edit/';
                        }
                        else {
                            $('#ibox_form').unblock();

                            $("#emsgbody").html(data);
                            $("#emsg").show("slow");
                        }
                    });
            });

            sysrender.on('click','#save_credit_card',function (e) {
                e.preventDefault();
                $ibox_form.block({ message: null });

                $.post(base_url + 'contacts/save_credit_card/', $('#credit_card_from').serialize())
                    .done(function (data) {

                        if ($.isNumeric(data)) {

                            window.location = base_url + 'contacts/view/' + data + '/credit_card_info/';
                        }
                        else {
                            $('#ibox_form').unblock();

                            $("#emsgbody").html(data);
                            $("#emsg").show("slow");
                        }
                    });

            });


            sysrender.on('click', '#send_email', function(e){
                e.preventDefault();
                $ibox_form.block({ message: null });
                var _url = $("#_url").val();

                $.post(_url + 'contacts/send_email/', {
                    cid: $('#cid').val(),

                    subject: $('#subject').val(),
                    message: tinyMCE.activeEditor.getContent()


                })
                    .done(function (data) {

                        var sbutton = $("#send_email");
                        var _url = $("#_url").val();
                        if ($.isNumeric(data)) {

                            window.location = _url + 'contacts/view/' + data + '/email/';
                        }
                        else {
                            $('#ibox_form').unblock();

                            $("#emsgbody").html(data);
                            $("#emsg").show("slow");
                        }
                    });
            });

            sysrender.on('click', '#assign_file', function(e){
                e.preventDefault();
                $ibox_form.block({ message: null });


                $.post(_url + 'contacts/assign_file/', {
                    cid: $('#cid').val(),

                    did: $('#c_file').val()


                })
                    .done(function (data) {


                        if ($.isNumeric(data)) {

                            window.location = _url + 'contacts/view/' + data + '/files/';
                        }
                        else {
                            $('#ibox_form').unblock();

                            $("#emsgbody").html(data);
                            $("#emsg").show("slow");

                        }
                    });
            });

            sysrender.on('click', '#no_image', function(e){
                e.preventDefault();
                $('#picture').val('');

            });


            sysrender.on('click', '#opt_gravatar', function(e){
                e.preventDefault();

                $('.picture').val('gravatar');

            });

            sysrender.on('click', '#more_submit', function(e){
                e.preventDefault();


                $ibox_form.block({ message: null });
                var _url = $("#_url").val();
                $.post(_url + 'contacts/edit-more/', {
                    cid: $('#cid').val(),
                    picture: $('#picture').val(),
                    facebook: $('#facebook').val(),
                    google: $('#google').val(),
                    linkedin: $('#linkedin').val()

                })
                    .done(function (data) {

                        var sbutton = $("#more_submit");
                        var _url = $("#_url").val();
                        if ($.isNumeric(data)) {

                            window.location = _url + 'contacts/view/' + data + '/';
                        }
                        else {
                            $('#ibox_form').unblock();

                            $("#emsgbody").html(data);
                            $("#emsg").show("slow");
                        }
                    });

            });

            sysrender.on('click', '.clickable', function(e){
                e.preventDefault();
                $(".compose-toolbar li").removeClass("action-active");
                $(this).addClass("action-active");
                var atype = $(this).html();

                $('#activity-type').val(atype);
            });


            sysrender.on('click', '.activity_edit', function(e){
                e.preventDefault();

                var activity_id;

                activity_id = this.id;

                $('body').modalmanager('loading');

                $modal.load( _url + 'contacts/modal_edit_activity/' +  activity_id, '', function(){

                    $modal.modal();

                    // $('.edit_activity').redactor(
                    //     {
                    //         minHeight: 200 // pixels
                    //     }
                    // );

                    ib_editor('#edit_activity_message',300,false);



                });



            });


            $modal.on('click', '.modal_activity_submit', function(e){
                e.preventDefault();

                $modal.modal('loading');

                $.post( _url + "contacts/edit_activity_post/", $("#ib_modal_edit_activity_form").serialize())
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            location.reload();

                        }

                        else {
                            $modal.modal('loading');
                            toastr.error(data);
                        }

                    });



            });

            $modal.on('click', '.modal_activity_edit_cancel', function(e){
                location.reload();
            });


            $modal.on('click', '.clickable', function(e){
                e.preventDefault();
                $(".compose-toolbar li").removeClass("action-active");
                $(this).addClass("action-active");
                var atype = $(this).html();

                $('#edit_activity_type').val(atype);
            });


            sysrender.on('click', '.choose_from_template', function(e){
                e.preventDefault();
                $('body').modalmanager('loading');

                $modal.load( base_url + 'handler/view_email_templates/', '', function(){

                    $modal.modal();


                    $('#tbl_email_templates').filterTable({
                        inputSelector: '#ib_search_input',
                        ignoreColumns: [2]
                    })


                });
            });


            $modal.on('click', '.eml_select', function(e) {
                e.preventDefault();

                $('body').modalmanager('loading');

                var eml_id = this.id;

                $.getJSON(base_url + "handler/json_eml_tpl/"+eml_id, function (data) {

                    $("#subject").val(data.subject);

                    tinyMCE.activeEditor.setContent(data.message);

                    $('body').modalmanager('loading');
                    $modal.modal('hide');

                });

            });


            sysrender.on('click', '.add_fund', function(e){
                e.preventDefault();

                bootbox.prompt({
                    title: "Add Fund",
                    value: "",
                    buttons: {
                        'cancel': {
                            label: 'Cancel'
                        },
                        'confirm': {
                            label: 'OK'
                        }
                    },
                    callback: function(result) {
                        if (result === null) {

                        } else {

                            $.redirect(base_url + "contacts/add_fund/",{ amount: result, cid: cid});

                        }
                    }
                });

            });

            sysrender.on('click', '.return_fund', function(e){
                e.preventDefault();

                bootbox.prompt({
                    title: "Return Fund",
                    value: "",
                    buttons: {
                        'cancel': {
                            label: 'Cancel'
                        },
                        'confirm': {
                            label: 'OK'
                        }
                    },
                    callback: function(result) {
                        if (result === null) {

                        } else {

                            $.redirect(base_url + "contacts/return_fund/",{ amount: result, cid: cid});

                        }
                    }
                });

            });

            function update_time(){
                $( ".sdate" ).each(function() {
                    //   alert($( this ).html());
                    var ut = $( this ).html();
                    $( this ).html(moment.unix(ut).format(_df));
                });

                $( ".mmnt" ).each(function() {
                    //   alert($( this ).html());
                    var ut = $( this ).html();
                    $( this ).html(moment.unix(ut).fromNow());
                });
            }

        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
