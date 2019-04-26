{extends file="$layouts_admin"}

{block name="style"}
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/dt/dt.css" />
{/block}

{block name="content"}

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Items</h5>

                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Item Code</th>
                                <th>Available</th>
                                <th>Reorder Level</th>
                                <th>Manage</th>
                            </tr>
                            </thead>
                            <tbody>

                            {foreach $items as $item}
                                <tr>
                                    <td><img src="/storage/items/thumb{$item->image}"></td>
                                    <td>{$item->name}</td>
                                    <td>{$item->number}</td>
                                    <td>{$item->available}</td>
                                    <td>0</td>
                                    <td></td>
                                </tr>
                            {/foreach}

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Item Code</th>
                                <th>Available</th>
                                <th>Reorder Level</th>
                                <th>Manage</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>



{/block}


{block name="script"}

    <script type="text/javascript" src="{$app_url}ui/lib/dt/dt.js"></script>


    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    { extend: 'csv' },
                    { extend: 'excel', title: 'ExampleFile' },
                    { extend: 'pdf', title: 'ExampleFile' },

                { extend: 'print',
                customize: function (win){
                $(win.document.body).addClass('white-bg');
                $(win.document.body).css('font-size', '10px');

                $(win.document.body).find('table')
                .addClass('compact')
                .css('font-size', 'inherit');
                }
            }
            ]

        });

        });

    </script>
{/block}
