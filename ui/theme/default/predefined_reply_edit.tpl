{extends file="$layouts_admin"}

{block name="content"}


    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <form method="post" action="{$_url}tickets/admin/predefined_reply_edit_post">
                        <div class="form-group">
                            <input class="form-control" type="text" name="title" value="{$reply->title}">
                        </div>
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control" rows="5">{$reply->message}</textarea>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="id" value="{$reply->id}">
                            <button type="submit" class="btn btn-primary">{$_L['Save']}</button>
                        </div>


                    </form>

                    <div class="hr-line-dashed"></div>

                    <a class="btn btn-danger" href="{$_url}tickets/admin/predefined_replies/">{$_L['Back To The List']}</a>

                </div>
            </div>
        </div>
    </div>

{/block}

{block name=script}

    <script>

        $(function () {
            var $message = $('#message');
            $message.redactor({
                minHeight: 200,
                paragraphize: false,
                replaceDivs: false,
                linebreaks: true
            });
        })

    </script>


{/block}