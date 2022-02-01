<div>
    <section class="page-section color">
        <div class="container">

            <div class="row">

                <div class="col-md-5">
                    <div class="contact-info contact_bg">
                        <h2 class="block-title">
                            <span>
                                Contact Us </span>
                        </h2>
                        <div class="media-list">
                            <div class="media">
                                <i class="pull-left fa fa-home"></i>
                                <div class="media-body">
                                    <strong>Address:</strong>
                                    <br>
                                    Chabahil Saraswotinagar, Kathmandu
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-phone"></i>
                                <div class="media-body">
                                    <strong>Phone:</strong><br>
                                    00-000-00000
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-globe"></i>
                                <div class="media-body">
                                    <strong>Website:</strong><br>
                                    <a href="https://www.dkten.com">www.dkten.com</a>
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-envelope"></i>
                                <div class="media-body">
                                    <strong>Email:</strong><br>
                                    <a href="mailto:info@dkten.com">
                                        info@dkten.com </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="contact-info mt15-md contact_bg">
                        <h2 class="block-title">
                            <span>
                                About Us </span>
                        </h2>
                        <p style="text-align:justify"></p>
                        <p><br></p>
                        <p></p>
                    </div>
                </div>

                <div class="col-md-7 text-left">

                    <h2 class="block-title">
                        <span>
                            Contact Form </span>
                    </h2>
                    <form action="#" wire:submit.prevent="addContact()" class="contact-form" method="post"
                        enctype="multipart/form-data" id="contact-form" accept-charset="utf-8">
                        <!-- Contact form -->
                        <div class="outer required">
                            <div class="form-group af-inner">
                                <label class="sr-only" for="name">
                                    Name </label>
                                <input type="text" data-toggle="tooltip" title="" placeholder="Name" name="name"
                                    id="name" class="form-control placeholder test" data-original-title="Name"
                                    spellcheck="false" data-ms-editor="true" wire:model="name">
                                @error('name')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="outer required">
                            <div class="form-group af-inner">
                                <label class="sr-only" for="email">
                                    Email </label>
                                <input type="email" data-toggle="tooltip" title="" placeholder="Email" name="email"
                                    id="email" class="form-control placeholder email test" data-original-title="Email" wire:model="email">
                                    @error('email')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="outer required">
                            <div class="form-group af-inner">
                                <label class="sr-only" for="subject">
                                    Subject </label>
                                <input type="text" class="form-control placeholder test" data-toggle="tooltip" title=""
                                    name="subject" id="subject" size="30" placeholder="Subject"
                                    data-original-title="Subject" spellcheck="false" data-ms-editor="true" wire:model="subject">
                                    @error('subject')
                                    <span class="error" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group af-inner">
                            <label class="sr-only" for="input-message">
                                Message </label>
                            <textarea name="message" id="input-message" placeholder="Message" rows="4" cols="50"
                                class="form-control placeholder test" data-toggle="tooltip" title=""
                                data-original-title="Message" spellcheck="false" data-ms-editor="true" wire:model="message"></textarea>
                                @error('message')
                                <span class="error" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="outer required">
                            <div class="form-group af-inner">
                                <button type="submit" class="form-button-submit btn btn-theme submitter12 enterer"
                                    data-ing="Sending..">
                                    Send Message </button>
                            </div>
                        </div>
                    </form>
                    <!-- /Contact form -->
                </div>
            </div>
        </div>
    </section>
</div>