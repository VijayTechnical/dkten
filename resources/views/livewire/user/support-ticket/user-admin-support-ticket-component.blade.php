<div>
    <section class="page-section">
        <div class="wrap container">
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
                                Support Ticket </div>
                            <div class="details-wrap">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tabs-wrapper content-tabs">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab1" data-toggle="tab" wire:ignore>
                                                        All Messages </a>
                                                </li>
                                                <li>
                                                    <a href="#tab2" data-toggle="tab" wire:ignore>
                                                        Create Ticket </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="tab1" wire:ignore.self>
                                                    <div class="wishlist tickets">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Ticket Subject</th>
                                                                    <th>Options</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="result6">
                                                                @if ($atickets->count() > 0)
                                                                @foreach ($atickets as $key=>$aticket)
                                                                <tr>
                                                                    <td>{{ $aticket->subject }}</td>
                                                                    <td>
                                                                        <a href="{{ route('user.support.admin.view',['ticket_id'=>$aticket->id]) }}" class="btn btn-primary">View</a>
                                                                        <a href="#" class="btn btn-danger">Delete</a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab2" wire:ignore.self>
                                                    <div class="row">
                                                        <form action="#" wire:submit.prevent="sendTicket()"
                                                            class="form-login" method="post" id="add_ticket"
                                                            enctype="multipart/form-data" accept-charset="utf-8">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="sub" type="text"
                                                                        placeholder="Subject" wire:model="subject">
                                                                    @error('subject')
                                                                    <div class="help-block with-errors">{{ $message
                                                                        }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="sr-only">
                                                                    Comment *
                                                                </label>
                                                                <textarea maxlength="5000" rows="10"
                                                                    class="form-control" name="reply" id="comment"
                                                                    style="height: 138px;" placeholder="Message *"
                                                                    wire:model="message"></textarea>
                                                                @error('message')
                                                                <div class="help-block with-errors">{{ $message
                                                                    }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-12">
                                                                <button type="submit"
                                                                    class="btn btn-theme-dark btn-icon-right pull-right submit_button enterer"
                                                                    onclick="form_submit('add_ticket');"
                                                                    data-ing="Creating..."
                                                                    data-success="Ticket Created Successfully!"
                                                                    data-unsuccessful="Ticket Creation Unsuccessful!"
                                                                    data-redirectclick="#ticket">
                                                                    Create <i class="fa fa-arrow-circle-right"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>