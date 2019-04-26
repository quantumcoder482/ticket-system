{extends file="$layouts_admin"}

{block name="content"}
    <div class="row" id="ib_editor_canvas">
        <div class="col-lg-2">
            <div class="form-group">
                <label for="editor_file">{$_L['File']}</label>
                <select name="editor_file" id="editor_file" class="form-control">
                    <option value="no_file" selected="selected" >{$_L['Select File to Edit']}</option>
                    <option value="language.php">{$_L['Language File']}</option>
                    <option value="invoice_printer.php">{$_L['Invoice Layout Print']}</option>
                    <option value="invoice_pdf.php">{$_L['Invoice Layout PDF']}</option>


                </select>
            </div>
            <button type="submit" id="ib_btn_save" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Save']}</button>
        </div>
        <div class="col-lg-10">


            <div id="editor" style="min-height: 800px;"></div>



        </div>
    </div>
{/block}