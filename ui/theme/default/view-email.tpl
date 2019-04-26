{extends file="$layouts_admin"}

{block name="content"}
    <div class="row animated fadeInDown">
        <div class="col-lg-12"  id="application_ajaxrender">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> {$d['subject']} </h5>

                    <div class="ibox-tools">
                        <a href="{$_url}util/sent-emails" class="btn btn-info btn-xs"><i class="fa fa-mail-reply-all"></i> {$_L['Back To Emails']}</a>
                    </div>

                </div>
                <div class="ibox-content">

                    {$d['message']}

                </div>


            </div>
        </div>
    </div>
{/block}