@extends('frontend.main_master')
@section('content')
@section('title')
Contact | India's No 1 Online Saree Shop - Nithitex
@endsection

<div class="breadcrumb-area bg-gray">
  <div class="container">
    <div class="breadcrumb-content text-center">
      <ul>
        <li>
          <a href="/">Home</a>
        </li>
        <li class="active">
          <a>Contact us</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="contact-area-touch pt-50 pb-50">
  <div class="container">
    <div class="contact-home contact-info-wrap-3">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <img src="{{ asset('frontend/assets/images/testimonial/contact-bg.png') }}" class="img-responsive" alt="">
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="col-lg-12 col-md-12 pb-12">
            <div class="single-contact-info-3 mb-30">
              <ul>
                <li>
                  <i class="icon-location-pin "></i>
                </li>
              </ul>
              <h4>Location</h4>
              <p>41/11.2, Gurunahar swami kovil street, </br>Nearby Saravana Balaji Hospital, Elampillai, Tamil Nadu - 637 502. </p>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 pt-12">
            <div class="single-contact-info-3 extra-contact-info mb-30">
              <h4>Contact</h4>
              <ul>
                <li>
                  <i class="icon-screen-smartphone"></i> +91 7092957279
                </li>
                <li>
                  <i class="icon-envelope "></i>
                  <a href="mailto:nithitexsaree@gmail.com">nithitexsaree@gmail.com</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-12 col-md-12">
            <div class="single-contact-info-3 mb-30">
              <ul>
                <li>
                  <i class="icon-clock "></i>
                </li>
              </ul>
              <h4>openning hours</h4>
              <p>Monday - Saturday. 9:00am - 6:00pm </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="contact-area-contact pt-50 pb-50">
  <div class="container">
    <div class="contact-home contact-info-wrap-3">
      <h3>Get in touch</h3>
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="contact-from contact-shadow">
            <form id="contact-form" action="https://htmldemo.net/norda/norda/assets/mail-php/mail.php" method="post">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <input name="name" type="text" placeholder="Name">
                </div>
                <div class="col-lg-6 col-md-6">
                  <input name="email" type="email" placeholder="Email">
                </div>
                <div class="col-lg-12 col-md-12">
                  <input name="subject" type="text" placeholder="Subject">
                </div>
                <div class="col-lg-12 col-md-12">
                  <textarea name="message" placeholder="Your Message"></textarea>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="g-recaptcha brochure__form__captcha pb-5" data-sitekey="6LdGR8oiAAAAACt-EInJPfzyPDrtLxdhxQdDXjFt"></div>
                </div>
                <div class="col-lg-6 col-md-6 pl-50 pt-15 pr-50">
                  <button class="submit" type="submit">Send Message</button>
                </div>
              </div>
            </form>
            <p class="form-messege"></p>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-6">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15633.019502233423!2d78.0043741!3d11.6051696!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe2c8e250a360799!2sNithi%20Tex!5e0!3m2!1sen!2sin!4v1667043910833!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection