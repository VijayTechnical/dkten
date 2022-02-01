<div>
    <section class="page-section">
        <div class="wrap container">
            <!-- <div id="profile-content"> -->
            <div class="row profile">
                <div class="col-lg-3 col-md-3">
                    <input type="hidden" id="state" value="normal">
                    <div class="widget account-details">
                        <div class="information-title" style="margin-bottom: 0px;">My Profile</div>
                        @livewire('user.components.user-sidebar-component')
                    </div>
                </div>

                <div class="col-lg-9 col-md-9">
                    <div id="profile_content">
                        <div id="window">
                            <div class="information-title">
                                <mark>
                                    Ticket From : {{ $ticket_subject }}
                                    <span class="pull-right" id="ticket_set" onclick="set_message_box()"
                                        style="cursor:pointer;">
                                        <i class="fa fa-refresh" style="color:#fff;"></i>
                                    </span>
                                </mark>
                            </div>
                            <div id="all_messages_box">
                                <div class="comments comments-scroll" id="messages_box">
                                    <div class="media comment">
                                        <div class="media-body" style="display:block;">
                                            <p>
                                                <span class="comment-author">
                                                    <a href="#">
                                                        {{ $ticket_subject }} </a>
                                                </span>
                                            </p>
                                            @foreach ($tickets as $key=>$ticket)
                                            @if($ticket->admin_id)
                                            <p class="comment-text shortened_message">
                                                Admin : {{ $ticket->message }}
                                            </p>
                                            @else
                                            <p class="comment-text shortened_message" style="display:absolute;left:10px;">
                                                You : {{ $ticket->message }}
                                            </p>
                                            @endif
                                            <span class="comment-date">
                                                {{ $ticket->created_at }} </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <hr class="page-divider">
                                <div class="comments-form tickets">
                                    <h4 class="block-title">
                                        Reply Message </h4>
                                    <form action="#" wire:submit.prevent="sendMessage()" class="form-horizontal"
                                        accept-charset="utf-8">
                                        <div class="form-group">
                                            <textarea placeholder="Your Message" class="form-control" name="reply"
                                                rows="3" wire:model="message"></textarea>
                                            @error('message')
                                            <span role="alert" class="text-danger mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <button type="submit"
                                                class="btn  btn-theme-transparent btn-icon-left submit_button enterer">
                                                <i class="fa fa-comment"></i>
                                                Reply
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <style>
                                .comment-text {
                                    cursor: pointer;
                                }
                            </style>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
    </section>
</div>