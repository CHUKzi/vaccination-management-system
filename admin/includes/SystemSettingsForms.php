                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Settings (Last System Updated : <?php echo $setting['last_update']; ?>)</h5>
                                <div class="card-body">
                                     <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">
                                        <div class="form-group">
                                            <label for="system_name">System Name</label>
                                            <input id="system_name" type="text" name="system_name" placeholder="Enter System Name" class="form-control" value="<?php echo(htmlentities($setting['system_name']));?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="website_url">Web Site Home URL</label>
                                            <input id="website_url" type="text" name="website_url" placeholder="Enter URL" class="form-control" value="<?php echo(htmlentities($setting['website_url']));?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="api_system_url">API System URL</label>
                                            <input id="api_system_url" type="text" name="api_system_url" placeholder="Enter URL"  class="form-control" value="<?php echo(htmlentities($setting['api_system_url']));?>">
                                        </div>
                                       <div class="form-group">
                                            <label for="doctors_dashboard_url">Doctors Dashboard URL</label>
                                            <input id="doctors_dashboard_url" type="text" name="doctors_dashboard_url" placeholder="Enter URL" class="form-control" value="<?php echo(htmlentities($setting['doctors_dashboard_url']));?>">
                                        </div>
                                       <div class="form-group">
                                            <label for="main_dashboard_url">Main Dashboard Panel URL</label>
                                            <input id="main_dashboard_url" type="text" name="main_dashboard_url" placeholder="Enter URL"  class="form-control" value="<?php echo(htmlentities($setting['main_dashboard_url']));?>">
                                        </div>

                                       <div class="form-group">
                                            <label for="email_address">Email Address (Mail System)</label>
                                            <input id="email_address" type="email" name="email" placeholder="Enter E-mail" class="form-control" value="<?php echo(htmlentities($setting['email']));?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" name="save" class="btn btn-space btn-primary">Save</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Advanced Settings</h5>
                                <div class="card-body">
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data" onSubmit="return validate();">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Main Website </label>
                                            <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                                <div class="switch-button switch-button-success">
                                                    <input type="checkbox" <?php if ($setting['main_site_is_on']==0) { echo "checked"; } ?> name="main_site_is_on" id="switch16" ><span>
                                                <label for="switch16"></label></span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="advanced_save" class="btn btn-space btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>