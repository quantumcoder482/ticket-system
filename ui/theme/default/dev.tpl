{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">
                <div class="panel-body">

                    <a href="{$_url}demo/reset/" class="btn btn-danger">Reset Demo</a>


                </div>

            </div>
        </div>



    </div>

    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">

                <div class="panel-body">

                    <h3> Set Demo </h3>



                    <hr>

                    <ul>

                        <li><a href="{$_url}demo/us">United States</a> </li>
                        <li><a href="{$_url}demo/uae">United Arab Emirates</a> </li>
                        <li><a href="{$_url}demo/se">Sweden</a> </li>
                        <li><a href="{$_url}demo/bd">Bangladesh</a> </li>
                        <li><a href="{$_url}demo/no">Norway</a> </li>
                        <li><a href="{$_url}demo/au">Australia</a> </li>
                        <li><a href="{$_url}demo/ca">Canada</a> </li>
                        <li><a href="{$_url}demo/ca_quebec">Canada - Quebec</a> </li>
                        <li><a href="{$_url}demo/id">Indonesia</a> </li>
                        <li><a href="{$_url}demo/">Malaysia</a> </li>
                        <li><a href="{$_url}demo/in">India</a> </li>
                        <li><a href="{$_url}demo/br">Brazil</a> </li>
                        <li><a href="{$_url}demo/fr">French</a> </li>
                        <li><a href="{$_url}demo/de">Germany</a> </li>
                        <li><a href="{$_url}demo/it">Italy</a> </li>
                        <li><a href="{$_url}demo/dk">Denmark</a> </li>
                        <li><a href="{$_url}demo/uk">United Kingdom</a> </li>
                        <li><a href="{$_url}demo/pt">Portugal</a> </li>
                        <li><a href="{$_url}demo/tr">Turkey</a> </li>
                        <li><a href="{$_url}demo/sa">Saudi Arabia</a> </li>
                        <li><a href="{$_url}demo/ma">Morocco</a> </li>



                    </ul>


                </div>
            </div>
        </div>



    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary waves-effect waves-light add_company" href="#">
            <i class="fa fa-plus"></i>
        </a>
    </div>
{/block}
