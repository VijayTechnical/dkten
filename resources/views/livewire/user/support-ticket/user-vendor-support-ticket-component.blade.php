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
                                                        Create New Meassage </a>
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
                                                                @if($vtickets->count() > 0)
                                                                @foreach ($vtickets as $key=>$vticket)
                                                                <tr class="text-center">
                                                                    <td id="pagenation_set_links">{{ $vticket->subject
                                                                        }}</td>
                                                                    <td>
                                                                        <a href="{{ route('user.support.vendor.view',['ticket_id'=>$vticket->id,'vendor_id'=>$vticket->vendor_id]) }}" class="btn btn-primary">View</a>
                                                                        <a href="#" class="btn btn-danger">Delete</a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                @endif
                                                                <!--/end pagination-->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="hidden" id="page_num6" value="0">

                                                    <div class="pagination_box"></div>
                                                </div>
                                                <div class="tab-pane fade" id="tab2" wire:ignore.self>
                                                    <div class="row">
                                                        <form action="#" wire:submit.prevent="sendMessage()"
                                                            class="form-login" method="post"
                                                            id="add_new_message_to_seller" enctype="multipart/form-data"
                                                            accept-charset="utf-8">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <select class="form-control" name="seller_id"
                                                                        data-placeholder="Choose A Seller" required=""
                                                                        wire:model="vendor_id">
                                                                        <option value="">Choose A Seller</option>
                                                                        @foreach ($vendors as $key=>$vendor)
                                                                        <option value="{{ $vendor->id }}">{{
                                                                            $vendor->display_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('vendor_id')
                                                                    <div class="help-block with-errors">{{ $message
                                                                        }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
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
                                                                    required="" wire:model="message"></textarea>
                                                                @error('message')
                                                                <div class="help-block with-errors">{{ $message
                                                                    }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-12">
                                                                <button type="submit"
                                                                    class="btn btn-theme-dark btn-icon-right pull-right submit_button enterer"
                                                                    onclick="form_submit('add_new_message_to_seller');"
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
            <!-- </div> -->
        </div>
    </section>
</div>