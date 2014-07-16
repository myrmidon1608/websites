
    <?php get_header(); ?>

        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <div class="the-page" id="page-<?php the_ID(); ?>">
                <div class="the-content">
                    <h2>Sign up for our newsletter</h2>
                    <!--<form action="//riverviewfarmersmarket.us3.list-manage.com/subscribe/post?u=5af5396cb2b0fc15fe97421f2&amp;id=6b43e5f088" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div class="form-group">
                            <label for="mce-EMAIL">Email address</label>
                            <input type="email" value="" name="EMAIL" class="form-control" id="mce-EMAIL">
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="mce-FNAME">First name</label>
                                <input type="text" value="" name="FNAME" class="form-control" id="mce-FNAME">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="mce-LNAME">Last name</label>
                                <input type="text" value="" name="LNAME" class="form-control" id="mce-LNAME">
                            </div>
                        </div>
                        <div class="form-group">
                            <strong>Email format</strong>
                            <div class="row">
                                <div class="col-sm-3 col-xs-6">
                                    <input type="radio" value="html" name="EMAILTYPE" id="mce-EMAILTYPE-0"><label for="mce-EMAILTYPE-0">&nbsp;HTML</label>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <input type="radio" value="text" name="EMAILTYPE" id="mce-EMAILTYPE-1"><label for="mce-EMAILTYPE-1">&nbsp;Text</label>
                                </div>
                            </div>
                        </div>
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>
                        <div style="position: absolute; left: -5000px;"><input type="text" name="b_5af5396cb2b0fc15fe97421f2_6b43e5f088" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-default"></div>
                    </form>
                    <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script>
                    <script type="text/javascript">
                        (function($) {
                            window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';
                        }(jQuery));
                        var $mcj = jQuery.noConflict(true);
                    </script>
                    <!--End mc_embed_signup-->

                    <form action="//riverviewfarmersmarket.us3.list-manage.com/subscribe/post?u=5af5396cb2b0fc15fe97421f2&amp;id=6b43e5f088" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div class="mc-field-group form-group">
                            <label for="mce-EMAIL">Email Address</label>
                            <input type="email" value="" name="EMAIL" class="required email form-control" id="mce-EMAIL">
                        </div>
                        <div class="row">
                            <div class="mc-field-group col-sm-6 form-group">
                                <label for="mce-FNAME">First Name</label>
                                <input type="text" value="" name="FNAME" class="required form-control" id="mce-FNAME">
                            </div>
                            <div class="mc-field-group col-sm-6 form-group">
                                <label for="mce-LNAME">Last Name</label>
                                <input type="text" value="" name="LNAME" class="required form-control" id="mce-LNAME">
                            </div>
                        </div>
                        <div class="mc-field-group input-group form-group">
                            <strong>Email Format</strong>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label class="radio-inline">
                                        <input type="radio" value="html" name="EMAILTYPE" id="mce-EMAILTYPE-0"> HTML
                                    </label>
                                </div>
                                <div class="col-xs-6">
                                    <label class="radio-inline">
                                        <input type="radio" value="text" name="EMAILTYPE" id="mce-EMAILTYPE-1"> Text
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;"><input type="text" name="b_5af5396cb2b0fc15fe97421f2_6b43e5f088" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-default"></div>
                    </form>
                    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
                    <script type='text/javascript'>
                    (function($) {
                    window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';
                    }(jQuery));
                    var $mcj = jQuery.noConflict(true);
                    </script>
                    <br />
                        
                    <h2>Send us an email</h2>
                    <form action="mailto:" role="form">
                        <div class="form-group">
                            <label for="contact-EMAIL">Email address</label>
                            <input type="email" value="" name="EMAIL" class="form-control" id="contact-EMAIL">
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="contact-FNAME">First name</label>
                                <input type="text" value="" name="FNAME" class="form-control" id="contact-FNAME">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="contact-LNAME">Last name</label>
                                <input type="text" value="" name="LNAME" class="form-control" id="contact-LNAME">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact-BODY">What's on your mind?</label>
                            <textarea class="form-control" id="contact-BODY" rows="5"></textarea>
                        </div>
                        <p><small>*All fields required</small></p>
                        <button type="submit" class="btn btn-default">Submit</button>
                        
                    </form>
                    
                </div>
            </div>

        <?php endwhile; else: ?>

        <?php endif; ?>

    <?php get_footer(); ?>
