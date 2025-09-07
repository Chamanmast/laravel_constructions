<section class="wrapper bg-light">
    <div class="container py-14 py-md-16">
        <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">

            <div class="col-md-8 col-lg-6 col-xl-5 order-lg-2 position-relative">

                <div class="card p-5">
                    <div class="card-title">
                        <h2>Get In Touch</h2>
                    </div>
                    <form class="contact-form needs-validation" method="post" action="#" novalidate="">
                        <div class="messages"></div>
                        <div class="row gx-4">
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_name" type="text" name="name" class="form-control"
                                        placeholder="Jane" required="">
                                    <label for="form_name">First Name *</label>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter your first name. </div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_email" type="email" name="email" class="form-control"
                                        placeholder="jane.doe@example.com" required="">
                                    <label for="form_email">Email *</label>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please provide a valid email address. </div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_lastname" type="text" name="phone" class="form-control"
                                        placeholder="phone" required="">
                                    <label for="form_lastname">Phone *</label>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter your mobile no. </div>
                                </div>
                            </div>

                            <!-- /column -->
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_lastname" type="text" name="company" class="form-control"
                                        placeholder="company" required="">
                                    <label for="form_lastname">Company *</label>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter your company name. </div>
                                </div>
                            </div>
                            <!-- /column -->
                            <div class="col-12">
                                <div class="form-floating mb-4">
                                    <textarea id="form_message" name="message" class="form-control" placeholder="Your message" style="height: 150px"
                                        required=""></textarea>
                                    <label for="form_message">Write your Message *</label>
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter your messsage. </div>
                                </div>
                            </div>
                            <!-- /column -->

                            <!-- /column -->
                            <div class="col-12">
                                <input type="submit" class="btn w-100 btn-primary rounded-pill btn-send mb-3"
                                    value="Send">

                            </div>
                            <!-- /column -->
                        </div>
                        <!-- /.row -->
                    </form>
                </div>

            </div>
            <!--/column -->
            <div class="col-lg-6">
                <h2 class="display-4 mb-3">{{ $sname }}</h2>

                <p class="mb-6">{{ $stext }}</p>
                <a href="#" class="btn btn-primary rounded-pill mt-2">Our Partner</a> <a href="#"
                    class="btn btn-outline-primary rounded-pill mt-2">Company Profile</a>
                <!--/.row -->
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /section -->
