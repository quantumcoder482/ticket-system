{extends file="$layouts_client"}

{block name="content"}

    <section class="panel" id="ib_box">
        <div class="panel-body" style="font-size: 14px;">
            <div>
                {if isset($notify)}
                    {$notify}
                {/if}




                <form method="post" action="{$_url}client/tickets/create_post/" id="iform" name="iform">



                    <div class="form-group">
                        <label for="account">{$_L['Full_Name']}</label>
                        <input type="text" class="form-control" id="account" name="account" value="{$user->account}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="email">{$_L['Email']}</label>
                        <input type="email" class="form-control" id="email" name="email" value="{$user->email}" disabled>
                    </div>

                    <div class="form-group">
                        <label> Submission Requirements</label>
                        <span class="block" >You must read and acknowledge that you've completed the requirements below before proceeding</span>
                        <div style="margin-top:20px; margin-left:20px;">
                            <p><input type="checkbox" id="check_1"> <label for="check_1" style="display:inline; font-weight:600">The submission has not been previously published, nor is it before another journal for consideration (or an explanation has been provided in Comments to the Editor).</label></p>
                            <p><input type="checkbox" id="check_2"> <label for="check_2" style="display:inline;font-weight:600">The submission file is in OpenOffice, Microsoft Word, or RTF document file format.</label></p>
                            <p><input type="checkbox" id="check_3"> <label for="check_3" style="display:inline;font-weight:600">Where available, URLs  for the references have been provided.</label></p>
                            <p><input type="checkbox" id="check_4"> <label for="check_4" style="display:inline;font-weight:600">The text is single-spaced; uses a 12-point font; employs italics, rather than underlining)except with URL addresses); and all illustrations, figures, and tables are placed within the text at the appropriate points, rather than at the end.</label></p>
                            <p><input type="checkbox" id="check_5"> <label for="check_5" style="display:inline;font-weight:600">The text adheres to the stylistic and bibliographic requirements outlined in the Author Guidelines</label></p>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="subject">{$_L['Subject']}</label>
                        <input type="text" class="form-control" id="subject" name="subject">
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="department">{$_L['Department']}</label>
                                <select class="form-control" id="department" name="department" size="1">

                                    {foreach $deps as $dep}
                                        <option value="{$dep['id']}">{$dep['dname']}</option>
                                        {foreachelse}
                                        <option value="0">{$_L['None']}</option>
                                    {/foreach}

                                </select>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group">

                                    <label for="urgency">{$_L['Priority']}</label>
                                    <select class="form-control" id="urgency" name="urgency" size="1">
                                        <option value="Normal" selected>{$_L['Normal']}</option>
                                        <option value="Fast" >{$_L['Fast']}</option>
                                    </select>
                                    <div class="help-block" id="alert_urgency"><span style="color:red">Fast track processing fee: Rs. 15,000</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="ttype">Type of Submission</label>
                                <select class="form-control" name="ttype" id="ttype" size="1">
                                    <option value="Original Article" selected>Original Article</option>
                                    <option value="Review Article">Review Article</option>
                                    <option value="Short Communication">Short Communication</option>
                                    <option value="Case Report">Case Report</option>
                                    <option value="Editorial Note">Editorial Note</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <br>
                    <div class="form-group">
                        <label for="message">{$_L['Description']}</label>
                        <textarea id="message"  class="form-control sysedit" name="message"></textarea>
                        <div class="help-block"><a data-toggle="modal" href="#modal_add_item"><i class="fa fa-paperclip"></i> {$_L['Attach File']}</a> <span class="" style="color:green; margin-left: 30px" id="file_attachment_success"> Manuscript attached successfully - Click submit</span></div>
                    </div>

                    {if $config['recaptcha'] eq '1'}
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="{$config['recaptcha_sitekey']}"></div>
                        </div>
                    {/if}

                    <input type="hidden" name="attachments" id="attachments" value="">
                    <button type="submit" id="ib_form_submit" class="btn btn-primary">{$_L['Submit']}</button>
                </form>


            </div>




        </div>
    </section>

    <div id="modal_add_item" class="modal fade" tabindex="-1" data-width="600" style="display: none;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">{$_L['Attach File']}</h4>
        </div>
        <div class="modal-body">
            <div class="row">



                <div class="col-md-12">
                    <form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  {$_L['Drop File Here']}</h3>
                            <br />
                            <span class="note">{$_L['Click to Upload']}</span>
                        </div>

                    </form>


                </div>




            </div>
        </div>
        <div class="modal-footer">

            <button type="button" data-dismiss="modal" class="btn btn-primary">Save</button>

        </div>
    </div>


{/block}

{block name="script"}
    <script>
        Dropzone.autoDiscover = false;
        $(function() {
            $('#alert_urgency').hide();

            var _url = $("#_url").val();

            var $ib_form_submit = $("#ib_form_submit");

            var $create_ticket = $("#create_ticket");
            var $ib_box = $("#ib_box");

            $('#file_attachment_success').hide();

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
                    accpetedFiles: "image/jpeg,image/png,image/gif,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
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

                    $('#file_attachment_success').show();

                }
                else{
                    toastr.error(upload_resp.msg);
                }

            });



            $ib_form_submit.on('click', function(e) {
                e.preventDefault();
                $ib_box.block({ message: block_msg });

                var check_count = 0;
                $('input[type="checkbox"]:checked').each( function(elem) {
                    check_count++;
                })

                if(check_count == 6){
                    $.post( _url + "client/tickets/add_post/", { subject: $("#subject").val(), department: $("#department").val(), urgency: $("#urgency").val(), message: $('.sysedit').code(), attachments: $("#attachments").val(), ttype: $("#ttype").val()} )
                    .done(function( data ) {

                        if(data.success == "Yes"){
                            window.location.href = _url + "client/tickets/view/" + data.id + "/";
                        }

                        else {
                            $ib_box.unblock();
                            toastr.error(data.msg);
                            //  console.log(data);
                        }

                    });
                }else {
                     $ib_box.unblock();
                     toastr.error("Please Check Submission Requirements.");
                }
                
            });

            $('#urgency').on('change', function(e){
                e.preventDefault();
                // console.log($(this).val());
                if($(this).val() == 'Fast'){
                    $('#alert_urgency').show();
                }else{
                    $('#alert_urgency').hide();
                }
            });


        });
    </script>
{/block}
