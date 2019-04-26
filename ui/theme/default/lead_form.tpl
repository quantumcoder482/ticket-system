{extends file="$layouts_admin"}

{block name="content"}
    <div class="paper">
        <section class="panel">
            <div class="panel-body">
                {if isset($notify)}
                    {$notify}
                {/if}

                <img class="logo" style="max-height: 40px; width: auto;" src="{$app_url}storage/system/logo.png" alt="Logo">

                <hr>

                <div class="row">
                    <div class="col-xs-6">
                        <p class="lead">Register Now <span class="text-success"> It's Free</span></p>
                        <div class="well">
                            <form id="loginForm" method="POST">
                                <div class="form-group">
                                    <label for="username" class="control-label">Name</label>
                                    <input type="text" class="form-control" name="username" value="" required="" title="Please enter your username">
                                    <span class="help-block"></span>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="control-label">Company</label>
                                    <input type="text" class="form-control" name="username" value="" required="" title="Please enter your username">
                                    <span class="help-block"></span>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="control-label">Industry</label>
                                    <select class="form-control" id="industry" name="industry" tabindex="-98">
                                        <option value="Agriculture">Agriculture</option>
                                        <option value="Apparel">Apparel</option>
                                        <option value="Banking">Banking</option>
                                        <option value="Biotechnology">Biotechnology</option>
                                        <option value="Chemicals">Chemicals</option>
                                        <option value="Communications">Communications</option>
                                        <option value="Construction">Construction</option>
                                        <option value="Consulting">Consulting</option>
                                        <option value="Education">Education</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Energy">Energy</option>
                                        <option value="Engineering">Engineering</option>
                                        <option value="Entertainment">Entertainment</option>
                                        <option value="Environmental">Environmental</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Food &amp; Beverage">Food &amp; Beverage</option>
                                        <option value="Government">Government</option>
                                        <option value="Healthcare">Healthcare</option>
                                        <option value="Hospitality">Hospitality</option>
                                        <option value="Insurance">Insurance</option>
                                        <option value="Machinery">Machinery</option>
                                        <option value="Manufacturing">Manufacturing</option>
                                        <option value="Media">Media</option>
                                        <option value="Not For Profit">Not For Profit</option>
                                        <option value="Other">Other</option>
                                        <option value="Recreation">Recreation</option>
                                        <option value="Retail">Retail</option>
                                        <option value="Shipping">Shipping</option>
                                        <option value="Technology">Technology</option>
                                        <option value="Telecommunications">Telecommunications</option>
                                        <option value="Transportation">Transportation</option>
                                        <option value="Utilities">Utilities</option>

                                    </select>
                                    <span class="help-block"></span>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="control-label">Email</label>
                                    <input type="text" class="form-control" name="username" value="" required="" title="Please enter your username">
                                    <span class="help-block"></span>
                                </div>



                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" id="remember"> I would like to subscribe for newsletter
                                    </label>
                                    <p class="help-block">(We will not spam)</p>
                                </div>
                                <button type="submit" value="login" name="submit" class="btn btn-primary btn-block"><i class="fa fa-download"></i> Download Free Sample</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <p class="lead">We Providing Content <span class="text-success">Services</span></p>
                        <ul class="list-unstyled" style="line-height: 2">
                            <li><span class="fa fa-check text-success"></span> See all your orders</li>
                            <li><span class="fa fa-check text-success"></span> Shipping is always free</li>
                            <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                            <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                            <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>

                        </ul>

                    </div>
                </div>



            </div>
        </section>

    </div>

{/block}