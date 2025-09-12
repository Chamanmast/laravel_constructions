<section class="wrapper bg-light">
    <div class="container py-14 py-md-16">
        <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
			@if(session('success'))
			<div class="alert alert-success text-center">
				{{ session('success') }}
			</div>
			@endif
            <div class="col-md-8 col-lg-6 col-xl-5 order-lg-2 position-relative">
				
                <div class="card p-5">
                    <div class="card-title">
                        <h2>Get In Touch</h2>
					</div>
                    <form class="needs-validation" id="service-enquiry-form" method="POST" action="{{ route('service.enquiry') }}" novalidate>
                        @csrf
						
                        <div class="messages"></div>
						
                        <div class="row gx-4">
							
                            <!-- First Name -->
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_name" type="text" name="name"
									class="form-control @error('name') is-invalid @enderror"
									placeholder="First Name" value="{{ old('name') }}" required>
									<input type="hidden" name="service" value="{{ $sname }}">
                                    <label for="form_name">First Name *</label>
                                    <div class="valid-feedback">Looks good!</div>
                                    @error('name')
									<div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
								</div>
							</div>
							
                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_email" type="email" name="email"
									class="form-control @error('email') is-invalid @enderror" placeholder="Email"
									value="{{ old('email') }}" required>
                                    <label for="form_email">Email *</label>
                                    <div class="valid-feedback">Looks good!</div>
                                    @error('email')
									<div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
								</div>
							</div>
							
                            <!-- Phone -->
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_phone" type="text" name="phone"
									class="form-control @error('phone') is-invalid @enderror" placeholder="Phone"
									value="{{ old('phone') }}" required>
                                    <label for="form_phone">Phone *</label>
                                    <div class="valid-feedback">Looks good!</div>
                                    @error('phone')
									<div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
								</div>
							</div>
							
                            <!-- Company -->
                            <div class="col-md-6">
                                <div class="form-floating mb-4">
                                    <input id="form_company" type="text" name="company"
									class="form-control @error('company') is-invalid @enderror"
									placeholder="Company" value="{{ old('company') }}" required>
                                    <label for="form_company">Company *</label>
                                    <div class="valid-feedback">Looks good!</div>
                                    @error('company')
									<div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
								</div>
							</div>
							
                            <!-- Message -->
                            <div class="col-12">
                                <div class="form-floating mb-4">
                                    <textarea id="form_message" name="message" class="form-control @error('message') is-invalid @enderror"
									placeholder="Your message" style="height: 150px" required>{{ old('message') }}</textarea>
                                    <label for="form_message">Write your Message *</label>
                                    <div class="valid-feedback">Looks good!</div>
                                    @error('message')
									<div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
								</div>
							</div>
							
                            <!-- Submit Button -->
                            <div class="col-12">
                                <input type="submit" class="btn w-100 btn-primary rounded-pill mb-3"
								value="Submit">
							</div>
							
						</div>
					</form>
				</div>
				
			</div>
            <!--/column -->
            <div class="col-lg-6">
                <h2 class="display-4 mb-3">{{ $sname }}</h2>
				
                <p class="mb-6">{{ $stext }}</p>
                <a href="#brands" class="btn btn-primary rounded-pill mt-2">Our Partner</a>
                <a href="{{ route('about-us') }}" class="btn btn-outline-primary rounded-pill mt-2">Company Profile</a>
                <!--/.row -->
			</div>
            <!--/column -->
		</div>
        <!--/.row -->
	</div>
    <!-- /.container -->
</section>
<!-- /section -->
