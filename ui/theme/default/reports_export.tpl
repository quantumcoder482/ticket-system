{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">
        <div class="col-md-12">
            <h3 class="ibilling-page-header">{$_L['Export']}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{$_L['Customers']}</h5>
                </div>
                <div class="ibox-content">
                    <h1>{$total_customers}</h1>

                    <a href="{$_url}reports/export-customers" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> {$_L['Export']}</a>
                </div>
            </div>
        </div>


        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{$_L['Transactions']}</h5>
                </div>
                <div class="ibox-content">
                    <h1>{$total_transactions}</h1>

                    <a href="{$_url}reports/export-transactions" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> {$_L['Export']}</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{$_L['Invoices']}</h5>
                </div>
                <div class="ibox-content">
                    <h1>{$total_invoices}</h1>

                    <a href="{$_url}reports/export-invoices" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> {$_L['Export']}</a>
                </div>
            </div>
        </div>

        {*<div class="col-lg-3">*}
            {*<div class="ibox ">*}
                {*<div class="ibox-title">*}
                    {*<h5>{$_L['Products']}</h5>*}
                {*</div>*}
                {*<div class="ibox-content">*}
                    {*<h1>{$total_products}</h1>*}

                    {*<a href="{$_url}reports/export-customers" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> {$_L['Export']}</a>*}
                {*</div>*}
            {*</div>*}
        {*</div>*}
    </div>

{/block}

{block name=script}

    <script>

    </script>


{/block}